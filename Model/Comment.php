<?php
include_once("DataProvider.php");
class Comment{
	private $da;
	function __construct(){
		$this->da = new DataProvider();
	}

	function getCmtByMaPost($id){
		$sql = "Select * from thaoluan where MAPOST=$id";
		return $this->da->FetchAll($sql);
	}

	function deleteCommentByMaPost($id){
		$sql ="delete from thaoluan where MAPOST=$id";
		return $this->da->ExecuteQuery($sql);
	}
	function getCommnetById($id){
		$sql = "select * from thaoluan where MAPOST=$id";
		return $this->da->FetchAll($sql);
	}

	function getUserManage(){
		$sql = "Select UserID, FullName, UserName, Email, GroupName from users u join groups g on u.GroupID = g.GroupID";
		return $this->da->FetchAll($sql);
	}
	function __destruct(){
		unset($this->da);
	}
}
?>