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
  <link rel="stylesheet" href="AM_DB12.css">
</head>
<body>
  <header>
    <a id="logo" href="home.php">Gearshift</a>
    <h1>Gearshift | Aston Martin DB12</h1>
  </header>

  
  <div class="popup">
    <div class = "popup-content">

      <form action="AM_db12.php" method = "post" id="booking-form">

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
          <option value="DB12">DB12</option>
          <option value="Valkyrie">Valkyrie</option>
          <option value="DBS coupe">DBS coupe</option>
          <option value="Vantage">Vantage</option>
          <option value="Valour">Valour</option>
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
      <img src="https://stimg.cardekho.com/images/carexteriorimages/930x620/Aston-Martin/DB12/10185/1696480591668/front-left-side-47.jpg" alt="SF90 Stradale hero image">
      <div class="hero-content">
        <h1>Unleash Legendary Power</h1>
        <p>Embrace automotive excellence with the Aston Martin DB12, a grand tourer born from racing heritage.</p>
      </div>      
    </section>

    <section class="Price">
        <h1>Price: ₹ 4.59 Cr</h1>
      </section>
      
      <section class="specifications">
        <h2>Specifications</h2>
        <ul>
          <li>Engine: 5.2L Twin-Turbocharged V12</li>
          <li>Horsepower: 670.69 bhp @ 6000 rpm</li>
          <li>Torque: 800 Nm @ 2750-6000 rpm</li>
          <li>Transmission: 8-Speed Automatic</li>
          <li>Acceleration: 0-100 km/h in 3.6 seconds</li>
          <li>Top Speed: 325 km/h</li>
          <li>Fuel Consumption (Combined): 13.1 L/100 km</li>
          <li>CO2 Emissions: 299 G/km</li>
        </ul>
        <p>The Aston Martin DB12 is a high-performance luxury grand tourer renowned for its powerful engine, exquisite design, and exceptional handling. It boasts a handcrafted interior featuring premium materials like leather and Alcantara, along with cutting-edge technology for a luxurious driving experience.</p>
      </section>
      
      <section class="feature">
        <h2>Technical Data</h2>
        <ul>
          <li class="fli">Fuel Consumption (Combined): 13.1 L/100 km</li>
          <li class="fli">CO2 Emissions: 299 G/km</li>
        </ul>
        <p>The Aston Martin DB12 utilizes a powerful 5.2L Twin-Turbocharged V12 engine mated to an 8-speed automatic transmission, delivering an exhilarating driving experience. The car features a perfect balance of power and refinement, making it ideal for both spirited drives and comfortable cruising.</p>
      </section>
      
      

    <section class="gallery">
      <h2>Gallery</h2>
      <br>
      <img class="fimg" src="https://stimg.cardekho.com/images/carexteriorimages/930x620/Aston-Martin/DB12/10185/1696480491666/side-view-(left)-90.jpg" alt="SF90 Stradale image">
      <img src="https://hips.hearstapps.com/hmg-prod/images/the-new-aston-martin-db12-31-646e5b8396677.jpg" alt="SF90 Stradale image">
      <img src="https://wallpapercave.com/wp/wp2074609.jpg" alt="SF90 Stradale interior">
      <img src="https://configurator.astonmartin.com/static/assets/modelselection/am572@3.png" alt="SF90 Stradale interior">
      </section>

    <section class="contact">
        <h2>Own the Legacy: Aston Martin DB12</h2>
        <p>Experience automotive excellence firsthand. Contact our team today to learn more and schedule a test drive of the legendary Aston Martin DB12.</p>
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
