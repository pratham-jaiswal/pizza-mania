<?php
session_start();
if(!isset($_SESSION['username'])){
    header("location: login.php");
    exit();
}
if($_SESSION["admin"]=='YES'){
    header("location: sales.php");
    exit();
}
require_once "config.php";
$cg = $vl = $nvs = $cd = 0;
$Pcg = 100;
$Pvl = 120;
$Pnvs = 160;
$Pcd = 140;


$cartItemN = [];
$cartItemQ = [];
$cartItemP = [];
$err = $addr = "";
if($_SERVER['REQUEST_METHOD']=="POST"){
    if(isset($_POST['tocart'])){
        $cg = $_POST['cg'];
        $vl = $_POST['vl'];
        $nvs = $_POST['nvs'];
        $cd = $_POST['cd'];
        if($cg>0){
            $cartItemN[] = "Cheese Galore";
            $cartItemQ[] = $cg;
            $cartItemP[] = $cg*$Pcg;
        }
        if($vl>0){
            $cartItemN[] = "Veggie Loaded";
            $cartItemQ[] = $vl;
            $cartItemP[] = $vl*$Pvl;
        }
        if($cd>0){
            $cartItemN[] = "Chicken Dominator Non-Veg";
            $cartItemQ[] = $cd;
            $cartItemP[] = $cd*$Pcd;
        }
        if($nvs>0){
            $cartItemN[] = "Non-Veg Supreme";
            $cartItemQ[] = $nvs;
            $cartItemP[] = $nvs*$Pnvs;
        }
    }
}
    
$totPrice = $tax = 0;
foreach($cartItemP as $pr){
    $totPrice = $totPrice + $pr;
}
if(($totPrice>0)){
    $tax = $totPrice*(8/100);
    $_SESSION["tax"] = $tax;
    $totPrice = $totPrice + $tax;
    $_SESSION["netAmount"] = $totPrice;
    if(empty(trim($_POST['addr']))){
        $err = "*Please enter Delivery Address";
    }
    else{
        $_SESSION["addr"] = $_POST['addr'];
        header("location: cart.php");
    }
    
    $_SESSION["cartItemN"] = $cartItemN;
    $_SESSION["cartItemQ"] = $cartItemQ;
    $_SESSION["cartItemP"] = $cartItemP;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza Mania</title>
    <link rel="icon" href="Assets/logo.png">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="nav-container">
        <ul class="other-ul">
            <ul class="icon">
                <li class="brand"><img src="Assets/logo.png" alt="Music">Pizza Mania</li>
            </ul>
            <ul class="right-ul">
                <li><a href="index.php">Home</a></li>
                <li><a id="active" href="store.php">Store</a></li>
                <li><a href="cart.php">Cart</a></li>
                <li><a href="account.php">Account</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </ul>
    </nav>
    <div class="container">
        <form action="" method="post">
            <div class="food-items">
                <div class="food">
                    <div class="food-pic">
                        <img src="Assets/Store/Cheese Galore.jpg" alt="wh">
                    </div>
                    <div class="food-input">
                        <input class="food-quantity" style="border: 2px solid green" type="number" name="cg" id="cg" min="0" max="10" value="0">
                    </div>
                    <div class="food-details">
                        <h3>Cheese Galore</h3>
                        <ul>
                            <li>Rs. 100</li>
                        </ul>
                    </div>
                </div>
                <div class="food">
                    <div class="food-pic">
                        <img src="Assets/Store/Veggie Loaded.jpg" alt="whj">
                    </div>
                    <div class="food-input">
                        <input class="food-quantity" style="border: 2px solid green" type="number" name="vl" id="vl" min="0" max="10" value="0">
                    </div>
                    <div class="food-details">
                        <h3>Veggie Loaded</h3>
                        <ul>
                            <li>Rs. 120</li>
                        </ul>
                    </div>
                </div>
                <div class="food">
                    <div class="food-pic">
                        <img src="Assets/Store/Chicken Dominator.jpg" alt="kn">
                    </div>
                    <div class="food-input">
                        <input class="food-quantity" style="border: 2px solid red" type="number" name="cd" id="cd" min="0" max="10" value="0">
                    </div>
                    <div class="food-details">
                        <h3>Chicken Dominator</h3>
                        <ul>
                            <li>Rs. 140</li>
                        </ul>
                    </div>
                </div>
                <div class="food">
                    <div class="food-pic">
                        <img src="Assets/Store/Non-Veg Supreme.jpg" alt="rb">
                    </div>
                    <div class="food-input">
                        <input class="food-quantity" style="border: 2px solid red" type="number" name="nvs" id="nvs" min="0" max="10" value="0">
                    </div>
                    <div class="food-details">
                        <h3>Non-Veg Supreme</h3>
                        <ul>
                            <li>Rs. 160</li>
                        </ul>
                    </div>
                </div>
                <div class="address" style="margin: 3% 8%">
                    <div>
                        Delivery Address: <span style="color: red;"><?php echo $err;?></span>
                    </div><br>
                    <div>
                        <input class="delivery-address" type="text" name="addr" id="addr" style="width: 50%; font-size: 16px; padding: 3px;" placeholder="VIT Chennai campus, Vendalur - Kelambakkam Road, Chennai - 600127">
                    </div>
                </div>
                <div class="to-cart">
                    <button name="tocart" type="submit">Add to Cart</button>
                </div>
            </div>
        </form>
    </div>

    <script src="https://kit.fontawesome.com/6f42fc440c.js" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
</html>