        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">DANH SÁCH CÁC BÀI POST THUỘC CHỦ ĐỀ <b><u><?php echo $resTopic["TENCD"] ?></u></b></h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"></h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Tên bài viết</th>
                      <th>Tác giả</th>
                      <th>Ngày tạo</th>
                      <th>Lượt xem</th>
                      <th>Tên chủ đề</th>
                      <th>Duyệt bài</th>
                      <th>Quản lý</th>

                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Tên bài viết</th>
                      <th>Tác giả</th>
                      <th>Ngày tạo</th>
                      <th>Lượt xem</th>
                      <th>Tên chủ đề</th>
                      <th>Duyệt bài</th>
                      <th>Quản lý</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php

                      foreach ($resPost as $row) {
                        # code...
                        if($row["DUYET"]==0){
                          $id=$row["MAPOST"];
                          $tid=$row["MACD"];
                          $duyet = '<a href="admin.php?mod=topic&act=duyet&id='.$id.'&tid='.$tid.'">Bấm để duyệt</a>';
                        }
                        else{
                          $duyet = '<a>Đã duyệt<a>';
                        }
                        $taikhoan = $row["TENTK"];
    // echo $taikhoan; 
    // echo $row["MACD"];
    $user = new User();
    $r = $user->getUserByUser($taikhoan);
    $hinh = $r["AVATAR"];
    $top = $t->getTopicById($row["MACD"]);

                        $chuoi=<<<EOD
                        <tr role="row" class="odd">
                      <td class="sorting_1">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">${row["TENPOST"]}</font>
                        </font>
                      </td>
                      <td>
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">${row["TENTK"]}</font>
                        </font>
                      </td>
                      <td>
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">${row["NGAYTAO"]}</font>
                        </font>
                      </td>
                      <td>
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">${row["LUOTXEM"]}</font>
                        </font>
                      </td>
                      <td>
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">${top["TENCD"]}</font>
                        </font>
                      </td>
                      <td>{$duyet}</td>
                        <td>  
                          <a href="index.php?mod=post&act=detail&id={$row["MAPOST"]}">
                              <button type="button" class="btn btn-default" aria-label="Left Align">
                                <i class="fa fa-info"></i>
                              </button>
                              <a>
                              <a href="admin.php?mod=post&act=editManager&id={$row["MAPOST"]}&tid={$row["MACD"]}">
                              <button type="button" class="btn btn-default" aria-label="Left Align">
                                <i class="fa fa-edit"></i>
                              </button>
                              <a>
                              <a href="admin.php?mod=post&act=deleteManager&id={$row["MAPOST"]}&tid={$row["MACD"]}">
                              <button type="button" class="btn btn-default" aria-label="Left Align" name="remove" id="remove" onclick="return isDelete();">
                                <i class="fa fa-remove"></i>
                              </button>  
                        </td>

                    </tr>
EOD;
                        echo $chuoi;
                      }
                    ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
        <script type="text/javascript">
          function isDelete(){
            return confirm("Bạn có muốn xóa không?");
          }
        </script>