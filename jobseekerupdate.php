<?php
$jobseeker_name = $dob = $mobno = $address = $jobseeker_email = $password = $confirm_password = '';
$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['jobseeker_name']) && !empty($_POST['jobseeker_name']) && trim($_POST['jobseeker_name'])) {
        $jobseeker_name = $_POST['jobseeker_name'];
    } else {
        $errors['jobseeker_name'] = 'Enter your name';
    }

    if (isset($_POST['dob']) && !empty($_POST['dob']) && trim($_POST['dob'])) {
        $dob = $_POST['dob'];
        if ($dob == '00-00-0000') {
            $errors['dob'] = 'Invalid date';
        }
    } else {
        $errors['dob'] = 'Enter your date of birth';
    }

    if (isset($_POST['mobno']) && !empty($_POST['mobno']) && trim($_POST['mobno'])) {
        $mobno = $_POST['mobno'];
    } else {
        $errors['mobno'] = 'Enter your mobile number';
    }

    if (isset($_POST['address']) && !empty($_POST['address']) && trim($_POST['address'])) {
        $address = $_POST['address'];
    } else {
        $errors['address'] = 'Enter your address';
    }

    if (isset($_POST['jobseeker_email']) && !empty($_POST['jobseeker_email']) && trim($_POST['jobseeker_email'])) {
        $jobseeker_email = $_POST['jobseeker_email'];
    } else {
        $errors['jobseeker_email'] = 'Enter your email';
    }

    if (isset($_POST['password']) && !empty($_POST['password']) && trim($_POST['password'])) {
        $password = $_POST['password'];
        if (!preg_match('/^(?=.*[A-Z])(?=.*\d).{8,}$/', $password)) {
            $errors['password'] = 'Password must be at least 8 characters with at least one uppercase letter and one number';
        }
    } else {
        $errors['password'] = 'Enter a password';
    }

    if (isset($_POST['confirm_password']) && !empty($_POST['confirm_password']) && trim($_POST['confirm_password'])) {
        $confirm_password = $_POST['confirm_password'];
        if ($password !== $confirm_password) {
            $errors['confirm_password'] = 'Passwords do not match';
        }
    } else {
        $errors['confirm_password'] = 'Confirm your password';
    }

    if (!isset($_POST['terms'])) {
        $errors['terms'] = 'You must agree to the terms and conditions';
    }

    if (empty($errors)) {
        try {
            require_once 'connection.php';
            $sql = "UPDATE jobseeker SET jobseeker_name=?, dob=?, mobno=?, address=?, cv=? WHERE jobseeker_email=?";
            $stmt = $connection->prepare($sql);
            $stmt->bind_param("ssssss", $jobseeker_name, $dob, $mobno, $address, $cv, $jobseeker_email);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                echo "Jobseeker updated successfully";
            } else {
                echo "No changes made";
            }
        } catch (Exception $ex) {
            die('Error: ' . $ex->getMessage());
        }
    }
}
?>

<?php
if (isset($_GET['email'])) {
    $jobseeker_email = $_GET['email'];
    try {
        require_once 'connection.php';
        $sql = "SELECT * FROM jobseeker WHERE jobseeker_email = ?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("s", $jobseeker_email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $record = $result->fetch_assoc();
        } else {
            die('Data not found');
        }
    } catch (Exception $ex) {
        die('Error: ' . $ex->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="header">
        <nav>
            <div class="logo">
                <h2>Job Portal</h2>
            </div>
        </nav>
    </div>
    <section class="form-box">
        <form action="" method="post" name="login_form">
            <div class="field-group">
                <label for="jobseeker_name"><b>Name:</b></label>
                <span><?php echo isset($errors['jobseeker_name']) ? $errors['jobseeker_name'] : ''; ?></span><br>
                <input type="text" id="jobseeker_name" name="jobseeker_name" value="<?php echo htmlspecialchars($jobseeker_name); ?>" placeholder="Enter your name"><br>
            </div>
            <div class="field-group">
                <label for="dob"><b>Date of Birth:</b></label>
                <input type="text" name="dob" value="<?php echo isset($record['dob']) ? htmlspecialchars($record['dob']) : ''; ?>">
                <span><?php echo isset($errors['dob']) ? $errors['dob'] : ''; ?></span>
            </div>
            <div class="field-group">
                <label for="mobno"><b>Mobile Number:</b></label>
                <input type="text" name="mobno" value="<?php echo isset($record['mobno']) ? htmlspecialchars($record['mobno']) : ''; ?>">
                <span><?php echo isset($errors['mobno']) ? $errors['mobno'] : ''; ?></span>
            </div>
            <div class="field-group">
                <label for="address"><b>Address:</b></label>
                <input type="text" name="address" value="<?php echo isset($record['address']) ? htmlspecialchars($record['address']) : ''; ?>">
                <span><?php echo isset($errors['address']) ? $errors['address'] : ''; ?></span>
            </div>
            <div>
                <label for="cv"><b>CV:</b></label>
                <input type="file" name="cv" value="<?php echo isset($record['cv']) ? htmlspecialchars($record['cv']) : ''; ?>">
                <span><?php echo isset($errors['cv']) ? $errors['cv'] : ''; ?></span>
            </div>
            <div class="btn-group">
                <button type="submit" name="register">Update</button>
            </div>
        </form>
    </section>
    <footer id="footer">
        <div class="footer-content">
            <div class="logo">
                <h2>Job Portal</h2>
            </div>
            <div class="social-links">
                <i class="fa-brands fa-twitter"></i>
                <i class="fa-brands fa-facebook-f"></i>
                <i class="fa-brands fa-instagram"></i>
                <i class="fa-brands fa-youtube"></i>
                <i class="fa-brands fa-pinterest-p"></i>
            </div>
        </div>
        <div class="footer-bottom-content">
            <p>Designed By Job Portal team</p>
            <div class="copyright">
                <p>&copy;Copyright <strong>Job portal</strong>. All Rights Reserved</p>
            </div>
        </div>
    </footer>
</body>
</html>
