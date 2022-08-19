<?php
    if(!isset($_SESSION)) {
        @ob_start();
        session_start();
    }
    require_once('../model/subject.php');

    $old_avatar = getImgName($_SESSION['id']);

    $stt = editSubject($_SESSION['id'], $_SESSION['subject'], $_SESSION['browser-text'], $_SESSION['description'], $_SESSION['school_year']);

    $old_avatar_path = '../../web/avatar/'.$old_avatar;
    
    /* Store the path of new uploaded image */
    $filePath = '../../web/avatar/tmp/'.$_SESSION['browser-text'];
    $destinationFilePath = '../../web/avatar/'.$_SESSION['browser-text'];
    
    /* Move File */
    if(!rename($filePath, $destinationFilePath) ) {  
        echo "File can't be moved!";  
    }  
    else {  
        // echo "File has been moved!";  
        // check if uploaded-file name and old-file name is NOT the same
        if(strcmp($old_avatar, $_SESSION['browser-text'])!=0){     
            echo 'loi 1';
            if (file_exists($old_avatar_path)) {
                unlink($old_avatar_path);
                // echo "File Successfully Delete.";
                unset($_SESSION['confirm']);
                header('location: ../view/subject_edit_complete.php');
            }
            else{
                echo "File does not exists"; 
            }
        } 
        header('location: ../view/subject_edit_complete.php');
        unset($_SESSION['confirm']);
    }
?>