<?php
   
    if(!isset($_SESSION)) {
        @ob_start();
        session_start();
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if(isset($_POST['back'])){
            header('location: ../view/subject_edit_input.php');
        }
        if(isset($_POST['submit'])) {
            // header('location: ../view/subject_edit_complete.php');
            require_once '../controller/pre_subject_edit_complete.php';
        }
    }
?>