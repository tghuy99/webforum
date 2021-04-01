<?php
	session_destroy();
	header("location: index.php?mod=user&act=login");
?>