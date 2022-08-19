<?php
        session_start();
        if($_SESSION['loggedIn'] != 1){
            header("Location: ../view/login.php");
        }
    ?>

<?php 
if(!isset($_SESSION)) {
    @ob_start();
    session_start();
}
include "../controller/subject_edit_confirm_controller.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Confirm update subject</title>
        <link rel="stylesheet" href="../../web/css/subject_update_style.css">
        <link rel="stylesheet" href="../../web/css/responsive.css">
    </head>
    
    <body>
        <div id="container" class="border">
            <div id="content">
                <!-- <form action="../controller/subject_edit_complete_controller.php" method="post" enctype="multipart/form-data"> -->
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- Ten mon hoc -->
                    <div class="row">
                        <div class="col-25">
                            <label for="subject">Tên môn học</label>
                        </div>
                        <div class="col-75 pad-right">
                            <label id="subject" name="subject" class="border "><?php echo $_SESSION['subject'] ?></label>
                        </div>
                    </div>

                    <!-- Khoá -->
                    <div class="row">
                        <div class="col-25">
                            <label for="school_year">Khoá</label>
                        </div>
                        <div class="col-75 pad-right">
                            <label id="school_year" name="school_year" class="border">
                            <?php
                                    $content = "";
                                    foreach($_SESSION['school_year'] as $code) {
                                            $content .= "Năm ".$code.", ";
                                    }
                                    echo rtrim(trim($content),",");
                            ?>
                            </label>
                        </div>
                    </div>

                    <!-- Mo ta chi tiet -->
                    <div class="row">
                        <div class="col-25">
                            <label for="description">Mô tả chi tiết</label>
                        </div>
                        <div class="col-75">
                            <label id="description" name="description" class="txt-area border"><?php echo $_SESSION['description'] ?></label>
                        </div>
                    </div>
                    
                    <!-- Avatar -->
                    <div class="row">
                        <div class="col-25">
                            <label for="avatar">Avatar</label>
                        </div>
                        <div class="col-75">
                            <img src="<?php echo $_SESSION['target_file'] ?>" id="avatar" data-name="avatar" class="avt-area border mrg-top">
                        </div>
                    </div>

                    <!-- Xac nhan -->
                    <div class="row">
                        <div class="col-50 wrapp1">
                            <input type="submit" name="back" value="Sửa lại">
                        </div>
                        <div class="col-50 wrapp2">
                            <input type="submit" name="submit" value="Sửa">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>