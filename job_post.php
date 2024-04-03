<?php
$jobTitle = $postedby = $jobCategory = $jobType = $jobLocation = $salaryRange = $experienceLevel = $applicationDeadline = $qualification = $jobDescription = $jobrequirement = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['jobTitle']) && !empty($_POST['jobTitle']) && trim($_POST['jobTitle'])) {
        $jobTitle = $_POST['jobTitle'];
        if (!preg_match('/^[a-zA-Z\s]{3,50}$/', $jobTitle)) {
            $errors['jobTitle'] = 'Enter a valid job title';
        }
    } else {
        $errors['jobTitle'] = 'Enter job title';
    }
    if (isset($_POST['postedby']) && !empty($_POST['postedby']) && trim($_POST['postedby'])) {
        $postedby = $_POST['postedby'];
        if (!preg_match('/^[a-zA-Z\s]{3,50}$/', $postedby)) {
            $errors['postedby'] = 'Enter a valid Name';
        }
    } else {
        $errors['postedby'] = 'Enter Your Name';
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

    if (isset($_POST['jobrequirement']) && !empty($_POST['jobrequirement']) && trim($_POST['jobrequirement'])) {
        $jobrequirement = explode("\n", $_POST['jobrequirement']);
        // Convert the array back to a string
       //$jobrequirement = implode(", ", $jobrequirement);
    } else {
        $errors['jobrequirement'] = 'Enter job Requirement';
    }
}
    
    // ... rest of your code ...
    
    if(empty($errors)){
        try {
            $connection = new mysqli('localhost', 'root', '', 'jobportal'); 
            // Use prepared statements to prevent SQL injection
            $stmt = $connection->prepare("INSERT INTO jobs (jobTitle, postedby, jobCategory, jobType, jobLocation, salaryRange, experienceLevel, applicationDeadline, qualification, jobDescription, jobrequirement) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssssssss", $jobTitle, $postedby, $jobCategory, $jobType, $jobLocation, $salaryRange, $experienceLevel, $applicationDeadline, $qualification, $jobDescription, $jobrequirement);
            
            if ($stmt->execute()) {
                echo "Job posted successfully";
            } else {
                echo "Error: " . $stmt->error;
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
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="Jobpost.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <title>Job Post</title>
</head>

<body>
   

    <div class="Job_post_container">
        <form action="" method="post">
            <h3>Post a job</h3>

            <div class="box_1">
            <div class="jobtitle">
            <label for="jobTitle">Job Title:</label>
            <span><?php echo isset($errors['jobTitle']) ? $errors['jobTitle'] : '' ?></span><br>
            <input type="text" id="jobTitle" name="jobTitle" value="<?php echo $jobTitle ?>" placeholder="Enter Job Title"><br>
            </div>

            <div class="postedby"><label for="postedby">Posted By:</label>
            <span><?php echo isset($errors['postedby']) ? $errors['postedby'] : '' ?></span><br>
            <input type="text" id="postedby" name="postedby" value="<?php echo $postedby ?>" placeholder="Enter Your Name"><br></div>
            </div>
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
             

            <label for="jobrequirement">Requirements:</label>
            <span><?php echo isset($errors['jobrequirement']) ? $errors['jobrequirement'] : '' ?></span><br>
            <textarea id="jobrequirement" name="jobrequirement" placeholder="Enter Job Requirement" rows="4" cols="50"><?php isset($jobrequirement) ? $jobrequirement : ''; ?></textarea>?><br>
            <div class="button_2">
            <button class="button" onclick="this.innerHTML = 'Posted!!';">
  Post
            </div>
             
        </form>
    </div>
    
</body>
</html>
