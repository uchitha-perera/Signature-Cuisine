
<?php 

if(session_status() !== PHP_SESSION_ACTIVE){
    session_start();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width", initial-scale="1.0">
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">-->
    <title>Signature Cuisine</title>
    <link rel="stylesheet" type="text/css" href = https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!--custom css file-->
    
    <link href="CSS/common.css" rel="stylesheet">

    <!--link swiper css-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

    
</head>
<body>

    <!--header section start-->

    <header>
       <a href="index.php" class="logo"><img src="pictures/logo5.png"></a>

        <nav class="navbar">

            
            <a href="index.php">home</a>
            <a href="about.php">About</a>
            <a href="orderonline.php">Order Online</a>
            <a href="gallery.php">Gallery</a>
            <a href="facilities.php">Facilities</a>
            <a href="contact.php">Contact</a>
            <a href="reservation.php">Reservation</a>
        </nav>

        <div class="icons">
        
            <i class = "fas fa-bars" id="menu"></i>
            <a href="result.php"><i class="fas fa-search" id="search-icon"></i></a>
            <a href="cart.php"><i class="fas fa-shopping-cart"></i></a>
            <a href="login.php" title="Login"><i class="fas fa-sign-in"></i></a>
            <i class="fas fa-user" class="user-pic" onclick="toggleMenu()"></i>
        </div>

        <!--search form-->

    <form action="" id="search-form">
        <input type="search" placeholder="search here..." name="" id="search-box">
        <label for="search-box"><a href="result.php" class="fas fa-search"></a></label>
        <i class="fas fa-times" id="close"></i>
    </form>
    <!--search form end-->

        <div class="sub-menu-wrap" id="subMenu">
            <div class="sub-menu">
                <div class="user-info">
                    <img src="Pictures/user.png">
                    <h3>Uchitha Kavinda</h3>

                </div>
                <hr>


                <a href="profile.php" class="sub-menu-link">
                    <img src="Pictures/profile.png">
                     <P>Profile</P>
                    <span>></span>
                </a>

                <a href="orders.php" class="sub-menu-link">
                    <img src="Pictures/profile.png">
                     <P>My Orders</P>
                    <span>></span>
                </a>

                <a href="logout.php" class="sub-menu-link">
                    <img src="Pictures/logout.png">
                    <p>Logout</p>
                    <span>></span>
                </a>

            </div>
            
        </div>
       
    </header>  
    <!--header section end-->