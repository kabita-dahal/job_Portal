<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Details</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="jobdetails.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <?php
    if(isset($_GET['id'])) {
        $job_id = $_GET['id'];
        $connection = new mysqli('localhost', 'root', '', 'jobportal');
        $sql = "SELECT id, jobTitle, qualification, experienceLevel, jobLocation, applicationDeadline, salaryRange, jobDescription, jobrequirement FROM jobs WHERE id = $job_id";
        $result = $connection->query($sql);
        if ($result->num_rows == 1) {
            $fetch_job = $result->fetch_assoc();
    ?>
    <div class="header">
        <nav>
            <div class="logo">
                <h2 onclick="window.location.href='index.php'">Job Portal</h2>
            </div>
        </nav>
    </div>
    
    <div class="company-name">
        <h3><?php echo $fetch_job['jobTitle']; ?>- Match Company</h3>
    </div>
    <div class="jobdetails_container">
        <div class="jobdetails_child1">
            <div class="description-content">
                <!-- <div class="buttons">
                    <button class="button2">View company</button>
                </div> -->
                <div class="buttons">
                    <button class="button2" onclick="this.innerHTML = 'Applied!!';">Apply</button>
                </div>
            </div>
        <div class="section">
            <div class="section-content">
                <p><strong>Minimum Qualification:</strong> <?php echo $fetch_job['qualification']; ?></p>
                <p><strong>Experience Level:</strong> <?php echo $fetch_job['experienceLevel']; ?></p>
                <p><strong>Location:</strong> <?php echo $fetch_job['jobLocation']; ?></p>
                <p><strong>Application Deadline:</strong> <?php echo $fetch_job['applicationDeadline']; ?></p>
                <p><strong>Salary Range:</strong> <?php echo $fetch_job['salaryRange']; ?></p>
            </div>
        </div>
        <div class="section">
            <h2>Job Description</h2>
            <div class="section-content">
                <p><?php echo $fetch_job['jobDescription']; ?></p>
            </div>
        </div>
        <div class="section">
            <h2>Requirements</h2>
            <div class="section-content">
                <ul>
                    <?php 
                    if (is_string($fetch_job['jobrequirement'])) {
                        $requirements = explode("\n", $fetch_job['jobrequirement']);
                        foreach($requirements as $requirement) {
                            echo "<li>" . htmlspecialchars($requirement, ENT_QUOTES, 'UTF-8') . "</li>";
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
        <div class="section">
            <h2>Responsibilities</h2>
            <div class="section-content">
                <ul>
                    <li>Collaborate with the development team to create high-quality software solutions</li>
                    <li>Participate in code reviews and provide constructive feedback</li>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing.</li>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing.</li>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing.</li>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing.</li>
                </ul>
            </div>
        </div>
    <?php
        }
    } else {
        echo 'No jobs found';
    }
    ?>
    </div>
    <div class="jobdetails_child2">
        <h4>About Company</h4>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Illum molestiae nostrum distinctio, repudiandae asperiores laborum soluta, maxime sapiente, eos praesentium voluptatem eveniet? Ipsa possimus iusto molestias culpa neque odio, voluptatibus inventore deserunt magni nesciunt dignissimos porro quidem assumenda? Voluptatum eius id temporibus! Quae voluptatum voluptate, reiciendis ipsam culpa doloremque adipisci incidunt, esse, dolores fuga inventore. Distinctio ut recusandae labore reprehenderit.</p>
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
                <p>&copy; Copyright <strong>Job portal</strong>. All Rights Reserved</p>
            </div>
        </div>
    </footer>
</body>
</html>
