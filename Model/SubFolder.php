<?php
include_once("DataProvider.php");
class SubFolder{
	private $da;
	function __construct(){
		$this->da = new DataProvider();
	}

	function getSubFolderByMaThuMuc($mamuccon){
		$sql = "Select * from thumuccon where MATMC='$mamuccon'";
		return $this->da->Fetch($sql);
	}

	function getSubFolder(){
		$sql = "Select * from thumuccon";
		return $this->da->FetchAll($sql);
	}

	function getTopicDaDuyet(){
		$sql = "Select * from chude where DUYET=1";
		return $this->da->FetchAll($sql);
	}

	function getTopic(){
		$sql = "Select * from chude";
		return $this->da->FetchAll($sql);
	}

	function __destruct(){
		unset($this->da);
	}
}
?>