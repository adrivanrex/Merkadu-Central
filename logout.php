<html>
<head>
	<script>
		sessionStorage.clear();
		window.location.href = "login.html";
	</script>
</head>
</html>
<?php
error_reportin(0);
session_start();
session_destroy();


?>