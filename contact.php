<?php include('./includes/header.php');

include('./Components/connect.php');

session_start();

$contact = "";

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = '';
};

if (isset($_POST['send'])) {


    $firstname = $_POST['firstname'];
    //    $firstname = filter_var($firstname, FILTER_SANITIZE_STRING);

    $lastname = $_POST['lastname'];
    //    $lastname = filter_var($lasttname, FILTER_SANITIZE_STRING);

    $email = $_POST['email'];
    //    $email = filter_var($email, FILTER_SANITIZE_STRING);

    $mobile = $_POST['mobile'];
    //    $mobile = filter_var($mobile, FILTER_SANITIZE_STRING);

    $message = $_POST['message'];
    //    $message = filter_var($msg, FILTER_SANITIZE_STRING);

    $select_contact = $conn->prepare("SELECT * FROM `contact` WHERE firstname = ? AND lastname = ? AND email = ? AND mobile = ? AND message = ?");
    $select_contact->execute([$firstname, $lastname, $email, $mobile, $message]);

    if ($select_contact->rowCount() > 0) {
        $contact = 'already sent message!';
    } else {

        $insert_contact = $conn->prepare("INSERT INTO `contact`(user_id, firstname, lastname, email, mobile, message) VALUES(?,?,?,?,?,?)");
        $insert_contact->execute([$user_id, $firstname, $lastname, $email, $mobile, $message]);

        $contact = 'sent message successfully!';
    }
}

?>

<link href="CSS/contact.css" rel="stylesheet">

<!-- banner section start-->

<div class="banner">
    <h1 data-aos="fade-right">~Don't hesitate to Contact Us~</h1>
</div>

<!-- banner section end-->

<div class="contactus">
    <div class="title">
        <h1 data-aos="fade-right">~Get in Touch~</h1>
    </div>
    <div class="box">
        <div class="contact form" data-aos="zoom-in">
            <h3>Send a Message</h3>

            <?php if (!empty($contact)) {
                echo '<script> alert("' .$contact . '");</script>';
            }

            ?>

            <form action="" method="POST">
                <div class="formBox">
                    <div class="row50">
                        <div class="inputBox">
                            <span>First Name</span>
                            <input type="text" required name="firstname" placeholder="Desmond">
                        </div>
                        <div class="inputBox">
                            <span>Last Name</span>
                            <input type="text" required name="lastname" placeholder="Perera">
                        </div>
                    </div>

                    <div class="row50">
                        <div class="inputBox">
                            <span>Email</span>
                            <input type="email" required name="email" placeholder="desmondperera@gmail.com">
                        </div>
                        <div class="inputBox">
                            <span>Mobile</span>
                            <input type="tel" required name="mobile" placeholder="+94 77 504 4648">
                        </div>
                    </div>

                    <div class="row100">
                        <div class="inputBox">
                            <span>Message</span>
                            <textarea name="message" required placeholder="write your message here..."></textarea>
                        </div>
                    </div>

                    <div class="row100">
                        <div class="inputBox">
                            <input type="submit" value="send" name="send">

                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="contact info" data-aos="zoom-in" data-aos-delay="300">
            <h3>Contact Info</h3>
            <div class="infoBox">
                <div>
                    <h4>Colombo</h4>
                    <p><strong>Address :</strong> No 28 Kensington Garden, Colombo 00400, Sri Lanka</p>
                    <p><strong>Phone :</strong>011-2657148</p><br>

                    <h4>Galle</h4>
                    <p><strong>Address :</strong> No 09 Church Cross Street, Galle 80212, Sri Lanka</p>
                    <p><strong>Phone :</strong>011-2691874</p><br>

                    <h4>Kandy</h4>
                    <p><strong>Address :</strong> No 68 Senanaya Veediya, Kandy 20000, Sri Lanka</p>
                    <p><strong>Phone :</strong>011-2301459</p>

                    <div class="ico">

                        <ul>
                            <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-whatsapp"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="contact map" data-aos="zoom-in" data-aos-delay="300">
            <h3>Opening Hours</h3><br>
            <span><strong>MONDAY ~ THURSDAY</strong></span><br>
            <span>12.00 ~ 3.30 PM & 6.30 ~ 10.30 PM</span><br>
            <span><strong>FRIDAY ~ SUNDAY</strong></span><br>
            <span>12.00 ~ 3.30 PM & 6.30 ~ 10.30 PM</span><br><br>
            <span>Email: <strong>signaturecuisine@gmail.com</strong></span>
        </div>

    </div>
</div>

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
            <h3>GET NEWS & OFFERS</h3>
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

    menu.onclick = () => {
        menu.classList.toggle('fa-times');
        navbar.classList.toggle('active');
    }

    document.querySelector('#search-icon').onclick = () => {
        document.querySelector('#search-form').classList.toggle('active');
    }

    document.querySelector('#close').onclick = () => {
        document.querySelector('#search-form').classList.remove('active');
    }
    AOS.init();
</script>

<script>
    let subMenu = document.getElementById("subMenu");

    function toggleMenu() {
        subMenu.classList.toggle("open-menu");
    }
</script>

</body>

</html>