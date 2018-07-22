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
    <?php
    // ACTIVE RESULTS
    $activesql = "SELECT * FROM crud ORDER BY model ASC";
    if ($result = mysqli_query($mysqli, $activesql)) {
        if (mysqli_num_rows($result) > 0) {
            ?>
    <table>
      <tr>
        <th>Make</th>
        <th>Model</th>
      </tr>

      <?php
          while ($row = mysqli_fetch_array($result)) {
              // Draw Table.
              echo "<tr>";
              echo "<td>" . $row['make'] . "</td>";
              echo "<td>" . $row['model'] . "</td>";
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
