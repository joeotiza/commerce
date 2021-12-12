<?php
session_start();//start the session

//if no customer or admin ID is set on the global session variable
if(!ISSET($_SESSION['id']))
{
	echo "<script>window.location = 'index.php';</script>";
}

?>
