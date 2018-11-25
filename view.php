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
    $update_revisions = $microphone['update_revisions'];

    // Logical Tests
    if ($price == 0) {
      $price = 'N/A';
    }

    if ($discontinued == 0) {
      $discontinued = 'Still Available';
    }

    if ($discontinued == 1) {
      $discontinued = 'No Longer Available';
    }
   ?>

   <!-- Header -->
    <div class='col-md-12'>
      <h1><?php echo $make . " " . $model ?></h1>

      <!-- Details -->
      <table class='table table-bordered'>
        <tbody>
          <tr>
            <td><strong>Type:</strong></td>
            <td><?php echo $type ?></td>
          </tr>
          <tr>
            <td><strong>Price:</strong></td>
            <td><?php echo $price ?></td>
          </tr>
          <tr>
            <td><strong>Discontinued:</strong></td>
            <td><?php echo $discontinued ?></td>
          </tr>
          <tr>
            <td><strong>Polar Pattern:</strong></td>
            <td>
              <?php echo $polarpattern ?> <br>
              <img src="img/<?php echo polarPatternImage($polarpattern); ?>" width=100px alt="">
            </td>

          </tr>
        </tbody>
      </table>

      <br>

      <h3>Notes:</h3>
      <div class="border border-primary">
        <?php
        if ($notes == '') {
          echo "<p class='text-center'>There is currently no description.</p>";
        } else {
          echo "<p>" . $notes . "</p>";
        }
        ?>
      </div>
    </div>
    <br>

    <!-- Back Button -->
    <p><a href="index.php"><i class="fas fa-arrow-circle-left fa-2x"></i></a></p></div>
    <?php include 'partials/_footer.php'; ?>
