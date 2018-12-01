<!-- Header Partial -->
<?php include_once 'partials/_header.php' ?>

<?php
// initialise variables
$make = $model = $imagePath = $type = $polarpattern = $price_currency = $notes = $update_revisions = "";
$update = false;
$discontinued = 0;
$price = 0.00;

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $record = mysqli_query($mysqli, "SELECT * FROM crud WHERE id=$id");

    if (count($record) == 1) {
        $n = mysqli_fetch_array($record);
        $imagePath = $n['image_path'];
        $make = $n['make'];
        $model = $n['model'];
        $type = $n['type'];
        $polarpattern = $n['polarpattern'];
        $price = $n['price'];
        $currency = $n['price_currency'];
        $discontinued = $n['discontinued'];
        $notes = $n['notes'];
    }
}
?>

<!-- Container -->
  <div id='bodyContainer' class='container'>

    <!-- Notification Block -->
    <?php if (isset($_SESSION['message'])): ?>
        <div class="msg">
          <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
          ?>
        </div>
      <?php endif ?>

      <!-- Header -->
      <h1>Microphone Database <span class='badge'>(<?php echo countMicrophones($mysqli); ?>)</span></h1>
      <p>A database of common microphones, specs and information. A simple programming project.</p>

      <!-- Form -->
      <div class='border border-primary'>
        <div class='col-md-12'>
        <!-- Control Form -->
          <?php if ($update == true): ?>
            <h2>Update</h2>
          <?php else: ?>
            <h2>Add</h2>
          <?php endif ?>
          <form class='' method="post" action="server.php" >
          	<input type="hidden" name="id" value="<?php echo $id; ?>">

          <div class='form-row'>
            <!-- Image Path -->
            <div class='col'>
              <div class="form-group">
                <label class="">Image</label><br>
                <input class='form-control' type="text" name="image_path" placeholder="File Name" value="<?php echo $imagePath; ?>">
              </div>
            </div>

            <!-- Make -->
            <div class='col'>
              <div class="form-group">
            		<label class="">Make</label><br>
            		<input class='form-control' type="text" name="make" placeholder="Microphone Make" value="<?php echo $make; ?>">
              </div>
            </div>

            <!-- Model -->
            <div class='col'>
            	<div class="form-group">
            		<label class="">Model</label><br>
            		<input class='form-control' type="text" name="model" placeholder="Microphone Model" value="<?php echo $model; ?>">
            	</div>
            </div>
          </div>

        <div class='form-row'>
          <!-- Polar Pattern -->
            <div class='col'>
              <div class="form-group">
                <label class="">Polar Pattern</label><br>
                <select id='polarpatternSelect' class="form-control" name="polarpattern">
                  <option value="">Please Select</option>
                  <option value="Omnidirectional">Omnidirectional</option>
                  <option value="Cardioid">Cardioid</option>
                  <option value="Super-Cardioid">Super-Cardioid</option>
                  <option value="Multipattern">Multipattern</option>
                </select>
              </div>
            </div>

            <!-- Type -->
            <div class='col'>
              <div class="form-group">
            		<label class="">Type</label><br>
                <select id='typeSelect' class="form-control" name="type">
                  <option value="">Please Select</option>
                  <option value="Dynamic">Dynamic</option>
                  <option value="Tube-Condenser">Tube-Condenser</option>
                  <option value="Condenser">Condenser</option>
                  <option value="Ribbon">Ribbon</option>
                </select>
            	</div>
            </div>

            <!-- Price -->
              <div class='col'>
                <div class="form-group">
              		<label class="">Price</label><br>
                  <input class='form-control' type="text" name="price" placeholder="0.00" value="<?php echo $price; ?>">
              	</div>
              </div>

              <!-- Currency -->
              <div class='col'>
                <div class="form-group">
                  <label class="">Currency</label><br>
                  <select id='currencySelect' class="form-control" name="price_currency">
                    <option value="">Please Select</option>
                    <option value="GBP">GBP</option>
                    <option value="EUR">EUR</option>
                    <option value="USD">USD</option>
                  </select>
                </div>
              </div>

              <!-- Discontinued -->
              <div class='col'>
                <div class="form-group">
                  <label class="">Discontinued</label><br>
                  <input type="hidden" name="discontinued" value="0">
                  <input id='disconCheckbox' type="checkbox" name="discontinued" value="1">
                </div>
              </div>
            </div>

            <!-- Notes -->
          	<div class="form-group">
          		<label class="">Notes</label><br>
          		<textarea class="form-control" name="notes"><?php echo $notes; ?></textarea>
          	</div>

            <!-- Submit Buttons -->
          	<div class="form-group">
          		<?php if ($update == true): ?>
          			<button class="btn btn-primary" type="submit" name="update">Update</button>
          		<?php else: ?>
          			<button class="btn btn-success" type="submit" name="save">Add</button>
          		<?php endif ?>
          	</div>
          </form>
        </div>
      </div>

      <br>

      <?php
      // ACTIVE RESULTS
      $activesql = "SELECT * FROM crud ORDER BY make, model ASC";
      if ($result = mysqli_query($mysqli, $activesql)) {
          if (mysqli_num_rows($result) > 0) {
              ?>
      <table id='resultTable' class='table table-bordered'>
        <thead class="thead-dark">
          <tr>
            <th class='text-center'>Make</th>
            <th class='text-center'>Model</th>
            <th class='text-center'>Polar Pattern</th>
            <th class='text-center'>Type</th>
            <th class='text-center' colspan="3">Action</th>
          </tr>
        </thead>
        <?php
            while ($row = mysqli_fetch_array($result)) {
                // Draw Table.
                echo "<tbody>";
                  echo "<tr>";
                    echo "<td>" . $row['make'] . "</td>";
                    echo "<td>" . $row['model'] . "</td>";
                    echo "<td>" . $row['polarpattern'] . "</td>";
                    echo "<td>" . $row['type'] . "</td>";
                    echo "<td class='text-center'><a href='view.php?id=" . $row['id'] . "' class='view_btn'><i class='fas fa-eye'></i></a></td>";
                    echo "<td class='text-center'><a href='index.php?edit=" . $row['id'] . "' class='edit_btn'><i class='fas fa-edit'></i></a></td>";
                    echo "<td class='text-center'><a href='server.php?del=" . $row['id'] . "' class='del_btn'><i class='far fa-trash-alt'></i></a></td>";
                  echo "</tr>";
                echo "</tbody>";
            }
              echo "</table>";

              // Free result set
              mysqli_free_result($result);
          } else {
              echo "<p class='alert alert-info'>No microphones were found.</p>";
          }
      } else {
          SQLError($mysqli);
      } ?>
    </div>
    <script type="text/javascript">
      $(document).ready(function () {
        // Get discontinued checkbox.
        var disconCheckbox = document.getElementById('disconCheckbox');

        // Set Discontinued Checkbox Value
        if (<?php echo $discontinued; ?> == 1) {
          // Check the box.
          disconCheckbox.checked = true;
        } else {
          // Uncheck the box.
          disconCheckbox.checked = false;
        }

        // Set the default values of the dropdown boxes.
        $('#typeSelect').val('<?php echo $type; ?>');
        $('#currencySelect').val('<?php echo $currency; ?>');
        $('#polarpatternSelect').val('<?php echo $polarpattern; ?>');
      });
    </script>
    <?php include 'partials/_footer.php'; ?>
