<?php
    require ("../model/admin.php");
    $nameErr="";
    $name="";
    if($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST["forgot_pass"])) {
            if (empty($_POST['name_id'])) {
                $nameErr = "Hãy nhập login id";
            } else {
                $name = $_POST["name_id"];
            }
            if (0< strlen($_POST['name_id']) && strlen($_POST['name_id'])< 4) {
                $nameErr = "Hãy nhập login id tối thiểu 4 ký tự";
            }else{
            
                $result= checkLoginid($_POST['name_id']) ->rowCount();
                if(strlen($_POST['name_id'])> 3){
                    if($result> 0){
                        $token= microtime();
                        updateRequestToken($_POST['name_id'],$token);
                        header('location:../view/login.php');
                    }else{
                        $nameErr="Login id không tồn tại trong hệ thống";
                    }
                }
            }
        }
    }

?>