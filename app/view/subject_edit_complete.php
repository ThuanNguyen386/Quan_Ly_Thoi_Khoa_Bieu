<?php
        session_start();
        if($_SESSION['loggedIn'] != 1){
            header("Location: ../view/login.php");
        }
    ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8 without BOM">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Complete update subject</title>
        <link rel="stylesheet" href="../../web/css/subject_update_style.css">
    </head>

    <body>
        <div id="container-complete" class="border" >
            <div id="messages" class="homepage">
                <div class="pad">
                    <tag>Bạn đã đăng ký thành công môn học.</tag>
                </div>
                <div class="pad">
                    <a href="../view/home.php" >Trở về trang chủ</a>
                </div>
            </div>
        </div>
    </body>
</html>
