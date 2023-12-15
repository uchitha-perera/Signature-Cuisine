<?php  include('./includes/header.php');
include 'Components/connect.php';   

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

include 'includes/add_cart.php';

?>
     
     <link href="CSS/orderonline.css" rel="stylesheet">
     <link href="CSS/order.css" rel="stylesheet">
     
     
    
     
     <!-- banner section start--> 
 
       <div class="banner">
            <h1 data-aos="fade-up">~Check Out<br> Our Menu~</h1>
       </div>

     <!-- banner section end--> 

     <br><br><h3 class="sub-heading" data-aos="fade-up">our dishes</h3>
        <h1 class="heading" data-aos="fade-up"> popular dishes</h1>

     <!--<section class="category">-->
        <div class="buttons">
            <button type="button">All</button>
            <button type="button" data-btn="main dish">main dish</button>
            <button type="button" data-btn="fast food">fast food</button>
            <button type="button" data-btn="drinks">drinks</button>
            <button type="button" data-btn="desserts">desserts</button>

        </div>
     

     <!--products section start-->

     <section class="products" id="dishes">

        <div class="box-container">

        <?php
            $select_products = $conn->prepare("SELECT * FROM `products`");
            $select_products->execute();
            if($select_products->rowCount() > 0){
                while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){
        ?>
        <form action="" method="post" class="box" data-cat="<?= $fetch_products['category']; ?>">
            <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
            <input type="hidden" name="name" value="<?= $fetch_products['name']; ?>">
            <input type="hidden" name="price" value="<?= $fetch_products['price']; ?>">
            <input type="hidden" name="image" value="<?= $fetch_products['image']; ?>">
            <!--<a href="quick_view.php?pid=<?= $fetch_products['id']; ?>" class="fas fa-eye"></a>-->
            <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"></button>
            <img src="uploaded_img/<?= $fetch_products['image']; ?>" alt="">
            <a href="category.php?category=<?= $fetch_products['category']; ?>" class="cat"><?= $fetch_products['category']; ?></a>
            <div class="name"><?= $fetch_products['name']; ?></div>
            <div class="flex">
                <div class="price"><span>Rs</span> <?= $fetch_products['price']; ?></div>
                <input type="number" name="qty" class="qty" min="1" max="99" value="1" maxlength="2"">
            </div>
        </form>
        <?php
         
        } 
        if (isset($_POST['add_to_cart'])) {
            echo '<script>alert("Added to Cart Successfully!");</script>';
        }
    }else{
        echo '<p class="empty">no products added yet!</p>';
    }
        ?>


            

           <!-- <div class="box" data-cat="main dish">
            <img src="Pictures/chicken-burger.png" alt="">
            <h3>Chicken Burger</h3>
            <p class="para">Signature chicken burger made with a crunchy chicken fillet, veggies & a delicious mayo sauce</p>
            <span>Rs.800</span><br>
            <a href="#" class="btn">add to cart</a>
           </div>

           <div class="box" data-cat="main dish">
            <img src="Pictures/chicken-burger.png" alt="">
            <h3>Beef Burger</h3>
            <p class="para">Signature chicken burger made with a crunchy chicken fillet, veggies & a delicious mayo sauce</p>
            <span>Rs.800</span><br>
            <a href="#" class="btn">add to cart</a>
           </div>

           <div class="box" data-cat="fast food">
            <img src="Pictures/chicken-burger.png" alt="">
            <h3>Chicken Submarines</h3>
            <p class="para">Signature chicken burger made with a crunchy chicken fillet, veggies & a delicious mayo sauce</p>
            <span>Rs.800</span><br>
            <a href="#" class="btn">add to cart</a>
           </div>

           <div class="box" data-cat="drinks">
            <img src="Pictures/chicken-burger.png" alt="">
            <h3>Chicken rice</h3>
            <p class="para">Signature chicken burger made with a crunchy chicken fillet, veggies & a delicious mayo sauce</p>
            <span>Rs.800</span><br>
            <a href="#" class="btn">add to cart</a>
           </div>
           
           <div class="box" data-cat="desserts">
            <img src="Pictures/chicken-burger.png" alt="">
            <h3>tasty pasta</h3>
            <p class="para">Signature chicken burger made with a crunchy chicken fillet, veggies & a delicious mayo sauce</p>
            <span>Rs.800</span><br>
            <a href="#" class="btn">add to cart</a>
           </div>  -->


        </div>
     </section><br><br>

     <!--products section end--> 



       <!--footer section start-->

        <section class="footer">
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

        document.querySelector('#search-icon').onclick = () =>
        {
            document.querySelector('#search-form').classList.toggle('active');
        }

        document.querySelector('#close').onclick = () =>
        {
            document.querySelector('#search-form').classList.remove('active');
        }
    </script>

<script>
        let subMenu = document.getElementById("subMenu");

        function toggleMenu()
        {
            subMenu.classList.toggle("open-menu");
        }
    </script>

    <script type="text/javascript">
        const btns = document.querySelectorAll('.buttons > button');
        const prod = document.querySelectorAll('.box-container > .box');

        for(let i = 1; i < btns.length; i++) {
            btns[i].addEventListener('click', filterBox);
        }

        function setActiveBtn(e) {
            btns.forEach(btn => {
                btn.classList.remove('btn-clicked');
            });

            e.target.classList.add('btn-clicked');

        
        }

            function filterBox(e){
                setActiveBtn(e);

                prod.forEach( box =>{
                    box.classList.remove('shrink');
                    box.classList.add('expand');

                    

                    const boxType = box.dataset.cat;
                    
                    const btnType = e.target.dataset.btn;

                    if(boxType !== btnType) {
                        box.classList.remove('expand');
                        box.classList.add('shrink');
                    }
                });
            }

            btns[0].addEventListener('click',(e) =>{
                setActiveBtn(e);
                prod.forEach(box =>{
                    box.classList.remove('shrink');
                    box.classList.add('expand');
                });
            });

            AOS.init();
        
    </script>
    
</body>
</html>