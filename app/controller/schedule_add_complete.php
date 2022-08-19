<?php 

    if(!isset($_SESSION)) {
        @ob_start();
        session_start();
    }

    $_SESSION['add-schedule-complete-notifi'] = "";
    $data = isset($_SESSION['add-schedule']) ? $_SESSION['add-schedule'] : [];

    $data[4] = createLessonFile($data[4]);
    $data[5] = createNoteFile($data[5]);
    $data[10] = $_SESSION['add-schedule-id'];
    require ("../model/schedule.php");
    insert($data);
     function createLessonFile($data){
        $lessonNameFile = "l". rand(1,99999) .".txt";
        $path = "../../web/file/lesson/". $lessonNameFile;
        $fp = @fopen($path, "w+");
        if(!$fp){
            $_SESSION['add-schedule-complete-notifi'] = "Không tạo được file";
        }
        else{
            foreach($data as $row){
                fwrite($fp, $row."\n");
            }
            fclose($fp);
        }
        return $lessonNameFile;

    }
     function createNoteFile($data){
        $noteNameFile = "n". rand(1,99999) .".txt";
        $path = "../../web/file/note/". $noteNameFile;
        $fp = @fopen($path, "w+");
        if(!$fp){
            $_SESSION['add-schedule-complete-notifi'] = "Không tạo được file";
        }
        else{
            
            fwrite($fp, $data);
            
            fclose($fp);
        }
        return $noteNameFile;
    };
    require_once '../view/schedule_add_complete.php';
