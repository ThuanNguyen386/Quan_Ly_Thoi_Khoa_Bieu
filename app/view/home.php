
<!DOCTYPE html>
<?php
	session_start();
	require '../controller/login.php';
	require '../controller/home.php';
	if($_SESSION['loggedIn'] != 1){
		header("Location: ../view/login.php");
	}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../web/css/cuoiki.css">
    <title>Document</title>
</head>
<body>
    
    <div class="timetable">
        <div class="form">
            <div class="main">
                <div class="element">
                    <p>Tên login: <?php echo $_SESSION['name'];?></p>
                </div>
                <div class="element">
                    <p>Thời gian login: <?php echo $_SESSION['time'];?>
                    </p>
                </div>
                <div class="element">
					<label><b>Phòng học</b></label>
                    <label><b>Giáo viên</b></label>
                    <label><b>Môn học</b></label>
                    <label><b>Thời khóa biểu</b></label>               
                </div>
                <div class="element">
					<label><a href="path">Tìm kiếm</a> </label>
                    <label><a href="../view/search_teacher.php">Tìm kiếm</a> </label>
                    <label><a href="../view/subjects_search.php">Tìm kiếm</a></label>
                    <label><a href="path">Tìm kiếm</a></label>
                </div>
                <div class="element">
					<label><a href="path">Thêm mới</a> </label>
                    <label><a href="add_teacher.php">Thêm mới</a> </label>
                    <label><a href="../controller/SubjectAdd.php">Thêm mới</a> </label>
                    <label><a href="schedule_add_input.php">Thêm mới</a> </label>
                </div>
<a href="../view/edit_schedule_create.php?id=11">
                <button type="button" class="btn-submit">Sửa</button>
            </a>
				<div class="element">
                    <a href="../view/password_reset.php">Reset password</a>
                </div>
                <div class="element">
                    <form method="POST"><button type="submit" class="btn-submit" name= "login-submit">Đăng xuất</button></form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
