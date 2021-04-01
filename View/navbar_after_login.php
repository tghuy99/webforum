<!-- Navbar1 -->
	    <div id="navigation" class="navbar navbar-default navbar-fixed-top">
	      <div class="fluid-container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse1">
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
                <a class="navbar-brand" href="index.php"><b><i class="fa fa-home"></i> Home</b></a>	        
            </div>
	        <div class="navbar-collapse collapse" id="navbar-collapse1">
                <form class="navbar-form navbar-left" role="search" method="post" autocomplete="off" action="search-result.php">
                    <div class="form-group">
                        <input type="text" class="search form-control" id="searchbox" placeholder="Tìm kiếm bài viết..." name="search-form"/><br />
                        <div id="display"></div>
				    </div> 
				</form>

                <script type="text/javascript">
       
                         //gắn hàm xử lý cho sự kiện nhấn phím trên textbox
                    $(document).ready(function(){
                         $("#searchbox").keyup(function () {
                            // alert("oke");
                             $.ajax({
                                 url: "Controller/Post/Search.php",
                                 type: "POST",
                                 data:  'Keyword='+$(this).val() ,
                                 success: function (data) {
                                    $("#result").html(data);
                                    // alert(data);
                                 }
                             });
                         });
                    });
                       
                </script>

                <ul class="nav navbar-nav">
                    <li><a href="index.php?mod=post&act=main"><i class="fa fa-question-circle"></i> Forum</a></li>
	            </ul>
                <ul class="nav navbar-nav">
                    <li><a href="index.php?mod=post&act=new"><i class="fa fa-question-circle"></i> Tạo bài viết mới</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><?php echo $_SESSION["TenTk"]; ?><strong class="caret"></strong></a>                  
                        <ul class="dropdown-menu">
                            <?php
                                if(isset($_SESSION["LoaiTk"])&&($_SESSION["LoaiTk"])==1){
                                    echo '<li><a href="admin.php"><i class="fa fa-edit"></i>Quản lý</a></li>';
                                }
                            ?>
                            
                        </ul>
                    </li>	
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bars" style="font-size: 1.27em;"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="index.php?mod=user&act=logout"><i class="fa fa-mail-reply"></i> Logout</a>
                            </li>
                        </ul>
                    </li>	
                </ul>    
	        </div><!--/.nav-collapse -->
	      </div>
	    </div>
      <!-- ./Navbar1 -->