<?php
if(isset($_SESSION["TenTk"])){
	include_once("Model/User.php");
	include_once("Model/Post.php");
	include_once("Model/Topic.php");

	$user = $_SESSION["TenTk"];
	// echo $user;
	$p= new Post();
	$mapost=$_GET['mapost'];
	// echo $mapost;

	$post = $p->getPostById($mapost);

	$id=$_GET['id'];

	if($user!=$post["TENTK"]){
		if($_SESSION["LoaiTk"]==1){
			// echo "Vô đây";
			$macd = $post["MACD"];
			$t = new Topic();
			$chude = $t->getTopicById($macd);
			$islocked = $chude["ISLOCKED"];
			if($islocked==0){
				$res = $p->deleteComment($id);
				$xoacmt = $p->UpdateCommentXoa($mapost);
				if($res>0){
					echo "<script>alert('Xóa bình luận thành công!');window.history.go(-1);</script>";
				}
			}
			else{
				echo "<script>alert('Admin đã khóa chức năng này!');window.history.go(-1);</script>";
			}
		}
		else{
			echo "<script>alert('Chỉ Admin hoặc người tạo post mới có quyền xóa!');window.history.go(-1);</script>";
		}
		
	}
	else{
		$macd = $post["MACD"];
		$t = new Topic();
		$chude = $t->getTopicById($macd);
		$islocked = $chude["ISLOCKED"];
		// echo $islocked;
		if($islocked==0){
			$res = $p->deleteComment($id);
			if($res>0){
				$xoacmt = $p->UpdateCommentXoa($mapost);
				echo "<script>alert('Xóa bình luận thành công!');window.history.go(-1);</script>";
			}
		}
		else{
			echo "<script>alert('Admin đã khóa chức năng này!');window.location.href='index.php?mod=post&act=detail&id=$mapost'</script>";
		}
	}
}
else{
	echo "<script>alert('Mời bạn đăng nhập');</script>";
	header("location: index.php?mod=user&act=login");
}	

?>