

<?php

include 'Components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

include 'includes/add_cart.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>search page</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="CSS/style.css">
   <link rel="stylesheet" href="CSS/common.css">

</head>
<body>
   
<!-- header section starts  -->
<?php  include('./includes/header.php');   ?>
<!-- header section ends -->

<!-- search form section starts  -->
<br><br><br><br><br><br><br>
<section class="search-form">
   <form method="post" action="">
      <input type="text" name="search_box" placeholder="search here..." class="box">
      <button type="submit" name="search_btn" class="fas fa-search"></button>
   </form>
</section>

<!-- search form section ends -->


<section class="products" style="min-height: 100vh; padding-top:0;">

<div class="box-container">

      <?php
         if(isset($_POST['search_box']) OR isset($_POST['search_btn'])){
         $search_box = $_POST['search_box'];
         $select_products = $conn->prepare("SELECT * FROM `products` WHERE name LIKE '%{$search_box}%'");
         $select_products->execute();
         if($select_products->rowCount() > 0){
            while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){
      ?>
      <form action="" method="post" class="box">
         <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
         <input type="hidden" name="name" value="<?= $fetch_products['name']; ?>">
         <input type="hidden" name="price" value="<?= $fetch_products['price']; ?>">
         <input type="hidden" name="image" value="<?= $fetch_products['image']; ?>">
         <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"></button>
         <img src="uploaded_img/<?= $fetch_products['image']; ?>" alt="">
         <a href="category.php?category=<?= $fetch_products['category']; ?>" class="cat"><?= $fetch_products['category']; ?></a>
         <div class="name"><?= $fetch_products['name']; ?></div>
         <div class="flex">
            <div class="price"><span>Rs</span> <?= $fetch_products['price']; ?></div>
            <input type="number" name="qty" class="qty" min="1" max="99" value="1" maxlength="2">
         </div>
      </form>
      <?php
            }
         }else{
            echo '<p class="empty">no products added yet!</p>';
         }
      }
      ?>

   </div>

</section>





<!-- custom js file link  -->
<script src="Admin/javascript/script.js"></script>



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

     <!--jump to top-->

     <a href="#"><button class="topbtn"><i class="fa-solid fa-angle-up"></i></button></a>
     <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

     <script type="text/javascript">
        let menu = document.querySelector('#menu');
        let navbar = document.querySelector('.navbar');

        menu.onclick = () =>{
            menu.classList.toggle('fa-times');
            navbar.classList.toggle('active');
        }

        //document.querySelector('#search-icon').onclick = () =>
        {
            //document.querySelector('#search-form').classList.toggle('active');
        }

        //document.querySelector('#close').onclick = () =>
        {
            //document.querySelector('#search-form').classList.remove('active');
        }
    </script>

<script>
        let subMenu = document.getElementById("subMenu");

        function toggleMenu()
        {
            subMenu.classList.toggle("open-menu");
        }

        AOS.init();
    </script>

 
    
</body>
</html>