
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
          <img src="Images/profile.png" alt="" />
        </div>
        <div class="left__col">
          <h2>Dikshya Shahi</h2>
          <div class="content">
            <p>
              Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aliquam
              erat volutpat. Morbi imperdiet, mauris ac auctor dictum, nisl
              ligula egestas nulla.
            </p>

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
  
  </body>
</html>
