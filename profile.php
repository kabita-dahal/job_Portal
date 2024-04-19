
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Responsive Profile Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    <link rel="stylesheet" href="profile.css" />
    <link rel="stylesheet" href="style.css" />
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
    
      <div class="cols__container">
        <div class="img__container">
          <form class="form" id = "form" action="" enctype="multipart/form-data" method="post">
      <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
      <div class="upload">
        <img src="img/<?php echo $profile['image']; ?>" id = "image">

        <div class="rightRound" id = "upload">
          <input type="file" name="fileImg" id = "fileImg" accept=".jpg, .jpeg, .png">
          <i class = "fa fa-camera"></i>
        </div>

        <div class="leftRound" id = "cancel" style = "display: none;">
          <i class = "fa fa-times"></i>
        </div>
        <div class="rightRound" id = "confirm" style = "display: none;">
          <input type="submit">
          <i class = "fa fa-check"></i>
        </div>
      </div>
    </form>
        </div>
        <div class="left__col">
          
          <div class="form-group">
          <label>Name:</label>
        <span id="name">John Doe</span>
        <button class="edit-icon" onclick="toggleEdit('name')"><img src="Images/edit-text.png" alt=""></button><br>
        <input type="text" id="nameInput" class="hidden">
    </div>
    <div class="form-group">
        <label>Address:</label>
        <span id="address">123 Street, City</span>
        <button class="edit-icon" onclick="toggleEdit('address')"><img src="Images/edit-text.png" alt=""></button><br>
        <input type="text" id="addressInput" class="hidden">
    </div>
    <div class="form-group" id="password-group">
    <label>Change Password:</label>
        <button class="edit-icon" onclick="toggleEdit('password')"><img src="Images/edit-text.png" alt=""></button><br>
        <div id="passwordInputs" class="hidden">
            <input type="password" id="oldPassword" placeholder="Old Password">
            <input type="password" id="newPassword" placeholder="New Password">
            <input type="password" id="confirmPassword" placeholder="Confirm Password">
        </div>
    </div>
    <div class="form-group">
        <label>Date of Birth:</label>
        <span id="dob">01-Jan-1990</span>
        <button class="edit-icon" onclick="toggleEdit('dob')"><img src="Images/edit-text.png" alt=""></button><br>
        <input type="date" id="dobInput" class="hidden">
    </div>
    <div class="form-group">
        <label>CV:</label>
        <span id="cv">Your CV Filename</span>
        <button class="edit-icon" onclick="toggleEdit('cv')"><img src="Images/edit-text.png" alt=""></button><br>
        <input type="file" id="cvInput" class="hidden">
    </div>
    <div class="form-group">
        <label>facebook Link:</label>
        <span id="facebook">https:facebook</span>
        <button class="edit-icon" onclick="toggleEdit('facebook')"><img src="Images/edit-text.png" alt=""></button><br>
        <input type="text" id="facebookInput" class="hidden">
    </div>
    <div class="form-group">
        <label>Linkdean Link:</label>
        <span id="Linkdean">https:Linkdean</span>
        <button class="edit-icon" onclick="toggleEdit('Linkdean')"><img src="Images/edit-text.png" alt=""></button><br>
        <input type="text" id="LinkdeanInput" class="hidden">
    </div>
    <div class="form-group">
        <label>X Link:</label>
        <span id="X">https:x</span>
        <button class="edit-icon" onclick="toggleEdit('X')"><img src="Images/edit-text.png" alt=""></button><br>
        <input type="text" id="XInput" class="hidden">
    </div>
    <button class="update">Update</button>
        </div>  
        </div>
      </div>
      <script type="text/javascript">
      document.getElementById("fileImg").onchange = function(){
        document.getElementById("image").src = URL.createObjectURL(fileImg.files[0]); // Preview new image

        document.getElementById("cancel").style.display = "block";
        document.getElementById("confirm").style.display = "block";

        document.getElementById("upload").style.display = "none";
      }

      var userImage = document.getElementById('image').src;
      document.getElementById("cancel").onclick = function(){
        document.getElementById("image").src = userImage; // Back to previous image

        document.getElementById("cancel").style.display = "none";
        document.getElementById("confirm").style.display = "none";

        document.getElementById("upload").style.display = "block";
      }
</script>
<script>
      function toggleEdit(id) {
            var element = document.getElementById(id);
            var input = document.getElementById(id + 'Input');
            
            if (element && input) {
                if (element.style.display === 'none') {
                    element.style.display = 'inline';
                    input.style.display = 'none';
                } else {
                    element.style.display = 'none';
                    input.style.display = 'inline';
                }
            } else if (id === 'password') {
                var div = document.getElementById('passwordInputs');
                if (div) {
                    div.style.display = (div.style.display === 'none') ? 'block' : 'none';
                }
            }
        }
    </script>
  </body>
</html>
