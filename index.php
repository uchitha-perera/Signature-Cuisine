
<?php  include('./includes/header.php');   
include('./Components/connect.php');

session_start();


if(isset($_SESSION['user_id'])){

   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};


if(isset($_POST['send'])){


   $branch = $_POST['branch'];
   $branch = htmlspecialchars($_POST['branch']);

   $people = $_POST['people'];
   //$people = filter_var($people, FILTER_SANITIZE_STRING);

   $time = $_POST['time'];
   //$time = filter_var($time, FILTER_SANITIZE_STRING);

   $phone = $_POST['phone'];
   //$phone = filter_var($phone, FILTER_SANITIZE_STRING);

   $date = $_POST['date'];
   //$date = filter_var($date, FILTER_SANITIZE_STRING);

   $name = $_POST['name'];
   //$name = filter_var($name, FILTER_SANITIZE_STRING);

   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_EMAIL);

   $msg = $_POST['msg'];
   //$msg = filter_var($msg, FILTER_SANITIZE_STRING);

   $select_reservation = $conn->prepare("SELECT * FROM `reservation` WHERE branch = ? AND people = ? AND time = ? AND phone = ? AND date = ? AND name = ? AND email = ? AND message = ?");
   $select_reservation->execute([$branch, $people, $time, $phone, $date, $name, $email, $msg]);

   if($select_reservation->rowCount() > 0){
    echo '<script>alert("Reservation already sent!");</script>';
   }else{

      $insert_reservation = $conn->prepare("INSERT INTO `reservation`(branch, people, time, phone, date, name, email, message) VALUES(?,?,?,?,?,?,?,?)");
      $insert_reservation->execute([$branch, $people, $time, $phone, $date, $name, $email, $msg]);

      echo '<script>alert("Reserved Successfully!");</script>';

   }

}

?>
    
