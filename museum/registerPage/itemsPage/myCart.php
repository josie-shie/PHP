<?php
session_start();
require_once '../db.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>ART-ADDIT</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <style>
            .btncolor{
                background:#1D0AFF;
            }
            .btncolor2{
                background:#AFFB90;
            }
           
            .qtyminus {
            width: 35px;
            height: 25px;
            margin: 10px;
            border: 1px solid #aaa;
            background: #f8f8f8;
            }

        </style>
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#!"><img src="../imsges/logo.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#!">
                                Home
                                <span class="sr-only">(current)</span>
                             </a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="./itemlist.php">shop</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">MyAccount</a></li>
                        <li class="nav-item"><a class="nav-link btn btncolor2 text-dark" href="../myCart.php">
                            <span>Cart</span>
                            (<span id="cartItemNum">
                            <?php 
                            if(isset($_SESSION["cart"])) {
                                echo count($_SESSION["cart"]);
                            } else {
                                echo 0;
                            }
                            ?>
                            </span>)
                        </a></li>
                    </ul>
                </div>
            </div>
        </nav>
                            


                            
                
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2021</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>