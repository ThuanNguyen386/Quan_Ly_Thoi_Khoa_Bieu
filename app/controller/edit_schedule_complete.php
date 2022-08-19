<?php 

    if(!isset($_SESSION)) {
        @ob_start();
        session_start();
    }

    $_SESSION['edit-schedule-complete-notifi'] = "";
    $data = isset($_SESSION['edit-schedule']) ? $_SESSION['edit-schedule'] : [];

    $data[4] = createLessonFile($data[4]);// trả về tên file (tạo và ghi) tiết học 
    $data[5] = createNoteFile($data[5]); // trả về tên file (tạo và ghi) note
    $data[10] = $_SESSION['edit-schedule-id'];
    require ("../model/schedule.php");
    edit($data);

    // Tạo file chứa thông tin Tiết học và notes
     function createLessonFile($data){
        $lessonNameFile = "l". rand(1,99999) .".txt";
        $path = "../../web/file/lesson/". $lessonNameFile;
        $fp = @fopen($path, "w+");
        if(!$fp){
            $_SESSION['edit-schedule-complete-notifi'] = "Không tạo được file";
        }
        else{
            foreach($data as $row){
                fwrite($fp, $row."\n");
            }
            fclose($fp);
        }
        return $lessonNameFile;

    }

    //Tạo file chưa thông tin Note
     function createNoteFile($data){
        $noteNameFile = "n". rand(1,99999) .".txt";
        $path = "../../web/file/note/". $noteNameFile;
        $fp = @fopen($path, "w+");
        if(!$fp){
            $_SESSION['edit-schedule-complete-notifi'] = "Không tạo được file";
        }
        else{
            
            fwrite($fp, $data);
            
            fclose($fp);
        }
        return $noteNameFile;
    };
?>