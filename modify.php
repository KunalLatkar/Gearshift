<?php
// Connect to database (error handling included)
$servername = "localhost";
$username = "root";
$password = "root"; // Change these to your actual credentials
$dbname = "gearshift";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Set error reporting mode
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

$email = $_POST['email']; // Existing email from the form

// Check if a modification form is submitted
if (isset($_POST['submit'])) {
  // Retrieve data from modification form (handle potential missing keys)
  $newName = isset($_POST['newName']) ? $_POST['newName'] : '';
  $newEmail = isset($_POST['newEmail']) ? $_POST['newEmail'] : '';
  $newPhone = isset($_POST['newPhone']) ? $_POST['newPhone'] : '';
  $newModel = isset($_POST['newModel']) ? $_POST['newModel'] : '';

  // Server-side validation for phone number (optional, uncomment if needed)
  if ($newPhone === '') {
    echo "Error: Please enter a phone number.";
  } else {
    // Prepare and execute update query using PDO with error handling
    $updateSql = "UPDATE booking SET fname=:newName, email=:newEmail, phone=:newPhone, model=:newModel WHERE email=:email";
    try {
      $stmt = $conn->prepare($updateSql);

      // Bind parameters with proper data types
      $stmt->bindParam(':newName', $newName, PDO::PARAM_STR);
      $stmt->bindParam(':newEmail', $newEmail, PDO::PARAM_STR);
      $stmt->bindParam(':newPhone', $newPhone, PDO::PARAM_STR);
      $stmt->bindParam(':newModel', $newModel, PDO::PARAM_STR);
      $stmt->bindParam(':email', $email, PDO::PARAM_STR);

      $stmt->execute();

      echo "Information updated successfully!";
    } catch(PDOException $e) {
      echo "Error updating information: " . $e->getMessage();
    }
  }

  // Retrieve updated booking information after successful update with error handling
  $sql = "SELECT * FROM booking WHERE email=:email";
  try {
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();

    $updatedRow = $stmt->fetch(PDO::FETCH_ASSOC);

    // *Display updated information:* (Modify this section to populate your form or display area)
    echo "<p>Updated Information:</p>";
    echo "<ul>";
    echo "<li>Name: " . $updatedRow["fname"] . "</li>";
    echo "<li>Email: " . $updatedRow["email"] . "</li>";
    echo "<li>Phone: " . $updatedRow["phone"] . "</li>";
    echo "<li>Model: " . $updatedRow["model"] . "</li>";
    echo "</ul>";
  } catch(PDOException $e) {
    echo "Error retrieving updated information: " . $e->getMessage();
  }
}
?>