<?php
    if(isset($_REQUEST['login_button'])){
    	include_once("Model/User.php");

        $username=  $_REQUEST['username'];
        $password= 	$_REQUEST['password'];

        if($username==""){
            echo "<script>alert('Username không được để trống');window.history.go(-1);</script>";
        }

        if($password==""){
            echo "<script>alert('Mật khẩu không được để trống');window.history.go(-1);</script>";
        }

        $user = new User();
        $u = $user->Login($username,$password);
        if($u>0){
            $_SESSION['TenTk']=$u['TENTK'];
            $_SESSION['HoTen']=$u['HOTEN'];
            $_SESSION['LoaiTk'] = $u['LOAITK'];
            echo "<script>alert('Đăng nhập thành công!');</script>";
            if($_SESSION['LoaiTk']==1 && $_SESSION['TenTk']=="admin"){
                header('location: admin.php');
            }
            else header('location: index.php?mod=post&act=main');
        }
        else{
            echo "<script>alert('Tên đăng nhập hoặc mật khẩu không chính xác');window.history.go(-1);</script>";
            // echo $username;
        }
    }
    else
	   include("View/User/Login.php");
?>