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
        .btncolor {
            background: #1D0AFF;
        }

        .btncolor2 {
            background: #AFFB90;
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
                    <li class="nav-item"><a class="nav-link" href="#!">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="#!">MyAccount</a></li>
                    <a class="nav-item"><a class="nav-link btn btncolor2 text-dark" href="./myCart.php">
                            <span>Cart</span>
                            (<span id="cartItemNum">
                                <?php
                                if (isset($_SESSION["cart"])) {
                                    echo count($_SESSION["cart"]);
                                } else {
                                    echo 0;
                                }
                                ?>
                            </span>)
                        </a>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Header-->
    <header class="bg-dark py-5 mb-5">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-lg-12">
                    <h1 class="display-4 text-white mt-5 mb-2">Business Name or Tagline</h1>
                    <p class="lead mb-5 text-white-50">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non possimus ab labore provident mollitia. Id assumenda voluptate earum corporis facere quibusdam quisquam iste ipsa cumque unde nisi, totam quas ipsam.</p>
                </div>
            </div>
        </div>
    </header>
    <!-- Page Content-->
    <div class="container">
        <div class="row">
            <?php

            $sql = "SELECT`itemId`,`itemName`,`itemImage`,`itemPrice`,`itemQty`
                      FROM `items`
                      ORDER BY `itemId` ASC";

            $stmt = $pdo->query($sql);

            if ($stmt->rowCount() > 0) {
                $arr = $stmt->fetchAll();
                for ($i = 0; $i < count($arr); $i++) {
            ?>
                    <div class="col-md-4 mb-5">
                        <div class="card h-100">
                            <a class="category-item" href="./itemDetail.php?itemId=<?php echo $arr[$i]['itemId'] ?>">
                                <img class="card-img-top" src="./images/<?php echo $arr[$i]['itemImage'] ?>" alt="" />
                                <div class="card-footer">
                                    <form id='myform' method='POST' action='./addCart.php'>
                                        <input type="hidden" name="itemId" id="itemId" value="<?php echo  $arr[$i]['itemId'] ?>" >
                                        <div><a href="itemDetail.php"><?php echo $arr[$i]['itemName'] ?></a></div>
                                        數量:<input type="text" class="qtyminus" name="cartQty" id="cartQty" value="1" maxlength="5">
                                        <div><button class="btn btncolor">Add To Cart</button></div>

                                    </form>
                                </div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>





    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2021</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>