<?php include_once 'partials/_header.php' ?>
<div id='bodyContainer' class='container'>
  <?php
    // Variables
    $id = $_GET["id"];

    // Get SQL
    $activesql = "SELECT * FROM crud WHERE id = $id";
    $result = mysqli_query($mysqli, $activesql);
    $microphone = mysqli_fetch_array($result);

    // Map fields
    $make = $microphone['make'];
    $model = $microphone['model'];
    $type = $microphone['type'];
    $price = $microphone['price'];
    $discontinued = $microphone['discontinued'];
    $polarpattern = $microphone['polarpattern'];
    $notes = $microphone['notes'];
   ?>

   <!-- Header -->
    <h1><?php echo $make . " " . $model ?></h1>

    <!-- Paras -->
    <p><strong>Type:</strong> <?php echo $type ?></p>
    <p><strong>Price:</strong> <?php echo $price ?></p>
    <p><strong>Discontinued:</strong> <?php echo $discontinued ?></p>
    <p><strong>Polar Pattern:</strong> <?php echo $polarpattern ?></p>
    <!-- Polar Pattern Image -->
    <img src="img/<?php echo polarPatternImage($polarpattern); ?>" width=100px alt="">
    <h3>Notes:</h3>
    <p><?php echo $notes ?></p>
    <br>

    <!-- Back Button -->
    <p><a href="index.php">Back</a></p></div>
  </body>
</html>
