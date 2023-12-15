<?php

include '../Components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:adminlogin.php');
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_reservation = $conn->prepare("DELETE FROM `reservation` WHERE user_id = ?");
   $delete_reservation->execute([$delete_id]);
   header('location:admin_reservation.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Reservations</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../Admin/adminCSS/admin_style.css">

</head>
<body>

<?php include '../includes/admin_header.php' ?>

<!-- messages section starts  -->

<section class="reserva">

   <h1 class="heading">Reservations</h1>

   <div class="box-container">

   <?php
      $select_reservation = $conn->prepare("SELECT * FROM `reservation`");
      $select_reservation->execute();
      if($select_reservation->rowCount() > 0){
         while($fetch_reservation = $select_reservation->fetch(PDO::FETCH_ASSOC)){
   ?>
   <div class="box">
      <p> Branch : <span><?= $fetch_reservation['branch']; ?></span> </p>
      <p> People : <span><?= $fetch_reservation['people']; ?></span> </p>
      <p> Time : <span><?= $fetch_reservation['time']; ?></span> </p>
      <p> Phone : <span><?= $fetch_reservation['phone']; ?></span> </p>
      <p> Date : <span><?= $fetch_reservation['date']; ?></span> </p>
      <p> Name : <span><?= $fetch_reservation['name']; ?></span> </p>
      <p> Email : <span><?= $fetch_reservation['email']; ?></span> </p>
      <p> Message : <span><?= $fetch_reservation['message']; ?></span> </p>
      <a href="admin_reservation.php?delete=<?= $fetch_reservation['user_id']; ?>" class="delete-btn" onclick="return confirm('delete this reservation?');">delete</a>
   </div>
   <?php
         }
      }else{
         echo '<p class="empty">you have no reservations</p>';
      }
   ?>

   </div>

</section>

<!-- messages section ends -->









<!-- custom js file link  -->
<script src="../Admin/javascript/admin_script.js"></script>

</body>
</html>