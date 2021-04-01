
<h1 class="text-center">BÀI VIẾT MỚI NHẤT</h1>

<div class="panel panel-default" >
                <div class="panel-body">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="margin-bottom: 400px;">
                  <thead>
                    <tr>
                      <th>Tên bài viết</th>
                      <th>Tác giả</th>
                      <th>Ngày tạo</th>
                      <th>Lượt xem</th>
                      <th>Số bình luận</th>
                      <th>Tên chủ đề</th>
                      <th>Xem chi tiết</th>
                    </tr>
                  </thead>
                  <tbody>
<?php
 echo "<div class=\"container\" id=\"result\">";
foreach ($result as $row) {
    $taikhoan = $row["TENTK"];
    // echo $taikhoan; 
    // echo $row["MACD"];
    $user = new User();
    $r = $user->getUserByUser($taikhoan);
    $hinh = $r["AVATAR"];
    $t = $Topic->getTopicById($row["MACD"]);
    # code...
   
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
                          <font style="vertical-align: inherit;">${row["SOCMT"]}</font>
                        </font>
                      </td>
                      <td>
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">${t["TENCD"]}</font>
                        </font>
                      </td>
                        <td><a href="index.php?mod=post&act=detail&id={$row["MAPOST"]}"><button class="btn btn-primary">Xem</button></a></td>
                    </tr>
                  


EOD;
        echo $chuoi;
           
}
?>
</tbody>
                </table>