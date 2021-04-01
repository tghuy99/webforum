<?php

	include_once("Model/Topic.php");
	$topic = new Topic();

	if(isset($_POST["btnThem"])){
		// echo "Đã thêm";
		$tencd = $_POST["TENCD"];
		$mota = $_POST["MOTA"];

		// $islocked = $_POST["ISLOCKED"];
		(isset($_POST["ISLOCKED"])) ? $islocked = 1: $islocked=0;
		$tentk = "admin";
		$currentday = date('Y-m-d');
		$sopost = 0;

		$thumuccon = $_POST["thumuccon"];
		// echo $islocked;
		// echo $thumuccon;
		$res = $topic->insert($tencd,$mota,$tentk,$currentday,$sopost,$islocked,$thumuccon);
		if($res>0){
			echo "<script>alert('Thêm thành công!'); window.location.href='admin.php';</script>";
		}

	}

?>