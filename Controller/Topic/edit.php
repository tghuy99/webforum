<?php
  include_once("Model/Topic.php");
  if(isset($_GET["id"])&&!isset($_POST["btnSua"])){
    $id = $_GET["id"];
    $t = new Topic();
    $r = $t->getTopicById($id);
    $islocked=$r["ISLOCKED"];
    if($r>0){
      include_once("View/Topic/edit.php");
    }
  }

  if(isset($_POST["btnSua"])){
     $id = $_GET["id"];
     $tencd = $_POST["TENCD"];
    $mota = $_POST["MOTA"];
    (isset($_POST["ISLOCKED"])) ? $islocked = 1: $islocked=0;
    // echo $islocked
    $thumuccon = $_POST["thumuccon"];
      $t = new Topic();
      $r = $t->update($id,$tencd,$mota,$islocked,$thumuccon);
      if($r>0){
        echo "<script>alert('Sửa thành công!'); window.location.href='admin.php';</script>";
      }
  }
?>