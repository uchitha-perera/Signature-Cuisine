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

     <link href="CSS/reservation.css" rel="stylesheet">

     <!-- banner section start--> 
 
     <div class="banner">
        <h1 data-aos="fade-right">~Reserve A Seat~</h1>
   </div>

    <!-- banner section end-->

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

     <!--footer section start-->

     <section class="footer">
        <img src="Pictures/logo5.png" class="logo">

        <div class="container">
            <div>
                <h3 >OPENNING HOURS</h3>
                <span >MONDAY ~ THURSDAY</span>
                <span >12.00 ~ 3.30 PM & 6.30 ~ 10.30 PM</span>
                <span >FRIDAY ~ SUNDAY</span>
                <span >12.00 ~ 3.30 PM & 6.30 ~ 10.30 PM</span>
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
                <h3 >CONTACT US</h3>
                <span >Signature Cuisine</span>
                <span >011-2659784</span>
                <span >signaturecuisine@gmail.com</span>
                
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