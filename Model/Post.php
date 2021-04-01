<?php
include_once("DataProvider.php");
class Post{
	private $da;
	function __construct(){
		$this->da = new DataProvider();
	}	

	function duyetPost($id){
		$sql = "update post set DUYET=1 where MAPOST=$id";
		return $this->da->ExecuteQuery($sql);
	}

	function UpdatePost($forum_topic_name,$forum_topic_body,$forum_topic_semester,$BackgroundNewImageName,$mapost){
		$sql = "Update post set TENPOST='$forum_topic_name',NOIDUNG='$forum_topic_body',MACD='$forum_topic_semester',IMAGE='$BackgroundNewImageName' where MAPOST=$mapost";
		// echo $sql;
		return $this->da->ExecuteQuery($sql);
	}

	function deletePostManager($id){
		$sql = "delete from post where MAPOST=$id";
		// echo $sql;
		$this->da->ExecuteQuery($sql);
	}

	function getPostDaDuyet(){
		$sql = "Select * from post where DUYET=1 order by NGAYTAO desc";
		// echo $sql;
		return $this->da->FetchAll($sql);
	}

	function updateLuotXem($id){
		$sql = "Update post set LUOTXEM=LUOTXEM+1 where MAPOST=$id";
		return $this->da->ExecuteQuery($sql);
	}

	function insert($forum_topic_name, $forum_topic_body, $user_username ,$forum_topic_semester,$BackgroundNewImageName){
		$sql="INSERT INTO post(TENPOST, NOIDUNG, NGAYTAO, TENTK, MACD, IMAGE) VALUES ('$forum_topic_name', '$forum_topic_body', CURRENT_TIMESTAMP, '$user_username' ,'$forum_topic_semester', '$BackgroundNewImageName')";
		// echo $sql;
		return $this->da->ExecuteQuery($sql);
	}

	function deleteComment($id){
		$sql = "Delete from thaoluan where MATL=$id";
		return $this->da->ExecuteQuery($sql);
	}

	function UpdateCommentXoa($id){
		$sql = "update post set SOCMT=SOCMT-1 where MAPOST=$id";
		echo $sql;
		return $this->da->ExecuteQuery($sql);
	}

	function UpdateComment($id){
		$sql = "update post set SOCMT=SOCMT+1 where MAPOST=$id";
		return $this->da->ExecuteQuery($sql);
	}

	function AddComment($id,$tentk,$noidung,$inputfile){

        $sql="INSERT INTO thaoluan(TENTK, MAPOST, NOIDUNG, NGAYTL, IMAGE) VALUES ('$tentk', $id, '$noidung', CURRENT_TIMESTAMP, '$inputfile')";
        // mysqli_query($database,$sql)or die(mysqli_error($database));
        return $this->da->ExecuteQuery($sql);
	}

	function getPostBySearch($txt){
		$sql = "Select * from post where TENPOST like '%".$txt."%'";
		return $this->da->FetchAll($sql);
	}


	function getPostOrderBy(){
		$sql = "Select * from post order by NGAYTAO DESC";
		return $this->da->FetchAll($sql);
	}

	function getPostByMaTL($id){
		$sql = "Select * from thaoluan where MATL=$id";
		// echo $sql;
		return $this->da->Fetch($sql);
	}

	function getPostById($id){
		$sql = "Select * from post where MAPOST=$id";
		// echo $sql;
		return $this->da->Fetch($sql);
	}

	function getPost(){
		$sql = "Select * from post";
		return $this->da->FetchAll($sql);
	}

	function getUserManage(){
		$sql = "Select UserID, FullName, UserName, Email, GroupName from users u join groups g on u.GroupID = g.GroupID";
		return $this->da->FetchAll($sql);
	}
	function DeleteUser($id){
		$sql = "Delete from users where UserID=$id";
		return $this->da->ExecuteQuery($sql);
	}
	function EditUser($userID,$groupID){
		$sql="Update users set GroupID=$groupID where UserID=$userID";
		return $this->da->ExecuteQuery($sql);
	}
	function UpdateUser($userID,$fullName,$email){
		$sql="Update users set FullName='$fullName',Email='$email' where UserID=$userID";
		return $this->da->ExecuteQuery($sql);
	}
	function ChangePassWord($userID,$newPassWord,$oldPassWord){
		$sql="Select UserID from users where UserID=$userID and PassWord=md5('$oldPassWord')";
		$ret = $this->da->NumRows($sql);
		if($ret==0)
			return 0;
		$sql="Update users set PassWord=md5('$newPassWord') where UserID=$userID";
		return $this->da->ExecuteQuery($sql);
	}
	function __destruct(){
		unset($this->da);
	}
}
?>