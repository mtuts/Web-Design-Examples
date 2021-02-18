<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Send POST Request using Ajax </title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="loading hidden">&nbsp;</div>

<form id="names-form" action="javascript:;" method="post">

  <input type="hidden" name="action" value="add">
  <input type="hidden" name="code" value="">

  <table>
    <tbody>
    <tr>
      <th><label for="full-name">Full Name</label></th>
      <td><input type="text" id="full-name" name="full-name"></td>
    </tr>
    <tr>
      <th><label for="email">Email</label></th>
      <td><input type="email" id="email" name="email"></td>
    </tr>

    <tr>
      <td colspan="2">
        <button type="submit">Insert</button>
        <button type="button">Load</button>
      </td>
    </tr>
    </tbody>
  </table>
</form>
<textarea title="output" id="output" cols="30" rows="10" readonly></textarea>
<script type="text/javascript" src="js/script.js"></script>
</body>
</html>