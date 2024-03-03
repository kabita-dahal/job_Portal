<?php
if (isset($_COOKIE['email'])) {
    session_start();
    $_SESSION['email'] = $_COOKIE['email'];
}
$email = $password = '';
if (isset($_POST['btnLogin'])) {
    $err =[];
    if (isset($_POST['email']) && !empty($_POST['email']) && trim($_POST['email'])){
        $email = trim($_POST['email']);
    } else {
        $err['email'] = 'Enter email';
    }
    if(isset($_POST['password']) && !empty($_POST['password'])){
        $password = $_POST['password'];
    } else {
        $err['password'] = 'Enter password';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login.css"> 
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <script>
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
      </script> 
    <div class="header">
        <nav>
            <div class="logo">
            <h2>Job Portal</h2>
            </div>
            <div class="content">
            <button class="dropdown-btn" onclick="toggleDropdown('myDropdown1')">For Jobseekers <span class="arrow-down">&#9660;</span></button>
            <div id="myDropdown1" class="dropdown-content">
              <a href="login.html">Login</a>
              <a href="register.html">Register</a>
            </div>
            <button class="dropdown-btn" onclick="toggleDropdown('myDropdown2')">For Employers <span class="arrow-down">&#9660;</span></button>
            <div id="myDropdown2" class="dropdown-content">
              <a href="login.html">Login</a>
              <a href="#">Register</a>
            </div>
            </div>
        </nav>
        </div>
    <section class="form-box">
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" name="login_form">
            <h3>LOGIN</h3>
            <p>Already a registered member? Login here</p>
            <div class="field-group">
                <label for="email"><b>Email:</b></label>
                <input type="text" id="email" name="email">
                <?php echo isset($err['email'])?$err['email']:''; ?>
            </div>
            <div class="field-group">
                <label for="password"><b>Password:</b></label>
                <input type="password" id="password" name="password" >
                <?php echo isset($err['password'])?$err['password']:''; ?>
            </div>
            <div class="btn-group">
                <button type="submit" name="btnLogin">Log In</button>
            </div>
            <p>Don"t have any account yet? <a href="registter.html">Create a new account</a> today.</p>
        </form>
    </section>
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