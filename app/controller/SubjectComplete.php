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
    subjectAddComplete();
    function subjectAddComplete(){
        require_once "../../app/view/subject_add/SubjectAddComplete.php";
        if ($_SESSION['check-subject-add-confirm']==0) {

            header('Location:' . getUrl(). 'SubjectAdd.php');
        } 
        
    }
?>