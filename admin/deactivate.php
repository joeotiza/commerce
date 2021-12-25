<div >
<?php
include("../db/dbconn.php");
$id = $_GET['id'];
$query = $conn->query("SELECT * FROM `customer` WHERE customerid='$id'") or die(mysqli_error());
$fetch = $query->fetch_array();
$conn->close();
?>
<div class="login_title"><span>Confirm</span></div>
<br>
  <form method="post" >
    <table class="login">
      <tr><td><input type="hidden" name="cid" autocomplete="off" class="input-large number" id="text" value="<?= $id; ?>" required/></td></tr>
      <tr><td><p id="text">Deactivate <?= $fetch['firstname']."&nbsp;".$fetch['lastname']."'s account?" ?></td></tr>
      <tr><td><?= $fetch['email']?></td></tr>
      <tr><td><button name="deactivate" type="submit" class="btn btn-block btn-large btn-danger"><i class='fa fa-ban'></i> Deactivate Account</button></td></tr>
    </table>
  </form>
</div>
