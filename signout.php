<?php
	session_start();
	session_destroy();
?>
<script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
<meta name="google-signin-client_id" content="650232885328-e6gsbsa4vgi5gv0nbv87ntjgiar9cfaq.apps.googleusercontent.com">
<script src="http://code.jquery.com/jquery-3.1.1.js" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA=" crossorigin="anonymous"></script>
<script>
	function signOut() {
		var auth2 = gapi.auth2.getAuthInstance();
		auth2.signOut();
	}
</script>
<div id="google" class="g-signin2" data-onsuccess="signOut" hidden></div>
<script>
	setTimeout(function(){window.location = "index.php";},1000);
</script>