
<?php

include('./Components/connect.php');

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

if(isset($_POST['submit'])){

   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);

   $password = sha1($_POST['password']);
   $password = filter_var($password, FILTER_SANITIZE_STRING);

   $select_user_register = $conn->prepare("SELECT * FROM `user_register` WHERE email = ? AND password = ?");
   $select_user_register->execute([$email, $password]);
   $row = $select_user_register->fetch(PDO::FETCH_ASSOC);



   if($select_user_register->rowCount() > 0){

    // show($row);
      $_SESSION['user_id'] = $row['user_id'];



    // show($user_id);
      
      echo '<script type="text/javascript">
              alert("Login successful!");
              window.location.href = "index.php";
            </script>';
      
   }else{
    echo '<script>alert("Incorrect Email or Password! Please try again!");</script>';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <?php

        if(isset($_GET['message'])){
            echo '<script>alert("'. $_GET['message'] .'");</script>';
        }


?>

    <link rel="stylesheet" type="text/css" href="CSS/login.css">
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


    <div class="container">
        <div class="main-box">
            <h1>Log In</h1>
            <form action="" method="post">
                <div class="input-box">
                    <span class="icon"><i class='bx bxs-envelope'></i></span>
                    <input type="email" name="email" required>
                    <label>Email</label>
                </div>

                <div class="input-box">
                    <span class="icon"><i class='bx bxs-lock-alt' ></i></span>
                    <input type="password" name="password" required>
                    <label>Password</label>
                </div>

                <div class="check">
                    <label><input type="checkbox">Remember me</label>
                    <a href="#">Forget Password</a>
                </div>

                <button type="submit" name="submit" class="btn1">Login</button>

                <div class="register">
                    <p>Don't have an account?<a href="register.php" class="register-link">Register Now!</a></p>
                   
                </div>

            </form>
        </div>
    </div>
    
</body>
</html>