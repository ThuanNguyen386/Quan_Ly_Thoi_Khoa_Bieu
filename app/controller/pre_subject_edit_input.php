<?php
    if(!isset($_SESSION)) {
        @ob_start();
        session_start();
    }
    
    require_once('../model/subject.php');

    if (isset($_GET['id'])){
        $_SESSION['id'] = $_GET['id'];
    }

    $school_years = [1=>"Năm 1", 2=>"Năm 2", 3=>"Năm 3", 4=>"Năm 4"];
    $errors = ["subject"=>"Hãy nhập tên môn học", 
            "school_year"=>"Hãy chọn khóa học", 
            "description"=>"Hãy nhập mô tả chi tiết",
            "browser-text"=>"Hãy chọn avatar"
            ];

    if(!isset($_SESSION['confirm'])){
        $subjectObject = getSubject($_SESSION['id']);
        $val_subject =  $subjectObject['name'];
        $school_year =  explode(', ',$subjectObject['school_year']);
        $description =  $subjectObject['description'];
        $browser_text =  $subjectObject['avatar'];
        $src = '../../web/avatar/'.$browser_text;
    }
    require_once '../controller/subject_edit_input_controller.php';
?>