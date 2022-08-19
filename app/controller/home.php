<?php 
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		if(isset($_POST)){
			$_SESSION['loggedIn']  = 0;
			header("Location: ../view/login.php");	
		}
	}
?>