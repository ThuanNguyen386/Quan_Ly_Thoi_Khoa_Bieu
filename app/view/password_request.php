
<?php
    require "../controller/password_request_controller.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="../../web/css/password.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <form class="form" method="POST" id="forgot_pass" action="" >
        <div class="row" align="center">
            <p class="error">
                <?php echo $nameErr;?>
            </p>
        </div>
        <div class="row">
            <div class="col-30" align="center">
                <label> Người dùng </label>
            </div>
            <div class-="col-60">
                <input type="text" name="name_id" value="<?php echo $name; ?>">
            </div>
        </div>

        <div class="row" align="center">
            <input type="submit" name ="forgot_pass" value="Gửi yêu cầu reset password"</input>
        </div>
    </form>
</div>
</body>
</html>