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

    <link rel="stylesheet" href="../../web/css/base.css">
    <link rel="stylesheet" href="../../web/css/create.css">
    <title>Document</title>
</head>
<body>
    <?php require_once '../controller/edit_schedule_create.php'; ?>
    <div class="timetable">
        <form action="" class="form" method = "POST">
            <div class="main">
                <div class="element">
                    <p class="message-error"><?php
                        $result = isset($_SESSION['edit-schedule']) ? $_SESSION['edit-schedule'] : '';
                        echo $result;
                        
                    ?></p>
                </div>
                <div class="element">
                    <label for="khoa-hoc">Khóa</label>
                    <select id="khoa-hoc" class="select-element" name="khoa-hoc">
                            <option value="" name="khoa-hoc">Chọn khóa học</option>
                            <option value="1" name="khoa-hoc"<?php if ($schedule['school_year'] == 1) echo ' selected';?>>Năm 1</option>
                            <option value="2" name="khoa-hoc"<?php if ($schedule['school_year'] == 2) echo ' selected';?>>Năm 2</option>
                            <option value="3" name="khoa-hoc"<?php if ($schedule['school_year'] == 3) echo ' selected';?>>Năm 3</option>
                            <option value="4" name="khoa-hoc"<?php if ($schedule['school_year'] == 4) echo ' selected';?>>Năm 4</option>
                        </select>
                </div>
                <div class="element">
                    <label for="select-subject">Môn học</label>
                    <select name="subject" class="select-element" id="select-subject">
                        <option value="" >Chọn môn học</option>
                        <?php 
                            foreach($allSubject as $row): ?>
                                <option value="<?php  echo $row['id']; ?>" name="subject"<?php if ($schedule['subject_id'] == $row['id']) echo ' selected';?>><?php echo $row['name']; ?></option>
                            <?php endforeach;
                        ?>
                    </select>
                </div>
                <div class="element">
                    <label for="select-teacher">Giáo viên</label>
                    <select name="teacher" class="select-element" id="select-teacher">
                        <option value="" >Chọn giáo viên</option>
                            <?php 
                                foreach($allTeacher as $row): ?>
                                    <option value="<?php  echo $row['id']; ?>" name="teacher"<?php if ($schedule['teacher_id'] == $row['id']) echo ' selected';?>><?php echo $row['name']; ?></option>
                                <?php endforeach;
                            ?>
                    </select>
                </div>
                <div class="element">
                    <label for="select-days">Thứ</label>
                    <select name="day" class="select-element" id="select-days">
                        <option value="" name="day">Chọn ngày</option>
                        <option value="Thứ 2" name="day"<?php if ($schedule['week_day'] == 'Thứ 2') echo ' selected';?>>Thứ 2</option>
                        <option value="Thứ 3" name="day"<?php if ($schedule['week_day'] == 'Thứ 3') echo ' selected';?>>Thứ 3</option>
                        <option value="Thứ 4" name="day"<?php if ($schedule['week_day'] == 'Thứ 4') echo ' selected';?>>Thứ 4</option>
                        <option value="Thứ 5" name="day"<?php if ($schedule['week_day'] == 'Thứ 5') echo ' selected';?>>Thứ 5</option>
                        <option value="Thứ 6" name="day"<?php if ($schedule['week_day'] == 'Thứ 6') echo ' selected';?>>Thứ 6</option>
                        <option value="Thứ 7" name="day"<?php if ($schedule['week_day'] == 'Thứ 7') echo ' selected';?>>Thứ 7</option>
                        <option value="Chủ nhật" name="day"<?php if ($schedule['week_day'] == 'Chủ nhật') echo ' selected';?>>Chủ nhật</option>
                    </select>
                </div>
                <div class="element">
                    <label for="list_lesson">Tiết học</label>
                    <ul id="list_lesson">
                        <li class="item_lesson">
                            <input
                             id="tiet-hoc-1"
                            type="checkbox" 
                            <?php
                             if (in_array("1", $content)) {echo ' checked';}
                              ?>
                            name="tiethoc[]" 
                            value="1">
                            <label for="tiet-hoc-1">Tiết 1</label>
                        </li>
                        <li class="item_lesson">
                            <input id="tiet-hoc-2" <?php
                             if (in_array("2", $content)) {echo ' checked';}
                              ?> type="checkbox" name="tiethoc[]" value="2">
                            <label for="tiet-hoc-2">Tiết 2</label>
                        </li>
                        <li class="item_lesson">
                            <input id="tiet-hoc-3" <?php
                             if (in_array("3", $content)) {echo ' checked';}
                              ?> type="checkbox" name="tiethoc[]" value="3">
                            <label for="tiet-hoc-3">Tiết 3</label>
                        </li>
                        <li class="item_lesson">
                            <input id="tiet-hoc-4" <?php
                             if (in_array("4", $content)) {echo ' checked';}
                              ?> type="checkbox" name="tiethoc[]" value="4">
                            <label for="tiet-hoc-4">Tiết 4</label>
                        </li>
                        <li class="item_lesson">
                            <input id="tiet-hoc-5" 
                            <?php
                             if (in_array("5", $content)) {echo ' checked';}
                              ?>
                             type="checkbox" name="tiethoc[]" value="5">
                            <label for="tiet-hoc-5">Tiết 5</label>
                        </li>
                        <li class="item_lesson">
                            <input id="tiet-hoc-6" <?php
                             if (in_array("6", $content)) {echo ' checked';}
                              ?> type="checkbox" name="tiethoc[]" value="6">
                            <label for="tiet-hoc-6">Tiết 6</label>
                        </li>
                        <li class="item_lesson">
                            <input id="tiet-hoc-7" 
                            <?php
                             if (in_array("7", $content)) {echo ' checked';}
                              ?>
                             type="checkbox" name="tiethoc[]" value="7">
                            <label for="tiet-hoc-7">Tiết 7</label>
                        </li>
                        <li class="item_lesson">
                            <input id="tiet-hoc-8" 
                            <?php
                             if (in_array("8", $content)) {echo ' checked';}
                              ?>
                               type="checkbox" name="tiethoc[]" value="8">
                            <label for="tiet-hoc-8">Tiết 8</label>
                        </li>
                        <li class="item_lesson">
                            <input id="tiet-hoc-9" 
                            <?php
                             if (in_array("9", $content)) {echo ' checked';}
                              ?>
                             type="checkbox" name="tiethoc[]" value="9">
                            <label for="tiet-hoc-9">Tiết 9</label>
                        </li>
                        <li class="item_lesson">
                            <input id="tiet-hoc-10"
                            <?php
                             if (in_array("10", $content)) {echo ' checked';}
                              ?>
                             type="checkbox" name="tiethoc[]" value="10">
                            <label for="tiet-hoc-10">Tiết 10</label>
                        </li>
                    </ul>
                </div>
                <div class="element">
                    <label for="description">Chú ý</label>
                    <textarea name="description" id="description" cols="30" rows="3"><?php echo $contentNote;?></textarea>
                </div>
                <div class="element">
                    <button type="submit" class="btn-submit" name= "confirm" >Xác nhận</button>
                </div>
                <div class="element">
                    <a href="?router=home">Trở về trang chủ</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>