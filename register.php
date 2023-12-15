
<?php

include('./Components/connect.php');

session_start();


if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

if(isset($_POST['submit'])){

   $firstname = $_POST['firstname'];
   $firstname = filter_var($firstname, FILTER_SANITIZE_STRING);

   $lastname = $_POST['lastname'];
   $lastname = filter_var($lastname, FILTER_SANITIZE_STRING);

   $contact = $_POST['contact'];
   $contact = filter_var($contact, FILTER_SANITIZE_STRING);

   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   
   $password = sha1($_POST['password']);
   $password = filter_var($password, FILTER_SANITIZE_STRING);
   

   $select_user_register = $conn->prepare("SELECT * FROM `user_register` WHERE email = ? OR contact = ?");
   $select_user_register->execute([$email, $contact]);
   $row = $select_user_register->fetch(PDO::FETCH_ASSOC);

   if($select_user_register->rowCount() > 0){
      echo '<script>alert("email or number already exists! Please try again!");</script>';
   
      }else{
         $insert_user_register = $conn->prepare("INSERT INTO `user_register`(firstname, lastname, contact, email, password) VALUES(?,?,?,?,?)");
         $insert_user_register->execute([$firstname, $lastname, $contact, $email, $password]);
         $select_user_register = $conn->prepare("SELECT * FROM `user_register` WHERE email = ? AND password = ?");
         $select_user_register->execute([$email, $password]);
         $row = $select_user_register->fetch(PDO::FETCH_ASSOC);

         if($select_user_register->rowCount() > 0){
            $_SESSION['user_id'] = $row['id'];
            
            header('location:login.php?msg=User Registered Sucessfully');
            

         }

      }
   }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <link rel="stylesheet" type="text/css" href="CSS/register.css">
    <link href="CSS/common.css" rel="stylesheet">
    
   
    <!--icons link-->
    <link rel="stylesheet"
  href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
  

  <!--google font link-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?
  family=Poppins:wght@300;400;500;600;700;800;900&family=Roboto+Slab:wght@100;200;300;400;500;600&family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">
</head>
<body>

    <!--header section start-->

    <header>
        <a href="index.php" class="btn">Home</a>
     </header>  
     <!--header section end-->
     <

    <div class="container">
        <div class="main-box">
            <h1>Create Your Account!</h1>
            <form action="" method="post">
                <div class="input-box">
                    <input type="text" name="firstname" required>
                    <label>First Name</label>
                </div>

                <div class="input-box">
                    <input type="text" name="lastname" required>
                    <label>Last Name</label>
                </div>

                <div class="input-box">
                    <input type="tel" name="contact" required>
                    <label>Contact Number</label>
                </div>


                <div class="input-box">
                    <input type="email" name="email" required>
                    <label>Email</label>
                </div>

                <div class="input-box">
                    <input type="password" name="password" required>
                    <label>Password</label>
                </div>



                <button type="submit" name="submit" class="btn1">Register</button>

                <div class="register">
                    <p>Already have an account?<a href="login.php" class="register-link">Login Now !</a></p>
                   
                </div>


            </form>
        </div>
    </div>
    
</body>
</html>