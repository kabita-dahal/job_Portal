<?php 
session_start();

if (!isset($_SESSION['email'])) {
    die("Access denied.");
}

$jobseeker_email = $_SESSION['email'];
$mysqli = new mysqli("localhost", "root", "", "jobportal");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$stmt = $mysqli->prepare("SELECT j_image, jobseeker_name, mobno, address, cv, dob, description FROM jobseeker WHERE jobseeker_email = ?");
$stmt->bind_param("s", $jobseeker_email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $j_image = $row['j_image'];
    $jobseeker_name = $row['jobseeker_name'];
    $mobno = $row['mobno'];
    $address = $row['address'];
    $cv = $row['cv'];
    $dob = $row['dob'];
    $description = $row['description'];
} else {
    die("No jobseeker found with the given email.");
}

$stmt->close();
$mysqli->close();
?>

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
                <h2 onclick="window.location.href='jobseekerdashboard.php'">Job Portal</h2>
            </div>
            <div class="search-bar">
                <form action="#" method="GET">
                    <input type="text" name="search" placeholder="Search...">
                    <button type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
            <div class="notification-icon" onclick="window.location.href='notification.php'">
                <i class="fas fa-bell"></i>
            </div>
            <div class="profile" onclick="toggleDropdown()">
            <img src="<?php echo $j_image; ?>" alt="Profile Image" width=25px />
            </div>
            <div class="dropdown" id="dropdownMenu">
                <div class="user-info">
                <img src="<?php echo $j_image; ?>" alt="Profile Image" width=25px />

                    <h4><?php echo $jobseeker_name; ?></h4>
                </div>
                <hr>
                <div class="dropdownlist">
                    <a href="logout.php" class="sub-menu-links"><img src="Images/exit.png"><p>Logout</p></a>
                    <a href="#" class="sub-menu-links"><img src="Images/help.png"><p>Help</p></a>
                    <a href="profile.php" class="sub-menu-links"><img src="Images/edit-info.png"><p>Profile</p></a>
                </div>
            </div>
        </nav>
    </div>

     
    <div class="banner-main">
       <div class="banner-container">
        <div class="banner-slide">
            <div class="text_1"><h1><span>Find</span> Your </br> Team</h1></br></br>
            
            </div>
            <div class="banner_image"><img src="Images/gf.gif" ></div>
          </div>  
          <div class="banner-slide">
            <div class="text_1"><h1><span>Find</span> dreams </br> with <span>opportunities</span></h1></br></br>
            
            </div>
            <div class="banner_image"><img src="Images/gif3.gif" ></div>
          </div>
          <div class="banner-slide">
            <div class="text_1"><h1><span>Enhance </span> Your </br> Skill </h1></br></br>
            
            </div>
            <div class="banner_image"><img src="Images/gif4.gif" ></div>
          </div>
          <div class="banner-slide">
            <div class="text_1"><h1><span>Grab</span> Work </br> Life <span>Balance</span></h1></br></br>
            
            </div>
            <div class="banner_image"><img src="Images/gif5.gif"></div>
          </div>
        </div>
        <div class="rightside-banner">
            <div class="card-container">
                <div class="image-container">
                    <img src="<?php echo $j_image; ?>" alt="Profile Image" />
                    <h4><?php echo $jobseeker_name; ?></h4>
                </div>
                <hr>
                <div class="lower-container">
                    <h4><?php echo $jobseeker_name; ?></h4>
                    <p><?php echo $address; ?></p>
                    <p><?php echo $description; ?></p>
                    <ul>
                        <li><i class="fab fa-x"></i>
                        <i class="fab fa-linkedin"></i>
                        <i class="fab fa-facebook"></i>
                        <i class="fab fa-github"></i>
                    </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Javascript for banner -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const slides = document.querySelectorAll('.banner-slide');
        let currentSlide = 0;

        function showSlide(index) {
            slides.forEach((slide, i) => {
                slide.style.display = i === index ? 'flex' : 'none';
            });
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % slides.length;
            showSlide(currentSlide);
        }

        showSlide(currentSlide);
        setInterval(nextSlide, 3000);
    });

    const dropdownMenu = document.getElementById('dropdownMenu');
    dropdownMenu.style.display = 'none';

    function toggleDropdown() {
        dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
    }

    document.addEventListener('click', function(event) {
        const profileIcon = document.querySelector('.profile');
        if (!profileIcon.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.style.display = 'none';
        }
    });
    </script>

    <div class="job_box1"> 
        <div class="job-box2">
            <div class="job_list1">
                <h3>Jobs You may like</h3>
                <?php
                $connection = new mysqli('localhost', 'root', '', 'jobportal');
                $sql = "SELECT job_id, jobTitle, jobLocation, jobType FROM job ";
                $result = $connection->query($sql);
                if ($result->num_rows > 0) {
                    while ($fetch_job = $result->fetch_assoc()) {
                        echo '<div class="job_details">
                            <div class="company-logo"><a href="#"><img src="Images/pathao.png" width="50px"></a></div>
                            <div class="inner">
                                <p>Lorem, ipsum dolor.</p>
                                <h3>' . $fetch_job['jobTitle'] . '</h3>
                                <i class="fa-solid fa-location-dot"></i><span>' . $fetch_job['jobLocation'] . '</span>
                                <i class="fa-solid fa-business-time"></i><span>' . $fetch_job['jobType'] . '</span>
                            </div>
                            <a href="jobdetails.php?id=' . $fetch_job['id'] . '"><button class="button2">View Details</button></a>
                        </div>';
                    }
                } else {
                    echo 'No jobs found';
                }
                $connection->close();
                ?>
            </div>
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
</div>
</body>
</html>