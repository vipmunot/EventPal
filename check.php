<?php

  include 'Constants.php';

  echo "server: ".SERVER_NAME;
  echo "<br/>";
  echo "row_size: ".MAX_ROW_SIZE;
  echo "<br/>";
  echo "row_size type: ".getType(MAX_ROW_SIZE);
  echo "<br/>";
  

  //$servername = Constants::servername;
  $servername = "eventpal.cp4hghmjwcmi.us-west-2.rds.amazonaws.com";
  $username = "rohit";
  $password = "rohitnair987";
  $database = "eventpal";

  // Create connection
  $conn = mysqli_connect(SERVER_NAME, USER_NAME, PASSWORD, DATABASE_NAME);

  // Check connection
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }
  echo "Connected successfully";

$query = "SELECT Name FROM Interest;";
mysqli_query($conn, $query) or die('Error querying the database.');

$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["Name"]. "<br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>