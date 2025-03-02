<!-- retrieve_cars.php -->
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

$name = $_POST['name'];

// Retrieve cars from database
$sql = "SELECT * FROM booking where fname = '$name'";
$result = $conn->query($sql);

// Display cars
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='car-list'>" . $row["fname"] . "  " . $row["email"] . " " . $row["phone"] . "  " . $row["model"];
    }
} else {
    echo "0 results";
}
$conn->close();
?>
