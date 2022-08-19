<?php
?>
<html>
<head>
	<title>Đăng ký Môn học</title>
	<meta charset=UTF-8>
    <link rel="stylesheet" href="../../web/css/SubjectAdd.css">
    <script type="text/javascript" async src="../../web/js/SubjectAddRealFileBtn.js"></script>
</head>
<body>
    <form method="post" enctype="multipart/form-data" >   
        <?php if(getError('name')) {?>
            <span class="error"><?php  echo getError('name'); ?></span><br>
        <?php } ?>
        <label class="input-form" for="name">Tên môn học</label>
        <input id="name" type="text" name="subject_add_name" maxlength="100" value="<?php getValue($name, 'name');?>"><br>        
        
        <?php if(getError('school_year')) {?>
            <span class="error"><?php  echo getError('school_year'); ?></span><br>
        <?php } ?>
        <label class="input-form" for="school_year">Khóa học</label>
        <input id="school_year" type="text" name="subject_add_khoa" maxlength="250" value="<?php getValue($school_year, 'school_year');?>"><br>        
        
        <?php if(getError('description')) {?>
            <span class="error"><?php  echo getError('description'); ?></span><br>
        <?php } ?>
        <label class="input-form" for="description">Mô tả chi tiết</label>
        <textarea id="description" name="subject_add_des" maxlength="1000"><?php getValue($description, 'description');?></textarea><br>        
        
        <?php if(getError('avatar')) {?>
            <span class="error"><?php  echo getError('avatar'); ?></span><br>
        <?php } ?>
        <label class="input-form" for="avatar">Avatar</label>
        <input type="file" id="real-file" name="upload-file" hidden="hidden" accept="image/*"/>
        <input id="custom-text" type="text" name="subject_add_name_ava" readonly="readonly" value="<?php getValue($avatar, 'nameAvatar');?>">
        <button type="button" id="custom-button">Browse</button><br>
        
        <div class="button-submit">
            <button class="center-block" type="submit" name='submit' formaction="<?php isConfirm(); ?>">Xác Nhận</button>    
        </div>      
  </form>
</body>
</html>