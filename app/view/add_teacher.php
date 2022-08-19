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
    
	<link rel="stylesheet" href="../../web/css/base_add.css">
    <link rel="stylesheet" href="../../web/css/mystyle_add.css">
    <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
    <script src="../../web/js/myscript_add.js"></script>

    <title>Đăng kí giáo viên</title>
</head>
<body>

<?php require_once '../controller/add_teacher.php'; ?>
<div class="container">
        <form method='post' action='' enctype='multipart/form-data'>        
        <!-- <form method='post' action='' enctype='multipart/form-data'>         -->
            <div class="from-from">
                
                <span class="from-from__msg"><?php echo $data['name_err']; ?></span>              
                <div class="from-from__group">
                    <span class="from-from__label">Họ và Tên</span>
                    <input value="<?= $data['name'] ?>" type="text" class="from-from__input" name="txt_name">
                </div>

                <span class="from-from__msg"><?php echo $data['specialized_err']; ?></span>
                <div class="from-from__group">
                    <span class="from-from__label">Bộ môn</span>
                    <select name="txt_specialized" id="" class="from-from__select">
                   
                    <?php
                       
                        foreach($data['specializes'] as $key => $value){
                    ?>
                    
                    <option value="<?php echo $key ?>" <?php if ($data['specialized'] == $key) { echo "selected";}?> ><?php echo $value ?></option>
                    <?php
                    }
                    ?>
                    </select>
                </div>
				
                <span class="from-from__msg"><?php echo $data['degree_err']; ?></span>
                <div class="from-from__group">
                    <span class="from-from__label">Học vị</span>
                    <select name="txt_degree" id="" class="from-from__select">                  

                    <?php
                       
                        foreach($data['degrees'] as $key => $value){
                    ?>
                    
                    <option value="<?php echo $key ?>" <?php if ($data['degree'] == $key) { echo "selected";}?> ><?php echo $value ?></option>
                    <?php
                    }
                    ?>
                    </select>
                </div>
				
                <span class="from-from__msg"><?php echo $data['description_err']; ?></span>
                <div class="from-from__group">
                    <span class="from-from__label">Mô tả thêm</span>
                    <textarea name="txt_description" class="from-from__input from-from__input-big"><?= $data['description'] ?></textarea>
                </div>

                <div class="row">
                        <div class="col-25">
                            <label for="avatar">Avatar</label>
                        </div>
                        <div class="col-75">
                            <input type="hidden" id="tmp" name="tmp" value="<?php if (isset($_POST['tmp'])) {echo ($_POST['tmp']);} ?>">
                            <img 
                                <?php if(isset($src)) echo ' src="'.$src.'"'; ?>
                                id="avatar" data-name="avatar" class="avt-area border mrg-top">
                            </img>
                        </div>
                    </div>

                    <input id="fileToUpload" name="fileToUpload" type='file' onchange="readURL(this);" />
                    <img id="blah" src="#" alt="your image" />
                    
                <div class="from-from__group from-from__group--center">
                <input type="submit" name="submit" class="from-from__btn from-from__submit" value="Xác nhận">
                <!-- <a href="?router=home" class="from-from__btn from-from__link">cancel</a> -->
               
            </div>     
            
            </div>
            
            </div>
        </form>
    </div>
    
  
</body>
  
</html>