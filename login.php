<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$connection = new mysqli('localhost', 'root', '', 'jobportal');
$email = $password = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $err = [];
    
    if (isset($_POST['email']) && !empty($_POST['email']) && trim($_POST['email'])) {
        $email = $_POST['email'];
    } else {
        $err['email'] = 'Enter Email';
    }

    if (isset($_POST['password']) && !empty($_POST['password'])) {
        $password = $_POST['password'];
    } else {
        $err['password'] = 'Enter password';
    }

    // if (count($err) == 0) {
    //     $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    //     $result = $connection->query($sql);
        
    //     if ($result->num_rows > 0) {
    //         $user = $result->fetch_assoc();
    //         if ($user['user_type'] == 'jobseeker') {
    //             $_SESSION['email'] = $email;
    //             header('location:jobseekerdashboard.php');
    //             exit;
    //         } elseif ($user['user_type'] == 'employer') {
    //             $_SESSION['email'] = $email;
    //             header('location:empdashboard.php');
    //             exit;
    //         } else {
    //             echo 'Invalid role';
    //         }
    //     } else {
    //         echo 'Login failed';
    //     }
    // }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="login.css"> 
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="header">
        <nav>
            <div class="logo">
            <h2 onclick="window.location.href='index.php'">Job Portal</h2>
            </div>
        </nav>
        </div>
    <section class="form-box">
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" name="login_form">
            <h3>LOGIN</h3>
            <div class="field-group">
                <label for="email"><b>Email:</b></label>
                <input type="text" id="email" name="email">
                <span><?php echo isset($err['email'])?$err['email']:''; ?></span>
            </div>
            <div class="field-group">
                <label for="password"><b>Password:</b></label>
                <input type="password" id="password" name="password" >
                <span><?php echo isset($err['password'])?$err['password']:''; ?></span>
            </div>
            <div class="btn-group">
                <button type="login" name="btnLogin">Log In</button>
            </div>
            <p>Don"t have any account yet? <a href="user.php">Create a new account</a> today.</p>
        </form>
    </section>

