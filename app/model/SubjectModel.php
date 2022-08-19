<?php 	
	require_once "../../app/common/db.php";

	function getSubjectName($subject_id) {
		global $conn;
		$sql = "SELECT * FROM `subjects` WHERE id = '$subject_id'";
        $result = $conn -> prepare($sql);
        $result->execute();
        $_result = $result->fetchAll();
        return $_result;
	}

	/* Event Edit
    * Kết nối db, trả về dữ liệu
    */
    function getSubjectbyId($id){
        global $conn;

        $sql = "SELECT *
                FROM subjects
                WHERE id = '$id'
                ";
        
        $subject = $conn -> prepare($sql);
        $subject->execute();
        return $subject->fetch(PDO::FETCH_ASSOC);
    }

    /* Update dữ liệu lên db
    * Event Edit
    */
    function updateSubjectById($id, $name, $school_year, $avatar, $description){
        global $conn;
        $sql= " UPDATE subjects SET
                name = '$name',
                school_year = '$school_year',
                avatar = '$avatar',
                description = '$description'
                WHERE id = '$id' ";
        $subject = $conn ->prepare($sql);
        return $subject->execute();

        
    }
	/* Event Add */
	function getAll(){
        global $conn;

        $stmt = $conn -> prepare("SELECT * FROM `subjects`");
        $stmt->execute();
        $data = [];
        $result = $stmt->fetchAll();
        return $result;
    }
	/* Event Add */
    function getIdEnd(){
        global $conn;
        $stmt = $conn -> prepare("SELECT `id` FROM `subjects` ORDER BY `subjects`.`id` ASC");
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_COLUMN);
        $length = count($data) - 1;
        $result = $data[$length];
        return $result;
    }
	/* Event Add */
    function add(){
        global $conn;
        $check_add = 0;
        try{
            $stmt = $conn->prepare("INSERT INTO `subjects`(`name`, `school_year`, `avatar`, `description`) 
                VALUES (:name, :school_year, :avatar, :description)");

            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':school_year', $school_year);
            $stmt->bindParam(':avatar', $avatar);
            $stmt->bindParam(':description', $description);

            $name = $_SESSION['subject_add_name'];
            $school_year = $_SESSION['subject_add_khoa'];
            $avatar = $_SESSION['subject_add_des'];
            $description = $_SESSION['subject_add_name_ava'];
            $stmt->execute();
            $check_add = 1;
        } catch(PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }
        
        return $check_add;
    }
?>