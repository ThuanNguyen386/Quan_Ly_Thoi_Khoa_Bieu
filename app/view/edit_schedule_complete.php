<?php
        session_start();
        if($_SESSION['loggedIn'] != 1){
            header("Location: ../view/login.php");
        }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../web/css/base.css">
    <link rel="stylesheet" href="../../web/css/complete.css">
    <title>Document</title>
</head>
<body>
        <?php require_once '../controller/edit_schedule_complete.php'; ?>

    <div class="content" style="width: 100 ; height: 100; background-color: 'red'; ">
        <?php   
            $result= isset($_SESSION['edit-schedule-complete-notifi']) ? $_SESSION['edit-schedule-complete-notifi'] :''  ;
            echo $result;
        ?>
        <a href="../view/home.php" class="notification">Trở lại trang chủ</a>
        </div>
    
</body>
</html>