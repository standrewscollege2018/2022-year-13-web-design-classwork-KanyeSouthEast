
<?php

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$tutorgroupID = $_POST['tutorgroupID'];
$photo = $_FILES["fileToUpload"]["name"];


  $target_dir = "images/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {

    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  header("Location:index.php?page=add_student&error=size");
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  header("Location:index.php?page=add_student&error=type");
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    $insert_sql = "INSERT INTO student (firstname, lastname, photo) VALUES('$firstname', '$lastname', '$photo')";
    $insert_qry = mysqli_query($dbconnect, $insert_sql);
    echo "SUCCESS";
  } else {
    header("Location:index.php?page=add_student&error=upload");
  }
}
