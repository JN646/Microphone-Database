 <?php
//MySQL connection
$mysqli = new mysqli('localhost', 'root', '', 'microphone');

 //If connection fail
if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

// Global Variables.
define("LOCAL", "http://localhost/Microphone-Database/");     //local URL
define("WEB", "http://192.168.1.72:80/Microphone-Database/"); //website URL
$environment = LOCAL; //change to WEB if you're live
?>
