<?php
	require('../model/subject.php');
	$school_year='';
	$key='';
	$subjects=getInfoSearch($school_year,$key);
	if(isset($_GET['search'])){
		if(isset($_GET['khoahoc']) and isset($_GET['keyName'])){
			$school_year = $_GET['khoahoc'];
			$key = $_GET['keyName'];
			if($school_year != '' and $key != ''){
				$subjects=getInfoSearch($school_year,$key)->fetchAll();
			}else{
				header("Location: subjects_search.php");
			}
			$count=getInfoSearch($school_year,$key)->rowCount();
		}
	}
?>