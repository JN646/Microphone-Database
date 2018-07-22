<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Microphone Database</title>
    <?php include 'DBConfig.php'; ?>
  </head>
  <body>
    <h1>Microphone Database</h1>
    <p>List of microphones and specs. A simple programming project.</p>
    <p><a href="#">Add</a></p>
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
        <th>Edit</th>
        <th>Delete</th>
      </tr>

      <?php
          while ($row = mysqli_fetch_array($result)) {
              // Draw Table.
              echo "<tr>";
              echo "<td>" . $row['id'] . "</td>";
              echo "<td>" . $row['make'] . "</td>";
              echo "<td>" . $row['model'] . "</td>";
              echo "<td>" . $row['type'] . "</td>";
              echo "<td><a href='#'>Edit</a></td>";
              echo "<td><a href='#'>Delete</a></td>";
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
