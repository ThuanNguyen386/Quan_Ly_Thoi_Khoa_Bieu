<?php
include('../common/db.php');

    // thuna - lay thong tin mon hoc
    function getSubject($id) {
        $query = "SELECT * FROM subjects WHERE id = $id";
        global $status;
        if($status == 1){
            global $conn;
            $statement = $conn -> prepare($query) ;
            $statement -> execute();
            $subject = $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        return $subject[0];
    }

    // thuna - chinh sua thong tin mon hoc
    function editSubject($id, $name, $avatar, $description, $school_year) {
        $school_year = implode(', ',$school_year);
        $query = "  UPDATE subjects
                    SET name = '$name', 
                    avatar = '$avatar',
                    description = '$description',
                    school_year = '$school_year',
                    updated = CURRENT_TIMESTAMP
                    WHERE id = $id";
        global $status;
        if($status == 1){
            global $conn;
            $statement = $conn -> prepare($query) ;
            $statement -> execute();
        }
        return $status;
    }

    // thuna - lay ten anh cua mon hoc
    function getImgName($id) {
        $query = "SELECT avatar FROM subjects WHERE id = $id";
        global $status;
        if($status == 1){
            global $conn;
            $statement = $conn -> prepare($query) ;
            $statement -> execute();
            $subject = $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        return $subject[0]['avatar'];
    }

    function getInfoSearch($school_year, $key){
        global $conn;
        $sql = "SELECT * FROM `subjects` where (school_year='" . $school_year . "') and (name LIKE '%" . $key . "%' or description LIKE '%" . $key . "%');";
        $stm = $conn ->prepare($sql);
        $stm -> execute();
        return $stm;
    }
    
    function deleteSubject($id){
        global $conn;
        $sql="DELETE FROM `subjects` where id=" . $id . ";";
        $stm = $conn ->prepare($sql);
        return $stm -> execute();
    }
?>