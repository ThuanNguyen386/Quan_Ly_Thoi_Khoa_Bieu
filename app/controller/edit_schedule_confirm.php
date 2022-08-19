<?php 
require_once('../model/subject_schedule.php');
require_once('../model/teacher.php');
if(!isset($_SESSION)) {
        @ob_start();
        session_start();
    }
$data = isset($_SESSION['edit-schedule']) ? $_SESSION['edit-schedule'] : [];
if(isset($_REQUEST['edit-new-schedule'])){
        
            header('location: edit_schedule_complete.php');
        }

$subjectName = searchNameSubject($data[1]); 
$teacherName = searchNameTeacher($data[2]); 
?>