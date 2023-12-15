<?php

include 'Components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
   header('location:login.php?message=Please login first');
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>orders</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="CSS/style.css">

</head>
<body>
   
<!-- header section starts  -->
<?php include 'includes/header.php'; ?>
<!-- header section ends -->

<br><br><br><br><br><br><br><br><br>

<div class="heading">
   <h3>orders</h3>
   <p><a href="index.php">home</a> <span> / orders</span></p>
</div>

<section class="orders">

   <h1 class="title">your orders</h1>

   <div class="box-container">

   <?php
      if($user_id == ''){
         echo '<p class="empty">please login to see your orders</p>';
      }else{
         $select_orders = $conn->prepare("SELECT * FROM `orders` WHERE user_id = ?");
         $select_orders->execute([$user_id]);
         if($select_orders->rowCount() > 0){
            while($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)){
   ?>
   <div class="box">
      <p>placed on : <span><?= $fetch_orders['placed_on']; ?></span></p>
      <p>name : <span><?= $fetch_orders['name']; ?></span></p>
      <p>email : <span><?= $fetch_orders['email']; ?></span></p>
      <p>number : <span><?= $fetch_orders['number']; ?></span></p>
      <p>address : <span><?= $fetch_orders['address']; ?></span></p>
      <p>payment method : <span><?= $fetch_orders['method']; ?></span></p>
      <p>your orders : <span><?= $fetch_orders['total_products']; ?></span></p>
      <p>total price : <span>Rs <?= $fetch_orders['total_price']; ?>/-</span></p>
      <p> payment status : <span style="color:<?php if($fetch_orders['payment_status'] == 'pending'){ echo 'red'; }else{ echo 'green'; }; ?>"><?= $fetch_orders['payment_status']; ?></span> </p>
   </div>
   <?php
      }
      }else{
         echo '<p class="empty">no orders placed yet!</p>';
      }
      }
   ?>

   </div>

</section>

<!--footer section start-->

<section class="footer" style="max-width: 100%;">
            <img src="Pictures/logo5.png" class="logo">
    
            <div class="container">
                <div>
                    <h3>OPENNING HOURS</h3>
                    <span>MONDAY ~ THURSDAY</span>
                    <span>12.00 ~ 3.30 PM & 6.30 ~ 10.30 PM</span>
                    <span>FRIDAY ~ SUNDAY</span>
                    <span>12.00 ~ 3.30 PM & 6.30 ~ 10.30 PM</span>
                </div>
    
                <div>
                    <h3 >GET NEWS & OFFERS</h3>
                    <input type="email" name="" placeholder="enter your email">
                    <ul>
                        <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-whatsapp"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                    </ul>
                </div>
    
                <div>
                    <h3>CONTACT US</h3>
                    <span>Signature Cuisine</span>
                    <span>011-2659784</span>
                    <span>signaturecuisine@gmail.com</span>
                    
                </div>
            </div>
    
            <p>&copy;2023 Reserved by Signature-Cuisine</p>
         </section>


     <!--footer section end-->



<script>
        let subMenu = document.getElementById("subMenu");

        function toggleMenu()
        {
            subMenu.classList.toggle("open-menu");
        }
    </script>







<!-- custom js file link  -->
<script src="Admin/javascript/script.js"></script>

</body>
</html>