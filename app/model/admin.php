<?php
	function getLoginIdArray(){

		// require file connect database
		require '../common/db.php';

		// query
		$sql = $conn->prepare("SELECT `login_id` FROM `admins` WHERE `reset_password_token` NOT LIKE '' ");
        $sql ->execute();

		return $sql;
	}

	// function update reset_password_token
	function updateResetPasswordToken($login_id, $token){

		// require file connect database
		require '../common/db.php';

		// query
		$sql = $conn->prepare("UPDATE `admins` SET `reset_password_token` = '" 
			. $token . "' WHERE login_id = '" . $login_id . "' ");
        $sql ->execute();

		return $sql;

	}

	function checkAdmin($name, $pass)
	{
		require '../common/db.php';
		$sql = "SELECT * FROM `admins` WHERE `login_id` = '{$name}' AND `password` = '{$pass}'";
		$result = $conn->query($sql);
		$result->execute();
		if ($result->rowCount() > 0) {
			$_SESSION['name'] = $name;
			date_default_timezone_set('Asia/Ho_Chi_Minh');
			$_SESSION['time'] = date("Y-m-d H:i");
			return true;
		} else {
			$_SESSION['name'] = '';
			$_SESSION['time'] = '';
			return false;
		}
	}

	
	//Thảo
	require '../common/db.php';
    //kiem tra ton tai cua login_id
    function checkLoginid($login_id){
        global $conn;
        $sql= "SELECT login_id from admins where login_id ='" . $login_id . "' ";
        $statement = $conn->prepare($sql);
        $statement->execute();
        return $statement;
    }

    //update request token
    function updateRequestToken($login_id,$token){
        global $conn;
        $sql="UPDATE admins SET reset_password_token ='" . $token . "' WHERE login_id='" . $login_id . "' ";
        $statement = $conn->prepare($sql);
        $statement->execute();
        return $statement;
    }

    //get login_id with reset_password_token != NULL
    function getLoginid(){
        global $conn;
        $sql = "SELECT * FROM admins where reset_password_token not like '' ";
        $statement =$conn ->prepare($sql);
        $statement ->execute();
        $result= $statement ->fetchAll(PDO:: FETCH_OBJ);
        return $result;
    }

    //update reset token
    function updateResetToken($login_id){
        global $conn;
        $sql="UPDATE admins SET reset_password_token = NULL WHERE login_id='" . $login_id . "' ";
        $statement = $conn->prepare($sql);
        $statement->execute();
        return $statement;
    }

    //update password
    function updatePassword($id, $newpassword,$current_time){
        global $conn;
        $sql= "UPDATE admins SET password = md5('$newpassword'), reset_password_token = '', updated ='$current_time' WHERE id = '$id'";
        $statement = $conn->prepare($sql);
        $statement->execute();
        return $statement;
    }

?>