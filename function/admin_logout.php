<?php

	session_start();//start the session
	session_destroy();//destroy the session

	//redirect to admin_index.php
	header("location:../admin/admin_index.php");
?>
