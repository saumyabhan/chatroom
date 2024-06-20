<?php

    session_start();
    require 'db.php';

    $sql = "SELECT * FROM `messages`";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        
        while($row = mysqli_fetch_assoc($result)){
            
            if($row["sender"] == $_SESSION['name']){

    ?>

    <div class="sender">
        <span>~
            <?= $row["sender"] ?>
        </span>
        <p>
            <?= $row["message"] ?>
        </p>
    </div>

    <?php
            }
            else {
    ?>

    <div class="message">
        <span>~
            <?= $row["sender"] ?>
        </span>
        <p>
            <?= $row["message"] ?>
        </p>
    </div>

    <?php
    }
        }
    }
        else {
        echo "error";
        }
?>