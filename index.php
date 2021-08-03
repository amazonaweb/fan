<?php
error_reporting();
include('config.php');
// fetching admin email where mail will send
$sql ="SELECT emailId from tblemail";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0):
foreach($results as $result):
$adminemail=$result->emailId;
endforeach;
endif;
if(isset($_POST['submit']))
{
// getting Post values	
$name=$_POST['name'];
$phoneno=$_POST['phonenumber'];
$email=$_POST['emailaddres'];
$subject=$_POST['subject'];
$message=$_POST['message'];
$uip = $_SERVER ['REMOTE_ADDR'];
$isread=0;
// Insert quaery
$sql="INSERT INTO  tblcontactdata(FullName,PhoneNumber,EmailId,Subject,Message,UserIp,Is_Read) VALUES(:fname,:phone,:email,:subject,:message,:uip,:isread)";
$query = $dbh->prepare($sql);
// Bind parameters
$query->bindParam(':fname',$name,PDO::PARAM_STR);
$query->bindParam(':phone',$phoneno,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':subject',$subject,PDO::PARAM_STR);
$query->bindParam(':message',$message,PDO::PARAM_STR);
$query->bindParam(':uip',$uip,PDO::PARAM_STR);
$query->bindParam(':isread',$isread,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
//mail function for sending mail
$to=$email.",".$adminemail; 
$headers .= "MIME-Version: 1.0"."\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
$headers .= 'From:Ravitej Contact Form Demo<kosuriravitej@gmail.com>'."\r\n";
$ms.="<html></body><div>
<div><b>Name:</b> $name,</div>
<div><b>Phone Number:</b> $phoneno,</div>
<div><b>Email Id:</b> $email,</div>";
$ms.="<div style='padding-top:8px;'><b>Message : </b>$message</div><div></div></body></html>";
mail($to,$subject,$ms,$headers);




echo "<script>alert('Your info submitted successfully.');</script>";
  echo "<script>window.location.href = 'index.php'</script>";
}
else 
{
echo "<script>alert('Something went wrong. Please try again');</script>";
  echo "<script>window.location.href = 'index.php'</script>";
}


}


?>






<!DOCTYPE html>


<!-- Mirrored from sthri3.getsimplesite.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 25 Jul 2021 10:27:12 GMT -->

