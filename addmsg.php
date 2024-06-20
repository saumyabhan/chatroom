<?php

session_start();
require 'db.php';

if(isset($_POST['message'])){

$name = $_SESSION['name'];
$message = $_POST['message'];

$check = "SELECT * FROM `user` WHERE name = '$name'";
$resultcheck = mysqli_query($conn, $check);

if ($resultcheck){

    if(mysqli_num_rows($resultcheck) == 1){

        $add = "INSERT INTO `messages`(`sender`, `message`) VALUES ('$name','$message')";
        $result = mysqli_query($conn, $add);

    }

}

}

?>
