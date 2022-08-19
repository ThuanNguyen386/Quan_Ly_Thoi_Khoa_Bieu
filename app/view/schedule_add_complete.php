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
    <form action="" class="form">
        <div class="content">
            <?php
            $result = isset($_SESSION['add-schedule-complete-notifi']) ? $_SESSION['add-schedule-complete-notifi'] : '';
            echo $result;
            ?>
            <p>Bạn đã đăng kí thành công thời khóa biểu</p>
            <a href="../view/home.php" class="notification">Trở lại trang chủ</a>
        </div>
    </form>

</body>

</html>