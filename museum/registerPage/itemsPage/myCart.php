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
            html,body{
                height: 100%
            }
            .main-content{
            min-height: 100%;
            margin: 0 auto;
            padding-top:50px;
            padding-bottom:-50px;
            }
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

            .footer{
            position: relative;
            top: -100px;
            height: 50px;
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

        <div class="col-md-10 col-sm-9 main-content">
            <div class="row pl-3 pr-3">
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th scope="col" class="border-0 bg-light">
                                    <div class="p-2 px-3 text-uppercase">商品名稱</div>
                                </th>
                                <th scope="col" class="border-0 bg-light">
                                    <div class="py-2 text-uppercase">價格</div>
                                </th>
                                <th scope="col" class="border-0 bg-light">
                                    <div class="py-2 text-uppercase">數量</div>
                                </th>
                                <th scope="col" class="border-0 bg-light">
                                    <div class="py-2 text-uppercase">小計</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $arr=[];
                            $total=0;
                            if(isset($_SESSION["cart"]) && count($_SESSION["cart"])> 0){
                                $_SESSION["cart"] = array_values($_SESSION["cart"]);
                                $sql="SELECT `itemId`, `itemName`, `itemImage`, `itemPrice`,`itemQty`
                                    FROM`items`
                                    WHERE `itemId`=?";
                                    for($i = 0; $i < count($_SESSION["cart"]); $i++){
                                        $arrParam = [
                                            (int)$_SESSION["cart"][$i]["itemId"]
                                        ];
                                        $stmt = $pdo->prepare($sql);
                                        $stmt->execute($arrParam);
                                    if($stmt->rowCount() > 0) {
                                        $arrTmp = $stmt->fetchAll(PDO::FETCH_ASSOC)[0];
                                        $arrTmp['cartQty'] = $_SESSION["cart"][$i]["cartQty"];
                                        $arr[] = $arrTmp;
                                    }
                                }
                            }
                            for($i = 0; $i < count($arr); $i++) { 
                                //計算總額
                                $total += $arr[$i]["itemPrice"] * $arr[$i]["cartQty"];?>
                                <tr>
                                    <th scope="row" class="border-0">
                                        <div class="p-2">
                                            <img src="./images/<?php echo $arr[$i]["itemImage"]?>"alt="" width="70" class="img-fluid rounded shadow-sm">
                                            <div class="ml-3 d-inline-block align-middle">
                                                <h5 class="mb-0"><a href="#"class="text-dark d-inline-block align-middle"><?php echo $arr[$i]["itemName"] ?></a></h5>
                                            </div>
                                        </div>
                                    </th>
                                    <td class="border-0 align-middle"><strong>$<?php echo $arr[$i]["itemPrice"] ?></strong></td>
                                    <td class="border-0 align-middle">
                                        <input type="text" class="form-control" name="cartQty[]" value="<?php echo $arr[$i]["cartQty"] ?>" maxlength="3">
                                    </td>
                                    <td class="border-0 align-middle">
                                        <input type="text" class="form-control" name="subtotal[]" value="<?php echo ($arr[$i]["itemPrice"] * $arr[$i]["cartQty"]) ?>" maxlength="10">
                                    </td>
                                    <td class="border-0 align-middle"><a href="./deleteCart.php?idx=<?php echo $i ?>" class="text-dark">刪除</a>
                                    </td>
                                </tr>
                                <input type="hidden" name="itemId[]" value="<?php echo $arr[$i]["itemId"] ?>">
                                <input type="hidden" name="itemPrice[]" value="<?php echo $arr[$i]["itemPrice"] ?>">
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>                    
                                    


                        
                        


                            


                
        <!-- Footer-->
        <footer class="py-5 bg-dark footer">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2021</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>