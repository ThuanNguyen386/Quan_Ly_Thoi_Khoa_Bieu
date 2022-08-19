<?php 
if(!isset($_SESSION)) {
    @ob_start();
    session_start();

}
// require_once './app/views/add_subject_confirm.php';
$data = $_SESSION['data'];
$filename = $_SESSION['filename'];


            if (isset($_POST['btn_submit'])) {
            
                require_once '../model/teacher.php';
               
                $result = addTeacher($data,$filename);
                // $result = $Subject->se();
                if ($result) {
                    $row = searchAllTeacher();

    
                // Kiểm tra thư mục đã tồn tại hay chưa
                    
                }       

                    
                    
                    // Kiểm tra file cần copy có tồn tại hay không
                    

                    $_SESSION['Msg-add-teacher'] = 'Bạn đã đăng kí thành công';
                    // header("refresh:3;view.php");

                 

                header("location: add_teacher_complete.php");
                // }
            }else if (isset($_POST['btn_edit'])) {
                header("location:".URLROOT."/?router=add-teacher-edit");
            }else{
            
            
            }
            $data = $_SESSION['data'];
    ?>

