 <?php
	class DataProvider{
		private $link;//bien ket noi csdl
		function __construct()
		{
			$this->link=mysqli_connect("localhost","root","","forum");
		}
		function ExecuteQuery($sql)
		{
	 		mysqli_query($this->link,"set names utf8");
			return mysqli_query($this->link, $sql);
		}
		function ExecuteQueryInsert($sql){
			$result=$this->ExecuteQuery($sql);
			if($result >0){
				return mysqli_insert_id($this->link);// tra ve id vua moi insert
			}
			else
				return 0;
		}
		function Fetch($sql){
			$rs = $this->ExecuteQuery($sql);
			return mysqli_fetch_assoc($rs);
		}
		function FetchAll($sql){
			$arr=array();
			$r = $this->ExecuteQuery($sql);
			while($row = mysqli_fetch_assoc($r)){
				$arr[]=$row;
			}
			mysqli_free_result($r);
			return $arr;
		}		
		function NumRows($sql){
			$result=$this->ExecuteQuery($sql);
			return mysqli_num_rows($result);
		}
		function __destruct()
		{
			mysqli_close($this->link);
		}
	}
?>