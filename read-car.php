<?php
// Connect to database
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "gearshift";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$carName = $_POST['carName']; // Assuming car name comes from a form

// Prepare SQL statement to prevent SQL injection (recommended)
$sql = "SELECT * FROM car WHERE name = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $carName); // Bind car name parameter with type string

// Execute the prepared statement
$stmt->execute();

$result = $stmt->get_result(); // Get the result set

// Display cars
if ($result->num_rows > 0) 
{
  while($row = $result->fetch_assoc()) 
  {
    echo "<div class='car-list'>";
    echo $row["engineType"] . "  $row["name"] " . $row["price"] . " (" . $row["brand"]. ")" . "$row["horsepower"];
    // Add additional info from car table as needed (price, horsepower, etc.)
    echo "</div>";
  
  }
} else {
  echo "Car not found.";
}

$stmt->close(); // Close the prepared statement
$conn->close(); // Close the connection
?>
