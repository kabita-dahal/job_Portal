<?php 
session_start();

if (!isset($_SESSION['email'])) {
    header('location:c_login.php');
}

$c_email = $_SESSION['email'];
$mysqli = new mysqli("localhost", "root", "", "jobportal");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$stmt = $mysqli->prepare("SELECT c_name, c_location, contact_no, industry FROM company WHERE c_email = ?");
$stmt->bind_param("s", $c_email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // $j_image = $row['j_image'];
    $c_name = $row['c_name'];
    $c_location = $row['c_location'];
    $contact_no = $row['contact_no'];
    $industry = $row['industry'];
    // $dob = $row['dob'];
    // $description = $row['description'];
} else {
    die("No company found with the given email.");
}
$stmt->close();
$mysqli->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emp dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="jobseekerdashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        table{
            width: 100%;
            border-collapse: collapse;
            border: 1px solid grey;
        }
        th, td{
            padding: 10px;
            text-align: center;
        }
        
        table tr {
            border-bottom: 1px solid lightgrey;
        }
        table tr:last-child {
            border-bottom: none;
        }
    h2 {
        color: #338573;
    }

    nav {
        overflow: hidden;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 20px;
    }

    nav a {
        display: block;
        color: #338573;
        padding: 10px 12px;
        text-decoration: none;
        font-weight: normal;
        font-size: 16px;
    }

    nav a:hover, nav a:active, .active {
        text-decoration: underline;
        background-color: #338573;
        color: white;
    }

    .logo {
        margin-right: 20px;
    }

    .nav-links{
        flex: 1;
        display: flex;
        justify-content: flex-end;
    }
    .nav-links ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        display: flex;
    }

    .nav-links li {
        margin-right: 20px;
    }

    .nav-links a {
        font-weight: bold;
        font-size: 18px;
        
    }

    .nav-links a:hover {
        background-color: #338573;
        color: white;
    }

    .nav-links .active a {
        background-color: #338573;
        color: white;
    }

    .nav-links a:last-child {
        margin-right: 0;
    }
    .dropdown {
    position: absolute;
    top: 73px; 
    right: 10px;
    background-color: #fdfdfd;
    width: 150px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.2);
    padding: 15px;
    border-radius: 10px;
}
.dropdown::before{
    content: '';
    position: absolute;
    top: -18px;
    right: 28px;
    border: 10px solid;
    border-color: transparent transparent #f4f2f2 transparent;
}
.dropdown .user-info{
    display: flex;
    align-items: center;
}
.dropdown .user-info img{
        width: 30px;
        height: 30px;
        object-fit: cover;
        border-radius: 50%;
        cursor: pointer;
        border: 1.5px solid #338573;
        margin-right: 8px;
}
.dropdown .dropdownlist img{
width: 15px;
height: 15px;
background: #e5e5e5;
border-radius: 35%;
padding: 5px;
margin-right: 15px;
}
.dropdown hr{
    border: 0;
    width: 100%;
    height: 1px;
    margin: 10px 0 5px;
    background: #ccc;
}
.dropdown .dropdownlist .sub-menu-links{
    display: flex;
    align-items: center;
    color: #525252;
    margin: 12px 0;
}
.dropdown .dropdownlist .sub-menu-links p{
width: 100%;
}
.dropdownlist :hover p{
font-weight: 600;
transition: transform 0.5s;
transform: translateY(-0.4px);
}
</style>
</head>
<body>
    <?php
    $activePage = isset($_GET['page']) ? $_GET['page'] : 'applicant';
    ?>
    <div class="header">
        <nav>
            <div class="logo">
            <h2>Job Portal</h2>
            </div>
            <div class="nav-links">
                <ul>
                    <li><a href="?page=applicant" <?php echo ($activePage === 'applicant') ? 'class="active"' : ''; ?>>Applicants</a></li>
                    <li><a href="?page=job_post" <?php echo ($activePage === 'job_post') ? 'class="active"' : ''; ?>>Open Position</a></li>
                </ul>
            </div>
            <div class="notification-icon" onclick="window.location.href='notification.php'">
                <i class="fas fa-bell"></i>
            </div>
            <div class="profile" onclick="toggleDropdown()">
                <img src="Images/profile.png" alt="profile" width=25px>
            </div>
            <div class="dropdown" id="dropdownMenu">
                <div class="user-info">
                <img src="Images/profile.png" alt="profile" width="25px"> 
                <h4>XYZ companny</h4>
                </div>
                 <hr>
                <div class="dropdownlist">
                    <a href="#" class="sub-menu-links"><img src="Images/exit.png"><p>Logout</p> </a>
                    <a href="#" class="sub-menu-links"> <img src="Images/help.png"><p>Help</p></a>
                    <a href="profile.php" class="sub-menu-links"><img src="Images/edit-info.png"><p> Profile</p onclick="window.location.href='profile.php'"></a>
                </div>
            </div>
        </nav>
        <script>
            // Set initial state of dropdown menu to hidden
            const dropdownMenu = document.getElementById('dropdownMenu');
            dropdownMenu.style.display = 'none';

            function toggleDropdown() {
                dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
            }

            // Close dropdown if user clicks outside
            document.addEventListener('click', function(event) {
                const profileIcon = document.querySelector('.profile');

                if (!profileIcon.contains(event.target) && !dropdownMenu.contains(event.target)) {
                    dropdownMenu.style.display = 'none';
                }
            });
        </script>

    </div>
        <hr>
        <?php
        // Include the content based on the active page
        switch ($activePage) {
            case 'applicant':
            include 'applicant.php';
            break;
            case 'job_post':
            include 'job_post.php';
            break;
            default:
            // Handle other cases or set a default behavior
            include 'applicant.php';
            break;
        }
        ?>


        <footer id="footer">
        <div class="footer-bottom-content">
          <p>Designed By Job Portal teams</p>
          <div class="copyright">
              <p>&copy;Copyright <strong>Job portal</strong>.All Rights Reserved</p>
          </div>
        </div>
        </footer>
</body>
</html>