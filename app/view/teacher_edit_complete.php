<?php
	session_start();
	require('../controller/subjects_search_controller.php');
	if($_SESSION['loggedIn'] != 1){
            header("Location: ../view/login.php");
        }
?>
<html>

<head>
    <link rel="stylesheet" href="../../web/css/teacher_edit_styles.css">
</head>

<div class='complete'>
    <div class="complete_noti"> Bạn đã cập nhật thông tin giáo viên thành công </div>
    <a class="complete_noti home_url" href="../view/home.php"> <i> Trở về trang chủ </i> </a>
</div>

</html>