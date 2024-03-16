<?php
$jobTitle = $jobCategory = $jobType = $jobLocation = $salaryRange = $experienceLevel = $applicationDeadline = $qualification = $jobDescription = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['jobTitle']) && !empty($_POST['jobTitle']) && trim($_POST['jobTitle'])) {
        $jobTitle = $_POST['jobTitle'];
        if (!preg_match('/^[a-zA-Z\s]{3,50}$/', $jobTitle)) {
            $errors['jobTitle'] = 'Enter a valid job title';
        }
    } else {
        $errors['jobTitle'] = 'Enter job title';
    }

    if (isset($_POST['jobCategory']) && !empty($_POST['jobCategory'])) {
        $jobCategory = $_POST['jobCategory'];
    } else {
        $errors['jobCategory'] = 'Select job category';
    }

    if (isset($_POST['jobType']) && !empty($_POST['jobType'])) {
        $jobType = $_POST['jobType'];
    } else {
        $errors['jobType'] = 'Select job type';
    }

    if (isset($_POST['jobLocation']) && !empty($_POST['jobLocation']) && trim($_POST['jobLocation'])) {
        $jobLocation = $_POST['jobLocation'];
    } else {
        $errors['jobLocation'] = 'Enter job location';
    }

    if (isset($_POST['salaryRange']) && !empty($_POST['salaryRange']) && trim($_POST['salaryRange'])) {
        $salaryRange = $_POST['salaryRange'];
    } else {
        $errors['salaryRange'] = 'Enter salary range';
    }

    if (isset($_POST['experienceLevel']) && !empty($_POST['experienceLevel']) && trim($_POST['experienceLevel'])) {
        $experienceLevel = $_POST['experienceLevel'];
    } else {
        $errors['experienceLevel'] = 'Enter experience';
    }

    if (isset($_POST['applicationDeadline']) && !empty($_POST['applicationDeadline'])) {
        $applicationDeadline = $_POST['applicationDeadline'];
    } else {
        $errors['applicationDeadline'] = 'Enter deadline';
    }

    if (isset($_POST['qualification']) && !empty($_POST['qualification']) && trim($_POST['qualification'])) {
        $qualification = $_POST['qualification'];
    } else {
        $errors['qualification'] = 'Enter qualification';
    }

    if (isset($_POST['jobDescription']) && !empty($_POST['jobDescription']) && trim($_POST['jobDescription'])) {
        $jobDescription = $_POST['jobDescription'];
    } else {
        $errors['jobDescription'] = 'Enter job description';
    }
}
error_reporting(0);
if(empty($errors)){
    try {
    $connection = new mysqli('localhost', 'root', '', 'jobportal'); 
        $sql = "INSERT INTO jobs (jobTitle, jobCategory, jobType, jobLocation, salaryRange, experienceLevel, applicationDeadline, qualification, jobDescription)
                VALUES ('$jobTitle', '$jobCategory', '$jobType', '$jobLocation', '$salaryRange', '$experienceLevel', '$applicationDeadline', '$qualification', '$jobDescription')";

        $connection->query($sql);
        echo "Job posted successfully";
    } catch (Exception $ex) {
        die('Error: ' . $ex->getMessage());
    }
}

?>

<!DOCTYPE html>
<html lang="en">
//Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus doloremque alias dicta nihil?
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="Jobpost.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <title>Job Post</title>
</head>

