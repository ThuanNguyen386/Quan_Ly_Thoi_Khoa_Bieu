<?php 

//////////--tham dinh--//////////////////
include('../common/db.php');


$specialized = ['001'=>"Khoa học máy tính",'002'=>"Khoa học dữ liệu",'003'=>"Hải dương học"];
$degree = ['001'=>"Cử nhân",'002'=>"Thạc sỹ",'003'=>"Tiến sỹ",'004'=>"Phó giáo sư",'005'=>"Giáo sư"];

    // lay thong tin giao vien
	function getTeacher($str, $spec){
		if ($str =='' && $spec=='' ){
			$query = "SELECT * FROM `teachers` ORDER BY id DESC;";
		}else{
        $query = "SELECT * FROM `teachers` WHERE (teachers.name LIKE '%".$str."%' OR teachers.description LIKE '%".$str."%' OR teachers.degree LIKE '%".$str."%') AND teachers.specialized ='".$spec."'";
  		}
        global $conn;
        $statement = $conn -> prepare($query) ;
        $statement -> execute();
        $search_teacher = [];
        foreach ($statement as $row ) {
			$id = $row['id'];
			$name = $row['name'];
			$des = $row['description'];
			$spec = $row['specialized']; 
			$search_teacher[] = array($id,$name,$des, $spec);
		}
    	// var_dump($search_teacher);
    	// echo count($search_teacher);
    	return $search_teacher;
    }
    //xoa thong tin giao vien
    function deleteTeacher($id,$str,$spec){
    	$i = (string) $id;
    	$query = "DELETE FROM `teachers` WHERE teachers.id = ".$i;
    	global $conn;
    	$conn->exec($query);
    	header("Location: ../view/search_teacher.php?spec=".$spec."&str=".$str);
    }
    //////////--tham dinh--//////////////////

?>