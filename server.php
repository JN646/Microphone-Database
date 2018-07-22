<?php
// Link to DB
include 'DBConfig.php';

// initialise variables
$make = "";
$model = "";
$type = "";
$id = 0;
$update = false;

// Add
if (isset($_POST['save'])) {
  $id = $_POST['id'];
  $make = $_POST['make'];
  $model = $_POST['model'];
  $type = $_POST['type'];

  mysqli_query($db, "INSERT INTO crud (make, model, type) VALUES ('$make', '$model', '$type')");
  header('location: index.php');
}

// Edit
if (isset($_POST['update'])) {
  $id = $_POST['id'];
  $make = $_POST['make'];
  $model = $_POST['model'];
  $type = $_POST['type'];

  mysqli_query($mysqli, "UPDATE crud SET make='$make', model='$model', type='$type' WHERE id=$id");
  header('location: index.php');
}

// Delete
if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($mysqli, "DELETE FROM crud WHERE id=$id");
	header('location: index.php');
}
?>
