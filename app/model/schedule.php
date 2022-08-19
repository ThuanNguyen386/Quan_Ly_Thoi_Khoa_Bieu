<?php
include('../common/db.php');

 function insert($data){
        require '../common/db.php';
        $sql="INSERT INTO schedules(school_year, subject_id, teacher_id, week_day, lesson, notes) VALUES ('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]');"; 
        $data= $conn -> prepare($sql);
        $data->execute();
        $_SESSION['add-schedule-complete-notifi']= "Bạn đã tạo thêm thành công thời khóa biểu.";
    }

     function edit($data){
       require('../common/db.php');
        $sql="UPDATE schedules SET school_year = '$data[0]', subject_id = '$data[1]', teacher_id = '$data[2]', week_day = '$data[3]', lesson= '$data[4]', notes= '$data[5]'  WHERE  id = 11;";
        $data= $conn -> prepare($sql);
        $data->execute();
        $_SESSION['edit-schedule-complete-notifi']= "Bạn đã sửa thành công thời khóa biểu.";
    }

     function get(int $id)
    {
        require('../common/db.php');
        $stmt = $conn -> prepare("select * from schedules where id=:id");
        $stmt->bindParam(':id',$id);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        return $data;
    }




?>

