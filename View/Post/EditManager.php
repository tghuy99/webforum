<!-- //EditManager -->
<br><br>
<div class="container" style="background: white;">
    <div class="row">
        <div class="col col-12">
<form action="index.php?mod=post&act=EditManager&id=<?php echo $mapost;?>&tid=<?php echo $tid; ?>" method="post" enctype="multipart/form-data" id="UploadForm">
    <div class="form-group">
        <label for="forum-topic-name">Tên bài viết</label>
        <input type="text" class="form-control" id="forum-topic-name" name="forum_topic_name" value="<?php echo $post["TENPOST"] ?>" required>
    </div>
    <div class="form-group">
        <label for="forum-topic-body">Nội dung bài viết</label>
        <textarea id="forum-topic-body" rows="9" class="form-control" name="forum_topic_body" required><?php echo $post["NOIDUNG"] ?></textarea>
    </div>
    <div class="form-group">
        <label>Chọn chủ đề</label>
        <br>
        <select name="forum_topic_semester">
            <?php
            $ii=1;
                foreach ($resCd as $row) {
                    # code...
                    $chuoi=<<<OED
                    
                      <option value="$ii">{$row["TENCD"]}</option>
OED;
                    $ii++;
                     echo $chuoi;               
                }
            ?>
        </select>
    </div>
    <hr>
    <label for="forum-topic-attachment">Attachment</label>
    <input name="BackgroundImageFile" type="file" id="uploadBackgroundFile" class="btn btn-default" name="forum-topic-attachment"/>  
    <hr>
    <button type="submit" class="btn btn-primary" name="submit_button" id="submit_button">Lưu</button>
</form>
</div>
</div>
    </div>
    <br><br>
                        <!-- // <fieldset> 
                    // <label class="checkbox-inline" for="semester-inline-checkbox1">
                    // <input type="checkbox" id="semester-inline-checkbox1" name="forum_topic_semester[]" value="$ii">{$row["TENCD"]}
                    // </label>
                    // </fieldset>  -->