<?php
    require ("../model/admin.php");
    $password=$login_id="";
    $passErr[]="";
    $count=1;
    for($count= 0; $count<10000; $count++){
        error_reporting(0);
        if(isset($_POST["resetnewpw".$count])){
            if(strlen($_POST["newpassword".$count])== 0){
                $passErr[$count]="Hãy nhập mật khẩu mới";
            }
            else {
                $password= $_POST['newpassword'.$count];
                if(strlen($password) < 6){
                    $passErr[$count] = "Hãy nhập mật khẩu có tối thiểu 6 ký tự";
                }else{
                    date_default_timezone_set('Asia/Bangkok');
                    $current_time = date("Y-m-d h:i:s");
                    updatePassword($count,$password, $current_time);
                    $listadmin = getLoginid();
                }
            }
        }
    }
    require_once '../view/password_reset.php';
?>