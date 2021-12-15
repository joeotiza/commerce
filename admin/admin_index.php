<!DOCTYPE html>
<html>
<head>
  <title>EasyBuy</title>
  <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
  <link rel="icon" href="../img/logo.png" />
  <link rel = "stylesheet" type = "text/css" href="../css/style.css" media="all">
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
  <script src="../js/bootstrap.js"></script>
  <script src="../js/jquery-1.7.2.min.js"></script>
  <script src="../js/button.js"></script>
  <script src="../js/modal.js"></script>
  <script src="../js/transition.js"></script>
  <script src="https://kit.fontawesome.com/981b9a1d0f.js" crossorigin="anonymous"></script>
</head>

<body>
	<div id="header">
		<img src="../img/logo.png">
		<label>EasyBuy</label>
  </div>

  <?php include('../function/admin_login.php');?>
  <div id="admin">
    <form method="post" class="well">
    <center>
      <legend>Administrator</legend>
      <table>
        <tr>
            <input type="text" name="username" placeholder="Username">
        </tr>
        <br>
        <tr>
            <input type="password" name="password" placeholder="Password">
        </tr>
        <br>
        <br>
        <input type="submit" name="enter" value="Enter" class="btn btn-primary" style="width:200px;">
      </table>
    </center>
    </form>
  </div>

</body>
</html>
