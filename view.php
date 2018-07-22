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
    $polarpattern = $microphone['polarpattern'];
    $notes = $microphone['notes'];
   ?>

    <h1><?php echo $make . " " . $model ?></h1>
    <p><strong>Type:</strong> <?php echo $type ?></p>
    <p><strong>Polar Pattern:</strong> <?php echo $polarpattern ?></p>
    <h3>Notes:</h3>
    <p><?php echo $notes ?></p>
    <br>
    <p><a href="index.php">Back</a></p>
  </body>
</html>
