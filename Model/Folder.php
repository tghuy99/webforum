<?php
include_once("DataProvider.php");
class Folder{
	private $da;
	function __construct(){
		$this->da = new DataProvider();
	}

	function getFolderByMaThuMuc($mamuc){
		$sql = "Select * from thumuc where MATM='$mamuc'";
		return $this->da->Fetch($sql);
	}

	function getFolder(){
		$sql = "Select * from thumuc";
		return $this->da->FetchAll($sql);
	}

	function __destruct(){
		unset($this->da);
	}
}
?>