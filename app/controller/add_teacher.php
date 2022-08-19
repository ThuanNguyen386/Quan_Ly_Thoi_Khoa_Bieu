<?php
// require_once './app/controllers/checkLogin.php';
if(!isset($_SESSION)) {
    @ob_start();
    session_start();
}
require_once '../model/teacher.php';

 
        $specialized = [
            1=>'Khoa học máy tính',
            2=>'Khoa học dữ liệu',
            3=>'Hải dương học'
        ];
        $degree = [
            1=>'Cử nhân',
            2=>'Thạc sĩ',
            3=>'Tiến sĩ',
            4=>'Phó giáo sư',
            5=>'Giáo sư'
        ];
        
        //Check for POST
        if (isset($_POST['submit'])) {
            // if ($_SERVER['REQUEST_METHOD']=='POST') {
            // Sanitize POST Data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Process form
            $data = [
            'specializes' => $specialized,
            'degrees' => $degree,
            'name' => $_POST['txt_name'],
            'degree' => $_POST['txt_degree'],
            'specialized' => $_POST['txt_specialized'],
            'description' => $_POST['txt_description'],
            'name_err' => '',
            'specialized_err' => '',
            'degree_err' => '',
            'description_err' => '',
            'avata_err' => ''
            ];

            if (empty($data['name'])){
                $data['name_err'] = "Hãy nhập tên giáo viên";
            }else{
                if (strlen($data['name']) > 100){
                    $data['name_err'] = "Không nhập quá 100 kí tự";
                }
            }
            if (empty($data['specialized'])){
                $data['specialized_err'] = "Hãy chọn bộ môn";
            }
            if (empty($data['degree'])){
                $data['degree_err'] = "Hãy chọn bằng cấp";
            }
            if (empty($data['description'])) {
                $data['description_err'] = "Hãy nhập mô tả chi tiết";
            }else {
                if (strlen($data['description']) > 100){
                    $data['description_err'] = "Không nhập quá 1000 kí tự";
                }
            }
    
        
        } else if (isset($_POST['cancel'])) {
        } else {
            // Init data
            $data = [
                'specializes' => $specialized,
                'degrees' => $degree,
                'name' => '',
                'specialized' => '',
                'degree' => '',
                'description' => '',
                'avata' => '',
                'type' => '',
                'temp' => '',
                'size' => '',
                'name_err' => '',
                'specialized_err' => '',
                'degree_err' => '',
                'description_err' => '',
                'avata_err' => ''
            ];

            $_SESSION['data'] = $data;

            require_once '../view/add_teacher.php';
        }

        
        if (!empty($data['name']) && !empty($data['specialized'])&& !empty($data['degree']) && !empty($data['description'])) {         
            
            createUserSession($data); 
            require_once 'upload_file.php';
        }else{
            $_SESSION['data'] = $data;
            
            require_once '../view/add_teacher.php';
        }

        
        

        function createUserSession($data)
        {
           
            $_SESSION['data'] = $data;
            // $_SESSION['filename'] = $data;
            // $fileName=basename($_FILES["fileToUpload"]["name"]);
            header("location: add_teacher_confirm.php");
         }
       

    $data=$_SESSION['data'];
?>