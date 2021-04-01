<?php
  
  include_once("Model/Topic.php");
  include_once("Model/User.php");
  include_once("Model/Folder.php");
  include_once("Model/SubFolder.php");

  $topic = new Topic();
  $res = $topic->getTopic();
?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">QUẢN LÝ CHỦ ĐỀ</h1>
<!--   <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="btnExport" name="btnExport" type="submit"><i
      class="fas fa-download fa-sm text-white-50"></i> Tạo báo cáo
  </a> -->
  <form method="POST">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Thêm<span>   </span><i class="fa fa-plus"></i></button>
  </form>
</div>
<!-- End Page Heading -->
          <!-- Content Row -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800" id="banner">  
  </h1>
</div>
          <div class="row">
            <!-- Area Chart -->
          <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Tên chủ đề</th>
                      <th>Mô tả</th>
                      <th>Người tạo</th>
                      <th>Ngày tạo</th>
                      <th>Số bài post</th>
                      <th>Thể loại</th>
                      <th>Tùy chỉnh</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      foreach ($res as $row) {
                        # code...
                          $taikhoan = $row["TENTK"];
                          $user = new User();
                          $r = $user->getUserByUser($taikhoan);
                          $tk = $r["TENTK"];

                          $mamuccon = $row["MATMC"];
                          $thumuccon = new SubFolder();
                          $rs = $thumuccon->getSubFolderByMaThuMuc($mamuccon);

                          $mamuc = $rs["MATM"];
                          $thumuc = new Folder();
                          $rss = $thumuc->getFolderByMaThuMuc($mamuc);
                        $chuoi = <<<EOD
                          <tr>
                            <td>{$row["TENCD"]}</td>
                            <td>{$row["MOTA"]}</td>
                            <td>{$tk}</td>
                            <td>{$row["NGAYTAO"]}</td>
                            <td>{$row["SOBAIPOST"]}</td>
                            <td>{$rss["TENTM"]}->{$rs["TENTMC"]}</td>
                            <td>
                              <a href="admin.php?mod=topic&act=detail&id={$row["MACD"]}">
                              <button type="button" class="btn btn-default" aria-label="Left Align">
                                <i class="fa fa-info"></i>
                              </button>
                              <a>
                              <a href="admin.php?mod=topic&act=edit&id={$row["MACD"]}">
                              <button type="button" class="btn btn-default" aria-label="Left Align">
                                <i class="fa fa-edit"></i>
                              </button>
                              <a>
                              <a href="admin.php?mod=topic&act=delete&id={$row["MACD"]}">
                              <button type="button" class="btn btn-default" aria-label="Left Align" name="remove" id="remove" onclick="return isDelete();">
                                <i class="fa fa-remove"></i>
                              </button>     
                              </a>                    
                            </td>
                          </tr>
EOD;                    
echo $chuoi;  
                        }
                    ?>

                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Tên chủ đề</th>
                      <th>Mô tả</th>
                      <th>Người tạo</th>
                      <th>Ngày tạo</th>
                      <th>Số bài post</th>
                      <th>Thể loại</th>
                      
                      <th>Tùy chỉnh</th>
                    </tr>
                  </tfoot>
                  <tbody id="result">
            
<!--                     </tr> -->
                  </tbody>
                </table>
              </div>

            <!-- Pie Chart -->
   
          </div>
        </div>
<!--End-->


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">CHỦ ĐỀ MỚI</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="admin.php?mod=topic&act=add">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Tên chủ đề:</label>
            <input type="text" class="form-control" id="recipient-name" name="TENCD">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Mô tả:</label>
            <textarea class="form-control" id="message-text" name="MOTA"></textarea>
          </div>
          <div class="form-group">
            <select class="form-control" name="thumuccon">
              <?php
                  include_once("Model/SubFolder.php");
                  $thumuccon = new SubFolder();
                  $rs = $thumuccon->getSubFolder();
                  foreach ($rs as $row) {
                    # code...
                      $chuoi = <<<EOD
                        <option value={$row["MATMC"]}>{$row["TENTMC"]}</option>
EOD;
                      echo $chuoi;
                  }

              ?>
            </select>
          </div>
          <div class="form-group">
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="materialUnchecked" name="ISLOCKED" checked>
                <label class="form-check-label" for="materialUnchecked" >Khóa chủ đề</label>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            <button type="submit" class="btn btn-primary" name="btnThem" id="btnThem">Thêm</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  
  function isDelete(){
    return confirm("Bạn có chắc muốn xóa không");
  }

</script>