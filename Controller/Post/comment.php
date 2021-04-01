<?php
    include_once("Model/User.php");
    include_once("Model/Post.php");
    include_once("Model/Topic.php");

    if(isset($_POST['submit_button'])){
        if(isset($_SESSION["TenTk"])){
            $p=new Post();
            $id = $_GET['postid'];
            $mapost = $id;
            $post = $p->getPostById($mapost);
            $t = new Topic();
            $chude = $t->getTopicById($post["MACD"]);
            $islocked = $chude["ISLOCKED"];
            if($islocked==0){
                $TenTk=$_SESSION['TenTk'];
                $noidung=$_POST['noidung'];
                
                $Destination = 'upload';
                if(!isset($_FILES['inputfile']) || !is_uploaded_file($_FILES['inputfile']['tmp_name'])){
                    $inputfile= '';
                    move_uploaded_file($_FILES['inputfile']['tmp_name'], "$Destination/$inputfile");
                }
                else{
                    $RandomNum = rand(0, 9999999999);
                    $ImageName = str_replace(' ','-',strtolower($_FILES['inputfile']['name']));
                    $ImageType = $_FILES['inputfile']['type'];
                    $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
                    $ImageExt = str_replace('.','',$ImageExt);
                    $ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
                    $inputfile = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
                    move_uploaded_file($_FILES['inputfile']['tmp_name'], "$Destination/$inputfile");
                }
                
                    include_once("Model/Post.php");
                    $post= new Post();
                    $addcmt = $post->AddComment($id,$TenTk,$noidung,$inputfile);

                    $socmt = $post->UpdateComment($id);
                    header("location: index.php?mod=post&act=detail&id=$id");
                }
                
                else{
                    echo "<script>alert('Admin đã khóa chức năng này!');window.history.go(-1);</script>";
                }
                }      
        else{
            header("location: index.php?mod=user&act=login");
        }     
    }    
?>