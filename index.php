<!-- <?php
session_start();
require_once "config.php";
if(!(isset($_SESSION['admin']))){
    $_SESSION['admin'] = "NIL";
}
?> -->

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
    
    <div class="container">
        <section class="banner">
            <div class="bg-img">
            </div>
            <div class="slogan">
                <nav class="nav-bar">
                    <ul class="home-nav">
                        <ul class="home-ul">
                            <li><a id="active" href="index.php">Home</a></li>
                            <?php if($_SESSION["admin"]=='YES'): ?>
                                <li><a href="sales.php">Sales</a></li>
                                <li><a href="account.php">Account</a></li>
                                <li><a href="logout.php">Logout</a></li>
                            <?php elseif ($_SESSION["admin"]=='NIL'):?>
                                <li><a href="register.php">Register</a></li>
                                <li><a href="login.php">Login</a></li>
                            <?php else:?>
                                <li><a href="store.php">Store</a></li>
                                <li><a href="cart.php">Cart</a></li>
                                <li><a href="account.php">Account</a></li>
                                <li><a href="logout.php">Logout</a></li>
                            <?php endif;?>
                        </ul>
                    </ul>
                </nav>
                
                <section class="motto">
                    <h1>Welcome</h1>
                    <p>People disappoint, but Our Pizza never does.<br><br> Contact: admin@pizzamania.in</p>
                </section>
            </div>
        </section>
    </div>

    <script src="https://kit.fontawesome.com/6f42fc440c.js" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
</html>
