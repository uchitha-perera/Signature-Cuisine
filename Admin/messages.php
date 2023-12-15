<?php

include '../Components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:adminlogin.php');
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_message = $conn->prepare("DELETE FROM `messages` WHERE id = ?");
   $delete_message->execute([$delete_id]);
   header('location:messages.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>messages</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" type="text/css" href = https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../Admin/adminCSS/admin_style.css">

</head>
<body>

<?php include '../includes/admin_header.php' ?>

<!-- messages section starts  -->

<section class="messages">

   <h1 class="heading">messages</h1>

   <div class="box-container">

   <?php
      $select_messages = $conn->prepare("SELECT * FROM `contact`");
      $select_messages->execute();
      if($select_messages->rowCount() > 0){
         while($fetch_messages = $select_messages->fetch(PDO::FETCH_ASSOC)){
   ?>
   <div class="box">
      <p> First Name : <span><?= $fetch_messages['firstname']; ?></span> </p>
      <p> Last Name : <span><?= $fetch_messages['lastname']; ?></span> </p>
      <p> Email : <span><?= $fetch_messages['email']; ?></span> </p>
      <p> Mobile : <span><?= $fetch_messages['mobile']; ?></span> </p>
      <p> Message : <span><?= $fetch_messages['message']; ?></span> </p>
      <a href="messages.php?delete=<?= $fetch_messages['id']; ?>" class="delete-btn" onclick="return confirm('delete this message?');">delete</a>
   </div>
   <?php
         }
      }else{
         echo '<p class="empty">you have no messages</p>';
      }
   ?>

   </div>

</section>

<!-- messages section ends -->









<!-- custom js file link  -->
<script src="../Admin/javascript/admin_script.js"></script>

</body>
</html>