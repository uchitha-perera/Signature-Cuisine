<?php

include 'Components/connect.php';


session_start();

$user_id = "";

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   header('location:login.php?message=Please login first');
   die;
};

if(isset($_POST['delete'])){
   $cart_id = $_POST['cart_id'];
   $delete_cart_item = $conn->prepare("DELETE FROM `cart` WHERE id = ?");
   $delete_cart_item->execute([$cart_id]);
   $message[] = 'cart item deleted!';
}

if(isset($_POST['delete_all'])){
   $delete_cart_item = $conn->prepare("DELETE FROM `cart` WHERE user_id = ?");
   $delete_cart_item->execute([$user_id]);
   // header('location:cart.php');
   $message[] = 'deleted all from cart!';
}

if(isset($_POST['update_qty'])){
   $cart_id = $_POST['cart_id'];
   $qty = $_POST['qty'];
   $qty = filter_var($qty, FILTER_SANITIZE_STRING);
   $update_qty = $conn->prepare("UPDATE `cart` SET quantity = ? WHERE id = ?");
   $update_qty->execute([$qty, $cart_id]);
   $message[] = 'cart quantity updated';
}

$grand_total = 0;

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>cart</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="CSS/style.css">
   

</head>
<body>
   
<!-- header section starts  -->
<?php include('./includes/header.php'); ?>
<!-- header section ends -->
<br><br><br><br><br><br><br><br><br>
<div class="heading">
   <h3>shopping cart</h3>
   <p><a href="index.php">home</a> <span> / cart</span></p>
</div>

<!-- shopping cart section starts  -->

<section class="products">

   <h1 class="title">your cart</h1>

   <div class="box-container">

      <?php
         $grand_total = 0;
         $select_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
         $select_cart->execute([$user_id]);
         if($select_cart->rowCount() > 0){
            while($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)){
      ?>

      
      <form action="" method="post" class="box">
         <input type="hidden" name="cart_id" value="<?= $fetch_cart['id']; ?>">
         <a href="quick_view.php?pid=<?= $fetch_cart['pid']; ?>" class="fas fa-eye"></a>
         <button type="submit" class="fas fa-times" name="delete" onclick="return confirm('delete this item?');"></button>
         <img src="uploaded_img/<?= $fetch_cart['image']; ?>" alt="">
         <div class="name"><?= $fetch_cart['name']; ?></div>
         <div class="flex">
            <div class="price"><span>Rs </span><?= $fetch_cart['price']; ?></div>
            <input type="number" name="qty" class="qty" min="1" max="99" value="<?= $fetch_cart['quantity']; ?>" maxlength="2">
            <button type="submit" class="fas fa-edit" name="update_qty"></button>
         </div>
         <div class="sub-total"> sub total : <span>Rs <?= $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']); ?>/-</span> </div>
      </form>
      <?php
               $grand_total += $sub_total;
            }
         }else{
            echo '<p class="empty">your cart is empty</p>';
         }
      ?>

   </div>

   <div class="cart-total">
      <p>cart total : <span>Rs <?= $grand_total; ?></span></p>
      <a href="checkout.php" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>">proceed to checkout</a>
   </div>

   <div class="more-btn">
      <form action="" method="post">
         <button type="submit" class="delete-btn <?= ($grand_total > 1)?'':'disabled'; ?>" name="delete_all" onclick="return confirm('delete all from cart?');">delete all</button>
      </form><br>
      <a href="orderonline.php" class="btn">continue shopping</a>
   </div>

</section>

<!-- shopping cart section ends -->

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

     <a href="#"><button class="topbtn"><i class="fa-solid fa-angle-up"></i></button></a>
 <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

 <script type="text/javascript">
    let menu = document.querySelector('#menu');
    let navbar = document.querySelector('.navbar');

    menu.onclick = () =>{
        menu.classList.toggle('fa-times');
        navbar.classList.toggle('active');
    }

    document.querySelector('#search-icon').onclick = () =>
        {
            document.querySelector('#search-form').classList.toggle('active');
        }

        document.querySelector('#close').onclick = () =>
        {
            document.querySelector('#search-form').classList.remove('active');
        }
    AOS.init();
</script>

<script>
        let subMenu = document.getElementById("subMenu");

        function toggleMenu()
        {
            subMenu.classList.toggle("open-menu");
        }
    </script>
    








<!-- custom js file link  -->
<script src="admin/javascript/script.js"></script>

</body>
</html>