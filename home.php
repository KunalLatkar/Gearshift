<?php
session_start();
include "dbcon.php";

if(isset($_POST['submit'])){
    
    $login_name = $_POST['username'];
    $login_password = $_POST['password'];

    $query = "select username , password from login where username = '$login_name'";
    $result = mysqli_query($conn,$query);
    $userdata= mysqli_fetch_assoc($result);

    if($result && mysqli_num_rows($result) > 0){
        if($login_password == $userdata['password']){
            header("Location: home.php");
            die;
        }
    }
    else {
      // Login failed - Display an error message and keep user on login window
      $errorMessage = "Invalid username or password.";  // Replace with your desired message
    }

}   

if(isset($_POST['submitreg'])){

  $Username = $_POST['username'];
  $Password = $_POST['password'];

  $query2 = "insert into login(username,password) values ('$Username', '$Password')";

  mysqli_query($conn,$query2);

  header("Location: home.php");
  die;
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Gearshift</title>
<link rel="stylesheet" href="home.css">
</head>
<body>
  
    <div class="video-container">
        <video autoplay muted loop>
          <source src="home.mp4" type="video/mp4">
        </video>
    </div>

  <header>
    <div class="navbar">
        <a id="logo" href="home.php">Gearshift</a>
        <a id="names" href="home.php">Home</a>
        <a id="names" href="AboutUs.html">About Us</a>
        <a id="names" href="Gearshift_Services.html">Services</a>
        <a id="names" href="GearShift_ContactUs.html">Contact</a>
    </div>
  </header>

  <main>
    <div id="main-text">
      <h2>Gearshift: Drive the Legend</h2>
      <p>Gearshift elevates the driving experience with a selection of premium automobiles that are a statement of your success.</p>
    </div>

    <div id="outerbtn">
      <div>
      <a href="#" id="btn">Sign in</a>
      </div>
    </div>

    <div class="popup">
      <div class = "popup-content">

          <form action="home.php" method = "post">
          <h2>Login</h2>
            <img src="close.png" alt="" class="close">
              <input type="text" class="input" name="username" placeholder="username">
              <input type="password" class="input" name="password" placeholder="password">
              <p id= "reg">click me to create account</p>
              <button name = "submit" value = "submit" class="input" id="button">Login</button>
          </form>
      </div>
    </div>

    <div class="popupreg">
      <div class = "popup-content">
          <form action="home.php" method = "post">
          <h2>Registration</h2>
            <img src="close.png" alt="" class="closereg">
              <input type="text" class="input" name="username" placeholder="username">
              <input type="password" class="input" name="password" placeholder="password">
              <button name = "submitreg" value = "submitreg" class="input" id="button">Registration</button>
          </form>
      </div>
    </div>

    <!--1st frame-->
    <section class="windows-container">
      <div class="window">
        <a href="SF90_STRADALE.php"><img src="f1.png" alt="Window 5"><br>Ferrari SF90 Stradale</a>
      </div>
      <div class="window">
        <a href="ML_GT.php"><img src="https://mclaren.scene7.com/is/image/mclaren/GT%20Front34%20Dynamic5_Defy%20the%20Limits:crop-16x9?wid=1980&hei=1114" alt="Window 2"><br>Mclaren GT</a>
      </div>
      <div class="window">
        <a href="AM_db12.php"><img src="https://stimg.cardekho.com/images/carexteriorimages/930x620/Aston-Martin/DB12/10185/1696480591668/front-left-side-47.jpg" alt="Window 3"><br>Aston Martin DB12</a>
      </div>
      <div class="window">
        <a href="Kon_One1.php"><img src="Koeni.png" alt="Window 4"><br>Koenigsegg One:1</a>
      </div>
    </section>

<!--2nd frame-->

    <section class="windows-container2">
      <div class="window">
        <a href="ferrari.html"><img src="https://mclaren.scene7.com/is/image/mclaren/McLarenArtura-7:crop-16x9?wid=1980&hei=1114" alt="Window 1"><br>McLaren Artura</a>
      </div>
      <div class="window">
        <a href=""><img src="https://www.supercars.net/blog/wp-content/uploads/2020/10/2016-Koenigsegg-Regera-005-2000-scaled.jpg" alt="Window 6"><br>Koenigsegg Ragera</a>
      </div>
      <div class="window">
        <a href="home.html"><img src="f3.png" alt="Window 7"><br>Ferrari 812 Gt</a>
      </div>
      <div class="window">
        <a href="window4-page.html"><img src="https://mclaren.scene7.com/is/image/mclaren/570s-spider-spec-1920x1080:crop-16x9?wid=1980&hei=1114" alt="Window 8"><br>McLaren 570S</a>
      </div>
    </section>
    <section class="windows-container2">
      <div class="window">
        <a href="ferrari.html"><img src="https://mclaren.scene7.com/is/image/mclaren/Elva_Monaco-002:crop-4x3?wid=1920&hei=1440" alt="Window 9"><br>McLaren Elva</a>
      </div>
      <div class="window">
        <a href="FERRARI 296 GTB.html"><img src="f7.png" alt="Window 10"><br>Ferrari 296 GTB</a>
      </div>
      <div class="window">
        <a href="window3-page.html"><img src="https://hips.hearstapps.com/hmg-prod/images/2023-aston-martin-dbs-101-1673450308.jpg" alt="Window 11"><br>Aston Martin DBS Coupe</a>
      </div>
      <div class="window">
        <a href="window4-page.html"><img src="f4.png" alt="Window 12"><br>Ferrari Purosangue</a>
      </div>
    </section>
    <section class="windows-container2">
      <div class="window">
        <a href="ferrari.html"><img src="https://configurator.astonmartin.com/iod/GB/AM614/2048/N4IgpgdgbglgTgewgW0gFxALlDAJlkAZTQFdcYEB9ANRgGcSBDAGxgC8w4QBfAGhADGjVHEZYc+TCABCABUqzGaABYBhYZ0aFlCNJQCiADwz8EABzQUIdcSFxgA5nDBgsAZgAM3PoKQAzGAdbPAIAQQBZADYARgAWEFMLKxtsXwgAoMwAbRA3aLcAJgSQUIBVaIAOYulpABEAaWragBUi-lVpD3j2wgBJSOKAMQBxAFZukGHZVQmAGWbe6OLwgAlpgHla-X1S5bXVTf1Z4ebagCVZvY2ts5Xa4tlQ-IeAOVmJ2TPhj2LCTqX+IRBp5frJ9KpKL11i9KNJZqV9L9msM2kRSsjis1ZrIAOyYs7lfEAdQBIGaRPq9346MWxSJZ2kAEUEqBVKpbGyCGDCjw+KAVpdUgKCBdIgNvLx+etbCtpVJReK+URBaBCIKyQApOK8yVo2yEXZSZpa+IS0BY2wWqSzCo8s1kw3mw0gG0g+1E5q2D0EG2VXkAXQlIEYEBgyCUySwWX9-FQaDE2G8QA" alt="Window 13"><br>Aston Martin Vantage</a>
      </div>
      <div class="window">
        <a href="window2-page.html"><img src="f8.png" alt="Window 14"><br>Ferrari Roma</a>
      </div>
      <div class="window">
        <a href="window3-page.html"><img src="https://media.evo.co.uk/image/private/s--joYV2txH--/f_auto,t_content-image-full-mobile@1/v1678118711/evo/2023/03/Aston%20Martin%20Valkyrie%20review%20-8.jpg" alt="Window 15"><br>Aston Martin Valkyrie</a>
      </div>
      <div class="window">
        <a href="window4-page.html"><img src="https://www.astonmartin.com/-/media/models---am690/final-images/scrollables-final/20230627_am690_trailer_desktop/am_690_trailer_desktop022.jpg?rev=3648203eed18452c90eb32e3559ea59a&hash=8CD25D5C5AE0AC6D1962F8C10274B50C" alt="Window 16"><br>Aston Martin Valour</a>
      </div>
    </section>
  </main>

  <script>
    document.getElementById("btn").addEventListener("click", function(){
      document.querySelector(".popup").style.display = "flex";
    })

    document.querySelector(".close").addEventListener("click", function(){
      document.querySelector(".popup").style.display = "none";
    })
  
    document.getElementById("reg").addEventListener("click", function(){
      document.querySelector(".popupreg").style.display = "flex";
    })

    document.querySelector(".closereg").addEventListener("click", function(){
      document.querySelector(".popupreg").style.display = "none";
    })

    if (document.getElementById("error-message") !== null) {
      const errorMessage = "<?php echo isset($_SESSION['errorMessage']) ? $_SESSION['errorMessage'] : ''; ?>";
      document.getElementById("error-message").innerText = errorMessage;
      <?php unset($_SESSION['errorMessage']); ?>  // Clear error message from session after displaying it
    }

  </script>

  <footer>
    Copyright © 2024 Gearshift
  </footer>
</body>
</html>
