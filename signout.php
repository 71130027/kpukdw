<script>
	var revokeAllScopes = function() {
		auth2.disconnect();
	}
</script>
<?php
	session_start();
	session_destroy();
	header("location: index.php");
?>