<?php

function get_encrypted_code($username, $password, $last_update) {
  return hash('sha512', $username . $password . $last_update);
}

function user_login($username, $password) {
  global $data;
  $db = Connection::get_instance();
  $password = hash('sha512', $password);

  $stmt = $db->pdo()->prepare("SELECT `id` FROM `customer` WHERE `email` = ? AND `password` = ?;");

  if ($stmt->execute([$username, $password])) {
    if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { // correct login information
      $st = $db->pdo()->prepare("UPDATE `customer` SET `last_update` = NOW() WHERE `id` = ?;");
      $st->execute([$row['id']]);

      $st = $db->pdo()->prepare("SELECT `id`, `last_update` FROM `customer` WHERE `id` = ?;");
      $st->execute([$row['id']]);
      $row = $st->fetch(PDO::FETCH_ASSOC);

      setcookie('user_id', hash('sha512', $row['id']), time() + 24 * 60 * 60, $data['base']);
      setcookie('user_code', get_encrypted_code($username, $password, $row['last_update']), time() + 24 * 60 * 60, $data['base']);

      return true;
    }
  }
  return false;
}

function user_logout() {
  global $data;
  setcookie('user_id', '', time() - 24 * 60 * 60, $data['base']);
  setcookie('user_code', '', time() - 24 * 60 * 60, $data['base']);
}

function is_login() {
  $db = Connection::get_instance();

  $sql = "SELECT * FROM `customer` WHERE SHA2(`id`, 512) = ?;";
  $stmt = $db->pdo()->prepare($sql);

  if ($stmt->execute([$_COOKIE['user_id']])) {
    if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { // correct login information
       $code = get_encrypted_code($row['email'], $row['password'], $row['last_update']);

      if ($code == $_COOKIE['user_code']) {
        $_SESSION['user_full_info'] = [
          'full_name' => $row['first_name'] . ' ' . $row['last_name'],
          'email' => $row['email'],
          'phone' => $row['phone'],
          'birth_date' => $row['birth_date'],
          'address' => $row['address']
          ];
        return true;
      }
    }
  }
  return false;
}

function get_customers() {

  $db = Connection::get_instance();

  $sql = "SELECT * FROM `customer`;";
  $stmt = $db->pdo()->query($sql);

  $customers = [];
  while (($row = $stmt->fetch(PDO::FETCH_ASSOC)) !== false) { // correct login information
    $customers[] = $row;
  }
  return $customers;
}

function get_customer($id) {

  $db = Connection::get_instance();

  $sql = "SELECT * FROM `customer` WHERE `id` = ?;";
  $stmt = $db->pdo()->prepare($sql);

  if ($stmt->execute([$id])) {
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  return false;

}

function delete_customer($id) {

  $db = Connection::get_instance();

  $sql = "DELETE FROM `customer` WHERE `id` = ?;";
  $stmt = $db->pdo()->prepare($sql);

  return $stmt->execute([$id]);

}

function add_new_user($first, $last, $email, $password, $birth, $gender, $phone = NULL, $address = NULL) {
  $db = Connection::get_instance();

  $sql = "INSERT INTO `customer` (`first_name`, `last_name`, `email`, `password`, `birth_date`, `gender`, `phone`, "
    ."`address`, `last_update`) "
    ."VALUES (:first, :last, :email, SHA2(:pass, 512), :birth, :gender, :phone, :address, NOW());";
  $stmt = $db->pdo()->prepare($sql);

  $stmt->bindValue(":first", $first);
  $stmt->bindValue(":last", $last);
  $stmt->bindValue(":email", $email);
  $stmt->bindValue(":pass", $password);
  $stmt->bindValue(":birth", date('Y-m-d', strtotime($birth)));
  $stmt->bindValue(":gender", $gender == 'male' ? 1 : 0);
  $stmt->bindValue(":phone", $phone);
  $stmt->bindValue(":address", $address);

  return $stmt->execute();
}

function update_user($id, $first, $last, $email, $birth, $gender, $password = NULL, $phone = NULL, $address = NULL) {
  $db = Connection::get_instance();

  if (is_null($password) || strlen($password) == 0) {
    $sql = "UPDATE `customer` SET `first_name` = :first, `last_name` = :last, `email` = :email, "
      ."`birth_date` = :birth, `gender` = :gender, `phone` = :phone, `address` = :address, `last_update` = NOW() "
      ."WHERE `id` = :id; ";
  } else {
    $sql = "UPDATE `customer` SET `first_name` = :first, `last_name` = :last, `email` = :email, `password` = :pass, "
      ."`birth_date` = :birth, `gender` = :gender, `phone` = :phone, `address` = :address, `last_update` = NOW() "
      ."WHERE `id` = :id; ";
  }
  $stmt = $db->pdo()->prepare($sql);

  $stmt->bindValue(":first", $first);
  $stmt->bindValue(":last", $last);
  $stmt->bindValue(":email", $email);

  if (!is_null($password) && strlen($password) > 0) {
    $stmt->bindValue(":pass", hash('sha512',$password));
  }

  $stmt->bindValue(":birth", date('Y-m-d', strtotime($birth)));
  $stmt->bindValue(":gender", $gender == 'male' ? 1 : 0);
  $stmt->bindValue(":phone", $phone);
  $stmt->bindValue(":address", $address);
  $stmt->bindValue(":id", $id);

  return $stmt->execute();
}