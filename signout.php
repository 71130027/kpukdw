<script type="text/javascript" src="https://mail.google.com/mail/u/0/?logout&hl=en" />
<?php
	session_start();
	session_destroy();
	header("location: index.php");
?>