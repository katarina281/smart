<?php
session_start();
 

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
include("../model/config.php");


   


 $sql3= "SELECT h.temperatura,h.ukljuceno,u.idUser,u.username,h.idHladjenje FROM hladjenje h JOIN user u ON h.idUser=u.idUser WHERE u.username='".$_SESSION['username']."'";
  $result3 = $link->query($sql3);
  //Zameniti URL putanjom serverskog dela REST servisa i zameniti vrednost API ključa
$url='api.worldweatheronline.com/premium/v1/weather.ashx?q=44.804%2C20.4651&format=json&num_of_days=5&key=52facc24da0141a38e1124719200402';
$curl = curl_init($url);
//za FON-ovu mrezu treba podesiti proksi. Za ostale mreze linije za proksi treba da budu pod komentarom
//curl_setopt($curl, CURLOPT_PROXY, 'proxy.fon.rs:8080');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, false);
$curl_odgovor = curl_exec($curl);
curl_close($curl);
$parsiran_json = json_decode ($curl_odgovor);
$temperatura = $parsiran_json->data->current_condition[0]->temp_C;

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
<style >
  table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {background-color: #f2f2f2;}
</style>
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
          <li><a href="logout.php">Izlogujte se</a></li>
          <li><a href="grejanje.php">Grejanje</a></li>
          <li><a href="svetla.php">Svetla</a></li>
          <li><a href="hladjenje.php">Hladjenje</a></li>

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
      <div>
            <h2 style="text-align: center;">Podesite hladjenje u Vasoj kuci</h2>
            <p style="text-align: center;">Danasnja temperatura je <?php echo $temperatura;?> C.</p>
            <br>
            <img src="img/hladjenje.jpg" style="margin-left: 100px;">


            
                  </div>
            <br>

            <div class="table">
            <h2>Podesavanje</h2>
            
            <table id="myTable">
              <thead>
              <tr>
              
              <th><strong>Temperatura</strong></th>  
              <th><strong>Ukljuceno</strong></th>
              
              
              </tr>
              </thead>
              <tbody>
              <?php
              
              
              while($row3 = mysqli_fetch_assoc($result3)) { ?>
              <tr>
              <td ><?php echo $row3["temperatura"]; ?></td>
              <td ><?php echo $row3["ukljuceno"]; ?></td>
              <td>
              <a href="hladjenjeU.php?idHladjenje=<?php echo $row3["idHladjenje"]; ?>">Izmeni</a>
              </td>
              
              
              
              
              </tr>
              <?php } ?>
              </tbody>
              </table>

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

  <script>
    function myFunction() {
     
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      tr = table.getElementsByTagName("tr");

    
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1];
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }
    </script>
  <script src="js/custom.js"></script>

  <script src="contactform/contactform.js"></script>


</body>

</html>
