<?php
	if($_GET["reset"]==1) header("location: index.php");
?>
<?php
	session_start();
	session_destroy();
	echo '<script src="https://accounts.google.com/o/oauth2/revoke?token='.$_SESSION['token'].'"></script>';
?>
<script>
	setTimeout(function(){window.location = "signout.php?reset=1";},3000);
</script>