<?php
require '../model/admin.php';
$error = "";
$name = $password = "";
$valid = true;


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["name"])) {
        $error = "Hãy nhập login id";
        $valid = false;
    } else if (strlen($_POST["name"]) < 4) {
        $error = "Hãy nhập login id tối thiểu 4 ký tự";
        $valid = false;
    } else {
		$valid = true;
        $name = ($_POST["name"]);
    }

    if (empty($_POST["password"])) {
        $error = "Hãy nhập password";
        $valid = false;
    } else if (strlen($_POST["password"]) < 6) {
        $error = "Hãy nhập password tối thiểu 6 ký tự";
        $valid = false;
    } else {
		$valid = true;
        $password = ($_POST["password"]);
    }

    if ($valid) {
		$md5pass = md5($password);
        if (checkAdmin($name, $md5pass)) {
			$_SESSION['name'] = $name;
			$_SESSION['loggedIn'] = 1;
			header("Location: ../view/home.php");	
        } else {
            $error = "login id và password không đúng";
        }
		
    }
}