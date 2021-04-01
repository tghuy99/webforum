<?php
	foreach ($p as $row) {
	    $taikhoan = $row["TENTK"];
	    $user = new User();
	    $r = $user->getUserByUser($taikhoan);
	    $hinh = $r["AVATAR"];
		# code...
		$chuoi =<<<OED
		 <div class="panel panel-default" >
                <div class="panel-body">
                    <h1><a href="index.php?mod=post&act=detail&id={$row["MAPOST"]}"><i class="fa fa-link"></i>{$row["TENPOST"]}</a></h1>
                    <br>
                    <div class="well">
                        <div class="row clearfix">
                            <div class="col-md-1 column">
                                <img src=upload/{$hinh} class="img-responsive forum-topic-avatar" alt="IMAGENGUOIPOST">
                            </div>
                            <div class="col-md-11 column">
                                <i class="fa fa-user"></i>{$row["TENTK"]}
                                <hr>
                                <i class="fa fa-book"></i>{$row["NOIDUNG"]}   
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
OED;
        echo $chuoi;
	}
?>