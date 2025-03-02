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
  <link rel="stylesheet" href="Kon_One1.css">
</head>
<body>
  <header>
    <a id="logo" href="home.php">Gearshift</a>
    <h1>Gearshift | Koenigsegg One:1</h1>
  </header>

  <div class="popup">
    <div class = "popup-content">

      <form action="Kon_One1.php" method = "post" id="booking-form">

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
          <option value="One:1">One:1</option>
          <option value="Ragera">Ragera</option>
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
      <img src="https://www.supercars.net/blog/wp-content/uploads/2020/10/koenigsegg-agera-rs1-2018-sn-scaled.jpg" alt="SF90 Stradale hero image">
      <div class="hero-content">
        <h2>Witness Automotive Greatness: Koenigsegg One:1</h2>
        <p>Experience the pinnacle of power and exclusivity. Contact our team today to learn more about acquiring this legendary hypercar.</p>
      </div>      
    </section>

    <section class="Price">
        <h1>Price: ₹ 13.5 Cr (Estimated)</h1>
      </section>
      
      <section class="specifications">
        <h2>Specifications</h2>
        <ul>
          <li>Engine: 5.0L Twin-Turbocharged V8 with Electric Motor</li>
          <li>Horsepower: 1,341 hp (combined)</li>
          <li>Torque: 1,371 Nm</li>
          <li>Transmission: 7-Speed Dual-Clutch</li>
          <li>Acceleration: 0-100 km/h in 2.8 seconds</li>
          <li>Top Speed: Over 450 km/h (estimated)</li>
          <li>Fuel Consumption (Combined): N/A (limited production)</li>
          <li>CO2 Emissions: N/A (limited production)</li>
        </ul>
        <p>The Koenigsegg One:1 is a limited-production hypercar renowned for its incredible power-to-weight ratio of 1:1. It boasts a revolutionary powertrain combining a powerful twin-turbocharged V8 engine with an electric motor. The One:1 delivers mind-blowing acceleration and a truly exhilarating driving experience. However, due to its limited production and focus on performance, official fuel consumption and CO2 emission figures are not readily available.</p>
      </section>
      
      <section class="feature">
        <h2>Technical Data</h2>
        <ul>
          <li class="fli">Fuel Consumption (Combined): N/A (limited production)</li>
          <li class="fli">CO2 Emissions: N/A (limited production)</li>
        </ul>
        <p>The Koenigsegg One:1 pushes the boundaries of automotive engineering. Its lightweight carbon fiber construction and advanced aerodynamics contribute to its exceptional performance. The One:1 is a testament to Koenigsegg's commitment to innovation and creating the ultimate driving machines.</p>
      </section>
      
      
      

    <section class="gallery">
      <h2>Gallery</h2>
      <br>
      <img class="fimg" src="https://i.pinimg.com/originals/20/9c/8e/209c8e71344ca2942fe3723417fc5a54.jpg" alt="SF90 Stradale image">
      <img src="https://i.pinimg.com/originals/5b/5a/41/5b5a41577c543758ff6caf3a3295c9fc.jpg" alt="SF90 Stradale image">
      <img src=" https://c4.wallpaperflare.com/wallpaper/1004/418/511/koenigsegg-agera-one-1-koenigsegg-hypercar-koenigsegg-one-1-wallpaper-preview.jpg" alt="SF90 Stradale interior">
      <img src="https://preview.redd.it/m4z3sqvvwl921.png?width=640&crop=smart&auto=webp&s=339af28a642fbb7588456af57a99e40ab59b859b" alt="SF90 Stradale interior">
      </section>

    <section class="contact">
        <h2>Witness Automotive Greatness: Koenigsegg One:1</h2>
        <p>Experience the pinnacle of power and exclusivity. Contact our team today to learn more about acquiring this legendary hypercar, the Koenigsegg One:1.</p>
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
