<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Microphone Database</title>
    <?php include 'DBConfig.php'; ?>
    <?php include 'functions.php'; ?>
  </head>
  <body>
    <?php if (isset($_SESSION['message'])): ?>
      <div class="msg">
        <?php
          echo $_SESSION['message'];
          unset($_SESSION['message']);
        ?>
      </div>
    <?php endif ?>
    <h1>Microphone Database <span>(<?php echo countMicrophones($mysqli); ?>)</span></h1>
    <p>A database of common microphones, specs and information. A simple programming project.</p>

    <?php
    // initialise variables
    $make = "";
    $model = "";
    $type = "";
    $polarpattern = "";
    $notes = "";
    $update = false;

    if (isset($_GET['edit'])) {
      $id = $_GET['edit'];
      $update = true;
      $record = mysqli_query($mysqli, "SELECT * FROM crud WHERE id=$id");

      if (count($record) == 1 ) {
        $n = mysqli_fetch_array($record);
        $make = $n['make'];
        $model = $n['model'];
        $type = $n['type'];
        $polarpattern = $n['polarpattern'];
        $notes = $n['notes'];
      }
    }
    ?>

    <!-- Control Form -->
    <?php if ($update == true): ?>
      <h2>Update</h2>
    <?php else: ?>
      <h2>Add</h2>
    <?php endif ?>
    <form method="post" action="server.php" >
    	<input type="hidden" name="id" value="<?php echo $id; ?>">

      <!-- Make -->
    	<div class="input-group">
    		<label>Make</label>
    		<input type="text" name="make" value="<?php echo $make; ?>">
    	</div>

      <!-- Model -->
    	<div class="input-group">
    		<label>Model</label>
    		<input type="text" name="model" value="<?php echo $model; ?>">
    	</div>

      <!-- Type -->
      <div class="input-group">
    		<label>Type</label>
        <select class="" name="type">
          <option value="">Please Select</option>
          <option value="Dynamic">Dynamic</option>
          <option value="Condenser">Condenser</option>
          <option value="Ribbon">Ribbon</option>
        </select>
    	</div>

      <!-- Polar Patterns -->
      <div class="input-group">
        <label>Polar Pattern</label>
        <select class="" name="polarpattern">
          <option value="">Please Select</option>
          <option value="Omnidirectional">Omnidirectional</option>
          <option value="Cardioid">Cardioid</option>
          <option value="Super-Cardioid">Super-cardioid</option>
        </select>
      </div>

      <!-- Notes -->
    	<div class="input-group">
    		<label>Notes</label><br>
    		<textarea name="notes"><?php echo $notes; ?></textarea>
    	</div>

      <!-- Submit Buttons -->
    	<div class="input-group">
    		<?php if ($update == true): ?>
    			<button class="btn" type="submit" name="update">Update</button>
    		<?php else: ?>
    			<button class="btn" type="submit" name="save">Add</button>
    		<?php endif ?>
    	</div>
    </form>

    <br>

    <?php
    // ACTIVE RESULTS
    $activesql = "SELECT * FROM crud ORDER BY make ASC";
    if ($result = mysqli_query($mysqli, $activesql)) {
        if (mysqli_num_rows($result) > 0) {
            ?>
    <table>
      <tr>
        <th>ID</th>
        <th>Make</th>
        <th>Model</th>
        <th>Type</th>
        <th>Polar Pattern</th>
			  <th colspan="3">Action</th>
      </tr>

      <?php
          while ($row = mysqli_fetch_array($result)) {
              // Draw Table.
              echo "<tr>";
              echo "<td>" . $row['id'] . "</td>";
              echo "<td>" . $row['make'] . "</td>";
              echo "<td>" . $row['model'] . "</td>";
              echo "<td>" . $row['type'] . "</td>";
              echo "<td>" . $row['polarpattern'] . "</td>";
              echo "<td><a href='view.php?id=" . $row['id'] . "' class='view_btn'>View</a></td>";
              echo "<td><a href='index.php?edit=" . $row['id'] . "' class='edit_btn'>Edit</a></td>";
              echo "<td><a href='server.php?del=" . $row['id'] . "' class='del_btn'>Delete</a></td>";
              echo "</tr>";
          }
            echo "</table>";

            // Free result set
            mysqli_free_result($result);
        } else {
            echo "No microphones were found.";
        }
    } else {
        SQLError($mysqli);
    } ?>
  </body>
</html>
