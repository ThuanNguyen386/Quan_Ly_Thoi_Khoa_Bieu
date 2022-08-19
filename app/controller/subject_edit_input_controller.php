<?php
if(!isset($_SESSION)) {
    @ob_start();
    session_start();
}
    $school_years = [1=>"Năm 1", 2=>"Năm 2", 3=>"Năm 3", 4=>"Năm 4"];
    $errors = ["subject"=>"Hãy nhập tên môn học", 
                "school_year"=>"Hãy chọn khóa học", 
                "description"=>"Hãy nhập mô tả chi tiết",
                "browser-text"=>"Hãy chọn avatar"
                ];

    if (isset($_SESSION['confirm'])) {
        $school_years = [1=>"Năm 1", 2=>"Năm 2", 3=>"Năm 3", 4=>"Năm 4"];
        $subject =  $_SESSION['subject'];
        $school_year =  $_SESSION['school_year'];
        $description =  $_SESSION['description'];
        $browser_text =  $_SESSION['browser-text'];
        $src = $_SESSION['target_file'];
        // require_once '../view/subject_edit_confirm.php';
    }
    
    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit']) && !in_array('',array_values($_POST))) {
        if(isset($_POST['school_year']) && !empty($_POST['school_year'])){
            foreach ($_POST as $key => $val) {
                $_SESSION[$key] = $val; 
            }
            unset($_POST['tmp']);
            require_once 'pre_subject_edit_confirm.php';
        }
    }
    
    // loi input ten mon hoc
    if (isset($_POST['subject'])) {
        if (empty(trim($_POST['subject']))) {
            $er_subject = $errors['subject'];
        }
        if (strlen($_POST['subject'])>=100) {
            $er_subject = "Không nhập quá 100 ký tự";
        }
    }
     
    // gia tri ten mon hoc
    if(isset($_POST['subject'])) {
        $val_subject = $_POST['subject'];
    }
    else if(isset($subject)) {
        $val_subject = $subject;
    }
    
    // gia tri khoá hoc
    if (isset($_POST['submit'])) {
        if(!isset($_POST['school_year']) ||  empty($_POST['school_year'])){
            $er_schoolyear = $errors['school_year'];
        }
        if (empty($_POST['school_year'])) {
            unset($school_year);
            $er_schoolyear = $errors['school_year'];
        }
    }

    
    // gia tri mo ta
    if (isset($_POST['description'])) {
        if (empty(trim($_POST['description']))) {
            $er_desc = $errors['description'];
        }
        if (strlen($_POST['description'])>=1000) {
            $er_desc = "Không nhập quá 1000 ký tự";
        }
    } 
    

    // hien thi anh
    if(isset($_POST['browser-text']) && !empty($_POST['browser-text'])) {
        if (in_array('',array_values($_POST))) {
            $src = $_POST['tmp'];
        }
        if(!isset($_POST['school_year']) ||  empty($_POST['school_year'])){
            $src = $_POST['tmp'];
        }
    }
    
    // loi chon file anh
    if(isset($_POST['submit'])) {
        //  khong chon file hoac file bi loi
        if(!isset($_FILES['browser']) || (isset($_FILES['browser']) && $_FILES['browser']['error']>0)) {
            $browser_text = '';
        }
    }
    if (isset($_POST['browser-text']) && empty($_POST['browser-text'])) {
        $er_browser = $errors['browser-text'];
    }
    if(isset($_POST['browser-text']) && !empty($_POST['browser-text'])){
        if(!isset($_POST['school_year']) ||  empty($_POST['school_year'])){
            $er_browser = "Vui lòng điền đầy đủ các trường trên và chọn lại file";
        }
        if(in_array('',array_values($_POST))) {
            $er_browser = "Vui lòng điền đầy đủ các trường trên và chọn lại file";
        }
    }

    // gia tri ten anh
    if(isset($_POST['browser-text']) && !empty($_POST['browser-text'])) { 
        $oldfile = $_POST['browser-text'];
    }
    $_POST['browser-text']='';
    if(isset($browser_text) && !empty($browser_text)) {
        $oldfile = $browser_text;
    }    

    require_once '../view/subject_edit_input.php';

?>