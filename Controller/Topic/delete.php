<?php
	if(isset($_GET["id"])){
		include("Model/Topic.php");
		$id = $_GET["id"];
		$t = new Topic();
		$r = $t->delete($id);
		if($r>0){
			echo "<script>alert('Xóa thành công!'); window.location.href='admin.php';</script>";
		}
	}
?>