<?php
    session_start();
    if($_SESSION['loggedIn'] != 1){
            header("Location: ../view/login.php");
        }
    
    require_once "../../app/common/ErrorValidate.php";
    require_once "../../app/model/SubjectModel.php";
    function getUrl() {
        $urls = explode("/", filter_var(trim($_SERVER['PHP_SELF'], "/")));
        $url = "/";
        for($i = 0; $i < count($urls)-1; $i++){
            $url = $url . $urls[$i] . "/";
        }
        return $url;
    }
    $name = $school_year = $description = $avatar = null;
    $check = 0;
    subjectAddInput();
    function subjectAddInput() {
        global $name, $school_year, $description, $avatar;
        global $check;
        unset($_SESSION['check-subject-add-complete']);
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            load($_POST); 
            backhome();
            if(empty($name)) {
                $_SESSION['subject_add_name'] = null;
                addError('name', 'Hãy nhập tên môn học');
            } elseif(strlen($name) == 100) {
                addError('name', 'Không nhập quá 100 ký tự');
            } else {
                $_SESSION['subject_add_name'] = $name;
                $check++;
            }

            if(empty($school_year)) {
                $_SESSION['subject_add_khoa'] = null;
                addError('Khóa', 'Hãy nhập khóa học');
            } elseif(strlen($school_year) == 250) {
                addError('Khóa', 'Không nhập quá 250 ký tự');
            } else {
                $_SESSION['subject_add_khoa'] = $school_year;
                $check++;
            }

            if(empty($description)) {
                $_SESSION['subject_add_des'] = null;
                addError('description', 'Hãy nhập mô tả chi tiết');
            } elseif(strlen($description) == 1000) {
                addError('description', 'Không nhập quá 1000 ký tự');
            } else {
                $_SESSION['subject_add_des'] = $description;
                $check++;
            }
            
            if(empty($avatar)) {
                $_SESSION['subject_add_name_ava'] = null;
                addError('avatar', 'Hãy chọn avatar');
            } else {
                uploadAvatar();                  
            }
        }
    
        require_once "../../app/view/subject_add/SubjectAddInput.php";
    }
    function load($data) {
        global $name, $school_year, $leader, $description, $avatar;
        $name = testInput($data['subject_add_name']);
        $school_year = testInput($data['subject_add_khoa']);
        $description = testInput($data['subject_add_des']);
        $avatar = testInput($data['subject_add_name_ava']);
    }
    function testInput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }


    function isConfirm(){
        global $check;
        if ($check == 4 && isset($_POST['submit'])){
            $_SESSION['check-event-add-confirm'] = $check;
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                header('Location: ../../app/controller/SubjectConfirm.php');
            }
        }
    }
    function getValue($value, $nameValue){
        $res = null;
        if(!empty($value)){
            $res = $value;
        } elseif((isset($_SESSION['check-subject-add-confirm']) && $_SESSION['check-subject-add-confirm'] == 5) && isset($_SESSION[$nameValue])){
            $res =  $_SESSION[$nameValue]; 
        }
        echo $res;
    }
    function uploadAvatar(){
        global $avatar, $check;
        if(checkFileUpload()){
            if(isset($_SESSION['subject_add_ava']) && isset($_SESSION['subject_add_name__ava'])){
                if(!empty($_FILES["upload-file"]["name"]) &&
                $_SESSION['subject_add_name_ava'] != basename($_FILES["upload-file"]["name"])){
                    unlink($_SESSION['subject_add_ava']);
                }
            } 
    
            $target_dir = "../../web/avatar/subject/tmp/";
            $target_file   = $target_dir . basename($_FILES["upload-file"]["name"]);
            
            move_uploaded_file($_FILES["upload-file"]["tmp_name"], $target_file);
            $_SESSION['subject_add_ava'] =  $target_dir . $avatar;
            $_SESSION['subject_add_name_ava'] = $avatar;
            $check++; 
        }
    }


    function checkFileUpload(){
        $check_file = true;
        $maxfilesize = 524288000;

        $allowtypes = array('image/jpg', 'image/jpeg', 'image/jfif', 'image/pjpeg', 'image/pjp', 'image/webp', 
                            'image/png', 'image/svg', 'image/ico', 'image/cur', 'image/gif', 'image/apng');
        
        if(file_exists($_FILES["upload-file"]["tmp_name"])){
            if($_FILES["upload-file"]['error'] != 0) {
                $check_file = false;
            }
            if ($_FILES["upload-file"]["size"] > $maxfilesize){
                $check_file = false;
            }
            if (!in_array($_FILES["upload-file"]["type"],$allowtypes )){
                $check_file = false;
            }
        }

        return $check_file;
    }

    function backhome(){
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if(isset($_POST['back-home'])){
                header('Location:' . getUrl(). 'Login/home');
            }
        }
    }
?>