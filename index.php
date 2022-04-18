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
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi nunc nisi, molestie id quam feugiat, cursus fermentum erat. Donec vitae velit nec sapien viverra convallis. Pellentesque ut dapibus massa. Nam elit sapien, fermentum sit amet diam dapibus, dictum cursus tortor. Morbi sed ligula id urna viverra ultricies. Sed velit eros, eleifend quis elit non, fringilla fermentum eros. Quisque vitae quam vehicula, tempus nulla et, luctus ipsum. Mauris aliquam nisi ac leo hendrerit rhoncus.</p>
                </section>
            </div>
        </section>
    </div>

    <script src="https://kit.fontawesome.com/6f42fc440c.js" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
</html>