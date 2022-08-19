<?php
include('../common/db.php');

    // Trả về all bản ghi
     function searchAllSubject(){
        require('../common/db.php');
        $sql = "SELECT * FROM subjects";
        $data = $conn -> prepare($sql);
        $data -> execute();
        // vì PDO không cho phép gán data vào SESSION khi truy vấn sql
        // nên dùng mảng để gán cho SESSION
        $array=[];
        foreach($data as $row){
            $array = array_merge($array, [$row]);// phương thức gộp mảng
        }
        return $array;
    }
    
     function getSubject($id){
        require('../common/db.php');
        // $sql = "SELECT name FROM subjects WHERE id='$id'";
        $stmt = $conn -> prepare("select * from subjects where id=:id");
        $stmt->bindParam(':id',$id);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        // $array = [$data];
        // $array = array_merge($array, [$data]);
        return $data;
    }
   function searchNameSubject($id){
      require('../common/db.php');
        $sql = "SELECT name FROM subjects WHERE id='$id'";
         $data = $conn -> prepare($sql);
        $data -> execute();
        foreach($data as $row){
            return $row['name'];
        }
    }
?>