<body>
    <div class="header">
        <nav>
            <div class="logo">
                <h2>Job Portal</h2>
            </div>
        </nav>
    </div>
    <hr>

    <div class="Job_post_container">
        <form action="" method="post">
            <h3>Post a job</h3>

            <label for="jobTitle">Job Title:</label>
            <span><?php echo isset($errors['jobTitle']) ? $errors['jobTitle'] : '' ?></span><br>
            <input type="text" id="jobTitle" name="jobTitle" value="<?php echo $jobTitle ?>" placeholder="Enter Job Title"><br>

            <div class="box_1">
                <div class="cate_gory">
                    <label for="jobCategory">Job Category:</label>
                    <span><?php echo isset($errors['jobCategory']) ? $errors['jobCategory'] : '' ?></span><br>
                    <select id="jobCategory" name="jobCategory">
                        <option disabled selected value="">Select Job Category</option>
                        <option value="IT" <?php echo ($jobCategory == 'IT') ? 'selected' : '' ?>>IT</option>
                        <option value="Marketing" <?php echo ($jobCategory == 'Marketing') ? 'selected' : '' ?>>Marketing</option>
                        <option value="Finance" <?php echo ($jobCategory == 'Finance') ? 'selected' : '' ?>>Finance</option>
                        <option value="Others" <?php echo ($jobCategory == 'Others') ? 'selected' : '' ?>>Others</option>
                    </select><br>
                </div>
                <div class="Jobtype">
                    <label for="jobType">Job Type:</label>
                    <span><?php echo isset($errors['jobType']) ? $errors['jobType'] : '' ?></span><br>
                    <select id="jobType" name="jobType">
                        <option disabled selected value="">Select Job Type</option>
                        <option value="full-time" <?php echo ($jobType == 'full-time') ? 'selected' : '' ?>>Full-time</option>
                        <option value="part-time" <?php echo ($jobType == 'part-time') ? 'selected' : '' ?>>Part-time</option>
                        <option value="contract" <?php echo ($jobType == 'contract') ? 'selected' : '' ?>>Contract</option>
                        <option value="temporary" <?php echo ($jobType == 'temporary') ? 'selected' : '' ?>>Temporary</option>
                    </select><br>
                </div>
            </div>
            <div class="box_1">
                <div class="location">
                    <label for="jobLocation">Job Location:</label>
                    <span><?php echo isset($errors['jobLocation']) ? $errors['jobLocation'] : '' ?></span><br>
                    <input type="text" id="jobLocation" name="jobLocation" value="<?php echo $jobLocation ?>" placeholder="Enter Job Location"><br>
                </div>
                <div class="salary_range">
                    <label for="salaryRange">Salary Range:</label>
                    <span><?php echo isset($errors['salaryRange']) ? $errors['salaryRange'] : '' ?></span><br>
                    <input type="text" id="salaryRange" name="salaryRange" value="<?php echo $salaryRange ?>" placeholder="Enter Salary Range"><br>
                </div>
            </div>
            <div class="box_1">
                <div class="experience_1">
                    <label for="experienceLevel">Experience Level:</label>
                    <span><?php echo isset($errors['experienceLevel']) ? $errors['experienceLevel'] : '' ?></span><br>
                    <input type="text" id="experienceLevel" name="experienceLevel" value="<?php echo $experienceLevel ?>" placeholder="Enter Experience Level"><br>
                </div>
                <div class="application_deadline">
                    <label for="applicationDeadline">Application Deadline:</label>
                    <span><?php echo isset($errors['applicationDeadline']) ? $errors['applicationDeadline'] : '' ?></span><br>
                    <input type="date" id="applicationDeadline" name="applicationDeadline" value="<?php echo $applicationDeadline ?>"><br>
                </div>
            </div>
            <label for="qualification">Qualification:</label>
            <span><?php echo isset($errors['qualification']) ? $errors['qualification'] : '' ?></span><br>
            <input type="text" id="qualification" name="qualification" value="<?php echo $qualification ?>" placeholder="Enter qualification" /><br>

            <label for="jobDescription">Job Description:</label>
            <span><?php echo isset($errors['jobDescription']) ? $errors['jobDescription'] : '' ?></span><br>
            <textarea id="jobDescription" name="jobDescription" placeholder="Enter Job Description" rows="4" cols="50"><?php echo $jobDescription ?></textarea><br>

            <div class="button_2">
                <button type="submit">Post Job</button>
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
                <p>&copy;Copyright <strong>Job portal</strong>.All Rights Reserved</p>
            </div>
        </div>
    </footer>
</body>
</html>
