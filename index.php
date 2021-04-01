<?php
    session_start();
    ob_start();
?>
<?php
    include_once("View/header.php");
?>

 <body style="background: #ddd; min-height:900px;">
<!--     <script type="text/javascript"> 
        ChangeIt();
    </script>  -->
        <?php
            if(!isset($_SESSION["TenTk"])){
                include_once("View/navbar_before_login.php");
            }
            else{
                include_once("View/navbar_after_login.php");   
            }
        ?>
        <?php
            if(!isset($_GET["mod"])){
                include("View/beforeLogin.php");
            }
            else{
                $a= ucfirst($_GET["mod"]);
                $b= ucfirst($_GET["act"]);
                include("Controller/".$a."/".$b.".php");
            }
        ?>
        <?php
            include_once("View/Footer.php");
        ?>

        <p style="margin-top: 50px;"></p>
</body>    
</html>
