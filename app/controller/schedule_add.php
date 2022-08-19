<?php
require_once('../model/schedule.php');
require_once('../model/subject_schedule.php');
require_once('../model/teacher.php');
if(!isset($_SESSION)) {
        @ob_start();
        session_start();
    }
$_SESSION['add-schedule'] = '';
        if(isset($_REQUEST['confirm'])){
            if(empty($_REQUEST['khoa-hoc'])){
                $_SESSION['add-schedule']="Hãy chọn khóa học";
            }
            else if(empty($_REQUEST['subject'])){
                $_SESSION['add-schedule']="Hãy chọn môn học";
            }
            else if(empty($_REQUEST['teacher'])){
                $_SESSION['add-schedule']="Hãy chọn giáo viên";
            }
            else if(empty($_REQUEST['day'])){
                $_SESSION['add-schedule']="Hãy chọn thứ";
            }
            else if(empty($_REQUEST['tiethoc'])){
                $_SESSION['add-schedule']="Hãy chọn tiết học";
            }
            else if(empty(trim($_REQUEST['description']))){
                $_SESSION['add-schedule']="Hãy nhập chú ý";
            }
            else{
                $khoa = $_REQUEST['khoa-hoc'];
                $subject = $_REQUEST['subject'];
                $teacher = $_REQUEST['teacher'];
                $day = $_REQUEST['day'];
                $lesson = $_REQUEST['tiethoc'];
                $description = $_REQUEST['description'];
                $_SESSION['add-schedule'] =[$khoa, $subject,  $teacher, $day , $lesson, $description];
                header('location: schedule_add_confirm.php');
            }
        }
$allSubject = searchAllSubject();
$allTeacher = searchAllTeacher();
