<?php
error_reporting(0);
try {
    require_once 'connection.php';
    //$connection = new mysqli('localhost', 'root', '', 'Online_jobportal');
    $sql = "SELECT * FROM jobs ORDER BY jobTitle ASC"; 
    $result = $connection->query($sql);
    $jobs = [];

    if ($result->num_rows > 0) {
        while ($record = $result->fetch_assoc()) {
            array_push($jobs, $record);
        }
    } else {
        echo 'No job data found';
    }
} catch (Exception $ex) {
    die('Error: ' . $ex->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobs</title>
</head>

<body>
   <h3> Jobs</h3>

   <div class="list_jobs">
    <table>
        <tr>
            <th>job-id</th>
            <th>Job Title</th>
            <th>Type</th>
            <th>posted by</th>
            <th>Application Deadline</th>
            <th>Action</th>
        </tr>
        <?php foreach ($jobs as $key => $job) { ?>
            <tr>
                <td><?php echo $key + 1 ?></td>
                <td><?php echo $job['jobTitle'] ?></td>
                <td><?php echo $job['jobType'] ?></td>
                <td><?php echo 'sample.Co' ?></td>
                <td><?php echo $job['applicationDeadline'] ?></td>
                <td>
                    <a onclick="return confirm('Are you sure to update?')" href="update_job.php?id=<?php echo $job['id'] ?>">Update</a>
                    <a onclick="return confirm('Are you sure to delete?')" href="delete_job.php?id=<?php echo $job['id'] ?>">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
   </div>
    <!-- <script>

var btnContainer = document.getElementById("menu_id");

var btns = btnContainer.getElementsByClassName("menu");

for (var i = 0; i < btns.length; i++) {

btns[i].addEventListener('click', function () {

var current = document.getElementsByClassName("active");

current[0].className = current[0].className.replace("active");
 this.className += active";

})
}
</script> -->
</body>
</html>

