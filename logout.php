<?php

include('./Components/connect.php');

session_start();
session_unset();
session_destroy();

$logout_message = 'Logout successfully';

header('location:index.php?logout_message=' . urlencode($logout_message));


?>