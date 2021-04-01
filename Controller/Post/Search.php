<?php
	if(isset($_REQUEST["Keyword"])){
		$txtSearch=$_REQUEST["Keyword"];
		// echo "pl";
		include_once("../../Model/Post.php");
		include_once("../../Model/User.php");
		$post = new Post();
		$p = $post->getPostBySearch($txtSearch);
		include_once("../../View/Post/Search.php");
	}
?>