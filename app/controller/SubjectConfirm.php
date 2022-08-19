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
$_SESSION['check-subject-add-confirm'] = 0;
    $name = $school_year = $description = $avatar = null;
    $check = 0;
    subjectAddConfirm();
    function subjectAddConfirm(){
        require_once "../../app/view/subject_add/SubjectAddConfirm.php";
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if(isset($_POST['submit-confirm'])) {
                
                if(isset($_SESSION['subject_add_name']) && isset($_SESSION['subject_add_khoa']) 
                && isset($_SESSION['subject_add_des'])
                && isset($_SESSION['subject_add_name_ava']) && isset($_SESSION['subject_add_ava'])) {
                    
                    $id = getIdEnd() + 1;
                    $target_dir = "../web/avatar/subject/".$id;
                    if(!file_exists($target_dir)){
                        mkdir($target_dir, 0777);
                    }
                    $tmp_file = $_SESSION['subject_add_ava'];
                    $target_file = $target_dir."/".basename($_SESSION['subject_add_name_ava']);
                    rename($tmp_file, $target_file);
                    $_SESSION['subject_add_ava'] = $target_file;
                    $check_add = add();
                    $_SESSION['check-subject-add-confirm'] = $check_add;

                }
                

                if($_SESSION['check-subject-add-confirm']==1){
                    unset($_SESSION['subject_add_name']);
                    unset($_SESSION['subject_add_khoa']);
                    unset($_SESSION['subject_add_des']);
                    unset($_SESSION['subject_add_avatar']);
                    unset($_SESSION['subject_add_name_avatar']);
                    // unset($_SESSION['check-subject-add-confirm']);
                    header('Location: SubjectComplete.php');
        }
            }
        }        
    }
?>