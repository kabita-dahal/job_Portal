<?php
$cname = $industry = $contact_no = $email = $location = $password = $confirm_password = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['cname']) && !empty($_POST['cname']) && trim($_POST['cname'])) {
        $cname = $_POST['cname'];
        if (!preg_match('/^[a-zA-Z\s]{3,50}$/', $cname)) {
            $errors['cname'] = 'Enter valid company name';
        }
    } else {
        $errors['cname'] = 'Enter company name';
    }

    if (isset($_POST['industry']) && !empty($_POST['industry'])) {
        $industry = $_POST['industry'];
    } else {
        $errors['industry'] = 'Select Company Industry';
    }

    if (isset($_POST['contact_no']) && !empty($_POST['contact_no']) && trim($_POST['contact_no'])) {
        $contact_no = $_POST['contact_no'];
        if (!preg_match('/^[0-9]{10}$/', $contact_no)) {
            $errors['contact_no'] = 'Enter valid contact number';
        }
    } else {
        $errors['contact_no'] = 'Enter contact number';
    }

    if (isset($_POST['email']) && !empty($_POST['email']) && trim($_POST['email'])) {
        $email = $_POST['email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Enter valid email';
        }
    } else {
        $errors['email'] = 'Enter email';
    }

    if (isset($_POST['location']) && !empty($_POST['location']) && trim($_POST['location'])) {
        $location = $_POST['location'];
    } else {
        $errors['location'] = 'Enter company location';
    }

    if (isset($_POST['password']) && !empty($_POST['password'])) {
        $password = $_POST['password'];
    } else {
        $errors['password'] = 'Enter password';
    }

    if (isset($_POST['confirm_password']) && !empty($_POST['confirm_password'])) {
        $confirm_password = $_POST['confirm_password'];
        if ($confirm_password !== $password) {
            $errors['confirm_password'] = 'Passwords do not match';
        }
    } else {
        $errors['confirm_password'] = 'Confirm password';
    }

    if (!isset($_POST['terms'])) {
        $errors['terms'] = 'You must agree to the terms and conditions';
    }

    $cname = $_POST['cname'];
    $industry = $_POST['industry'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $contact_no = $_POST['contact_no'];
    $location = $_POST['location'];
    $confirm_password = $_POST['confirm_password'];
    try{
        require_once 'connection.php';
        $sql = "INSERT INTO employer(cname, industry, email, password, contact_no, location, confirm_password) values('$cname', '$industry', '$email', '$password', '$contact_no', '$location', '$confirm_password')";
        $connection->query($sql);
        echo "Data inserted successfully";
    }catch(Exception $ex){
        die('Error: ' . $ex->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Employers_register.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Employers Registration Form</title>
</head>

<body>
    <div class="header">
        <nav>
            <div class="logo">
                <h2>Job Portal</h2>
            </div>
            <div class="member">
                <p> Are you Already a member?
                    <a href="login.php">Login here</a></p>
            </div>
        </nav>
    </div>
    <div class="container_1">

        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <h3>Registration Form</h3>

            <div class="inputbox">
                <label for="cname">Company Name:</label> 
                <span><?php echo isset($errors['cname']) ? $errors['cname'] : '' ?></span><br>
                <input type="text" id="cname" name="cname" value="<?php echo $cname ?>" placeholder="Enter company name"><br>

                <label for="industry">Company Industry:</label>
                <span><?php echo isset($errors['industry']) ? $errors['industry'] : '' ?></span><br>
                <select id="industry" name="industry">
                    <option disabled selected value="">Select Company Industry</option>
                    <option value="it" <?php echo ($industry == 'it') ? 'selected' : '' ?>>IT</option>
                    <option value="finance" <?php echo ($industry == 'finance') ? 'selected' : '' ?>>Finance</option>
                    <option value="manufacturing" <?php echo ($industry == 'manufacturing') ? 'selected' : '' ?>>Manufacturing</option>
                </select><br>

                <label for="contact_no">Company Contact No:</label>
                <span><?php echo isset($errors['contact_no']) ? $errors['contact_no'] : '' ?></span><br>
                <input type="text" id="contact_no" name="contact_no" value="<?php echo $contact_no ?>" placeholder="Enter contact number"><br>

                <label for="email">Email:</label>
                <span>  <?php echo isset($errors['email']) ? $errors['email'] : '' ?></span><br>
                <input type="email" id="email" name="email" value="<?php echo $email ?>" placeholder="Enter email"><br>

                <label for="location">Company Location:</label>
               <span> <?php echo isset($errors['location']) ? $errors['location'] : '' ?></span><br>
                <input type="text" id="location" name="location" value="<?php echo $location ?>" placeholder="Enter company location"><br>

                <label for="password">Password:</label>
                <span><?php echo isset($errors['password']) ? $errors['password'] : '' ?></span><br>
                <input type="password" id="password" name="password" placeholder="Enter password"><br>

                <label for="confirm_password">Confirm Password:</label>
                <span><?php echo isset($errors['confirm_password']) ? $errors['confirm_password'] : '' ?></span>
                <br>
                <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm password"><br>
            </div>
            <div class="term">
                <input type="checkbox" id="terms" name="terms">
                <label for="terms">I agree to the terms and conditions.</label>
               <span> <?php echo isset($errors['terms']) ? $errors['terms'] : '' ?></span><br>
            </div>
            <div class="button">
                <button type="submit">Register</button>
            </div>
        </form>
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
                <p>&copy; Copyright <strong>Job portal</strong>. All Rights Reserved</p>
            </div>
        </div>
    </footer>
</body>

</html>
