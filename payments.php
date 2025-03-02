<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "root";
$database = "gearshift";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve form data
  $cardNumber = $_POST["card-number"];
  $expiry = $_POST["expiry"];
  $cvv = $_POST["cvv"];
  $cardholderName = $_POST["name"];

  // Prepare SQL statement
  $sql = "INSERT INTO payments (card_number, expiry, cvv, cardholder_name) 
          VALUES ('$cardNumber', '$expiry', '$cvv', '$cardholderName')";

  // Execute SQL statement
  if ($conn->query($sql) === TRUE) {
    // Redirect to home.php with a success message using header
    header("Location: home.php");
    die();
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

// Close connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Gearshift | Payment</title>
  <link rel="stylesheet" href="cssbooknow.css">
</head>
<body>
  <header>
    <a id="logo" href="home.php">Gearshift</a>
    <h1>Payment</h1>
  </header>
            
  <main>
    <form method="post" action="payments.php" id="payment-form">
      <label for="card-number">Card Number:</label>
      <input type="text" id="card-number" name="card-number" required>
      
      <label for="expiry">Expiry Date:</label>
      <input type="text" id="expiry" name="expiry" placeholder="MM/YY" required>
      
      <label for="cvv">CVV:</label>
      <input type="text" id="cvv" name="cvv" required>
      
      <label for="name">Cardholder Name:</label>
      <input type="text" id="name" name="name" required>
      
      <button type="submit" name = "submit" id="submit-btn">Pay Now</button>
    </form>
  </main>

  <footer>
    Copyright © 2024 Gearshift
  </footer>

</body>
</html>
