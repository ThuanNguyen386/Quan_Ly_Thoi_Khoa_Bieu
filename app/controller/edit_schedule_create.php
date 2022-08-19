<?php
require_once('../model/schedule.php');
require_once('../model/subject_schedule.php');
require_once('../model/teacher.php');
if(!isset($_SESSION)) {
        @ob_start();
        session_start();
    }
$_SESSION['edit-schedule'] = '';
        if(isset($_REQUEST['confirm'])){
            if(empty($_REQUEST['khoa-hoc'])){
                $_SESSION['edit-schedule']="Hãy chọn khóa học";
            }
            else if(empty($_REQUEST['subject'])){
                $_SESSION['edit-schedule']="Hãy chọn môn học";
            }
            else if(empty($_REQUEST['teacher'])){
                $_SESSION['edit-schedule']="Hãy chọn giáo viên";
            }
            else if(empty($_REQUEST['day'])){
                $_SESSION['edit-schedule']="Hãy chọn thứ";
            }
            else if(empty($_REQUEST['tiethoc'])){
                $_SESSION['edit-schedule']="Hãy chọn tiết học";
            }
            else if(empty(trim($_REQUEST['description']))){
                $_SESSION['edit-schedule']="Hãy nhập chú ý";
            }
            else{
                $khoa = $_REQUEST['khoa-hoc'];
                $subject = $_REQUEST['subject'];
                $teacher = $_REQUEST['teacher'];
                $day = $_REQUEST['day'];
                $lesson = $_REQUEST['tiethoc'];
                $description = $_REQUEST['description'];
                $_SESSION['edit-schedule'] =[$khoa, $subject,  $teacher, $day , $lesson, $description];
                header('location: edit_schedule_confirm.php');
            }
        }
$allSubject = searchAllSubject();
$allTeacher = searchAllTeacher();
$id = $_GET['id'];

if ($id) {
    $_SESSION['edit-schedule-id'] = $id;
}

$schedule = get($id);



$file = $schedule['lesson'] ?? null;
$note = $schedule['notes'] ?? null;
$path = '../../web/file/lesson/' . $file;
$pathNote = '../../web/file/note/' . $note;

$content = file_get_contents($path);
$content = preg_split('/\n/', trim($content));
$contentNote = file_get_contents($pathNote);
?>