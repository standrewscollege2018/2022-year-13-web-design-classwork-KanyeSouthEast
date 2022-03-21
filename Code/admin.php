

<?php
if (!isset($_SESSION['admin'])) {
  header("Location:index.php?page=login");
}
 ?>

<a href="index.php?page=add_tutor">add tutor</a>
<a href="index.php?page=delete_student">delete student</a>

<a href="index.php?page=add_student">Add student</a>


<form class="" action="logout.php" method="post">
  <button type="submit" name="button">Logout</button>

</form>
