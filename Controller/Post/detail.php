<?php
    include_once("Model/Post.php");
    $post=new Post();
    $id = $_GET["id"];
    $rws = $post->getPostById($id);
    
    $luotxem = $post->updateLuotXem($id);

    include("Model/User.php");
    // include_once("View/Post/main.php");

    $taikhoan = $rws["TENTK"];
    $user = new User();
    $r = $user->getUserByUser($taikhoan);
    $hinh = "upload/".$r["AVATAR"];

    $hinhcmt = "upload/".$rws["IMAGE"];
    if($rws["IMAGE"]==""||$rws["IMAGE"]==null){
        $div = "";
    }
    else{
        $div='<div class="col-md-3 column">
                <img src='. $hinhcmt .' class="img-responsive thumbnail">
            </div>';
    }
    
    // include_once("View/Post/detail.php");

    include_once("Model/Comment.php");
    $cmt = new Comment();
    $result = $cmt->getCmtByMaPost($id);

//     $chuoi = <<<EOD
    
// EOD;
//         echo $chuoi;
?>

<div class="container">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h1>BÀI VIẾT: <?php echo $rws['TENPOST'] ?></h1>
                    <br>
                    <div class="well">
                        <div class="row clearfix">
                            <div class="col-md-1 column">
                                <img src=<?php echo $hinh; ?> class="img-responsive forum-topic-avatar" alt="#">
                            </div>
                            <div class="col-md-11 column">
                                <div class="topic-user-name">
                                    <i class="fa fa-user"></i> <?php echo $rws['TENTK']; ?>
                                </div>
                                <hr>
                                <div class="topic-body">
                                    <i class="fa fa-question-circle"></i><?php echo $rws['NOIDUNG']; ?>
                                </div>
                                <div class="forum-attachment">
                                    <hr>
                                    <!-- <div class="col-md-3 column"> -->
                                        <?php echo $div; ?>
                                    <!-- </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h4>Phần bình luận của user</h4>
                    <hr>
                    <?php
                        foreach ($result as $row) {

                            $taikhoan = $row["TENTK"];
                            $user = new User();
                            $r = $user->getUserByUser($taikhoan);
                            $hinh = "upload/".$r["AVATAR"];
                            $hinhcmt = "upload/".$row["IMAGE"];
                            if($row["IMAGE"]==""||$row["IMAGE"]==null){
                                $div = "";
                            }
                            else{
                                $div='<div class="col-md-3 column">
                                                <img src='.$hinhcmt.' class="img-responsive thumbnail">
                                            </div>';
                            }
                            # code...
                            $chuoi =<<<EOD

                            <div class="well">
                                <div class="row clearfix">
                                    <div class="col-md-1 column">
                                        <img src={$hinh} class="img-responsive forum-topic-avatar" alt="#">
                                    </div>
                                    <div class="col-md-11 column">
                                        <div class="topic-user-name">
                                            <i class="fa fa-user"></i> {$r["TENTK"]}
                                        </div>
                                        <hr>
                                        <div class="topic-body">
                                            <i class="fa fa-question-circle"></i> {$row["NOIDUNG"]}
                                        </div>
                                        <div class="forum-attachment">
                                            ${row["NGAYTL"]}
                                            <hr>
                                            {$div}
                                        </div>
                                    </div>
                                    <a href="index.php?mod=post&act=delete&mapost={$id}&id={$row["MATL"]}"><button class="btn btn-danger" onclick="return isDelete();">Xóa cmt</button></a>
                                </div>
                            </div>
EOD;
                            echo $chuoi;
                        }
                    ?>
                    
                    <br>
            <?php

                if(isset($_SESSION["TenTk"])){
                    $chuoi=<<<EOD
                    <div class="container">                        
                        <div class="row clearfix">
                            <br>
                                <h3>THÊM BÌNH LUẬN CỦA BẠN</h3>
                                <form action="index.php?mod=post&act=comment&postid=$id" method="post" enctype="multipart/form-data" id="UploadForm">
                                    <div class="form-group">
                                        <label for="forum-topic-reply-body">Nội dung</label>
                                        <textarea id="forum-topic-reply-body" rows="4" class="form-control" placeholder="Nội dung bình luận" name="noidung" required></textarea>
                                    </div>
                                    <hr>
                                    <label for="forum-topic-attachment">Chọn file</label>
                                    <input name="inputfile" type="file" id="uploadBackgroundFile" class="btn btn-default"/>
                                    <hr>
                                    <button type="submit" class="btn btn-primary" name="submit_button" id="submit_button">Đăng</button>
                                </form>
                        </div>
                    </div>
EOD;
                    echo $chuoi;
                }
            ?>
                    
                </div>
            </div>
        </div>
<?php
if(!isset($_SESSION["TenTk"])){
    $chuoi = <<<EOD
     <div class="well">
            <div class="row clearfix">
                <div class="col-md-12 column">
                    <h3 class="text-center">You need to <a href="index.php?mod=user&act=login">Log In</a> or <a href="index.php?mod=user&act=register">Register</a> to post comments.</h3>
                </div>
            </div>
        </div>
EOD;
            echo $chuoi;
}
?>

<script type="text/javascript">
  
  function isDelete(){
    return confirm("Bạn có chắc muốn xóa không");
  }

</script>