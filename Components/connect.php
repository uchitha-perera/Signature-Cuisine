<?php

$db_name = 'mysql:host=localhost;dbname=food_db';
$user_name = 'root';
$user_password = '';

$conn = new PDO($db_name, $user_name, $user_password);

function show($data){
    echo '<pre>';

    print_r($data);

    echo '</pre>';
}

?>