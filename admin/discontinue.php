<div >
<?php
include("../db/dbconn.php");
$id = $_GET['id'];
$query = $conn->query("SELECT * FROM `product` WHERE productid='$id'") or die(mysqli_error());
$fetch = $query->fetch_array();
$conn->close();
?>
<div class="login_title"><span>Confirm</span></div>
<br>
  <form method="post" >
    <table class="login">
      <tr><td><input type="hidden" name="pid" autocomplete="off" class="input-large number" id="text" value="<?= $id; ?>" required/></td></tr>
      <tr><td><p id="text">Discontinue <?= $fetch['name']."?" ?></td></tr>
      <tr><td><img class="img-polaroid" src = "../photo/<?= $fetch['image']?>" width="200px"></td></tr>
      <tr><td><button name="discontinue" type="submit" class="btn btn-block btn-large btn-danger"><i class='fa fa-trash-o'></i> Discontinue</button></td></tr>
    </table>
  </form>
</div>
