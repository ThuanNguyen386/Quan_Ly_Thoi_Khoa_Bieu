<?php
	require_once "../model/teacher_search_model.php";
	$spec = $_GET["spec"];
	$str = $_GET["str"]; 

	$id = $_GET["id"]; 

	deleteTeacher($id,$str,$spec);
?>