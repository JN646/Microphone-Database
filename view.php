<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Microphone Database</title>
    <?php include 'DBConfig.php'; ?>
  </head>
  <body>

  <?php
    $id = $_GET["id"];

    $activesql = "SELECT * FROM crud WHERE id = $id";
    $result = mysqli_query($mysqli, $activesql);
    $microphone = mysqli_fetch_array($result);

    $make = $microphone['make'];
    $model = $microphone['model'];
    $type = $microphone['type'];
   ?>

    <h1><?php echo $make . " " . $model ?></h1>
    <p>Type: <?php echo $type ?></p>
    <br>
    <p><a href="index.php">Back</a></p>
  </body>
</html>
