<?php
// Link to DB
include 'DBConfig.php';

// initialise variables
$make = "";
$model = "";
$type = "";
$id = 0;
$update = false;

// Delete
if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($mysqli, "DELETE FROM crud WHERE id=$id");
	header('location: index.php');
}
?>
