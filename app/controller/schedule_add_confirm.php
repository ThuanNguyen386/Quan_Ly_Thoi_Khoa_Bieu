<?php 
require_once('../model/subject_schedule.php');
require_once('../model/teacher.php');
if(!isset($_SESSION)) {
        @ob_start();
        session_start();
    }
$data = isset($_SESSION['add-schedule']) ? $_SESSION['add-schedule'] : [];
if(isset($_REQUEST['add-new-schedule'])){
        
            header('location: schedule_add_complete.php');
        }

$subjectName = searchNameSubject($data[1]); 
$teacherName = searchNameTeacher($data[2]);
