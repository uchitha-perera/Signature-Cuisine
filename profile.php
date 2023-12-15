<?php

include 'Components/connect.php';

session_start();

if (isset($_SESSION['user_id'])) {
   $user_id = $_SESSION['user_id'];
} else {
   $user_id = '';
   header('location:login.php?message=Please login first');
};

?>


<?php
$fetch_profile = "";
$select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
$select_profile->execute([$user_id]);
if ($select_profile->rowCount() > 0) {
   $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>profile</title>



   <!-- custom css file link  -->
   <link rel="stylesheet" href="CSS/style.css">

</head>

<body>

   <!-- header section starts  -->
   <?php include 'includes/header.php'; ?>
   <!-- header section ends -->

   <br><br><br><br><br><br><br><br>

   <section class="user-details">

      <div class="user">
         <?php

         ?>
         <img src="Pictures/user-icon.png" alt="">
         <p><i class="fas fa-user"></i><span><span><?= $fetch_profile['name']; ?></span></span></p>
         <p><i class="fas fa-phone"></i><span><?= $fetch_profile['number']; ?></span></p>
         <p><i class="fas fa-envelope"></i><span><?= $fetch_profile['email']; ?></span></p>
         <a href="update_profile.php" class="btn">update info</a>
         <p class="address"><i class="fas fa-map-marker-alt"></i><span><?php if ($fetch_profile['address'] == '') {
                                                                           echo 'please enter your address';
                                                                        } else {
                                                                           echo $fetch_profile['address'];
                                                                        } ?></span></p>
         <a href="update_address.php" class="btn">update address</a>
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



   <!-- custom js file link  -->
   <script src="Admin/javascript/script.js"></script>

</body>

</html>