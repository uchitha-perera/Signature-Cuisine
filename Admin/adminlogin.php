
<?php

include('../Components/connect.php');

session_start();

if(isset($_POST['submit'])){

   $username = $_POST['username'];
   //$username = filter_var($username, FILTER_SANITIZE_STRING);
   $password = sha1($_POST['password']);
   //$password = filter_var($password, FILTER_SANITIZE_STRING);

   $select_admin = $conn->prepare("SELECT * FROM `admin` WHERE name = ? AND password = ?");
   $select_admin->execute([$username, $password]);
   
   if($select_admin->rowCount() > 0){
      $fetch_admin_id = $select_admin->fetch(PDO::FETCH_ASSOC);
      $_SESSION['admin_id'] = $fetch_admin_id['id'];
      //header('location:dashboard.php');
      
      echo '<script type="text/javascript">
              alert("Login successful!");
              window.location.href = "dashboard.php";
            </script>';

   }else{
    echo '<script>alert("Incorrect Username or Password!");</script>';
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

        if(isset($_GET['msg'])){
            echo '<script>alert("'. $_GET['msg'] .'");</script>';
        }


?>

    <link rel="stylesheet" type="text/css" href="../Admin/adminCSS/adminlogin.css">
   
   
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



    <div class="container">
        <div class="main-box">
        <h1>Admin Panel</h1>
            <h1> Log In</h1>
            <form action="" method="post">
                <div class="input-box">
                    <span class="icon"><i class='bx bxs-user'></i></span>
                    <input type="text" name="username" required>
                    <label>Username</label>
                </div>

                <div class="input-box">
                    <span class="icon"><i class='bx bxs-lock-alt' ></i></span>
                    <input type="password" name="password" required>
                    <label>Password</label>
                </div>
                
                <button type="submit" name="submit" class="btn1">Login</button>

            </form>
        </div>
    </div>
    
</body>
</html>