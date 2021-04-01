<?php
	// echo "detail";
	include_once("Model/Topic.php");
	include_once("Model/User.php");
	include_once("Model/Post.php");
	$user = new User();
	$t = new Topic();
	if(isset($_GET["id"])){
		$id = $_GET["id"];
		$resTopic = $t->getTopicById($id);
		$resPost = $t->getAllPostById($id);
		// echo var_dump($resPost);
		include_once("View/Topic/detail.php");
	}
?>