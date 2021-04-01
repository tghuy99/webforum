        <h5 class="modal-title" id="exampleModalLabel">SỬA CHỦ ĐỀ</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="admin.php?mod=topic&act=edit&id=<?php echo $r['MACD'] ?>">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Tên chủ đề:</label>
            <input type="text" class="form-control" id="recipient-name" name="TENCD" value="<?php echo $r["TENCD"]; ?>"
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Mô tả:</label>
            <textarea class="form-control" id="message-text" name="MOTA" ><?php echo $r["MOTA"]; ?></textarea>
          </div>
          <div class="form-group">
            <select class="form-control" name="thumuccon">
              <?php
                  include_once("Model/SubFolder.php");
                  $thumuccon = new SubFolder();
                  $rs = $thumuccon->getSubFolder();
                  foreach ($rs as $row) {
                    # code...
                    if($r["MATMC"]==$row["MATMC"]){
                      $chuoi = <<<EOD
                        <option value={$row["MATMC"]} selected>{$row["TENTMC"]}</option>
                    }
EOD;  
                    echo $chuoi;
                    }
                    else{
                      $chuoi = <<<EOD
                        <option value={$row["MATMC"]}>{$row["TENTMC"]}</option>
                    }
EOD;
                      echo $chuoi;
                    }
                  }

              ?>
            </select>
          </div>
          <div class="form-group">
              <div class="form-check">
                <?php
                // echo $islocked;
                  if(isset($islocked)){
                    if($islocked==0){
                      echo '<input type="checkbox" class="form-check-input" id="materialUnchecked" name="ISLOCKED">';
                    }
                    else{
                      echo '<input type="checkbox" class="form-check-input" id="materialUnchecked" name="ISLOCKED" checked>';
                    }
                  }
                ?>
                
                <label class="form-check-label" for="materialUnchecked">Khóa chủ đề</label>
              </div>
          </div>
          <div class="modal-footer">
            <a href="admin.php"><button type="button" class="btn btn-secondary" data-dismiss="modal" >Đóng</button></a>
            <button type="submit" class="btn btn-primary" name="btnSua" id="btnSua">Sửa</button>
          </div>
        </form>
