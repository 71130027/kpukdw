<?php
	if($_GET["reset"]==1) header("location: index.php");
?>
<script src="https://apis.google.com/js/platform.js" async defer></script>
<script src="http://code.jquery.com/jquery-3.1.1.js" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA=" crossorigin="anonymous"></script>
<script>
	function doPOST(url) {
		var jForm = $('<form></form>');
		jForm.attr('action', url);
		jForm.attr('method', 'post');
		jForm.submit();
	}
	
	function signOut() {
		var auth2 = gapi.auth2.getAuthInstance();
		auth2.signOut();
	}
</script>
<?php
	session_start();
	session_destroy();
	//echo '<script>doPOST("https://accounts.google.com/o/oauth2/revoke?token='.$_SESSION['token'].'")</script>';
	echo '<script>signOut()</script>'
?>
<script>
	setTimeout(function(){window.location = "signout.php?reset=1";},3000);
</script>