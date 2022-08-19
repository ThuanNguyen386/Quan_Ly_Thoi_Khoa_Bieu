<html>
<head>
	<title>Đăng ký môn học</title>
	<meta charset=UTF-8>
    <link rel="stylesheet" href="../../web/css/SubjectAdd.css">
    <script async src="../../web/js/SubjectAddPreviewImg.js"></script>
</head>
<body>
    <form method="post" action="">   

        <label class="input-form" for="name">Tên môn học</label>
        <label class="add-confirm"><?php echo $_SESSION['subject_add_name']?></label><br>        
        
        <label class="input-form" for="school_year">school_year</label>
        <label class="add-confirm"><?php echo $_SESSION['subject_add_khoa'];?></label><br>                     
       
        <label class="input-form" for="description">Mô tả chi tiết</label>
        <label id="des"><?php echo $_SESSION['subject_add_des'];?></label><br>         
        
        <label class="input-form" for="avatar">Avatar</label>
        <img id="output" src="<?php echo '../../web/avatar/subject/tmp/'.$_SESSION['subject_add_name_ava']; ?>"/>
        
        <div class="button-submit">
            <button class="center-block" name='back-page'  >Sửa lại</button>    
            <button class="center-block" name="submit-confirm" >Đăng ký</button>    
        </div>
  </form>
</body>
</html>