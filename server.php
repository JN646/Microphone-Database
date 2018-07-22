<?php
// Link to DB
include 'DBConfig.php';

// Start Session
session_start();

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

  if(mysqli_query($mysqli, "INSERT INTO crud (make, model, type) VALUES ('$make', '$model', '$type')")) {
    $_SESSION['message'] = "Microphone Saved";
    header('location: index.php');
  } else {
    $_SESSION['message'] = mysqli_error($mysqli);
    header('location: index.php');
  }
}

// Edit
if (isset($_POST['update'])) {
  $id = $_POST['id'];
  $make = $_POST['make'];
  $model = $_POST['model'];
  $type = $_POST['type'];

  if(mysqli_query($mysqli, "UPDATE crud SET make='$make', model='$model', type='$type' WHERE id=$id")) {
    $_SESSION['message'] = "Microphone Updated";
    header('location: index.php');
  } else {
    $_SESSION['message'] = mysqli_error($db);
    header('location: index.php');
  }
}

// Delete
if (isset($_GET['del'])) {
	$id = $_GET['del'];

  if(mysqli_query($mysqli, "DELETE FROM crud WHERE id=$id")) {
    $_SESSION['message'] = "Microphone Deleted";
    header('location: index.php');
  } else {
    $_SESSION['message'] = mysqli_error($db);
    header('location: index.php');
  }
}
?>
