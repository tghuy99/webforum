<?php
	include_once("Model/User.php");
	$user = new User();
    if(isset($_REQUEST['signup_button'])){
        $user_email=$_REQUEST['user_email'];
        $user_firstname=$_REQUEST['user_firstname'];
        $user_lastname=$_REQUEST['user_lastname'];
        $user_username=$_REQUEST['user_username'];
        $user_password=$_REQUEST['user_password'];
        $full = $user_firstname.$user_lastname;

        $u=$user->createNewUser($full,$user_email,$user_username,$user_password);    
        $_SESSION['TenTk'] = $user_username;
        $_SESSION['LoaiTk']=2;
        header('Location: index.php?mod=user&act=login');
    }
    else
		include("View/User/Register.php");
?>