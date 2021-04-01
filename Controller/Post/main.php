<?php
	include_once("Model/Topic.php");
	include_once("Model/Post.php");
	$post=new Post();

	$result = $post->getPostDaDuyet();

	$Topic = new Topic();
	

	include("Model/User.php");

	include_once("View/Post/main.php");
?>