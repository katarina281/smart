<?php
session_start();
 

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
include("../model/config.php");





  $sql = "SELECT * FROM admin WHERE username='".$_SESSION['username']."'";
  $sth = $link->query($sql);
  $result=mysqli_fetch_array($sth);
    $getit = mysqli_query($link,$sql);
    $row = mysqli_fetch_array($getit);
 $idUser=$_REQUEST['idUser'];


  $sql3= "SELECT u.idUser, u.username FROM admin a JOIN user u ON a.idAdmin=u.idAdmin WHERE u.idUser='$idUser' and a.username= '".$_SESSION['username']."'";
	$result3 = $link->query($sql3);
	$row3 = mysqli_fetch_assoc($result3);


    


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Imperial pametne kuce</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Facebook Opengraph integration: https://developers.facebook.com/docs/sharing/opengraph -->
  <meta property="og:title" content="">
  <meta property="og:image" content="">
  <meta property="og:url" content="">
  <meta property="og:site_name" content="">
  <meta property="og:description" content="">

  <!-- Twitter Cards integration: https://dev.twitter.com/cards/  -->
  <meta name="twitter:card" content="summary">
  <meta name="twitter:site" content="">
  <meta name="twitter:title" content="">
  <meta name="twitter:description" content="">
  <meta name="twitter:image" content="">

  <!-- Place your favicon.ico and apple-touch-icon.png in the template root directory -->
  <link href="favicon.ico" rel="shortcut icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate-css/animate.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

  <!-- =======================================================
    Theme Name: Imperial
    Theme URL: https://bootstrapmade.com/imperial-free-onepage-bootstrap-theme/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>

<body>
  <div id="preloader"></div>

  <!--==========================
  Hero Section
  ============================-->
  <section id="hero">
    <div class="hero-container">
      <div class="wow fadeIn">
        <div class="hero-logo">
          <img class="" src="img/logo.png" alt="Imperial">
        </div>

        <h1>Dobrodosli u Imperial</h1>
        <h2>Aplikaciju <span class="rotating">za pametne kuce i stanove.</span></h2>
        
      </div>
    </div>
  </section>

  <!--==========================
  Header Section
  ============================-->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <a href="#hero"><img src="img/logo.png" alt="" title="" /></img></a>
        <!-- Uncomment below if you prefer to use a text image -->
        <!--<h1><a href="#hero">Header 1</a></h1>-->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#hero">Pocetna</a></li>
          <li><a href="#contact">Kontakt</a></li>
          <li><a href="admin.php">Admin</a></li>
        </ul>
      </nav>
      <!-- #nav-menu-container -->
    </div>
  </header>
  
 <section id="contact">
    <div class="container wow fadeInUp">
      <div class="row">
        <div class="col-md-12">
         
          <div class="section-title-divider"></div>
         
        </div>
      </div>
      <div style="text-align: center;">
            <h1>Promenite informacije o korisniku</h1>
            <?php
            $status = "";
            if(isset($_POST['new']) && $_POST['new']==1)
            {
            $idUser=$_REQUEST['idUser'];
            $username =$row3['username'];
            
            
            
            $update="update user set username='".$username."' where idUser='".$idUser."'";
            mysqli_query($link, $update) or die(mysqli_error($link));
            $status = "Vidite izmenu. </br></br>
            <a href='admin.php'>Izmena</a>";
            echo '<p>'.$status.'</p>';
            }else {
            ?>
            <div>
            <form name="form" method="post" action=""> 
            <input type="hidden" name="new" value="1" />
            <input name="idUser" type="hidden" value="<?php echo $row3['idUser'];?>" />
            <label>Korisnicko ime</label>
            <p><input  type="text" name="username" 
            required value="<?php echo $row3['username'];?>" /></p>
            
            <p><input   name="submit" type="submit" value="Change" /></p>
            
            </form>
            <?php } ?>
            </div>
            </div>

      <div class="row">
        <div class="col-md-3 col-md-push-2">
          <div class="info">
            <div>
              <i class="fa fa-map-marker"></i>
              <p>Uzicka 8</p>
            </div>

            <div>
              <i class="fa fa-envelope"></i>
              <p>imperial@gmail.com</p>
            </div>

            <div>
              <i class="fa fa-phone"></i>
              <p>0112369875</p>
            </div>

          </div>
        </div>

        <div class="col-md-5 col-md-push-2">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2831.673623143274!2d20.44526011540618!3d44.78745877909881!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a701875402133%3A0xf421caca2a53e5d9!2z0KPQttC40YfQutCwIDgsINCR0LXQvtCz0YDQsNC0!5e0!3m2!1ssr!2srs!4v1581046876959!5m2!1ssr!2srs" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
        </div>

      </div>
    </div>
  </section>

  <!--==========================
  Footer
============================-->
  <footer id="footer">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="copyright">
            &copy; Copyright <strong>Studentarija</strong>. All Rights Reserved
          </div>
          <div class="credits">
           
            
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- Required JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/morphext/morphext.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/stickyjs/sticky.js"></script>
  <script src="lib/easing/easing.js"></script>

  <!-- Template Specisifc Custom Javascript File -->
  <script src="js/custom.js"></script>

  <script src="contactform/contactform.js"></script>


</body>

</html>
