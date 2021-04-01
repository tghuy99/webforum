<?php
	include_once("Model/Post.php");
	$p = new Post();
	if(isset($_GET["id"])&&isset($_GET["tid"]))
		$mapost = $_GET["id"];
		$macd = $_GET["tid"];
	$r = $p->duyetPost($mapost);
	if($r>0){
		echo '<script>alert("Đã duyệt bài");</script>';
		header("location: admin.php?mod=topic&act=detail&id=$macd");
	}
?>