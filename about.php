
<?php  include('./includes/header.php');   ?>
     <link href="CSS/about.css" rel="stylesheet">
     
     <!--about banner section start--> 
 
       <div class="banner">
            <h1 data-aos="fade-right">~Why<br> Signature Cuisine?~</h1>
       </div>

       <!--about section start-->
    <section class="welcome" id="about">
        <h1 class="heading" data-aos="fade-right">SOME OF OUR QUALITIES</h1>
        <center><h3 class="sub-heading" data-aos="fade-down"> ~ Luxury & Quality ~</h3></center><br>
        <div class="paragraph">
        <p>At Signature Cuisine, our journey began in 2005 with a simple yet bold vision: to create a culinary haven where the rich and diverse flavors of Sri Lankan cuisine harmoniously blend with the ever-popular Western delights. 
            Today, we take pride in being a culinary destination that tells a story of tradition, 
            creativity, and unwavering passion for food. </p> <br> 

            <center><h3 class="sub-heading" data-aos="fade-down"> ~ OUR STORY ~</h3></center>
            <P>Signature Cuisine was born out of a passion for food and a desire to create something truly extraordinary. What began as a small, 
                humble eatery has now evolved into a vibrant culinary destination, beloved by locals and tourists alike. 
                Our journey over the years has been guided by a commitment to quality, creativity, and an unwavering dedication to exceeding our guests' expectations.</P><br>

                <center><h3 class="sub-heading" data-aos="fade-down"> ~ OUR COMMITMENT ~</h3></center>

                <P>At Signature Cuisine, we are committed to delivering an exceptional dining experience. 
                    Our team of talented chefs and dedicated staff work tirelessly to ensure that every meal is a celebration of taste, culture, and hospitality. 
                    We source the freshest ingredients, prioritize food safety, and strive to accommodate diverse dietary preferences.</P>
            <br> </div>

        <div class="box-container">
            <div class="box" data-aos="zoom-in">
                <div class="image">
                    <img src="Pictures/flavors.png">
                </div>

                <div class="content">
                    <h3> AUTHENTIC SRI LANKAN FUSION FLAVORS</h3>
                    <p>Welcome to Signature Cuisine, where Sri Lankan culinary traditions meet the flavors of the West in a delicious fusion of taste and culture. 
                        Established in 2005, our restaurant has been a beacon of culinary innovation in the heart of Sri Lanka, 
                        offering a unique dining experience that brings together the best of both worlds. </p>
                </div>

            </div>

            <div class="box" data-aos="zoom-in" data-aos-delay="300">
                <div class="image">
                    <img src="Pictures/food-ingredients.jpg">
                </div>

                <div class="content">
                    <h3> PREMIUM INGREDIENTS AND PRESENTATION</h3>
                    <p>To set a high standard, Signature Cuisine use premium, fresh, and locally sourced ingredients whenever possible. Additionally, 
                        the presentation of dishes should be appealing and Instagram-worthy, adding to the overall dining experience. </p>
                </div>

            </div>

            <div class="box" data-aos="zoom-in" data-aos-delay="600">
                <div class="image">
                    <img src="Pictures/serve-food.jpg">
                </div>

                <div class="content">
                    <h3> CULINARY EXPERTISE AND CONSISTENCY</h3>
                    <p>"Signature Cuisine" we have a team of chefs with expertise in both Sri Lankan and international cuisines. 
                        Consistency in taste and quality across all menu items is essential to establish a reputation for excellence. </p>
                </div>

            </div>

            <div class="box" data-aos="zoom-in" data-aos-delay="900">
                <div class="image">
                    <img src="Pictures/food-menu.jpg">
                </div>

                <div class="content">
                    <h3> CREATIVE MENU INNOVATIONS</h3>
                    <p>Signature Cuisine known for its creativity in menu development. 
                        Regularly introducing new and exciting fusion dishes that surprise and delight customers can keep them coming back for more. 
                        Creative innovation can be a hallmark of "Signature Cuisine." </p>
                </div>

            </div>


            

        </div>
    </section>
    <!--about section end-->
            

     <!--about banner section end--> 

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
    
</body>
</html>