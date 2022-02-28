

<?php
  $tutor_name = $_POST['tutor_name'];
  $tutor_code = $_POST['tutor_code'];

  $item_sql= "INSERT INTO tutorgroup (tutor,tutorcode) VALUES ('$tutor_name','$tutor_code')";
  $item_query = mysqli_query($dbconnect, $item_sql);


  echo "$tutor_name";

  echo "$tutor_code";


 ?>
