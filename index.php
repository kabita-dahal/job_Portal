<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Portal</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
  <!-- <script>
    // Toggle the visibility of the dropdown content
    function toggleDropdown(dropdownId) {
      var dropdown = document.getElementById(dropdownId);
      dropdown.classList.toggle("show");
    }
  
    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event) {
      if (!event.target.matches('.dropdown-btn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        for (var i = 0; i < dropdowns.length; i++) {
          var openDropdown = dropdowns[i];
          if (openDropdown.classList.contains('show')) {
            openDropdown.classList.remove('show');
          }
        }
      }
    }
  </script>  -->
    <div class="header">
        <nav>
            <div class="logo">
                <h2 onclick="window.location.href='index.php'">Job Portal</h2>
            </div>
            <div class="search-bar">
             <form action="#" method="GET"> <!-- Update action and method attributes as needed -->
            <input type="text" name="search" placeholder="Search...">
            <button type="submit"><i class="fas fa-search"></i></button>
            </form>
         </div>
            <!-- <ul>
              <li class="dropdown">
                  <a href="#" class="dropbtn">Jobseeker</a>
                  <div class="dropdown-content">
                      <a href="#">Option 1</a>
                      <a href="#">Option 2</a>
                  </div>
              </li>
              <li class="dropdown">
                  <a href="#" class="dropbtn">Employer</a>
                  <div class="dropdown-content">
                      <a href="#">Option 1</a>
                      <a href="#">Option 2</a>
                  </div>
              </li>
          </ul> -->
            <div class="main-nav">
            <span class="toggle-menu" id="toggleMenu">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
              <ul>
                <li><button class="dropdown-btn" onclick="window.location.href='login.php'">Login </button></li>
                <li><button class="dropdown-btn" onclick="window.location.href='user.php'">Register </button></li>
              </ul>
            </div>
        </nav>
        <div class="banner">
            <div class="text_1"><h1><span>Connecting</span> dreams </br> <span>with </span>opportunities</h1></br></br>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
            </p> <br>
            <button class="button3">Get Started.</button>
            </div>
            <img src="Images/Untitled design (3).png" width=auto;>
          </div>

          <h3 class="heading2">Polular Categories</h3>
          <section class="banner__1">
            <div class="section__container banner__1__container">
              <div class="icon">
              <a href="#"><img src="Images/trial.png" alt="icon" /></a>
                  <!-- <a href="#"> <video src="Images/trial.mp4" autoplay muted loop width="40px"></video></a> -->
                <span>Legal</span>
              </div>
              <div class="icon">
                  <a href="#"><img src="Images/hotel.png" alt="icon" /></a>
                <span>Hotel Sector</span>
              </div>
              <div class="icon">
                  <a href="#"> <img src="Images/telecommunication.png" alt="icon" /></a>
                <span>Telecommunication</span>
              </div>
              <div class="icon">
                  <a href="#"> <img src="Images/plane.png" alt="icon" /></a>
                <span>Transportation</span>
              </div>
              <div class="icon">
                  <a href="#"> <img src="Images/bride-dress.png" alt="icon" /></a>
                <span>Fashion Designing</span>
              </div>
              <div class="icon">
                  <a href="#"><img src="Images/public-service.png" alt="icon" /></a>
                <span>Hospatility and Services</span>
              </div>
            </div>
            <div class="section__container banner__1__container">
              <div class="icon">
                  <a href="#"> <img src="Images/medical_13726456.png" alt="icon" /></a>
                <span>Medical</span>
              </div>
              <div class="icon">
                  <a href="#"> <img src="Images/world-news.png" alt="icon" /></a>
                <span>Jornalism</span>
              </div>
              <div class="icon">
                  <a href="#"> <img src="Images/meeting_13649813.png" alt="icon" /></a>
                <span>Teaching</span>
              </div>
              <div class="icon">
                  <a href="#"> <img src="Images/paint-tool.png" alt="icon" /></a>
                <span>Creative</span>
              </div>
              <div class="icon">
                  <a href="#"> <img src="Images/cpu.png" alt="icon" /></a>
                <span>Technology</span>
              </div>
              <div class="icon">
                  <a href="#"><img src="Images/bank_6914201.png" alt="icon" /></a>
                <span>Banking & Finance</span>
              </div>
            </div>
          </section>

          <div class="heading3">
        <h3>Jobs You may like</h3>
        </div>
        <div class="job_box">
          <div class="left_image">
          <h3>Explore Opportunities!!</h3>
            <img src="Images/job_img2.png" alt="" width="350px">
       </div>



        <div class="job_list">
<?php
$connection = new mysqli('localhost', 'root', '', 'jobportal');
$sql = "SELECT id, jobTitle, jobLocation, jobType FROM jobs";
$result = $connection->query($sql); // Execute the SQL query
$jobs = [];
if ($result->num_rows > 0) {
    while ($fetch_job = $result->fetch_assoc()) {
        array_push($jobs, $fetch_job);
?>
<div class="job_details">
    <div class="company-logo"><a href="#"><img src="Images/pathao.png" width="50px"></a></div>
    <div class="inner">
        <p>Lorem, ipsum dolor.</p>
        <h3><?php echo $fetch_job['jobTitle']; ?></h3>
        <i class="fa-solid fa-location-dot"></i><span><?php echo $fetch_job['jobLocation']; ?></span>
        <i class="fa-solid fa-business-time"></i><span><?php echo $fetch_job['jobType']; ?></span>
    </div>
    
    <a href="jobdetails.php?id=<?php echo $fetch_job['id']; ?>">  <button class="button2">View Details</button></a>    
</div>
<?php
    }
} else {
    echo 'No jobs found';
}
?>
          </div>
        </div>
 
    <footer id="footer">
      <div class="footer-content">
        <div class="logo">
          <h2>Job Portal</h2>
          </div>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et labore suscipit nisi non, laudantium delectus?
              <br>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt, molestias!
          </p>
          <div class="socail-links">
              <i class="fa-brands fa-twitter"></i>
              <i class="fa-brands fa-facebook-f"></i>
              <i class="fa-brands fa-instagram"></i>
              <i class="fa-brands fa-youtube"></i>
              <i class="fa-brands fa-pinterest-p"></i>
          </div>
      </div>
      <div class="footer-bottom-content">
          <p>Designed By Job Portal teams</p>
          <div class="copyright">
              <p>&copy;Copyright <strong>Job portal</strong>.All Rights Reserved</p>
          </div>
      </div>
  </footer>
</body>
</html>