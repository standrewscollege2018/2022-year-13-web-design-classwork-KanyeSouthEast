
<?php
session_start();

  $username= $_POST['username'];
  $password= $_POST['password'];
  // $password = password_hash("password", PASSWORD_DEFAULT);
  include('dbconnect.php');

  $item_sql = "SELECT * FROM `login` WHERE username ='$username'";
  $item_query = mysqli_query($dbconnect, $item_sql);
    if (mysqli_num_rows($item_query) ==0) {
      header("Location:index.php?page=login&error=fail");
  } else {
  $item_aa = mysqli_fetch_assoc($item_query);
  $hash_pass = $item_aa['password'];
  if (password_verify($password, $hash_pass)) {
    $_SESSION['admin'] = $username;
    header("Location:index.php?page=admin");




  }  else {
    echo "NO";
  }



    // code...
  }


 ?>
