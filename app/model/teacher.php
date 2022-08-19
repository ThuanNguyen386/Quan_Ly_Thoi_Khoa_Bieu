<?php
include('../common/db.php');

function searchNameTeacher($id) {
    require('../common/db.php');
        $sql = "SELECT name FROM teachers WHERE id='$id'";
          $data = $conn -> prepare($sql);
        $data -> execute();
        foreach($data as $row)
            return $row['name'];
     }

function getTeacherById($id) {
        global $conn;
        $sql = "SELECT *
                FROM teachers
                WHERE id = '$id' ";
        $teacher = $conn->prepare($sql);
        $teacher->execute();
        return $teacher->fetch();
    }
    function updateTeacherById($id, $name, $avatar, $description, $specialized, $degree) {
        global $conn;
        $sql = "UPDATE teachers SET 
                name = '$name',
                avatar = '$avatar',
                description = '$description',
                specialized = '$specialized',
                degree = '$degree'
                WHERE id = '$id' ";
        $teacher = $conn->prepare($sql);
        return $teacher->execute();
    }


    /////////////////////

// require_once '../common/db.php';


// Trả về all bản ghi
function searchAllTeacher() {
    require('../common/db.php');
    $sql = "SELECT * FROM teachers";
    $data = $conn -> prepare($sql);
    // vì PDO không cho phép gán data vào SESSION khi truy vấn sql
    // nên dùng mảng để gán cho SESSION
    $data->execute(); 
    $array=[];
    foreach($data as $row)
        $array = array_merge($array, [$row]);// phương thức gộp mảng
    return $array;
}



function addTeacher($data,$filename){
    // $sql= "DELETE FROM subjects WHERE id='$id'";
    // $this->__conn->exec($sql);

    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $created = date("Y-m-d H:m:s");

    require('../common/db.php');
        $sql = "insert into teachers(name,avatar,specialized,degree,description,created) value(:fname,:favata,:fspecialized,:fdegree,:fdescription,:fcreated)";
        $stmt = $conn -> prepare($sql);
        
    // $stmt = $this->__conn->prepare('insert into subjects(name,avata,des,year,created) value(:fname,:favata,:fmota,:fkhoa,:fcreated)');
    $stmt->bindParam(':fname',$data['name']);
    $stmt->bindParam(':fspecialized',$data['specialized']);
    $stmt->bindParam(':fdescription',$data['description']);
    $stmt->bindParam(':fdegree',$data['degree']);
    $stmt->bindParam(':favata',$filename);
    $stmt->bindParam(':fcreated',$created);
    // Execute
    return $stmt->execute(); 
  
}





?>

