<?php
	
	include_once("Model/Topic.php");
	$cd = new Topic();
	$resCd = $cd->getTopic();
	include_once("Model/Post.php");
	$p = new Post();

	if(isset($_POST["submit_button"])){
        $forum_topic_name=$_REQUEST['forum_topic_name'];
        $forum_topic_body=$_REQUEST['forum_topic_body'];
        $forum_topic_semester = $_REQUEST['forum_topic_semester'];
        // echo $forum_topic_name." ".$forum_topic_body." ".$forum_topic_semester;
        
        $Destination = 'upload';
        if(!isset($_FILES['BackgroundImageFile']) || !is_uploaded_file($_FILES['BackgroundImageFile']['tmp_name'])){
            $BackgroundNewImageName= '';
            move_uploaded_file($_FILES['BackgroundImageFile']['tmp_name'], "$Destination/$BackgroundNewImageName");
        }
        else{
            $RandomNum = rand(0, 9999999999);
            $ImageName = str_replace(' ','-',strtolower($_FILES['BackgroundImageFile']['name']));
            $ImageType = $_FILES['BackgroundImageFile']['type'];
            $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
            $ImageExt = str_replace('.','',$ImageExt);
            $ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
            $BackgroundNewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
            move_uploaded_file($_FILES['BackgroundImageFile']['tmp_name'], "$Destination/$BackgroundNewImageName");
        }
        $user_username = $_SESSION["TenTk"];
        $res = $p->insert($forum_topic_name,$forum_topic_body,$user_username,$forum_topic_semester,$BackgroundNewImageName);

        $id = $forum_topic_semester;
        $chude = $cd->getTopicById($id);

        $up = $cd->UpdateSoPost($id);

        
        echo '<script>alert("Thêm thành công! Đợi admin duyệt bài...");window.location.href="index.php?mod=post&act=main"</script>';
	}
	else{
		include_once("View/Post/new.php");
	}

?>