<body lang="en">

  <head>
    <title>Sthri </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/beingsthristyle.css">
    <link href="../unpkg.com/ionicons%404.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css" title=""
      type="" />
    <link rel="stylesheet" href="../cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css" title=""
      type="" />
    <link rel="stylesheet" href="css/lightbox.min.css">
    <!--Fontawesome-->
    <script src="../kit.fontawesome.com/59a9b8d45e.js"></script>


    <style type="text/css" media="all">
      .site-navbar {
        background: #fcfbed;
      }

      body {
        background-color: #fcfbed !important;
      }

      .site-navbar {
        z-index: 50 !important;
      }

      h1,
      h2,
      h3,
      .about span,
      .text h2 {
        color: #a06c34;
        font-family: 'rafaleru', sans-serif !important;
        font-size: 35px;
      }

      h4,
      .about span,
      .text h4 {
        color: #a06c34;
        font-family: 'rafaleru', sans-serif !important;
        font-size: 25px;
      }

      .about {
        text-align: center;
      }

      .text h5 {
        font-family: 'rafaleru' !important;
        font-weight: bold;
      }

      p,
      a,
      ul>li,
      .block-5 ul li {
        color: #8c8b84 !important;
        font-family: 'rafaleru', sans-serif !important;
      }

      .bg-lightnew {
        background-color: #fcfbed !important;
      }

      .getinTouch {
        border: 1px solid #a06c34;
        padding: 10px 20px;
      }
    </style>
    <!-- Media Image CSS  -->
    <style>
      html {
        /* font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; */
        font-size: 10px;
      }

      html,
      body {
        box-sizing: border-box;
      }

      .py-6 {
        padding: 0% 10%;
      }

      .breadcrumb li .divider {
        color: #000000;
      }

      .grid {
        /*margin-top:80px;*/
        /*margin-bottom:80px;*/
      }


      .image-gallery {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr;
        grid-template-rows: auto;
        grid-gap: 1.5rem;
        grid-template-areas:
          'img-1 img-2 img-3 img-3'
          'img-1 img-4 img-5 img-6'
          'img-7 img-7 img-8 img-6'
        ;
      }

      .image-gallery a {
        width: 100%;
        height: 25rem;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
      }

      .image-gallery a i {
        /* color: rgba(255,255,255, .6); */
        font-size: 3rem;
        position: relative;
        z-index: 100;
        padding: 1rem 3rem;
        border: 2px solid rgb(red, green, blue, .6);
        border-radius: .4rem;
        opacity: 0;
        transition: opacity .5s;
      }

      .image-gallery a::before {
        content: '';
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        background-color: rgba(0, 0, 0, .8);
        opacity: 0;
        transition: opacity .5s;
      }

      .image-gallery a:hover i,
      .image-gallery a:hover::before {
        opacity: 1;
      }

      .img-1 {
        grid-area: img-1;
        min-height: 51.5rem;
        background-image: url("images/img-1.jpg");
      }

      .img-2 {
        grid-area: img-2;
        background-image: url("images/img-2.jpg");
      }

      .img-3 {
        grid-area: img-3;
        background-image: url("images/img-3.jpg");
      }

      .img-4 {
        grid-area: img-4;
        background-image: url("images/img-4.jpg");
      }

      .img-5 {
        grid-area: img-5;
        background-image: url("images/img-5.jpg");
      }

      .img-6 {
        grid-area: img-6;
        min-height: 51.5rem;
        background-image: url("images/img-6.jpg");
      }

      .img-7 {
        grid-area: img-7;
        background-image: url("images/img-7.jpg");
      }

      .img-8 {
        grid-area: img-8;
        background-image: url("images/img-8.jpg");
      }

      .border-media {
        /* padding: 50px; */
        padding-top: 10px;
        padding-left: 10px;
        padding-right: 10px;
        padding-bottom: 10px;
        margin-left: 0px;
        margin-right: 0px;
        border: 8px solid #c5c5c5;
        /*box-shadow: 0px 0px 10px 10px #cdcecf;*/
        box-shadow: none !important;
      }

      @media screen and (max-width: 900px) {
        .image-gallery {
          grid-template-areas:
            'img-1 img-2 img-3 img-3'
            'img-4 img-4 img-5 img-6'
            'img-7 img-7 img-8 img-8'
          ;
        }

        .image-gallery a {
          height: 20rem;
        }

        .img-1 {
          min-height: 20rem;
        }

        .img-2 {
          min-height: 20rem;
        }

        .img-6 {
          min-height: 20rem;
        }
      }

      @media screen and (max-width: 600px) {
        .image-gallery {
          grid-template-columns: 1fr 1fr 1fr;
          grid-template-areas:
            'img-1 img-2 img-3 '
            'img-4 img-4 img-5 '
            'img-6 img-6 img-7 '
            'img-8 img-8 img-8'
          ;
        }

        .image-gallery a,
        .img-1,
        .img-6 {
          min-height: 10rem;
          height: 10rem;
        }

        .border-media {
          padding-top: 10px !important;
          padding-left: 10px !important;
          padding-right: 10px !important;
          padding-bottom: 10px !important;
          margin-left: 15px !important;
          margin-right: 0px !important;
          border: 2px solid #c5c5c5;
          /*box-shadow: 0px 0px 10px 10px #cdcecf;*/
        }

      }

      @media(max-width: 375px) {
        .py-6 {
          padding: 0% 5%;
        }
      }

      #community .item .content_box img {
        width: 100%;
      }

      #community .owl-buttons {
        position: absolute;
        top: 40%;
        transform: translateY(-50%);
        width: 100%;
        display: none;
      }

      #community .owl-buttons .owl-prev {
        position: absolute;
        left: -3%;
        top: 0%;
        transform: translate(-50%, -50%);
        width: 50px;
        height: 50px;
        border-radius: 0px;
        line-height: 50px;
        background-color: transparent;
      }

      #community .owl-buttons .owl-next {
        position: absolute;
        right: -6%;
        top: 0%;
        transform: translate(-50%, -50%);
        width: 50px;
        height: 50px;
        border-radius: 0px;
        line-height: 50px;
        background-color: transparent;
      }

      #community .owl-buttons .owl-prev:before {
        position: absolute;
        left: 0;
        top: 0;
        content: '\f053';
        font-family: 'fontawesome';
        background: #333;
        z-index: 5;
        width: 50px;
        height: 50px;
        font-size: 2rem;

      }

      #community .owl-buttons .owl-next:before {
        position: absolute;
        right: 0;
        top: 0;
        content: '\f054';
        font-family: 'fontawesome';
        background: #333;
        z-index: 5;
        width: 50px;
        height: 50px;
        font-size: 2rem;

      }
    </style>


    <style type="text/css" media="all">
      .ri-grid {
        margin: 15px auto 15px;
        position: relative;
        height: auto;
      }

      .ri-grid ul {
        list-style: none;
        display: block;
        width: 100%;
        margin: 0;
        padding: 0;
      }

      /* Clear floats by Nicolas Gallagher: http://nicolasgallagher.com/micro-clearfix-hack/ */

      .ri-grid ul:before,
      .ri-grid ul:after {
        content: '';
        display: table;
      }

      .ri-grid ul:after {
        clear: both;
      }

      .ri-grid ul {
        zoom: 1;
        /* For IE 6/7 (trigger hasLayout) */
      }

      .ri-grid ul li {
        -webkit-perspective: 400px;
        -moz-perspective: 400px;
        -o-perspective: 400px;
        -ms-perspective: 400px;
        perspective: 400px;
        margin: 0;
        padding: 0;
        float: left;
        position: relative;
        display: block;
        overflow: hidden;
        /*background: #000;*/
      }

      .ri-grid ul li {}

      .ri-grid ul li a {
        display: block;
        outline: none;
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        -webkit-backface-visibility: hidden;
        -moz-backface-visibility: hidden;
        -o-backface-visibility: hidden;
        -ms-backface-visibility: hidden;
        backface-visibility: hidden;
        -webkit-transform-style: preserve-3d;
        -moz-transform-style: preserve-3d;
        -o-transform-style: preserve-3d;
        -ms-transform-style: preserve-3d;
        transform-style: preserve-3d;
        -webkit-background-size: 100% 100%;
        -moz-background-size: 100% 100%;
        background-size: 100% 100%;
        background-position: center center;
        background-repeat: no-repeat;
        /*background-color: #333;*/
        -webkit-box-sizing: content-box;
        -moz-box-sizing: content-box;
        box-sizing: content-box;
      }

      /* Grid wrapper sizes */
      .ri-grid-size-1 {
        width: 100%;
      }

      .ri-grid-size-2 {
        width: 100%;
      }

      .ri-grid-size-3 {
        width: 100%;
        margin-top: 0px;
      }


      .ri-grid-loading:after,
      .ri-grid-loading:before {
        display: none;
      }

      .ri-loading-image {
        display: none;
      }

      .ri-grid-loading .ri-loading-image {
        position: relative;
        width: 30px;
        height: 30px;
        left: 50%;
        margin: 100px 0 0 -15px;
        display: block;
      }

      .ri-grid {
        width: auto;
      }

      .ri-grid ul li a img {
        padding: 5px;
      }
      }

      .ri-grid ul li,
      .ri-grid ul li a {
        width: 100%;
        height: 100%;
      }

      /*.ri-grid ul li,*/
      /*.ri-grid ul li a{*/
      /*	width: 100px;*/
      /*	height: 100px;*/
      /*}*/
      .ri-grid ul li a img {
        width: 100%;
        margin: 5px;
      }

      .site-navbar .site-navbar-top {
        border: none;
      }

      /*.border-being{*/
      /*padding: 2px;*/
      /*      border: 2px solid #c5c5c5;*/
      /*    }*/
    </style>


    <style type="text/css" media="all">
      .ri-grid {
        margin: 15px auto 15px;
        position: relative;
        height: auto;
      }

      .ri-grid ul {
        list-style: none;
        display: block;
        width: 100%;
        margin: 0;
        padding: 0;
      }



      .ri-grid ul:before,
      .ri-grid ul:after {
        content: '';
        display: table;
      }

      .ri-grid ul:after {
        clear: both;
      }

      .ri-grid ul {
        zoom: 1;
        /* For IE 6/7 (trigger hasLayout) */
      }

      .ri-grid ul li {
        -webkit-perspective: 400px;
        -moz-perspective: 400px;
        -o-perspective: 400px;
        -ms-perspective: 400px;
        perspective: 400px;
        margin: 0;
        padding: 0;
        float: left;
        position: relative;
        display: block;
        overflow: hidden;
        /*background: #000;*/
      }

      .ri-grid ul li a {
        display: block;
        outline: none;
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        -webkit-backface-visibility: hidden;
        -moz-backface-visibility: hidden;
        -o-backface-visibility: hidden;
        -ms-backface-visibility: hidden;
        backface-visibility: hidden;
        -webkit-transform-style: preserve-3d;
        -moz-transform-style: preserve-3d;
        -o-transform-style: preserve-3d;
        -ms-transform-style: preserve-3d;
        transform-style: preserve-3d;
        -webkit-background-size: 100% 100%;
        -moz-background-size: 100% 100%;
        background-size: 100% 100%;
        background-position: center center;
        background-repeat: no-repeat;
        /*background-color: #333;*/
        -webkit-box-sizing: content-box;
        -moz-box-sizing: content-box;
        box-sizing: content-box;
      }

      /* Grid wrapper sizes */
      .ri-grid-size-1 {
        width: 100%;
      }

      .ri-grid-size-2 {
        width: 100%;
      }

      .ri-grid-size-3 {
        width: 100%;
        margin-top: 0px;
      }


      .ri-grid-loading:after,
      .ri-grid-loading:before {
        display: none;
      }

      .ri-loading-image {
        display: none;
      }

      .ri-grid-loading .ri-loading-image {
        position: relative;
        width: 30px;
        height: 30px;
        left: 50%;
        margin: 100px 0 0 -15px;
        display: block;
      }

      .ri-grid {
        width: auto;
      }

      .ri-grid ul li a img {
        padding: 5px;
      }
      }

      .ri-grid ul li,
      .ri-grid ul li a {
        width: 100%;
        height: 100%;
      }

      /*.ri-grid ul li,*/
      /*.ri-grid ul li a{*/
      /*	width: 100px;*/
      /*	height: 100px;*/
      /*}*/
      .ri-grid ul li a img {
        width: 100%;
        margin: 5px;
      }

      .site-navbar .site-navbar-top {
        border: none;
      }

      /*.border-being{*/
      /*padding: 2px;*/
      /*      border: 2px solid #c5c5c5;*/
      /*    }*/
    </style>

  </head>

  <body>
    <!--modal start-->
    <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button>-->

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Send Message Us</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <script type="text/javascript">var submitted = false;
            </script>

            <iframe name="hidden_iframe" id="hidden_iframe" style="display:none;"
              onload="if(submitted)  {window.location='thankyou.html';}"></iframe>
            <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>-->
            <form action="https://script.google.com/macros/s/AKfycbwr-UzDQOIP5aUKJk4nMZ6BtC0Uc1CQc0KStrdv/exec"
              method="post" class="form-horizontal" target="hidden_iframe" onsubmit="submitted=true;">



              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Name:</label>
                <input type="text" class="form-control" id="recipient-name" placeholder="Name..." required>
              </div>
              <div class="form-group">
                <label for="recipient-email" class="col-form-label">Email:</label>
                <input type="text" class="form-control" id="recipient-email" placeholder="Email..." required>
              </div>
              <div class="form-group">
                <label for="recipient-phone" class="col-form-label">Phone:</label>
                <input type="text" class="form-control" id="recipient-phone" placeholder="Phone..." required>
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Message:</label>
                <textarea class="form-control" id="message-text" placeholder="Message..." required></textarea>
              </div>


              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input id="submit" class="btn btn-danger" value="submit" type="submit">
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
    <!--modal end-->

    <div class="site-wrap">

      <header class="site-navbar" role="banner">
        <div class="site-navbar-top">
          <div class="container-fluid">
            <div class="row align-items-center">

              <div class="col-12 mb-3 mb-md-0 col-md-12 order-1 order-md-2 text-center">
                <div class="logo">
                  <a href="index.html"><img src="sthri_logo1.png" class="img-fluid" alt="" /></a>
                </div>
                <div class="site-top-icons">
                  <ul>
                    <li class="d-inline-block d-md-none ml-md-0"><a href="#"
                        class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a></li>
                  </ul>
                </div>
              </div>

            </div>
          </div>
        </div>
        <nav class="site-navigation text-right text-md-center" role="navigation">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12 text-center">
                <ul class="site-menu js-clone-nav d-none d-md-block" style="    padding-left: 20px;">
                  <!--<li><a href="/">Home</a></li>-->
                  <li><a href="#">Book An Appointment</a></li>
                  <li><a href="#">Shop</a></li>

                  <!--<li><a href="#" class="getinTouch" data-toggle="modal" data-target="#exampleModal">Shop</a></li>-->
                </ul>
              </div>


            </div>
          </div>
        </nav>
      </header>

      <style type="text/css" media="all">
        /*.container-fluid {*/
        /*    width: 100%;*/
        /*    padding-right: 80px;*/
        /*    padding-left: 80px;*/
        /*    margin-right: auto;*/
        /*    margin-left: auto;*/
        /*}*/

        .abtusgal {
          padding: 0 18px 0 15px;
        }

        .events {
          padding: 0 141px 0 143px;
        }

        .medias {
          padding: 0 145px 0 142px;
        }

        .comm {
          padding: 0 161px 0 150px;
        }

        .reach {
          padding: 0 147px 0 140px;
        }

        @media only screen and (max-width: 1689px) {
          /*.abtusgal{*/
          /*  padding: 0 36px 0 29px;*/
          /*}*/
        }

        @media only screen and (max-width: 768px) {
          .text h5 {
            /*font-family: 'rafaleru',sans-serif!important;*/
            text-transform: uppercase;
            font-size: 0.7rem;
            font-weight: 900;
          }

          .type {
            height: 1170px;
          }


          .mainbox {
            height: 107px;
          }

          .video-icon-image {
            height: 107px;
          }

          .abtusgal {
            padding: 10px;
          }

          .medias {
            padding: 10px;
          }

          .reach {
            padding: 10px;
          }

          .comm {
            padding: 25px;
          }

          .events {
            padding: 10px;
          }
        }

        @media (min-width: 768px) {
          .col-md-2 {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 16.66667%;
            flex: 0 0 19.99%;
            max-width: 20.66667%;
          }
        }

        @media only screen and (max-width: 426px) {
          .text h5 {
            font-family: 'rafaleru', sans-serif !important;
            text-transform: uppercase;
            font-size: 2rem;
            font-weight: 900;
          }


          .mainbox {
            height: 350px;
            width: 65%;
            margin: 0px auto;
          }
        }


        div.content_box {
          padding: 15px !important;
        }

        #community .owl-buttons .owl-next {
          position: absolute;
          right: -15%;
          top: 0%;
          transform: translate(-50%, -50%);
          width: 50px;
          height: 50px;
          border-radius: 0px;
          line-height: 50px;
          background-color: transparent;
        }

        .video-icon-image {
          height: 454px;
        }
        }

        .pt-5 {
          padding-top: 80px;
        }

        .pb-5 {
          padding-bottom: 80px;
        }

        .type {
          font-size: 2rem;
          height: 230px;
        }
      </style>

      <!--======= Video ======= -->
      <div class="container-fluid py-6">
        <div class="row align-items-start align-items-md-center ">
          <div class="col-md-12">
            <!--<video src="/Model-walk.mp4" width="100%" preload="none" autoplay="autoplay" muted></video>-->
            <video src="Sthri-video.mp4" width="100%" preload="none" autoplay="autoplay" loop muted></video>
          </div>
        </div>
        <br /><br /><br />
      </div>

      <!--============ ABOUT US ===========-->

      <div class=" block-3 about-l about-r site-blocks-2 ">

        <div class="container-fluid py-6">
          <div class="row bg-lightnew">
            <div class="col-md-12 " style="padding-left: 0px;padding-right: 0px;">
              <div class="about">
                <span>ABOUT US</span>
                <!--<span class="letter">B</span>-->
                <!--<span class="letter">O</span>-->
                <!--<span class="letter">U</span>-->
                <!--<span class="letter" style="padding-right: 5%;">T</span>-->
                <!--<span class="letter"> </span>-->
                <!--<span class="letter">U</span>-->
                <!--<span class="letter">S</span>-->
              </div>
              <div class="animated">
                <p class="type" style="    text-align: justify;"></p>
                <div class="space d-flex justify-content-center">
                  <p><a href="#" class="btn btn-primary btn-sm">Learn More</a></p>
                </div>
              </div>
            </div>
          </div>
          <br /><br /><br />
        </div>

      </div>


      <!--about us gallery  -->

      <div class="container-fluid py-6" style="">
        <div class="row  ">

          <!--Bridal lehenga-->
          <div class="col-md-2 ">
            <div class="text pb-4">
              <h5 class="text-center"><a href="test1.html">KALYANA VASTRA</a> </h5>
            </div>
            <a href="test1.html">
              <img src="images/KALYANA_VASTRA.jpg" class="img-fluid " alt="" /></a>
            <!--<div class="mainbox">-->
            <!--  <img src="/images/Bridal_Lehenga.jpeg" class="img-fluid img-test" alt="" />-->
            <!--<div class="videowidth">-->
            <!--  <video src="/Clothing.mp4" class="video-icon-image" poster="/images/Bridal_Lehenga.jpeg" muted=""-->
            <!--    loop="" preload=""> </video>-->
            <!--</div>-->
            <!--</div>-->
          </div>

          <!--Lehenga sets-->
          <div class="col-md-2">
            <div class="text pb-4">
              <h5 class="text-center">HAND CRAFTED HERITAGE</h5>
            </div>
            <img src="images/HAND_CRAFTED_HERITAGE.jpg" class="img-fluid " alt="" />
            <!--<div class="mainbox">-->
            <!--  <img src="/images/hnad_crafted_heritage.jpg" class="img-fluid img-test" alt="" />-->
            <!--<div class="videowidth">-->
            <!--  <video src="/Model-walk.mp4" class="video-icon-image" poster="/images/Bridal_Lehenga.jpeg" muted=""-->
            <!--    loop="" preload=""> </video>-->
            <!--</div>-->
            <!--</div>-->
          </div>

          <!--Ethnic Gowns -->
          <div class="col-md-2">
            <div class="text pb-4">
              <h5 class="text-center">CLASSIC CHARMS</h5>
            </div>
            <img class="img-fluid " src="images/CLASSIC_CHARMS.jpg" alt="" />
            <!--<div class="mainbox">-->
            <!--<img src="/images/EthnicGowns.jpg" class="img-fluid img-test" alt="" />-->

            <!--<div class="videowidth">-->
            <!--  <video src="/Clothing.mp4" class="video-icon-image" poster="/images/Bridal_Lehenga.jpeg" muted=""-->
            <!--    loop="" preload=""> </video>-->
            <!--</div>-->
            <!--</div>-->
          </div>

          <!--Western-->
          <div class="col-md-2">
            <div class="text pb-4">
              <h5 class="text-center">BASIC BLOOMS</h5>
            </div>
            <img class="img-fluid " src="images/BASIC_BLOOMS.jpg" alt="" />
            <!--<div class="mainbox">-->
            <!--<img src="/images/Western.jpg" class="img-fluid img-test" alt="" />-->

            <!--<div class="videowidth">-->
            <!--  <video src="/Model-walk.mp4" class="video-icon-image" poster="/images/Bridal_Lehenga.jpeg" muted=""-->
            <!--    loop="" preload=""> </video>-->
            <!--</div>-->
            <!--</div>-->
          </div>

          <!--Sarees-->
          <div class="col-md-2">
            <div class="text pb-4">
              <h5 class="text-center">COCKTAIL CHICS</h5>
            </div>
            <img class="img-fluid " src="images/COCKTAIL_CHICS.jpg" alt="" />
            <!--<div class="mainbox">-->
            <!--<img src="/images/Saree.jpg" class="img-fluid img-test" alt="" />-->

            <!--<div class="videowidth">-->
            <!--  <video src="/Model-walk.mp4" class="video-icon-image" poster="/images/Bridal_Lehenga.jpeg" muted=""-->
            <!--    loop="" preload=""> </video>-->
            <!--</div>-->
            <!--</div>-->
          </div>

        </div>
        <br />
        <div class="row ">
          <!--Indo Western-->
          <div class="col-md-2  ">
            <img class="img-fluid " src="images/PAVADAI_DHAVANI.jpg" alt="" />
            <!--<div class="mainbox">-->
            <!--<img src="/images/IndoWestern.jpg" class="img-fluid img-test" alt="" />-->
            <!--<div class="videowidth">-->
            <!--  <video src="/Model-walk.mp4" class="video-icon-image" poster="/images/Bridal_Lehenga.jpeg" muted=""-->
            <!--    loop="" preload=""> </video>-->
            <!--</div>-->
            <!--</div>-->
            <div class="text pb-4">
              <h5 class="text-center">PAVADAI DHAVANI</h5>
            </div>
          </div>

          <!--Christian Wedding Gown-->
          <div class="col-md-2">
            <img class="img-fluid " src="images/DUPATTAS___STOLES.jpg" alt="" />
            <!--<div class="mainbox">-->
            <!--<img src="/images/ChristianWeddingGown.jpg" class="img-fluid img-test" alt="" />-->
            <!--<div class="videowidth">-->
            <!--  <video src="/Model-walk.mp4" class="video-icon-image" poster="/images/Bridal_Lehenga.jpeg" muted=""-->
            <!--    loop="" preload=""> </video>-->
            <!--</div>-->
            <!--</div>-->
            <div class="text pb-4">
              <h5 class="text-center">DUPATTAS & STOLES</h5>
            </div>
          </div>

          <!--Kurta Sets-->
          <div class="col-md-2  ">
            <img class="img-fluid " src="images/CASUAL_CYCLES.jpg" alt="" />
            <!--<div class="mainbox">-->
            <!--<img src="/images/KurtaSets.jpg" class="img-fluid img-test" alt="" />-->
            <!--<div class="videowidth">-->
            <!--  <video src="/Model-walk.mp4" class="video-icon-image" poster="/images/Bridal_Lehenga.jpeg" muted=""-->
            <!--    loop="" preload=""> </video>-->
            <!--</div>-->
            <!--</div>-->
            <div class="text pb-4">
              <h5 class="text-center">CASUAL CYCLES</h5>
            </div>
          </div>

          <!--Blouses-->
          <div class="col-md-2  ">
            <img class="img-fluid " src="images/COLORS_OF_STHRI.jpg" alt="" />
            <!--<div class="mainbox">-->
            <!--<img src="/images/Blouses.jpg" class="img-fluid img-test" alt="" />-->
            <!--<div class="videowidth">-->
            <!--  <video src="/Model-walk.mp4" class="video-icon-image" poster="/images/Bridal_Lehenga.jpeg" muted=""-->
            <!--    loop="" preload=""> </video>-->
            <!--</div>-->
            <!--</div>-->
            <div class="text pb-4">
              <h5 class="text-center">COLORS OF STHRI</h5>
            </div>
          </div>

          <!--STOLES & DUPATTA-->
          <div class="col-md-2  ">
            <img class="img-fluid " src="images/BEING_STHRI.jpg" alt="" />
            <!--<div class="mainbox">-->
            <!--<img src="/images/Stolesanddupattas.jpg" class="img-fluid img-test" alt="" />-->
            <!--<div class="videowidth">-->
            <!--  <video src="/Model-walk.mp4" class="video-icon-image" poster="/images/Bridal_Lehenga.jpeg" muted=""-->
            <!--    loop="" preload=""> </video>-->
            <!--</div>-->
            <!--</div>-->
            <div class="text pb-4">
              <h5 class="text-center">BEING STHRI</h5>
            </div>
          </div>

        </div>
        <br /><br />
      </div>

      <!--Made to order-->

      <div class="container-fluid py-6">
        <div class="row ">
          <div class="col-md-12   text-center pt-4">
            <!--<h2>Accessories</h2>-->
            <h2> MADE - TO - ORDER</h2>
            <br />
          </div>

          <div class="col-md-2" data-aos="fade">
            <a class="block-2-item" href="#">
              <figure class="image">
                <!--<img src="/images/Acc_Wallets.jpg" alt="" class="img-fluid">-->
                <img src="images/BLOUSES.jpg" class="img-fluid" alt="" />
              </figure>
            </a>
            <div class="text">
              <h5 class="text-center">BLOUSES</h5>
            </div>

          </div>

          <div class="col-md-2 " data-aos="fade">
            <a class="block-2-item" href="#">
              <figure class="image">
                <img src="images/BRIDAL_COUTURE.jpg" alt="" class="img-fluid">
              </figure>
            </a>
            <div class="text">
              <h5 class="text-center">BRIDAL COUTURE</h5>
            </div>

          </div>

          <div class="col-md-2  " data-aos="fade">
            <a class="block-2-item" href="#">
              <figure class="image">
                <img src="images/HAUTE_COUTURE1.jpg" alt="" class="img-fluid">
              </figure>
            </a>
            <div class="text">
              <h5 class="text-center">HAUTE COUTURE</h5>
            </div>

          </div>

          <div class="col-md-2  " data-aos="fade">
            <a class="block-2-item" href="#">
              <figure class="image">
                <img src="images/THEME_TEAM_UP1.jpg" alt="" class="img-fluid">
              </figure>
            </a>
            <div class="text">
              <h5 class="text-center">THEME TEAM UP</h5>
            </div>

          </div>

          <div class="col-md-2  " data-aos="fade">
            <a class="block-2-item" href="#">
              <figure class="image">
                <img src="images/CREATE_YOUR_STORIES1.jpg" alt="" class="img-fluid">
              </figure>
            </a>
            <div class="text">
              <h5 class="text-center">Create your Stories</h5>
            </div>

          </div>


        </div>
        <br /><br /><br />
      </div>

      <!--Being Sthri-->

      <div class="container-fluid py-6">
        <div class="col-md-12 besthri">
          <h2 class="text-center">#BEING STHRI</h2>
        </div>
      </div>
      <div class="container-fluid py-6">
        <div class="border-being">
          <div id="ri-grid" class="ri-grid ri-grid-size-1 ri-shadow ">
            <img class="ri-loading-image" src="images/loading.gif" />
            <ul>



              <li style="width:115px;"><a href="#"><img src="uploads/3454/645274/1.jpg" class="img-fluid" /></a></li>



              <li style="width:115px;"><a href="#"><img src="uploads/3454/645605/2.jpg" class="img-fluid" /></a></li>



              <li style="width:115px;"><a href="#"><img src="uploads/3454/645606/3.jpg" class="img-fluid" /></a></li>



              <li style="width:115px;"><a href="#"><img src="uploads/3454/645607/4.jpg" class="img-fluid" /></a></li>



              <li style="width:115px;"><a href="#"><img src="uploads/3454/645608/5.jpg" class="img-fluid" /></a></li>



              <li style="width:115px;"><a href="#"><img src="uploads/3454/645610/6.jpg" class="img-fluid" /></a></li>



              <li style="width:115px;"><a href="#"><img src="uploads/3454/645611/7.jpg" class="img-fluid" /></a></li>



              <li style="width:115px;"><a href="#"><img src="uploads/3454/645612/8.jpg" class="img-fluid" /></a></li>



              <li style="width:115px;"><a href="#"><img src="uploads/3454/645613/9.jpg" class="img-fluid" /></a></li>



              <li style="width:115px;"><a href="#"><img src="uploads/3454/645614/10.jpg" class="img-fluid" /></a></li>



              <li style="width:115px;"><a href="#"><img src="uploads/3454/645615/11.jpg" class="img-fluid" /></a></li>



              <li style="width:115px;"><a href="#"><img src="uploads/3454/645616/12.jpg" class="img-fluid" /></a></li>



              <li style="width:115px;"><a href="#"><img src="uploads/3454/645617/13.jpg" class="img-fluid" /></a></li>



              <li style="width:115px;"><a href="#"><img src="uploads/3454/645618/14.jpg" class="img-fluid" /></a></li>



              <li style="width:115px;"><a href="#"><img src="uploads/3454/645619/15.jpg" class="img-fluid" /></a></li>



              <li style="width:115px;"><a href="#"><img src="uploads/3454/645621/16.jpg" class="img-fluid" /></a></li>



              <li style="width:115px;"><a href="#"><img src="uploads/3454/645622/17.jpg" class="img-fluid" /></a></li>



              <li style="width:115px;"><a href="#"><img src="uploads/3454/645623/18.jpg" class="img-fluid" /></a></li>



              <li style="width:115px;"><a href="#"><img src="uploads/3454/645624/19.jpg" class="img-fluid" /></a></li>



              <li style="width:115px;"><a href="#"><img src="uploads/3454/645625/20.jpg" class="img-fluid" /></a></li>



              <li style="width:115px;"><a href="#"><img src="uploads/3454/645626/21.jpg" class="img-fluid" /></a></li>



              <li style="width:115px;"><a href="#"><img src="uploads/3454/645627/22.jpg" class="img-fluid" /></a></li>



              <li style="width:115px;"><a href="#"><img src="uploads/3454/645628/23.jpg" class="img-fluid" /></a></li>



              <li style="width:115px;"><a href="#"><img src="uploads/3454/645629/24.jpg" class="img-fluid" /></a></li>



              <li style="width:115px;"><a href="#"><img src="uploads/3454/645630/25.jpg" class="img-fluid" /></a></li>



              <li style="width:115px;"><a href="#"><img src="uploads/3454/645631/26.jpg" class="img-fluid" /></a></li>



              <li style="width:115px;"><a href="#"><img src="uploads/3454/645632/27.jpg" class="img-fluid" /></a></li>



              <li style="width:115px;"><a href="#"><img src="uploads/3454/645633/28.jpg" class="img-fluid" /></a></li>



              <li style="width:115px;"><a href="#"><img src="uploads/3454/645634/30.jpg" class="img-fluid" /></a></li>



              <li style="width:115px;"><a href="#"><img src="uploads/3454/645635/31.jpg" class="img-fluid" /></a></li>



              <li style="width:115px;"><a href="#"><img src="uploads/3454/645636/32.jpg" class="img-fluid" /></a></li>



              <li style="width:115px;"><a href="#"><img src="uploads/3454/645637/33.jpg" class="img-fluid" /></a></li>



              <li style="width:115px;"><a href="#"><img src="uploads/3454/645638/34.jpg" class="img-fluid" /></a></li>



              <li style="width:115px;"><a href="#"><img src="uploads/3454/645639/35.jpg" class="img-fluid" /></a></li>



              <li style="width:115px;"><a href="#"><img src="uploads/3454/645640/36.jpg" class="img-fluid" /></a></li>



              <li style="width:115px;"><a href="#"><img src="uploads/3454/645641/37.jpg" class="img-fluid" /></a></li>



              <li style="width:115px;"><a href="#"><img src="uploads/3454/645642/38.jpg" class="img-fluid" /></a></li>





              <li><a href="#"><img src="uploads/3454/645274/1.jpg" class="img-fluid" /></a></li>



              <li><a href="#"><img src="uploads/3454/645605/2.jpg" class="img-fluid" /></a></li>



              <li><a href="#"><img src="uploads/3454/645606/3.jpg" class="img-fluid" /></a></li>



              <li><a href="#"><img src="uploads/3454/645607/4.jpg" class="img-fluid" /></a></li>



              <li><a href="#"><img src="uploads/3454/645608/5.jpg" class="img-fluid" /></a></li>



              <li><a href="#"><img src="uploads/3454/645610/6.jpg" class="img-fluid" /></a></li>



              <li><a href="#"><img src="uploads/3454/645611/7.jpg" class="img-fluid" /></a></li>



              <li><a href="#"><img src="uploads/3454/645612/8.jpg" class="img-fluid" /></a></li>



              <li><a href="#"><img src="uploads/3454/645613/9.jpg" class="img-fluid" /></a></li>



              <li><a href="#"><img src="uploads/3454/645614/10.jpg" class="img-fluid" /></a></li>



              <li><a href="#"><img src="uploads/3454/645615/11.jpg" class="img-fluid" /></a></li>



              <li><a href="#"><img src="uploads/3454/645616/12.jpg" class="img-fluid" /></a></li>



              <li><a href="#"><img src="uploads/3454/645617/13.jpg" class="img-fluid" /></a></li>



              <li><a href="#"><img src="uploads/3454/645618/14.jpg" class="img-fluid" /></a></li>



              <li><a href="#"><img src="uploads/3454/645619/15.jpg" class="img-fluid" /></a></li>



              <li><a href="#"><img src="uploads/3454/645621/16.jpg" class="img-fluid" /></a></li>



              <li><a href="#"><img src="uploads/3454/645622/17.jpg" class="img-fluid" /></a></li>



              <li><a href="#"><img src="uploads/3454/645623/18.jpg" class="img-fluid" /></a></li>



              <li><a href="#"><img src="uploads/3454/645624/19.jpg" class="img-fluid" /></a></li>



              <li><a href="#"><img src="uploads/3454/645625/20.jpg" class="img-fluid" /></a></li>



              <li><a href="#"><img src="uploads/3454/645626/21.jpg" class="img-fluid" /></a></li>



              <li><a href="#"><img src="uploads/3454/645627/22.jpg" class="img-fluid" /></a></li>



              <li><a href="#"><img src="uploads/3454/645628/23.jpg" class="img-fluid" /></a></li>



              <li><a href="#"><img src="uploads/3454/645629/24.jpg" class="img-fluid" /></a></li>



              <li><a href="#"><img src="uploads/3454/645630/25.jpg" class="img-fluid" /></a></li>



              <li><a href="#"><img src="uploads/3454/645631/26.jpg" class="img-fluid" /></a></li>



              <li><a href="#"><img src="uploads/3454/645632/27.jpg" class="img-fluid" /></a></li>



              <li><a href="#"><img src="uploads/3454/645633/28.jpg" class="img-fluid" /></a></li>



              <li><a href="#"><img src="uploads/3454/645634/30.jpg" class="img-fluid" /></a></li>



              <li><a href="#"><img src="uploads/3454/645635/31.jpg" class="img-fluid" /></a></li>



              <li><a href="#"><img src="uploads/3454/645636/32.jpg" class="img-fluid" /></a></li>



              <li><a href="#"><img src="uploads/3454/645637/33.jpg" class="img-fluid" /></a></li>



              <li><a href="#"><img src="uploads/3454/645638/34.jpg" class="img-fluid" /></a></li>



              <li><a href="#"><img src="uploads/3454/645639/35.jpg" class="img-fluid" /></a></li>



              <li><a href="#"><img src="uploads/3454/645640/36.jpg" class="img-fluid" /></a></li>



              <li><a href="#"><img src="uploads/3454/645641/37.jpg" class="img-fluid" /></a></li>



              <li><a href="#"><img src="uploads/3454/645642/38.jpg" class="img-fluid" /></a></li>



            </ul>
          </div>
        </div>
        <br /><br /><br />
      </div>

      <!--being sthri csss-->

      <!-- Events & Exhibitions-->

      <div class="container-fluid py-6">
        <div class="row">
          <div class="col-md-6 ">
            <div class="text text-center">
              <h2> EVENTS</h2>
            </div>

            <div class="text text-center">
              <p>Sun, March 8 | Hyderabad</p>
            </div>
            <img src="images/Upcoming_Event.jpg" class="img-fluid" alt="" style="width: 100%;">
            <!--<div class="border-events">-->
            <!--  <p>RSVP</p>-->
            <!--</div>-->
          </div>

          <!--Fashion Photoshoot-->
          <!--<div class="col-md-4 text-center">-->
          <!--  <div class="text">-->
          <!--    <h2>FASHION  PHOTOSHOOT</h2>-->
          <!--  </div>-->
          <!--  <img src="/1.jpg" class="img-fluid" alt="" />-->
          <!--  <div class="text">-->
          <!--    <p>Sun, March 8 | Hyderabad</p>-->
          <!--  </div>-->
          <!--  <div class="border-events">-->
          <!--     <p>RSVP</p> -->
          <!--  </div>-->
          <!--</div>-->

          <!--Fashion shows-->
          <div class="col-md-6  ">
            <div class="text text-center">
              <h2>EXHIBITIONS</h2>
            </div>
            <div class="text text-center">
              <p>Sun, March 8 | Hyderabad</p>
            </div>
            <img src="images/Fashion_Shows.jpg" class="img-fluid" alt="" style="width: 100%;">
            <!--<div class="border-events">-->
            <!--   <p>RSVP</p> -->
            <!--</div>-->
          </div>
        </div>
        <br /><br />
      </div>

      <!--Media -->
      <div class="container-fluid py-6">
        <div class="col-md-12   text-center ">
          <!--<h2>MEDIA</h2>-->
          <h2>STHRI INSIGHTS</h2>
          <br />
        </div>
      </div>


      <div class="container-fluid py-6">
        <div class="border-media">
          <div class=" grid">
            <div class="image-gallery">
              <a href="images/img-1.jpg" data-lightbox="mygallery" class="img-1">
                <i class="icon ion-md-expand"></i>
              </a>
              <a href="images/img-2.jpg" data-lightbox="mygallery" class="img-2">
                <i class="icon ion-md-expand"></i>
              </a>
              <a href="images/img-3.jpg" data-lightbox="mygallery" class="img-3">
                <i class="icon ion-md-expand"></i>
              </a>
              <a href="images/img-4.jpg" data-lightbox="mygallery" class="img-4">
                <i class="icon ion-md-expand"></i>
              </a>
              <a href="images/img-5.jpg" data-lightbox="mygallery" class="img-5">
                <i class="icon ion-md-expand"></i>
              </a>
              <a href="images/img-6.jpg" data-lightbox="mygallery" class="img-6">
                <i class="icon ion-md-expand"></i>
              </a>
              <a href="images/img-7.jpg" data-lightbox="mygallery" class="img-7">
                <i class="icon ion-md-expand"></i>
              </a>
              <a href="images/img-8.jpg" data-lightbox="mygallery" class="img-8">
                <i class="icon ion-md-expand"></i>
              </a>
            </div>
          </div>


        </div>
        <br /><br />
      </div>

      <!--From Our Community-->


      <div class="container-fluid py-6">
        <div class="row justify-content-center">
          <div class="col-md-12  text-center pt-4">
            <h2>FROM OUR COMMUNITY</h2>
            <p style="font-size:20px">Millions of women have joined the movement to get gressed smarter.<br />Here's
              what a
              few of them have to say:</p>
          </div>
        </div>

      </div>

      <div class="container-fluid py-6">
        <div class="row">
          <div id="community" class="owl-carousel">
            <div class="item">
              <div class="content_box">

                <img
                  src="../images.pexels.com/photos/2068250/pexels-photo-2068250db14.jpg?auto=compress&amp;cs=tinysrgb&amp;dpr=2&amp;h=750&amp;w=1260"
                  alt="" />


              </div>
            </div>
            <div class="item">
              <div class="content_box">

                <img
                  src="../images.pexels.com/photos/2060987/pexels-photo-2060987db14.jpg?auto=compress&amp;cs=tinysrgb&amp;dpr=2&amp;h=750&amp;w=1260"
                  alt="" />

              </div>
            </div>
            <div class="item">
              <div class="content_box">

                <img
                  src="../images.pexels.com/photos/433142/pexels-photo-433142db14.jpg?auto=compress&amp;cs=tinysrgb&amp;dpr=2&amp;h=750&amp;w=1260"
                  alt="" />


              </div>
            </div>
            <div class="item">
              <div class="content_box">

                <img
                  src="../images.pexels.com/photos/1716134/pexels-photo-1716134db14.jpg?auto=compress&amp;cs=tinysrgb&amp;dpr=2&amp;h=750&amp;w=1260"
                  alt="" />

              </div>
            </div>
            <div class="item">
              <div class="content_box">

                <img
                  src="../images.pexels.com/photos/2055957/pexels-photo-2055957db14.jpg?auto=compress&amp;cs=tinysrgb&amp;dpr=2&amp;h=750&amp;w=1260"
                  alt="" />

              </div>
            </div>
            <div class="item">
              <div class="content_box">

                <img
                  src="../images.pexels.com/photos/2064357/pexels-photo-2064357db14.jpg?auto=compress&amp;cs=tinysrgb&amp;dpr=2&amp;h=750&amp;w=1260"
                  alt="" />

              </div>
            </div>
          </div>
        </div>
      </div>



















      <!--<div class="container">-->

      <!--  <div class="row">-->
      <!--    <div class="col-md-12">-->
      <!--      <h1 class="text-center">This site is currently being renovated <br /><br /><strong>Phone: </strong> +91 951 693 88 88 <br /><br /><strong>Email: </strong> info@sthri.co</h1>-->
      <!--            <br /><br /><br /><br />-->
      <!--    </div>-->
      <!--  </div>-->

      <!--</div>-->

      <footer class="site-footer">
        <div class="container-fluid py-6">

          <div class="row">
            <div class="col-md-2 col-lg-2">
              <h4>ABOUT US</h4>
              <p style="text-align: justify;">Sthri is a celebration of womanhood Woven with love, Draped with
                confidence, and Highlighted with identity. We at Sthri worship every woman by ornamenting her with our
                premium clothing range specially made with Care, designed with Passion, and fabricated with our great
                Craftsmanship.</p>
            </div>
            <div class="col-md-2 col-lg-2" style="text-align: center;">
              <h4 class="">SOCIAL</h4>
              <br />
              <div class="block-5 ">
                <ul class="list-unstyled">
                  <!--<li class="address">STHRI <br />322, ROAD NO-25, Venkatagiri, <br />Jubilee Hills,-->
                  <!--  Hyderabad.<br />500033-->
                  <!--</li>-->
                  <!--<li><strong>Phone: </strong> +91 951938888</li>-->
                  <!--<li><strong>Email: </strong> info@sthri.co</li>-->
                  <!--<li><strong>Website: </strong> www.sthri.co</li>-->
                  <li style="padding-left: 0px;"><a href="https://www.facebook.com/sthriofficial"><i
                        class="fab fa-facebook-f "></i></a> &nbsp;
                    <a href="https://www.instagram.com/sthriofficial/"><i class="fab fa-instagram"></i></a> &nbsp;<br>
                    <a href="https://in.pinterest.com/sthriofficial1/"><i class="fab fa-pinterest-square"></i></a>&nbsp;
                    <a href="https://twitter.com/STHRI1"><i class="fab fa-twitter"></i></a> &nbsp; <br>
                    <a href="https://sthriofficial.tumblr.com/"><i class="fab fa-tumblr"></i></a> &nbsp;
                    <a href="https://in.linkedin.com/company/sthri"><i class="fab fa-linkedin-in"></i></a>
                  </li>
                </ul>
              </div>

            </div>
            <div class="col-md-2 col-lg-2">
              <h4 class="">REACH US</h4>
              <br />
              <div class="block-5 ">
                <ul class="list-unstyled">
                  <li style="padding-left: 0px;">STHRI <br />322, ROAD NO-25, Venkatagiri, <br />Jubilee Hills,
                    Hyderabad.<br />500033
                  </li>
                  <li style="padding-left: 0px;"><strong>Phone: </strong> +91 951938888</li>
                  <li style="padding-left: 0px;"><strong>Email: </strong> info@sthri.co</li>
                  <li style="padding-left: 0px;"><strong>Website: </strong> www.sthri.co</li>
                  <!--<li><a href="https://www.facebook.com/sthriofficial"><i class="fab fa-facebook-f "></i></a> &nbsp; -->
                  <!--    <a href="https://www.instagram.com/sthriofficial/"><i class="fab fa-instagram"></i></a> &nbsp;-->
                  <!--    <a href="https://in.pinterest.com/sthriofficial1/ "><i class="fab fa-pinterest-square"></i></a>&nbsp;-->
                  <!--    <a href="https://twitter.com/STHRI1"><i class="fab fa-twitter"></i></a> &nbsp; -->
                  <!--    <a href="https://sthriofficial.tumblr.com/ "><i class="fab fa-tumblr"></i></a>  &nbsp;-->
                  <!--    <a href="https://in.linkedin.com/company/sthri "><i class="fab fa-linkedin-in"></i></a>-->
                  <!--</li>-->
                </ul>
              </div>

            </div>
            <div class="col-md-2 col-lg-2">
              <h4 class="" style="margin: 0% 0% 0% 19%;">QUICK LINKS</h4>
              <br />
              <div class="block-5 " style="margin: 5% 0% 0% 20%;">
                <a href="index.html">HOME</a><br>
                <a href="#">SHOP</a><br>
                <a href="#">ABOUT US</a>
              </div>

            </div>
            <div class="col-md-2 col-lg-2">
              <h4 class="">WE WILL REACH YOU</h4>
              <form name="ContactForm" method="post">
    <div class="form-row">

              <div class="form-group col-md-12">

                <input type="text" name="name" class="form-control" placeholder="Your Name" autocomplete="off" required>
      </div>
      <div class="form-group col-md-12">
      
                <input type="text" name="phonenumber" class="form-control" placeholder="Phone Number" maxlength="10"
                  required autocomplete="off">
      </div>


                  <div class="form-group col-md-12">
           

                <input type="email" name="emailaddres" class="form-control" placeholder="E-Mail" required
                  autocomplete="off" >
      </div>

                  <div class="form-group col-md-12">


                <input type="text" name="subject" class="form-control" placeholder="Subject" autocomplete="off">
      </div>

                <div class="form-group col-md-12">

                <textarea class="form-control" name="message" placeholder="Message" required></textarea>
      </div>

                <div class="form-group col-md-12">

                <input type="submit" value="Submit" name="submit" class="form-control">
      </div>

      </div>

              </form>
              <!--<iframe-->
              <!--  src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15225.893235161255!2d78.4122687!3d17.437046!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x73376b034dc74757!2sSTHRI!5e0!3m2!1sen!2sin!4v1582100925274!5m2!1sen!2sin"-->
              <!--  width="100%" height="350" frameborder="0" style="border:0;" allowfullscreen=""></iframe>-->
            </div>
            <!--<div class="col-md-2 col-lg-2">-->
            <!--  <iframe-->
            <!--    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15225.893235161255!2d78.4122687!3d17.437046!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x73376b034dc74757!2sSTHRI!5e0!3m2!1sen!2sin!4v1582100925274!5m2!1sen!2sin"-->
            <!--    width="100%" height="290" frameborder="0" style="border:0;" allowfullscreen=""></iframe>-->
            <!--</div>-->
          </div>
          <div class="row pt-5 mt-5 text-center">
            <div class="col-md-12">
              <p>
                Copy Rights
                &copy;2020 by STHRI
              </p>
            </div>

          </div>
        </div>
      </footer>
      <style>
        .button {
          background-color: #4CAF50;
          /* Green */
          border: none;
          color: #a06c34;
          padding: 5px 25px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-size: 16px;
          margin: 4px 2px;
          cursor: pointer;
        }

        .button {
          background-color: #f9f1df;
        }

        /* Blue */
        .form-control {
          background-color: #4CAF50;
          /* Green */
          border: none;
          color: #a06c34;
          padding: 5px 25px;
          text-decoration: none;
          display: inline-block;
          font-size: 16px;
          margin: 4px 2px;
          cursor: pointer;
        }

        .form-control {
          background-color: #f9f1df;
        }

        .fab {
          padding: 5px;
          text-align: center;
          text-decoration: none;
          margin: 5px 2px;
          border-radius: 50%;
        }
      </style>
    </div>

    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
    <script src="../ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/togglebar.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/sthrimain.js"></script>
    <script type="text/javascript" src="js/modernizr.custom.26633.js"></script>
    <script type="text/javascript" src="../ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript"
      src="../cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
    <script type="text/javascript" src="js/jquery.gridrotator.js"></script>
    <script type="text/javascript" charset="utf-8">
      $(document).ready(function () {
        $('#community').owlCarousel({
          items: 3,
          itemsDesktop: [1000, 3],
          itemsDesktopSmall: [979, 2],
          itemsTablet: [768, 2],
          itemsMobile: [650, 1],
          pagination: false,
          autoPlay: true,
          navigation: true
        })
      });
    </script>
    <!-- Being Strhi Script / -->
    <script type="text/javascript">
      $(function () {

        $('#ri-grid').gridrotator({
          w2560: {
            rows: 5,
            columns: 7
          },
          w768: {
            rows: 5,
            columns: 7
          },
          w425: {
            rows: 5,
            columns: 7
          },
          w240: {
            rows: 5,
            columns: 7
          }
        });

      });
    </script>
    <script type="text/javascript" src="js/lightbox.js" charset="utf-8"></script>
    <script type="text/javascript" src="js/typed.js"></script>
    <!-- Typing Custom  -->
    <script type="text/javascript">
      var typed = new Typed(".type", {
        strings: [
          "Sthri is a celebration of womanhood Woven with love, Draped with confidence, and Highlighted with identity. We at Sthri worship every woman by ornamenting her with our premium clothing range specially made with Care, designed with Passion, and fabricated with our great Craftsmanship.We at Sthri present a contemporary and bold reinvention of Craft and Textiles with an extraordinary assemblage of Embroidery, Prints, and Fabric Techniques to create a Unique Collection that speaks for the Brand Aesthetics and creates an Inter-personal relationship with the wearer. Following an extensive design process, every designer of the team is deeply involved in Every step of Garment Creative to ensure the best of Quality and ensure Creative Intervention and Indigenous Authenticity rooting us back to our Traditional outlook. We also ensure Sustainable use of resources and material handling to move ahead with a Positive Impact on Society.Our collection is a tribute to all the women, as they are the ones creating life. Not just a Couture Label, Sthri in every Women’s Wishful fantasy of Exceptional Clothing."
        ],
        typeSpeed: 15,
        loop: true,
        smartBackspac: false
      });
    </script>
    <!-- Hover Videos Gallery  -->
    <script type="text/javascript">
      //with class div
      $(document).ready(function () {
        $(".videowidth").hover(function () {
          $(this).children("video")[0].play();
        },
          function () {
            $(this).children("video")[0].pause();
          });
      });
    	// Without id and class div
      /*$(document).ready(function(){
        $("video").hover(function(){
          $(this)[0].play();
        },
        function(){
        $(this)[0].pause();
        });
      });*/
    </script>
  </body>


  <!-- Mirrored from sthri3.getsimplesite.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 25 Jul 2021 10:34:53 GMT -->

  </html>