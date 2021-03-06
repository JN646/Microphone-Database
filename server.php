<?php
// Link to DB
include 'DBConfig.php';

// Start Session
session_start();

// initialise variables
$make = $model = $type = $polarpattern = $notes = $price = $discontinued = $update_revisions = "";
$update = false;
$id = 0;

// Add
if (isset($_POST['save'])) {
  $id = $_POST['id'];
  $imagePath = $_POST['image_path'];
  $make = $_POST['make'];
  $model = $_POST['model'];
  $type = $_POST['type'];
  $price = $_POST['price'];
  $currency = $_POST['price_currency'];
  $discontinued = $_POST['discontinued'];
  $polarpattern = $_POST['polarpattern'];
  $notes = $_POST['notes'];

  if(mysqli_query($mysqli, "INSERT INTO crud (image_path, make, model, type, polarpattern, price, price_currency, discontinued, notes) VALUES ('$imagePath', '$make', '$model', '$type', '$polarpattern', '$price', '$currency', '$discontinued', '$notes')")) {
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
  $imagePath = $_POST['image_path'];
  $make = $_POST['make'];
  $model = $_POST['model'];
  $type = $_POST['type'];
  $price = $_POST['price'];
  $currency = $_POST['price_currency'];
  $discontinued = $_POST['discontinued'];
  $polarpattern = $_POST['polarpattern'];
  $notes = $_POST['notes'];

  if(mysqli_query($mysqli, "UPDATE crud SET image_path='$imagePath', make='$make', model='$model', price='$price', price_currency='$currency', discontinued='$discontinued', type='$type', polarpattern='$polarpattern', notes='$notes' WHERE id=$id")) {
    $_SESSION['message'] = "Microphone Updated";
    header('location: index.php');
  } else {
    $_SESSION['message'] = mysqli_error($mysqli);
    // header('location: index.php');
  }
}

// Delete
if (isset($_GET['del'])) {
	$id = $_GET['del'];

  if(mysqli_query($mysqli, "DELETE FROM crud WHERE id=$id")) {
    $_SESSION['message'] = "Microphone Deleted";
    header('location: index.php');
  } else {
    $_SESSION['message'] = mysqli_error($mysqli);
    header('location: index.php');
  }
}
?>
