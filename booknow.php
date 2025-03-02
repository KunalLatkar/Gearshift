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
  if(isset($_POST['submit'])){
    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $model = $_POST["model"];

    // Prepare SQL statement
    $sql = "INSERT INTO booking (fname, email, phone, model) 
            VALUES ('$name', '$email', '$phone', '$model')";

    // Execute SQL statement
    if ($conn->query($sql) === TRUE) {
        header("Location: payments.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
} 

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Gearshift | Booking</title>
  <link rel="stylesheet" href="cssbooknow.css">
</head>
<body>
  <header>
    <a id="logo" href="home.php">Gearshift</a>
    <h1>Gearshift | Booking</h1>
  </header>

  
  
  <div class="popup">
    <div class = "popup-content">
      <form action="readphp.php" method = "post" id="booking-form">

        <img src="close.png" alt="" class="close">
        <h2>User details</h2>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" placeholder = "name">
        <button name = "submit" values="submit" id="submit-btn">Show</button>
      </form>
    </div>
  </div>


  <div class="popupmod">
    <div class = "popup-content-mod">
      <form action="modify.php" method = "post" id="booking-form" >

        <img src="close.png" alt="" class="close1">
        <h2>Enter the changed details</h2>
        <marquee direction="right">Keep the email same to change other Information</marquee>
          <label id = "Mod-label" for="name">Name:</label>
          <input type="text" id="name" name="name" >
          <br>
          <label id = "Mod-label"  for="email">Email:</label>
          <input type="email" id="email" name="email" >
          <br>
          <br>
          <label id = "Mod-label"  for="phone">Phone Number:</label>
          <input type="tel" id="phone" name="phone" >  
          <br>
          <br>
          <label id = "Mod-label"  for="model">Select Car Model:</label>
          <select id="model" name="model" >  
             <option value="">Select a model</option>
            <option value="SF90 Stradale">SF90 Stradale</option>
            <option value="296 GTB">296 GTB</option>
            <option value="812 Gt">812 Gt</option>
            <option value="Roma">Roma</option>
            <option value="Purosangue">Purosangue</option>
          </select>
        <button name = "submit" values="submit" id="submit-btn">Modify</button>
      </form>
    </div>
  </div>

            
  <main>
  <form method="post" action="booknow.php">  
    <h2 style='color: white'>Enter Your Information</h2>
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" >
    <br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" >
    <br>
    <br>
    <label for="phone">Phone Number:</label>
    <input type="tel" id="phone" name="phone" >  
    <br>
    <br>
    <label for="model">Select Car Model:</label>
    <select id="model" name="model" >  
      <option value="">Select a model</option>
      <option value="SF90 Stradale">SF90 Stradale</option>
      <option value="296 GTB">296 GTB</option>
      <option value="812 Gt">812 Gt</option>
      <option value="Roma">Roma</option>
      <option value="Purosangue">Purosangue</option>
    </select>
    <div style="text-align: center;">
    <br>
    <br> 
    <button type="submit" name = "submit" style='font-weight: bold'>Make payment</button>
    <br>
    <br> 
    <br>
    <br> 
    <a type="submit" class = "btn" id = "ch-button" style='font-weight: bold'>Change Information</a>
    <br>
    <br> 
    <a type="submit" class = "btn" id = "button" style='font-weight: bold'>Confirm Information</a>
    </div>
  </form>
  </main>

  
  <script>

    document.getElementById("button").addEventListener("click", function(){
      document.querySelector(".popup").style.display = "flex";
    })

    document.querySelector(".close").addEventListener("click", function(){
      document.querySelector(".popup").style.display = "none";
    })

    document.getElementById("ch-button").addEventListener("click", function(){
      document.querySelector(".popupmod").style.display = "flex";
    })

    document.querySelector(".close1").addEventListener("click", function(){
      document.querySelector(".popupmod").style.display = "none";
    })

  </script>

  <footer>
    Copyright © 2024 Gearshift
  </footer>

</body>
</html>
