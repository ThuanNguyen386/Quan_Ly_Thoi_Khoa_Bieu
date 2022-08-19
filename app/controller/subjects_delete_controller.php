<?php
	require('../model/subject.php');
	$id=$_GET['id'];
	$result=deleteSubject($id);
	if($result){
		header("Location: ../view/subjects_search.php");
	}

?>