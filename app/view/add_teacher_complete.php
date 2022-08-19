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

    <link rel="stylesheet" href="./web/css/base.css">
    <link rel="stylesheet" href="./web/css/complete.css">
    <title>Đăng ký giáo viên</title>
</head>
<body>
    <form action="" class="form">
        <div class="content">
        <?php   
            $result= isset($_SESSION['Msg-add-teacher']) ? $_SESSION['Msg-add-teacher'] :' '  ;
            echo $result;
        ?>
        <p> Bạn đã đăng ký thành công giáo viên </p>
        <a href="home.php" class="notification">Trở về trang chủ</a>
        </div>
    </form>
    
</body>
</html>