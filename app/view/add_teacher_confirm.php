
<?php
        session_start();
        if($_SESSION['loggedIn'] != 1){
            header("Location: ../view/login.php");
        }
    ?>
<?php
 require_once '../controller/add_teacher_confirm.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../web/css/confirm_add.css">
    <link rel="stylesheet" href="../../web/css/mystyle_add.css">
    <link rel="stylesheet" href="../../web/css/base_add.css">
    <link rel="stylesheet" href="../../web/css/create_add.css">
    <title>Đăng ký giáo viên</title>
</head>
<body>

<div class="container">
        <form method='post' action='' enctype='multipart/form-data'>        
        <!-- <form method='post' action='' enctype='multipart/form-data'>         -->
            <div class="from-from">
                <div class="from-from__group">
                    <span class="from-from__label"> Họ và Tên </span>
                    <span class="from-from__input"><?php echo $data['name'] ?></span>
                </div>
                <div class="from-from__group">
                    <span class="from-from__label"> Bộ môn </span>
                    <span class="from-from__input"><?php echo $data['specializes'][$data['specialized']] ?></span>
                </div>
                <div class="from-from__group">
                    <span class="from-from__label"> Học vị </span>
                    <span class="from-from__input"><?php echo $data['degrees'][$data['degree']] ?></span>
                </div>
                <div class="from-from__group">
                    <span class="from-from__label">Mô tả thêm</span>
                    <span class="from-from__input"><?php  echo $data['description'] ?></span>
                    
                </div>
          
                <div class="from-from__group from-from__group--re">
                    <span class="from-from__label">Avata</span>
                    <div class="from-from__group-avatar">
                    
                    <div class="from-from__group-image">
                    <!-- <?php echo $_SESSION['filename']?> -->
                    <!-- <img src="upload/tmp/" height="100" width="100" alt=""> -->
                    <img src="../../web/avatar/teachers/tmp/<?php echo $_SESSION['filename']?>" height="100" width="100" alt="">
                    </div>
                </div>
             

                <div class="from-from__group from-from__group--center">
                <input type="submit" name="btn_submit" class="from-from__btn from-from__submit" value="Đăng ký">
             
                <input type="submit" name="btn_edit" class="from-from__btn from-from__submit" value="Sửa lại">
                </div>

            </div>
           
            </div>
        </form>
    </div>

</body>
</html>