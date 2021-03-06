 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Conference</title>
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bower_components/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <script src="//code.jquery.com/jquery-2.1.3.min.js"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="lib/jquery.bootpag.js"></script>
        <script src="js/jquery-3.2.1.min.js"></script>

<style type="text/css">
       
            p{
                text-align: center;
            }
        </style>
<?php
    require "conn.php";
    require "models.php";
    session_start();
    $user=$_SESSION['user_data'];
    if($user == null) {
        header("location: signinView.php");
    }
?>
    <script>
        $(document).ready(function() {
            $.ajax({
                url: "x.php",
                dataType: 'json', 
                success: function(result){
                  console.log(result);
           var event_name=[];
           var start_date=[];
           var end_date=[];
           var location=[];
           var i=0;
           var x;
                    $.each(result, function(index, value) {
                        console.log('caste: ' + value['name']);
                        event_name[i]=value.name_event;
                        start_date[i]=value.start_date;
                        end_date[i]=value.end_date;
                        location[i]=value.location;
                        if (i<3)
                        {
                        i++;
                        
                     x = '<div class="col-md-4 col-sm-6">'+
                                '<div class="schedule-box">'+
                                    '<h3>'+ value.name_event +'</h3>'+
                                    '<p>'+ value.location +'</p>'+
                                    '<div class="time">'+
                                        '<date datetime="'+ value.start_date +'">'+ value.start_date +'</date> - <date datetime="'+ value.end_date +'">'+ value.end_date +'</date>'+
                                    '</div>'+
                                    '<br>'+
                                    '<div class="time">'+
                                        '<time datetime="'+ value.start +'">'+ value.start +'</time> - <time datetime="'+ value.end +'">'+ value.end +'</time>'+
                                    '</div>'+
                                    
                                  
                    '<button type="button" class="btn btn-link"  onclick="window.open(\'Agenda_signed.php?id='+value.id+'\')">MORE</button>'+                       
                                '</div>'+
                                '</div>';
                   
                        
                        $("#coming_events").append(x);
                    }
                    });
                    
                        
                      
                  var y ='<h2 style="font-size:2.3em; font-weight:bold; ">'+event_name[0]+'</h2>'+
                 '<div class="time">'+
     '<date style="font-weight:bold; font-size:1.5em;" datetime="'+ start_date[0] +'">'+ start_date[0] +'</date> - <date style="font-weight:bold; font-size:1.5em;" datetime="'+end_date[0] +'">'+ end_date[0] +'</date>'+
                           '</div>'+
            
            '<p style="font-weight:bold;font-size:1.2em;">'+ location[0]+'</p>'+
            
           ' <a class="btn btn-white" href="signUp.html" style="font-weight:bold;">Sign Up</a>';
                                $("#first").append(y);
                   
        var y2 ='<h2 style="font-size:2.3em; font-weight:bold;">'+event_name[1]+'</h2>'+
            
          ' <div class="time">'+
     '<date style="font-weight:bold; font-size:1.5em;" datetime="'+ start_date[1] +'">'+ start_date[1] +'</date> - <date style="font-weight:bold; font-size:1.5em;" datetime="'+end_date[1] +'">'+ end_date[1] +'</date>'+
                           '</div>'+
            
           ' <p style="font-weight:bold;font-size:1.2em;">'+ location[1]+'</p>'+
            
            '<a class="btn btn-white" href="signUp.html" style="font-weight:bold;">Sign Up</a>';
        
                                        $("#seconde").append(y2);  
                },
                error:function(error, code){
                    console.log(error);
                    console.log(code);
                    alert("Error" + error);
                }   
            
                  
        });
        });

        
    </script>

