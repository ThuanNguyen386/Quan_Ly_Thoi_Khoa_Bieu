<?php
session_start();
require '../controller/login.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../web/css/cuoiki.css">
    <title>TimeTable</title>
    
</head>
<body>
       <div class="timetable">
        <form class="form" method="POST">
            <div class="main">
                <div class="element">
                   <p class="message-error"><?php echo $error; ?></p>
                </div>
                <div class="element">
                    <label for="login-user">Tên đăng nhập</label>
                    <input id="name" type="text" class="input-element" name="name">
                </div>
                <div class="element">
                    <label for="login-password">Mật khẩu</label>
                    <input id="password" type="password" class="input-element" name="password">
                </div>
                <div class="element">
                    <a href='../view/password_request.php'>Quên password</a>
                </div>
                <div class="element">
                    <button type="submit" class="btn-submit" name= "login-submit">Đăng nhập</button>
                </div>
            </div>
        </form> 
       </div>
</body>

</html>