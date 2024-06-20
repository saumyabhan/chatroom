<?php
    session_start();

    require 'db.php';
    
    if(isset($_POST['name']) && isset($_POST['phone'])) {

        $name = $_POST['name'];
        $phone = $_POST['phone'];

        // Check if the user already exists
        $check = "SELECT * FROM `user` WHERE name = '$name' AND phone = '$phone'";
        $result = mysqli_query($conn, $check);

        if($result) {

            if(mysqli_num_rows($result) == 1) {

                $_SESSION['name'] = $name;
                $_SESSION['phone'] = $phone;

                header("Location: index.php");
                exit;

            }

            else{

                $checkphone = "SELECT * FROM `user` WHERE phone = '$phone'";
                $resultphone = mysqli_query($conn, $checkphone);

                if($resultphone) {

                    if(mysqli_num_rows($resultphone) == 1){
                        echo "<script>alert($phone + ' is already taken.')</script>";
                    }

                    else{

                        $insertuser = "INSERT INTO `user` (`name`, `phone`) VALUES ('$name', '$phone');";
                        $resultinsert = mysqli_query($conn, $insertuser);

                        if(!$resultinsert){
                            echo "error" . mysqli_error($conn);
                            exit;
                        }

                        else{

                            $_SESSION['name'] = $name;
                            $_SESSION['phone'] = $phone;
                            
                            header("Location: index.php");
                    
                            exit;
                        }
                    }
                }
            }
        }
        else{
            echo "Error: " . mysqli_close($conn);
            exit;
        }
    }
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

    <div id="login">

        <h2>ChatRoom</h2>

        <form action="" method="post" id="login-form">

        <div class="inputs">
            <i class="fa-solid fa-user"></i>
            <input type="text" name="name" id="" placeholder="Name" required>
        </div>

        <div class="inputs">
            <i class="fa-solid fa-phone"></i>
            <input type="number" name="phone" id="" placeholder="Phone" required>
        </div>

        <button type="submit">Sign In/Sign Up</button>

        </form>
    </div>
</body>

</html>