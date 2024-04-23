<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emp dashboard</title>
    <link rel="stylesheet" href="style.css">
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
            <div class="profile" onclick="window.location.href='profile.php'">
                <img src="Images/profile.png" alt="" width=25px>
             </div>
        </nav>
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