</head>
 <body data-spy="scroll" data-target="#site-nav">
         <input type="hidden" name="user_id" id="user_id" value="<?php echo $user->id ?>">

    <nav id="site-nav" class="navbar navbar-fixed-top navbar-custom">
        <div class="container">
            <div class="navbar-header">
                <div class="site-branding">
                    <a class="logo" href="index.html">
                        <img src="assets/images/logo.png" alt="Logo" >
                        Evento
                    </a>
                </div>

                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-items" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>

            <div class="collapse navbar-collapse" id="navbar-items">
                <ul class="nav navbar-nav navbar-right">
                    
                    <li><a data-scroll href="#about">About</a></li> 
                    <li class="active"><a data-scroll href="#site-header">Home</a></li>
                    <li><a data-scroll href="#upComing">UpComing</a></li> 
                    <li><a data-scroll href="#photos">Photos</a></li>
                     <li><a href="memberProfileView.php">My Profile </a></li> 

                </ul>
            </div>
        </div>
    </nav>

     
 <header id="site-header" class="valign-center">
<div class="w3-content w3-display-container" style="max-width:1700px" >
    <div class="w3-display-container mySlides">
  <img src="assets/images/backgrounds/Slide_7.jpg" style="width:100%" alt="4">
  <div class="w3-display-middle w3-large w3-container w3-padding-16">
<div class="intro" style="color:white; text-align:center;" id="first">


     
        </div>
  </div>
</div>
  
    <div class="w3-display-container mySlides">
  <img src="assets/images/backgrounds/header.jpg" style="width:100%" alt="1">
  <div class="w3-display-middle w3-large w3-container w3-padding-16">
<div class="intro" style="color:white; text-align:center;" id="seconde">

           
        
        </div>
  </div>
</div>
    
<div class="w3-display-container mySlides">
  <img src="assets/images/backgrounds/bg-2.jpg" style="width:100%" alt="2">
  <div class="w3-display-middle w3-large w3-container w3-padding-16 w3-black">
<div class="intro" style="color:white;text-align:center;" id="third">

    <h2 style="font-size:2.5em; font-weight:bold; ">25 April, 2015 / Townhall California</h2>
            
            <h1>Freelancer Conference 2015</h1>
            
            <p style="font-weight:bold;" >First &amp; Largest Conference</p>
            
            <a class="btn btn-white" href="signUp.html" style="font-weight:bold;">Sign Up</a>
        
        </div>
  </div>
</div>

<div class="w3-display-container mySlides">
    <img src="assets/images/backgrounds/bg-1.jpg" style="width:100%" alt="3" >
  <div class="w3-display-middle w3-large w3-container w3-padding-16" id="fourth">
<div class="intro" style="color:white; text-align:center; outline-color:black;" >

            <h2 style="font-size:2.3em; font-weight:bold;text-shadow: 1px 1px 0px #000000; ">25 April, 2015 / Townhall California</h2>
            
            <h1  style="text-shadow: 1px 1px 0px #000000;"> Freelancer Conference 2015</h1>
            
            <p style="font-weight:bold;">First &amp; Largest Conference</p>
            
            <a class="btn btn-white" href="signUp.html" style="font-weight:bold;">Sign Up</a>
        
        </div>
  </div>
</div>

