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
        <div class="left-column">
            <div class="jobdetails_child1">
                <div class="row">
                    <div class="pp-left">
                        <div class="company-logo">
                            <img src="Images/pathao.png" width="50px">
                        </div>
                        <div class="company-info">
                            <h4><?php echo $fetch_job['jobTitle']; ?></h4>
                            <p>pathao pvt ltd</p>
                            <p><strong>Location:</strong> </p>
                        </div>
                    </div>
                    <div class="pp-right"><?php echo $fetch_job['jobLocation']; ?>
                        <div class="buttons">
                            <button class="button2" onclick="this.innerHTML = 'Applied!!';"> <i class="fa-solid fa-paper-plane"></i> Apply</button>
                        </div>
                    </div>
                </div>
            </div>
            
        <div class="jobdetails_child2">
            <div class="section">
                <div class="section-content">
                    <h2>Job Specification</h2>
                    <div class="section__container banner__1__container">
                        <div class="icon">
                        <a href="#"><img src="Images/salary.png" alt="icon" /></a>
                            <span>Offered Salary:</span>
                            <p><?php echo $fetch_job['salaryRange']; ?></p>
                        </div>
                        <div class="icon">
                        <a href="#"><img src="Images/hourglass.png" alt="icon" /></a>
                            <span>Job Type:</span>
                        </div>
                        <div class="icon">
                        <a href="#"><img src="Images/experience.png" alt="icon" /></a>
                            <span>Experience:</span>
                            <p><?php echo $fetch_job['experienceLevel']; ?></p>
                        </div>
                    </div>
                    <div class="section__container banner__1__container">
                        <div class="icon">
                        <a href="#"><img src="Images/calender.png" alt="icon" /></a>
                            <span>Valid Till:</span>
                            <p><?php echo $fetch_job['applicationDeadline']; ?></p>
                        </div>
                        <div class="icon">
                        <a href="#"><img src="Images/industry.png" alt="icon" /></a>
                            <span>Industry:</span>
                            <p></p>
                        </div>
                        <div class="icon">
                        <a href="#"><img src="Images/qualification.png" alt="icon" /></a>
                            <span>Qualification:</span>
                            <p><?php echo $fetch_job['qualification']; ?></p>
                        </div>
                    </div>
                    <!-- <p><strong>Minimum Qualification:</strong> <?php echo $fetch_job['qualification']; ?></p>
                    <p><strong>Experience Level:</strong> <?php echo $fetch_job['experienceLevel']; ?></p>
                    <p><strong>Application Deadline:</strong> <?php echo $fetch_job['applicationDeadline']; ?></p>
                    <p><strong>Salary Range:</strong> <?php echo $fetch_job['salaryRange']; ?></p> -->
                </div>
            </div>
        </div>
        <div class="jobdetails_child3">
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
                        <li>Contribute to technical design and architecture</li>
                        <li>Troubleshoot and debug software issues</li>
                        <li>Collaborate with cross-functional teams</li>
                        <li>Provide technical support and mentorship</li>
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
    </div>
    <div class="right-column">
        <div class="jobdetails_child4_sticky_wrapper">
            <div class="jobdetails_child4">
                <h2>About Company</h2>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Illum molestiae nostrum distinctio, repudiandae asperiores laborum soluta, maxime sapiente, eos praesentium voluptatem eveniet? Ipsa possimus iusto molestias culpa neque odio, voluptatibus inventore deserunt magni nesciunt dignissimos porro quidem assumenda? Voluptatum eius id temporibus! Quae voluptatum voluptate, reiciendis ipsam culpa doloremque adipisci incidunt, esse, dolores fuga inventore. Distinctio ut recusandae labore reprehenderit.</p>
            </div>
        </div>
    </div>
</div>
    <footer id="footer">
        <div class="footer-content">
            <div class="logo">
                <h2>Job Portal</h2>
            </div>
            <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et labore suscipit nisi non, laudantium delectus?
                <br>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt, molestias!
            </p> -->
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
