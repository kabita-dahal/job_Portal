<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Portal</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="jobseekerdashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="header">
        <nav>
            <div class="logo">
              
                <h2 onclick="window.location.href='index.php'">Job Portal</h2>
              </a>
            </div>
            <div class="search-bar">
             <form action="#" method="GET"> <!-- Update action and method attributes as needed -->
            <input type="text" name="search" placeholder="Search...">
            <button type="submit"><i class="fas fa-search"></i></button>
            </form>
         </div>
         <div class="notification-icon" onclick="window.location.href='notification.php'">
        <i class="fas fa-bell"></i>
        </div>
         <div class="profile" onclick="window.location.href='profile.php'">
                <img src="Images/profile.png" alt="" width=25px>
        </div>
        </nav>
  </div>
        <div class="banner-container">
        <div class="banner-slide">
            <div class="text_1"><h1><span>Find</span> Your </br> Team</h1></br></br>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
            </p> 
            </div>
            <div class="banner_image"><img src="Images/gf.gif" ></div>
          </div>  
          <div class="banner-slide">
            <div class="text_1"><h1><span>Find</span> dreams </br> with <span>opportunities</span></h1></br></br>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
            </p> 
            </div>
            <div class="banner_image"><img src="Images/gif3.gif" ></div>
          </div>
          <div class="banner-slide">
            <div class="text_1"><h1><span>Enhance </span> Your </br> Skill </h1></br></br>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
            </p> 
            </div>
            <div class="banner_image"><img src="Images/gif4.gif" ></div>
          </div>
          <div class="banner-slide">
            <div class="text_1"><h1><span>Grab</span> Work </br> Life <span>Balance</span></h1></br></br>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
            </p> 
            </div>
            <div class="banner_image"><img src="Images/gif5.gif"></div>
          </div>
        </div>

 
      <!-- javascript for banner -->
        <script>
  document.addEventListener('DOMContentLoaded', function() {
  const slides = document.querySelectorAll('.banner-slide');
  let currentSlide = 0;

  function showSlide(index) {
    slides.forEach((slide, i) => {
      if (i === index) {
        slide.style.display = 'flex';
      } else {
        slide.style.display = 'none';
      }
    });
  }

  function nextSlide() {
    currentSlide = (currentSlide + 1) % slides.length;
    showSlide(currentSlide);
  }

  // Show the first slide initially
  showSlide(currentSlide);

  // Auto-looping functionality
  setInterval(nextSlide, 3000); // Change slide every 3 seconds (3000 milliseconds)
});
// Change slide every 3.5 seconds
</script>


  <!-- job section -->
          <div class="heading4">
        <h3>Jobs You may like</h3>
        </div>
        <div class="job_box"> 
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
          <div class="left_container">
            <h3>Jobs by categories</h3>
              <div class="category_type">
              <a href="#"><img src="Images/trial.png" alt="category_type" /></a>
                <span>Legal</span>
              </div>
              <div class="category_type">
                  <a href="#"><img src="Images/hotel.png" alt="category_type" /></a>
                <span>Hotel Sector</span>
              </div>
              <div class="category_type">
                  <a href="#"> <img src="Images/telecommunication.png" alt="category_type" /></a>
                <span>Telecommunication</span>
              </div>
              <div class="category_type">
                  <a href="#"> <img src="Images/plane.png" alt="category_type" /></a>
                <span>Transportation</span>
              </div>
              <div class="category_type">
                  <a href="#"> <img src="Images/bride-dress.png" alt="category_type" /></a>
                <span>Fashion Designing</span>
              </div>
              <div class="category_type">
                  <a href="#"><img src="Images/public-service.png" alt="category_type" /></a>
                <span>Hospatility and Services</span>
              </div>
              <div class="category_type">
                  <a href="#"> <img src="Images/medical_13726456.png" alt="category_type" /></a>
                <span>Medical</span>
              </div>
              <div class="category_type">
                  <a href="#"> <img src="Images/world-news.png" alt="category_type" /></a>
                <span>Jornalism</span>
              </div>
              <div class="category_type">
                  <a href="#"> <img src="Images/meeting_13649813.png" alt="category_type" /></a>
                <span>Teaching</span>
              </div>
              <div class="category_type">
                  <a href="#"> <img src="Images/paint-tool.png" alt="category_type" /></a>
                <span>Creative</span>
              </div>
              <div class="category_type">
                  <a href="#"> <img src="Images/cpu.png" alt="category_type" /></a>
                <span>Technology</span>
              </div>
              <div class="category_type">
                  <a href="#"><img src="Images/bank_6914201.png" alt="category_type" /></a>
                <span>Banking & Finance</span>
              </div>
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