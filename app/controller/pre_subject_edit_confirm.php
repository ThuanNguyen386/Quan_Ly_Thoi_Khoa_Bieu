<?php
if(!isset($_SESSION)) {
  @ob_start();
  session_start();
}

$target_dir = "../../web/avatar/tmp/";
$target_file = $target_dir . basename($_FILES["browser"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["browser"]["tmp_name"]);
  if($check !== false) {
    // echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}


// Check if file already exists
if (file_exists($target_file)) {
  $uploadOk = 1;  // allow to save again the file already exists
}


// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
} else {
  if (move_uploaded_file($_FILES["browser"]["tmp_name"], $target_file)) {
    $_SESSION['target_file'] = $target_file;
    $school_years = [1=>"Năm 1", 2=>"Năm 2", 3=>"Năm 3", 4=>"Năm 4"];
    $subject =  $_SESSION['subject'];
    $school_year =  $_SESSION['school_year'];
    $description =  $_SESSION['description'];
    $avatar =  $_SESSION['browser-text'];
    $src = $_SESSION['target_file'];
    $_SESSION['confirm'] = 1;

    header('location: ../view/subject_edit_confirm.php');
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
?>