<?php
session_start();
if(!isset($_SESSION['username'])){
    header('location:adminlogin.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="admindashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <?php
    $activePage = isset($_GET['page']) ? $_GET['page'] : 'jobseeker';
    ?>
    <div>
       <input type="checkbox" id="check">
        <div class="container">
            <label for="check">
                <span class="fas fa-times" id="times"></span>
                <span class="fas fa-bars" id="bars"></span>
            </label>
            <div class="head">menu</div>
            <ol>
                <li><a href="?page=jobseeker" <?php echo ($activePage === 'jobseeker') ? 'class="active"' : ''; ?>><i class="fas fa-users"></i>&nbsp;jobseeker</a></li>
                <li><a href="?page=employer" <?php echo ($activePage === 'employer') ? 'class="active"' : ''; ?>><i class="fas fa-users"></i>&nbsp;Employer</a></li>
                <li><a href="?page=job" <?php echo ($activePage === 'job') ? 'class="active"' : ''; ?>><i class="fa-solid fa-briefcase"></i>&nbsp;Jobs</a></li>
                <li><a href="#"><i class="fa-solid fa-file"></i>&nbsp;Application</a></li>
                <li><a href="adminlogout.php"><i class="fa-solid fa-right-from-bracket"></i>&nbsp;Log Out</a></li>
            </ol>
        </div>
        <?php
        // Include the content based on the active page
        switch ($activePage) {
            case 'jobseeker':
            include 'jobseeker.php';
            break;
            case 'employer':
            include 'employer.php';
            break;
            case 'job':
            include 'job.php';
            break;
            default:
            // Handle other cases or set a default behavior
            include 'jobseeker.php';
            break;
        }
        ?>
            <!-- <div class="logo"> -->
            <!-- <h2>Job Portal</h2>
            </div>
           
        
        
        


        <footer id="footer">
        <div class="footer-bottom-content">
          <p>Designed By Job Portal teams</p>
          <div class="copyright">
              <p>&copy;Copyright <strong>Job portal</strong>.All Rights Reserved</p>
          </div>
        </div>
        </footer> -->
</body>
</html>