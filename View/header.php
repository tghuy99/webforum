<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

    <title>NHÓM 6 - Forum</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <!-- Base JavaScript -->
    <script src="assets/js/base/jquery.min.js"></script>
    <script src="assets/js/base/smoothscroll.js"></script>
    <script src="assets/js/base/jquery.form.js"></script>
    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/bootstrap/bootstrap.js"></script>

    <!-- JQuery UI Tabs JavaScript -->
    <script src="assets/js/base/jquery-ui.js"></script>
    
    <!-- Bootstrap Form Helpers -->
    <link href="assets/js/bootstrap-form-helpers/bootstrap-formhelpers.js"></script>
    <link href="assets/js/bootstrap-form-helpers/bootstrap-formhelpers-colorpicker.js"></script>    
    <link href="assets/js/bootstrap-form-helpers/bootstrap-formhelpers-datepicker.js"></script>

    <!-- Base JavaScript -->
    <script src="assets/js/base/offcanvas.js"></script>
    <script src="assets/js/base/scripts.js"></script>

    <!-- PACE JavaScript -->
    <script src="assets/js/pace/pace.min.js"></script>

    <!-- InstaClick JavaScript -->
    <script src="assets/js/instantclick/instantclick.min.js" data-no-instant></script>

    <!-- InstaClick Initialization-->
    <script data-no-instant>
        InstantClick.init();
    </script>

    <!-- WOW JavaScript -->
    <script src="assets/js/wow/wow.js"></script>

    <!-- WOW Initialization-->
    <script>
        new WOW().init();
    </script>

    <!-- Fade In Javascript -->
    <script>
        $(document).ready(function(){
            $("body").hide(0).delay(100).fadeIn(1000)
        });
    </script>    

    <!-- Image Rotation -->
    <script type="text/javascript"> 
        var totalCount = 5;
        function ChangeIt() {
            var num =  Math.ceil( Math.random() * totalCount );
            document.body.background = 'assets/img/backgrounds/background'+num+'.jpg';
            document.body.style.backgroundRepeat = "repeat";
        }
    </script> 

    <!-- Image Upload Preview -->
    <script src="assets/js/base/jquery-1.8.0.min.js"></script>

    <!-- Avatar Upload Preview -->
    <script type="text/javascript">
        $(function(){
            $("#uploadFile").on("change", function(){
                var files = !!this.files ? this.files : [];
                if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
                if (/^image/.test( files[0].type)){ // only image file
                    var reader = new FileReader(); // instance of the FileReader
                    reader.readAsDataURL(files[0]); // read the local file
                    reader.onloadend = function(){ // set image data as background of div
                        $("#uploadImagePreview").css("display","block");
                        $("#imagePreview").css("background-image", "url("+this.result+")");
                        $("#imagePreview").css("max-height","223px");    
                        $("#imagePreview").css("height","223px"); 
                    }
                }
            });
        });
    </script>

    <script>
        $('.carousel').carousel({
          interval: 3500
        })
    </script>

    <script>
        $('#user_firstname').tooltip('toggle')
    </script>

        <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap/bootstrap.css" rel="stylesheet">
      
    <!-- Jasny Bootstrap CSS -->
    <link href="assets/css/jasny-bootstrap/jasny-bootstrap.css" rel="stylesheet">

    <!-- Bootstrap Form Helpers CSS -->
    <link href="assets/css/bootstrap-form-helpers/bootstrap-formhelpers.css" rel="stylesheet">  

    <!-- Animate CSS -->
    <link href="assets/css/animate/animate.css" rel="stylesheet">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="assets/css/font-awesome/font-awesome.css">

    <!-- PACE CSS -->
    <link rel="stylesheet" href="assets/css/pace/pace.css">

    <!-- Custom styles for this template -->
    <link href="assets/css/base/main.css" rel="stylesheet">


    <!-- Custom Fonts -->
   <!--  <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'> -->
</head>