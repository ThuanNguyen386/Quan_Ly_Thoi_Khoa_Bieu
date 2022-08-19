<?php
        session_start();
        if($_SESSION['loggedIn'] != 1){
            header("Location: ../view/login.php");
        }
    ?>
<?php
    require "../controller/password_reset_controller.php";
    $listadmin= getLoginid();
	session_start();
	

?>
<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="../../web/css/password.css" rel="stylesheet">
</head>
<body>
    
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th class="no">NO</th>
                    <th class="user">Tên người dùng</th>
                    <th class="password">Mật khẩu mới</th>
                    <th class="action" >Action</th>
                </tr>
            </thead>
              
            <tbody>
                <?php 
                    for( $i = 0; $i<count($listadmin); $i++){
                ?>
                    <form class="form" action="" method="POST">
                    <tr>
						
                        <td class="no"><?php echo $i+1 ?></td>
                        <td class="user"><?php echo $listadmin[$i]->login_id ?></td>
                        <td class="password"><input type="password" name="newpassword<?php echo $listadmin[$i]->id ?>"></td>
                        <td class="action"><input type="submit" name="resetnewpw<?php echo $listadmin[$i]->id;?>" value="Reset"></td>
                    </tr>
                    <tr>
                        <td class="no"></td>
                        <td class="user"></td>
                        <td class="error"><span><?php echo $passErr[$listadmin[$i]->id];?></td>
                    <td class="action"></td>
                    </tr>
                    </form>
                <?php
                    }
                ?>
            </tbody>
        </table>
		<center><div class="element">
                    <a href="../view/home.php"><?php $_SESSION['loggedIn']= 1?>Home</a>
        </div></center>
    </div>
</body>
</html>