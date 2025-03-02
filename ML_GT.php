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
  <title>Gearshift | Aston Martin DB12</title>
  <link rel="stylesheet" href="ML_GT.css"></link>
</head>
<body>
  <header>
    <a id="logo" href="home.php">Gearshift</a>
    <h1>Gearshift | MaLaren GT</h1>
  </header>
  
  <div class="popup">
    <div class = "popup-content">

      <form action="ML_GT.php" method = "post" id="booking-form">

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
          <option value="GT">GT</option>
          <option value="Artura">Artura</option>
          <option value="570S">570S</option>
          <option value="Elva">Elva</option>
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
      <img src="https://mclaren.scene7.com/is/image/mclaren/GT%20Front34%20Dynamic5_Defy%20the%20Limits:crop-16x9?wid=1980&hei=1114" alt="SF90 Stradale hero image">
      <!--<div class="hero-content">
        <h2>Embrace Everyday Supercar Luxury: McLaren GT</h2>
        <p>Experience the thrill of supercar performance without sacrificing comfort. Conquer every journey in style and exhilaration with the McLaren GT.</p>        
      </div> -->     
    </section>

    <section class="Price">
        <h1>Price: ₹ 3.72 Cr (Estimated)</h1>
      </section>
      
      <section class="specifications">
        <h2>Specifications</h2>
        <ul>
          <li>Engine: 4.0L Twin-Turbocharged V8</li>
          <li>Horsepower: 620 PS (456 kW; 612 hp) at 7,000 rpm</li>
          <li>Torque: 465 lb⋅ft (630 N⋅m) at 5,500 rpm</li>
          <li>Transmission: 7-Speed Dual-Clutch Automatic</li>
          <li>Acceleration: 0-100 km/h in 3.2 seconds</li>
          <li>Top Speed: 326 km/h</li>
          <li>Fuel Consumption (Combined): 11.3 L/100 km (WLTP)</li>
          <li>CO2 Emissions: 254 g/km (WLTP)</li>
        </ul>
        <p>The McLaren GT is a two-seat, high-performance grand tourer designed for long-distance driving comfort and exhilarating performance.  Its powerful twin-turbocharged V8 engine delivers smooth and responsive acceleration, while the lightweight carbon fiber construction ensures exceptional handling and agility.  The spacious interior features luxurious materials and ample storage, making it ideal for weekend getaways or cross-country journeys.</p>
      </section>
      
      <section class="feature">
        <h2>Technical Data</h2>
        <ul>
          <li class="fli">Fuel Consumption (Combined): 11.3 L/100 km (WLTP)</li>
          <li class="fli">CO2 Emissions: 254 g/km (WLTP)</li>
        </ul>
        <p>The McLaren GT incorporates a driver-focused cockpit with clear instrumentation and intuitive controls. The advanced infotainment system keeps you connected and entertained on the road. The car also boasts a remarkably spacious luggage compartment for a sports car, allowing you to pack for extended adventures.</p>
      </section>

    <section class="gallery">
      <h2>Gallery</h2>
      <br>
      <img class="fimg" src="https://www.lux-mag.com/wp-content/uploads/2022/08/feature-17.jpg" alt="SF90 Stradale image">
      <img src="https://images.pistonheads.com/nimg/47663/blobid2.jpg" alt="SF90 Stradale image">
      <img src="https://mclaren.scene7.com/is/image/mclaren/GT%20Rear%2034%20Dynamic%20high-Defy%20the%20Limits:crop-2x1?wid=1920&hei=960" alt="SF90 Stradale interior">
      <img src="https://mclaren.scene7.com/is/image/mclaren/17.%20GT%20-%20Interior%20-%20v3?wid=1536&hei=890" alt="SF90 Stradale interior">
      </section>

    <section class="contact">
       <h2>Unleash Everyday Performance: McLaren GT</h2>
        <p>Experience the thrill of supercar exhilaration blended with long-distance comfort. Explore the world in style with the McLaren GT.</p>
        <a href="booknow.php" class="btn">Book Now</a>
        <a href="#" class="btn" id = "button">Book a Test Drive</a>        
    </section>

  </main>

  <script>
     document.getElementById("button").addEventListener("click", function(){
      document.querySelector(".popup").style.display = "flex";
    })

    document.querySelector(".close").addEventListener("click", function(){
      document.querySelector(".popup").style.display = "none";
    })
  </script>

  <footer>
    <p>&copy; 2024 Gearshift. All Rights Reserved.</p>
  </footer>

</body>
</html>
