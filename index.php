<?php

session_start();

if(isset($_SESSION['name']) && isset($_SESSION['phone'])){

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
    <title>ChatRoom</title>
</head>

<body>

    <div id="main">

        <div id="user">
            <div class="first">
                <i class="fa-solid fa-user"></i>
                <span id="user-name"><?= $_SESSION['name'] ?> </span>
            </div>

            <div class="second">
                <p><b>ChatRoom</b></p>
            </div>
        </div>

        <div id="msg">

            <!-- <div class="message">
                <span>~User</span>
                <p>Hi</p>
            </div>

            <div class="sender">
                <span>~User</span>
                <p>Hi how are you doing?</p>
            </div> -->

        </div>

        <form action="addmsg.php" method="post" id="msgform">

            <input type="text" name="message" id="actualmsg" placeholder="Enter your message">
            <button id="msgbtn">Send</button>

        </form>

    </div>

    <script src="js/script.js"></script>

</body>

</html>

<?php

}

else{
    header("Location: login.php");
    exit;
}

?>