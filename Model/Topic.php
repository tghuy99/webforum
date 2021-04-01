<?php
include_once("DataProvider.php");
class Topic{
	private $da;
	function __construct(){
		$this->da = new DataProvider();
	}

	function getAllPostById($id){
		$sql = "select * from post where MACD=$id";
		return $this->da->FetchAll($sql);
	}

function UpdateSoPostXoa($id){
		$sql = "Update chude set SOBAIPOST=SOBAIPOST-1 where MACD=$id";
		$this->da->ExecuteQuery($sql);
	} 
	function UpdateSoPost($id){
		$sql = "Update chude set SOBAIPOST=SOBAIPOST+1 where MACD=$id";
		$this->da->ExecuteQuery($sql);
	}

	function update($id,$tencd,$mota,$islocked,$thumuccon){
		$sql = "update chude set TENCD='$tencd',MOTA='$mota',ISLOCKED=$islocked,MATMC=$thumuccon where MACD=$id";
		return $this->da->ExecuteQuery($sql);
	}

	function delete($id){
		$sql = "delete from chude where MACD='$id'";
		return $this->da->ExecuteQuery($sql);
	}

	function insert($tencd,$mota,$tentk,$currentday,$sopost,$islocked,$thumuccon){
		$sql = "Insert into chude(TENCD,MOTA,TENTK,NGAYTAO,SOBAIPOST,ISLOCKED,MATMC) values ('$tencd','$mota','$tentk','$currentday',$sopost,$islocked,$thumuccon)";
		// echo $sql;
		return $this->da->ExecuteQuery($sql);
	}

	function getTopicById($id){
		$sql = "Select * from chude where MACD=$id";
		// echo $sql;
		return $this->da->Fetch($sql);
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