<button class="w3-button w3-display-left w3-black" onclick="plusDivs(-1)">&#10094;</button>
<button class="w3-button w3-display-right w3-black" onclick="plusDivs(1)">&#10095;</button>
</div>
</header>
   

   <section id="photos" class="section photos" >
        <div class="container" style="width: 97%;height: 100%;">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="section-title" style="color:black; font-weight:bold; font-size: 2.2em;" >Pictures Of Conferences</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <ul class="grid">
                        
                        <li class="grid-item grid-item-sm-3">
                            <img alt="" class="img-responsive center-block" src="assets/images/photos/download (1).jpg">
                        </li>
                       <li class="grid-item grid-item-sm-3">
                            <img alt="" class="img-responsive center-block" src="assets/images/photos/download.jpg">
                        </li>
                        <li class="grid-item grid-item-sm-3">
                            <img alt="" class="img-responsive center-block" src="assets/images/photos/photos-2.jpg">
                        </li>

                        <li class="grid-item grid-item-sm-3">
                            <img alt="" class="img-responsive center-block" src="assets/images/photos/photos-3.jpg">
                        </li>
                    
                        <li class="grid-item grid-item-sm-3">
                            <img alt="" class="img-responsive center-block" src="assets/images/photos/conference-call.jpg">
                        </li>

                        <li class="grid-item grid-item-sm-3">
                            <img alt="" class="img-responsive center-block" src="assets/images/photos/photos-6.jpg">
                        </li>

                        <li class="grid-item grid-item-sm-3">
                            <img alt="" class="img-responsive center-block" src="assets/images/photos/photos-7.jpg">
                        </li>

                        <li class="grid-item grid-item-sm-3">
                            <img alt="" class="img-responsive center-block" src="assets/images/photos/photos-8.jpg">
                        </li>
                        <li class="grid-item grid-item-sm-3">
                            <img alt="" class="img-responsive center-block" src="assets/images/photos/photos-5.jpg">
                        </li>
                        <li class="grid-item grid-item-sm-3">
                            <img alt="" class="img-responsive center-block" src="assets/images/photos/design-67.png">
                        </li>
                        <li class="grid-item grid-item-sm-3">
                            <img alt="" class="img-responsive center-block" src="assets/images/photos/photos-3.jpg">
                        </li>
                        <li class="grid-item grid-item-sm-3">
                            <img alt="" class="img-responsive center-block" src="assets/images/photos/istanbul-01.jpg">
                        </li>
                       
                    </ul>
                </div>
            </div>            
        </div>
    </section>    
     
    <section id="upComing" class="section schedule" >
        <div class="container" style="width: 97%;height: 100%;" >
            <div class="row">
                <div class="col-md-12">
                    <h3 class="section-title" style="color:black; font-weight:bold; font-size: 2.2em;">Up Coming Conferences</h3>
                </div>
            </div>
                <div  id="coming_events" class="bs-docs-example row" >
                       
                    </div>
            
            <div style="margin-left:2px;margin-top:25px; " class="container">
       <a href="category.php" style="font-size:1.75em;text-decoration: underline;">MORE CONFERENCES</a>
                </div>
                           </div>

    </section>

    <section id="about" class="section about">
        <div class="container" style="width: 97%;height: 100%;">
            <div class="row">
                <div class="col-sm-6">

                    <h2 class="section-title" style="color:black; font-weight:bold; font-size: 2.2em;">About Us</h2>

                    <p>You've inspired new consumer, racked up click-thru's, blown-up brand enes. We can't give you back the weekends you worked, or erase the pain ebeing forced to make the logo bigger. But if you submit your best work we ajusts might be able to give the chance to show you best digital marketing.</p>

                    <figure>
                        <img alt="" class="img-responsive" src="assets/images/najah.jpg">
                    </figure>

                </div><!-- /.col-sm-6 -->

                <div class="col-sm-6">

                    <h3 class="section-title multiple-title">What is Our Goal?</h3>

                    <p>You've inspired new consumer, racked up click-thru's, blown-up brand enes. We can't give you back the weekends you worked, or erase the pain ebeing forced to make the logo bigger. But if you submit your best work we ajusts might be able to give the chance to show you best digital marketing.</p>

                    <ul class="list-arrow-right">

                        <li>Learn from the best Asian Social Media Experts &amp; Case Studies</li>
                        <li>Have dedicated 2-to-1 meetings with the experts</li>
                        <li>Reach more consumers for less by learning new digital media skills</li>
                        <li>Save money when spending in online advertising</li>
                    
                    </ul>

                </div><!-- /.col-sm-6 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>


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

        <script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}

var myIndex = 0;
carousel();

function carousel() {
    var j;
    var x = document.getElementsByClassName("mySlides");
    for (j = 0; j < x.length; j++) {
       x[j].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 3000); // Change image every 2 seconds
}

                                          
</script>

    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="bower_components/smooth-scroll/dist/js/smooth-scroll.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>