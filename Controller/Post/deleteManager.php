<?php
	if(isset($_GET["id"])){
		$id= $_GET["id"];
		include_once("Model/Post.php");
		include_once("Model/Topic.php");
		include_once("Model/Comment.php");
		$p = new Post();
		$t = new Topic();
		$c = new Comment();
		$soluongcmt = $c->getCommnetById($id);
		if($soluongcmt>0){
			$xoacmt = $c->deleteCommentByMaPost($id);
		}

		$xoa = $p->deletePostManager($id);

		$idcd = $_GET['tid'];

		$topic = $t->getTopicById($idcd);

        $up = $t->UpdateSoPostXoa($idcd);

		// $up = $p->
		echo '<script> alert("Xóa thành công!"); window.history.go(-1) </script>';
	}
?>