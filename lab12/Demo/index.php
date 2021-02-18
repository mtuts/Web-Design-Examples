<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Send POST Request using Ajax </title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="loading">&nbsp;</div>

<fieldset>
  <legend><strong>Choose Where you would like to store your data:</strong></legend>
  <label><input type="radio" name="store" value="db"> MySQL</label>
  <label><input type="radio" name="store" value="file" checked> File</label>
</fieldset>

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
        <button type="submit">Insert / Update</button>
      </td>
    </tr>
    </tbody>
  </table>
</form>

<table>
  <thead>
  <tr>
    <th>Full Name</th>
    <th>Email</th>
    <th>Option</th>
  </tr>
  </thead>
  <tbody id="data-list">
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>
      <a class="edit" href="javascript:;">Edit</a>
      |
      <a class="delete" href="javascript:;">Delete</a>
    </td>
  </tr>
  </tbody>
</table>
<script type="text/javascript" src="js/script.js"></script>
</body>
</html>