<link href="CSS/index.css" rel="stylesheet">
    <!--slider section start-->

    <div class="home" id="home">
        <div class="swiper home-slider">
            <div class="swiper-wrapper wrapper">
                <div class="swiper-slide slide slide1">
                    <div class="content">
                        <img src="Pictures/crown-symbol.png">

                        <h3>delicious cuisines</h3>
                        <h1>gift voucher</h1>
                        <p>
                            give away your beloved customers
                        </p>
                        <a href="orderonline.php" class="btn">order now</a>
                    </div>
                </div>
                
                <div class="swiper-slide slide slide2">
                    <div class="content">
                        <img src="Pictures/crown-symbol.png">

                        <h3>sale of 10% this dish</h3>
                        <h1>the fresh</h1>
                        <p>
                            food restaurant
                        </p>
                        <a href="orderonline.php" class="btn">order now</a>
                    </div>
                </div>

                <div class="swiper-slide slide slide3">
                    <div class="content">
                        <img src="Pictures/crown-symbol.png">

                        <h3>we are open</h3>
                        <h1>fresh fruits</h1>
                        <p>
                            you will love it
                        </p>
                        <a href="orderonline.php" class="btn">order now</a>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
    <!--slider section end-->

    
    
    <!--welcome section start-->
    <section class="welcome" id="about">
        <h1 class="heading" data-aos="fade-right">WELCOME TO SIGNATURE CUISINE</h1>
        <center><h3 class="sub-heading"> ~ Luxury & Quality ~</h3></center>

                
        <div class="box-container">
            <div class="box"  data-aos="fade-up">
                <div class="image">
                    <img src="Pictures/bread-making.jpg">
                </div>

                <div class="content">
                    <h3> PROFESSIONAL LEVEL</h3>
                    <p>At Signature Cuisine, we elevate dining to an art form, where every interaction is a symphony of professionalism and hospitality. 
                        Our staff undergoes rigorous training to ensure they are well-versed in the intricacies of our menu, the nuances of service, 
                        and the art of creating a truly unforgettable dining experience. 
                        </p>
                </div>

            </div>

            <div class="box" data-aos="fade-up" data-aos-delay="300">
                <div class="image">
                    <img src="Pictures/fresh-food.jpg">
                </div>

                <div class="content">
                    <h3> FRESH FOOD GUARANTEED</h3>
                    <p>We understand that freshness is paramount to culinary excellence. 
                        That's why we source only the finest ingredients, ensuring that each dish bursts with flavor and vitality. Our chefs meticulously prepare every meal to order, 
                        utilizing time-honored techniques and modern culinary innovations to create dishes that are both delectable and visually stunning. </p>
                </div>

            </div>

            <div class="box" data-aos="fade-up" data-aos-delay="600">
                <div class="image">
                    <img src="Pictures/serve-drinks.jpg">
                </div>

                <div class="content">
                    <h3> THE MENU IS PLENTIFUL</h3>
                    <p>Our menu is a tapestry of culinary delights, offering an array of flavors to tantalize every palate. 
                        From traditional Sri Lankan fare to international cuisine, we have something to satisfy every craving. 
                        Whether you're seeking the comforting familiarity of kottu roti or the exotic spice of Thai curry, our menu is sure to captivate your senses. </p>
                </div>

            </div>

        </div>
    </section>
    <!--welcome section end-->

    <!--menu section start-->
    <section class="our-menu" id="menu">
        <h1 class="heading">our food menu</h1>
        <center><h3 class="sub-heading">~ see what we offer ~ </h3></center>

        <div class="menu-container">
            
            <div class="item" data-aos="fade-right">
                <div class="item-name">
                    <h2>Main Dishes</h2>
                    <img src="Pictures/drinks.png">
                </div>

                <div class="item-body">
                    <div class="item-menu">
                        <h3>Chicken Fried Rice</h3>
                        <span class="dots-1"></span>
                        <h3>RS.1000</h3>

                        
                    </div><br>

                    <div class="item-menu">
                        <h3>Buriyani</h3>
                        <span class="dots-2"></span>
                        <h3>RS.1500</h3>

                       
                    </div>

                </div>
            </div>

            <div class="item" data-aos="fade-right">
                <div class="item-name">
                    <h2>Fast Foods</h2>
                    <img src="Pictures/drinks.png">
                </div>

                <div class="item-body">
                    <div class="item-menu">
                        <h3>Chicken Burger</h3>
                        <span class="dots-3"></span>
                        <h3>RS.850</h3>

                    </div><br>

                    <div class="item-menu">
                        <h3>Chicken Submarine</h3>
                        <span class="dots-4"></span>
                        <h3>RS.1200</h3>

                    </div>

                </div>
            </div>

            <div class="item" data-aos="fade-right">
                <div class="item-name">
                    <h2>Drinks</h2>
                    <img src="Pictures/drinks.png">
                </div>

                <div class="item-body">
                    <div class="item-menu">
                        <h3>Milk Shake</h3>
                        <span class="dots-5"></span>
                        <h3>RS.500</h3>

                    </div><br>

                    <div class="item-menu">
                        <h3>Mojito</h3>
                        <span class="dots-6"></span>
                        <h3>RS.650</h3>

                    </div>

                </div>
            </div>

            <div class="item" data-aos="fade-right">
                <div class="item-name">
                    <h2>Desserts</h2>
                    <img src="Pictures/drinks.png">
                </div>

                <div class="item-body">
                    <div class="item-menu">
                        <h3>Chocolate Ice Cream</h3>
                        <span class="dots-7"></span>
                        <h3>RS.200</h3>

                    </div><br>

                    <div class="item-menu">
                        <h3>Pudding</h3>
                        <span class="dots-8"></span>
                        <h3>RS.300</h3>

                    </div>

                </div>
            </div>

        </div>
    </section>
    <!--menu section end-->


    <!--team section start-->
    <section class="our-team" id="team">
        <h1 class="heading" data-aos="fade-left">our talented chef</h1>
        <center>
            <h3 class="sub-heading"> ~ Experience $ Enthusiasm ~ </h3>
        </center>

        <div class="our-chef">
            <div class="item">
                <div class="image" data-aos="fade-up" >
                    <img src="Pictures/chef-1.png">
                </div>

                <div class="chef-info">
                    <div>
                        <h3>Vajira Jayathunga</h3>
                        <span>master chef</span>

                        <ul>
                            <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-whatsapp"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="item">
                <div class="image" data-aos="fade-up" data-aos-delay="300">
                    <img src="Pictures/chef-2.png">
                </div>

                <div class="chef-info">
                    <div>
                        <h3>Priyashan Perera</h3>
                        <span>master chef</span>

                        <ul>
                            <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-whatsapp"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="item">
                <div class="image" data-aos="fade-up" data-aos-delay="600">
                    <img src="Pictures/chef-3.png">
                </div>

                <div class="chef-info">
                    <div>
                        <h3>Desmond Silva</h3>
                        <span>master chef</span>

                        <ul>
                            <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-whatsapp"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--team section end-->


    <!--reservation section start-->
    <div class="reservation" id="reservation" >
        <div class="image" data-aos="zoom-in">

        </div>

        <div class="form" data-aos="zoom-in" data-aos-delay="300">
            <h1 class="heading">book a table</h1>
            <center><h3 class="sub-heading">~ check out our place ~</h3></center>

            

            <form action="" method="POST">
                <div class="form-holder">
                    <div class="for">
                        
                        <select name="branch" class="ba" required>
                            <option>Branch</option>
                            <option value="colombo">Colombo</option>
                            <option value="Galle" >Galle</option>
                            <option value="Kandy">Kandy</option>                            
                        </select>

                        <select name="people"  class="sa" required>
                            <option value="1">1 people</option>
                            <option value="2">2 people</option>
                            <option value="3">3 people</option>
                            <option value="4">4 people</option>
                            <option value="5">5 people</option>
                        </select>

                        <input type="time" name="time" placeholder="" required>
                        <input type="tel" name="phone" placeholder="Phone" required>
                    </div>

                    <div class="pa">
                        <input type="date" name="date" placeholder="" required>
                        <input type="text" name="name" placeholder="Your Name" required>
                        <input type="email" name="email" placeholder="email" required>
                        <input type="text" name="msg" placeholder="Your Message" required>
                    </div>
                </div>
                <center><button type="submit" name="send" class="btn">Book Now</button></center>
            </form>
        </div>
    </div>
     <!--reservation section end-->

     <!--news section start-->

     <section class="blog welcome" id="blog">
        <h1 class="heading" data-aos="fade-right">BEST PLACE TO VISIT</h1>
        <center><h3 class="sub-heading"> ~ We SIGNATURE-CUISINE ~</h3></center>

        <div class="box-container">
            <div class="box" data-aos="fade-up">
                <div class="image">
                    <img src="Pictures/post-thumb-4.jpg">
                </div>

                <div class="content">
                    <h3>AUTHENTIC SRI LANKAN FUSION FLAVORS</h3>
                    <P>Welcome to Signature Cuisine, where Sri Lankan culinary traditions meet the flavors of the West in a delicious fusion of taste and culture. 
                        Established in 2005, our restaurant has been a beacon of culinary innovation in the heart of Sri Lanka, 
                        offering a unique dining experience that brings together the best of both worlds.</P>
                        <img src="Pictures/post-body-bg-1.png">
                </div>
            </div>

            <div class="box" data-aos="fade-up" data-aos-delay="300">
                <div class="image">
                    <img src="Pictures/post-thumb-5.jpg">
                </div>

                <div class="content">
                    <h3>WE SIGNATURE-CUISINE</h3>
                    <P>At Signature Cuisine, we are committed to providing not only exceptional food but also a comfortable and inviting dining environment. 
            We understand that the ambiance plays a crucial role in enhancing your overall dining experience.</P>
                        <img src="Pictures/post-body-bg-2.png">
                </div>
            </div>

            <div class="box" data-aos="fade-up" data-aos-delay="600">
                <div class="image">
                    <img src="Pictures/post-thumb-6.jpg">
                </div>

                <div class="content">
                    <h3>WE OFFER YOU SO MUCH FACILITIES</h3>
                    <P>We offer you so much facilities like spacious dining area, outdoor seating, private dining, bar area, wi-fi access, parking area,
                        online orders & dilivery, clean & hygienic environment, inline reservation service.

                    </P>
                        <img src="Pictures/post-body-bg-3.png">
                </div>
            </div>
        </div>
     </section>

     <!--news section end-->

     <!--footer section start-->

     <section class="footer">
        <img src="Pictures/logo5.png" class="logo">

        <div class="container">
            <div>
                <h3 data-aos="zoom-in">OPENNING HOURS</h3>
                <span data-aos="zoom-in">MONDAY ~ THURSDAY</span>
                <span data-aos="zoom-in">12.00 ~ 3.30 PM & 6.30 ~ 10.30 PM</span>
                <span data-aos="zoom-in">FRIDAY ~ SUNDAY</span>
                <span data-aos="zoom-in">12.00 ~ 3.30 PM & 6.30 ~ 10.30 PM</span>
            </div>

            <div>
                <h3 data-aos="zoom-in">GET NEWS & OFFERS</h3>
                <input type="email" name="" placeholder="enter your email">
                <ul>
                    <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-whatsapp"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                </ul>
            </div>

            <div>
                <h3 data-aos="zoom-in">CONTACT US</h3>
                <span data-aos="zoom-in">Signature Cuisine</span>
                <span data-aos="zoom-in">011-2659784</span>
                <span data-aos="zoom-in">signaturecuisine@gmail.com</span>
                
            </div>
        </div>

        <p>&copy;2023 Reserved by Signature-Cuisine</p>
     </section>


     <!--footer section end-->

     <!--jump to top-->

     <a href="#"><button class="topbtn"><i class="fa-solid fa-angle-up"></i></button></a>

    <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper(".home-slider", {
      spaceBetween: 30,
      centeredSlides: true,
      autoplay: {
        delay: 5500,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      loop:true,
    });
    AOS.init();
  </script>

  <!--navbar toggle script start--> 

    <script type="text/javascript">
        let menu = document.querySelector('#menu');
        let navbar = document.querySelector('.navbar');

        menu.onclick = () =>{
            menu.classList.toggle('fa-times');
            navbar.classList.toggle('active');
        }

        window.onscroll = () =>
        {
            menu.classList.remove('fa-times');
            navbar.classList.remove('active'); 
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
    <!--navbar toggle script end--> 

    <script>
        let subMenu = document.getElementById("subMenu");

        function toggleMenu()
        {
            subMenu.classList.toggle("open-menu");
        }
    </script>
    
</body>
</html>