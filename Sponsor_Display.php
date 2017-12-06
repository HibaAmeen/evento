<?php
$id = $_GET["id"];

$servername = "localhost";
$database = "evento";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $database);
$result = mysqli_query($conn, "SELECT * FROM sponsor WHERE sponsor.event_id=$id");
  echo "<section id='partner' class='section partner' style='padding-bottom:300px;'>";
       echo " <div class='container'>";
        echo "    <div class='row'>";
          echo "      <div class='col-md-12'>";
           echo "         <h3 class='section-title'>Sponsors Of The Conference</h3>";
           echo "     </div>";
         echo "   </div>";
                  echo "   <div class='row'>";

while ($row = mysqli_fetch_array($result)) {
	
        
          echo "      <div class='col-sm-3'>";
           echo "         <img src='images/".$row['image']."' class='partner-box'></a>";
           echo "     </div>";

	}
                  echo "  </div>   ";

           echo " </section>";

?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Conference</title>
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bower_components/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    
<?php
    require "conn.php";
    require "models.php";

    session_start();
    
    $event_id=$_SESSION['event_id'];
    
?>    
</head>
<body data-spy="scroll" data-target="#site-nav">
    <nav id="site-nav" class="navbar navbar-fixed-top navbar-custom">
        <div >
            <div class="navbar-header" style="margin-left: 20px;">

                <div class="site-branding">
                    <a class="logo" href="index.html">
                        <img src="assets/images/logo.png" alt="Logo">
                        Evento
                    </a>
                </div>

                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-items" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div><!-- /.navbar-header -->

            <div class="collapse navbar-collapse" id="navbar-items" style="margin-right: 20px;">
                <ul class="nav navbar-nav navbar-right">

                    <!-- navigation menu -->
                    <li><a  href="about.html">About</a></li>          
                    <li><a  href="upComing.html">UpComing</a></li> 
                   <?php echo "<li><a  href='conf_sett.html?id=$event_id'>Conf_settings</a></li>" ;?>
                    <li><a  href="index.html">Home</a></li>

                   
                   
                
                </ul>
            </div>
        </div><!-- /.container -->
    </nav>

    <header id="site-header-index2" class="site-header-index2 valign-center"> 
       
    </header>



    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="social-block">
                        <li><a href=""><i class="ion-social-twitter"></i></a></li>
                        <li><a href=""><i class="ion-social-facebook"></i></a></li>
                        <li><a href=""><i class="ion-social-linkedin-outline"></i></a></li>
                        <li><a href=""><i class="ion-social-googleplus"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- script -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="bower_components/smooth-scroll/dist/js/smooth-scroll.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>