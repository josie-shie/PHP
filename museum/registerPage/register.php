<?php
session_start();
require_once 'db.inc.php';
?>

<!DOCTYPE html>

<html lang="en">



<head>

    <meta http-equiv="content-type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="Landing PAGE Html5 Template">

    <meta name="keywords" content="landing,startup,flat">

    <meta name="author" content="Made By GN DESIGNS">



    <title>Vortex - Startup Landing Page</title>



    <!-- // PLUGINS (css files) // -->

    <link href="assets/js/plugins/bootsnav_files/skins/color.css" rel="stylesheet">

    <link href="assets/js/plugins/bootsnav_files/css/animate.css" rel="stylesheet">

    <link href="assets/js/plugins/bootsnav_files/css/bootsnav.css" rel="stylesheet">

    <link href="assets/js/plugins/bootsnav_files/css/overwrite.css" rel="stylesheet">

    <link href="assets/js/plugins/owl-carousel/owl.carousel.css" rel="stylesheet">

    <link href="assets/js/plugins/owl-carousel/owl.theme.css" rel="stylesheet">

    <link href="assets/js/plugins/owl-carousel/owl.transitions.css" rel="stylesheet">

    <link href="assets/js/plugins/Magnific-Popup-master/Magnific-Popup-master/dist/magnific-popup.css" rel="stylesheet">

    <!--// ICONS //-->

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!--// BOOTSTRAP & Main //-->

    <link href="assets/bootstrap-3.3.7/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="assets/css/main.css" rel="stylesheet">

</head>



<body>
    <!--======================================== 

           Header

    ========================================-->

    <!--//** Banner**//-->

    <section id="home">

        <div class="container">

            <div class="row">

                <div id="particles-js"></div>

                <!-- Introduction -->

                <div class="col-md-6 caption">

                    <img src="./imsges/logo.png" class="" alt="logo"> 
                    <h1>Welcome To Vortex</h1>

                    <h2>

                           I am 

                            <span class="animated-text"></span>

                            <span class="typed-cursor"></span>

                        </h2>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni, quibusdam. Sit, quas tempora quia officia!</p>

                    <a href="#" class="btn btn-transparent">Get Started</a>

                    <a class="btn btn-blue popup-youtube" href="https://www.youtube.com/watch?v=Q8TXgCzxEnw">

                        <i class="material-icons ">play_circle_filled</i><span class="text-dark">Watch Video</span>

                    </a>

                </div>

                <!-- Sign Up -->

                <div class="col-md-5 col-md-offset-1">

                    <form class="signup-form" name="myForm" method="POST" action="./addUser.php">

                        <h2 class="text-center">立即註冊</h2>

                        <hr>

                        <div class="form-group">

                            <input type="text" class="form-control" id="inputUsername" name="username" placeholder="帳號" value="" required="required">

                        </div>

                        <div class="form-group">

                            <input type="text" class="form-control" id="inputpwd" name="pwd"  placeholder="密碼" required="required" value="">

                        </div>

                        <div class="form-group">

                            <input type="text" class="form-control" id="inputName" name="name" placeholder="全名" required="required">

                        </div>

                        <div class="form-group">

                            <input type="text" class="form-control" id="inputGender" name="gender"  placeholder="性別" required="required">

                        </div>

                        <div class="form-group">

                            <input type="text" class="form-control" id="inputNumber" name="phoneNumber"  placeholder="手機號碼" required="required">

                        </div>

                        <div class="form-group text-center">

                            <button type="submit" class="btn btn-blue btn-block">Start Now</button>

                        </div>
                        <div class="text-center "><a href="index.php">立即登入</a></div>

                    </form>

                </div>

            </div>

        </div>



    </section>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->

    <script src="assets/bootstrap-3.3.7/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

    <script src="assets/js/plugins/owl-carousel/owl.carousel.min.js"></script>

    <script src="assets/js/plugins/bootsnav_files/js/bootsnav.js"></script>

    <script src="assets/js/plugins/typed.js-master/typed.js-master/dist/typed.min.js"></script>

    <script src="https://maps.googleapis.com/maps/api/js"></script>

    <script src="assets/js/plugins/Magnific-Popup-master/Magnific-Popup-master/dist/jquery.magnific-popup.js"></script>

    <script src="assets/js/plugins/particles.js-master/particles.js-master/particles.min.js"></script>

    <script src="assets/js/particales-script.js"></script>

    <script src="assets/js/main.js"></script>

</body>



</html>