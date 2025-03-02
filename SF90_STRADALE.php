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
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $model = $_POST["model"];
    $date = $_POST["dob"];

    // Prepare SQL statement
    $sql = "INSERT INTO test_drive_bookings (fname, email, phone, model, dob) 
            VALUES ('$name', '$email', '$phone', '$model', '$date')";

    // Execute SQL statement
    if ($conn->query($sql) === TRUE) {
        echo "Test drive booking successful!";
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
  <title>Gearshift | Ferrari SF90 Stradale</title>
  <link rel="stylesheet" href="SF90 STRADALE.css"></link>
</head>
<body>
  <header>
    <a id="logo" href="home.php">Gearshift</a>
    <h1>Ferrari SF90 Stradale</h1>
  </header>


  <div class="popup">
    <div class = "popup-content">

      <form action="SF90_STRADALE.php" method = "post" id="booking-form">

        <img src="close.png" alt="" class="close">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        
        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone" required>
        
        <label for="model">Select Model:</label>
        <select id="model" name="model" required>
          <option value="">Select a model</option>
          <option value="SF90 Stradale">SF90 Stradale</option>
          <option value="296 GTB">296 GTB</option>
          <option value="812 Gt">812 Gt</option>
          <option value="Roma">Roma</option>
          <option value="Purosangue">Purosangue</option>
          <!-- Add more options as needed -->
        </select>
        
        <label for="date">Preferred Date:</label>
        <input type="date" id="date" name="dob" required>
        
        <button name = "submit" values="submit" id="submit-btn">Book Now</button>
      </form>
    </div>
  </div>


  <main>
    <section class="hero">
      <img src="https://www.goodcarbadcar.net/wp-content/uploads/2023/05/Ferrari-SF90-scaled.jpeg" alt="SF90 Stradale hero image">
      <div class="hero-content">
        <h1>The Redefinition of Performance</h1>
        <p>Experience the pinnacle of hybrid hypercar technology with the Ferrari SF90 Stradale.</p>
      </div>
    </section>

    <section class="Price">
      <h1>Price: ₹ 7.50 Cr</h1>
    </section>

    <section class="specifications">
        <h2>Specifications</h2>
        <ul>
          <li>Engine: 4.0L Twin-Turbocharged V8 with 3 Electric Motors</li>
          <li>Horsepower: 1,000 hp (combined)</li>
          <li>Transmission: 8-Speed Automatic</li>
          <li>Acceleration: 0-60 mph in 2.5 seconds</li>
          <li>Top Speed: Over 200 mph</li>
          <li>Electric Range: Up to 16 miles</li>
          <li>CO2 Emissions: 154 G/KM (Fiorano) / 160 G/KM</li>
          <li>Fuel Consumption: 6.1 L/100 KM (Fiorano) / 6.0 L/100 KM</li>
          <li>Electric Energy Consumption: 123 WH/KM (Fiorano) / 120 WH/KM</li>
        </ul>
        <p>The SF90 Stradale is the first ever Ferrari to feature PHEV (Plug-in Hybrid Electric Vehicle) architecture which sees the internal combustion engine integrated with three electric motors, two of which are independent and located on the front axle, with the third at the rear between the engine and the gearbox. MART COOLING FLOW MANAGEMENT The internal combustion engine, gearbox, turbo-charged air, battery pack and electric motors, the inverters and charging systems and brakes all need cooling. Meticulous attention was paid to the design of the engine bay which houses both the usual internal combustion engine systems that generate temperatures of nearly 900°C, and highly temperature-sensitive electronic components.</p>
      </section>
      

      <section class="feature">
        <h2>Technical Data</h2>
        <ul>
          <li class="fli">CO2 Emissions: 154 G/KM (Fiorano) / 160 G/KM</li>
          <li class="fli">Fuel Consumption: 6.1 L/100 KM (Fiorano) / 6.0 L/100 KM</li>
          <li class="fli">Electric Energy Consumption: 123 WH/KM (Fiorano) / 120 WH/KM</li>
        </ul>
        <p>The SF90 Stradale is the first ever Ferrari to feature PHEV (Plug-in Hybrid Electric Vehicle) architecture which sees the internal combustion engine integrated with three electric motors, two of which are independent and located on the front axle, with the third at the rear between the engine and the gearbox. MART COOLING FLOW MANAGEMENT The internal combustion engine, gearbox, turbo-charged air, battery pack and electric motors, the inverters and charging systems and brakes all need cooling. Meticulous attention was paid to the design of the engine bay which houses both the usual internal combustion engine systems that generate temperatures of nearly 900°C, and highly temperature-sensitive electronic components.</p>
      </section>
      

    <section class="gallery">
      <h2>Gallery</h2>
      <br>
      <img class="fimg" src="https://cdn.motor1.com/images/mgl/xqq24z/s1/novitec-ferrari-sf90-stradale-2022.jpg" alt="SF90 Stradale image">
      <img src="https://www.carscoops.com/wp-content/uploads/2023/08/Ferrari-SF90-Spider-2n.jpg" alt="SF90 Stradale image">
      <img src="https://doubleapex.co.za/wp-content/uploads/2022/07/Novitec-Ferrari-SF90-Stradale-side-1.jpg" alt="SF90 Stradale interior">
      <img src="https://www.topgear.com/sites/default/files/cars-car/image/2020/07/dsc09285.jpg?w=1280&h=720" alt="SF90 Stradale interior">
      </section>

    <section class="contact">
      <h2>Ready to Experience the SF90 Stradale?</h2>
      <p>Contact our team today to learn more and schedule a test drive.</p>
      <a href="booknow.php" class="btn" >Book Now</a>
      <a href="#" class="btn" id = "button">Book Test Drive</a>
    </section>

  </main>

  <script>
    document.getElementById("button").addEventListener("click", function(){
      document.querySelector(".popup").style.display = "flex";
    })

    document.querySelector(".close").addEventListener("click", function(){
      document.querySelector(".popup").style.display = "none";
    })

    /*document.getElementById("booking-form").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent default form submission behavior

    // Assuming successful form processing on the server-side (replace with your logic)
    alert("Thank you for your booking request! You have booked a test drive successfully .");

    // Reset the form (optional)
    this.reset();
  });*/
  </script>

  <footer>
    <p>&copy; 2024 Gearshift. All Rights Reserved.</p>
  </footer>

</body>
</html>
