<?php
// error_reporting(0);
try{
    require_once 'connection.php';
    $sql = "select p_id,fname,lname, address, cv from jobseeker ";
    $result = $connection->query($sql);
    $jobseekers = [];
    if ($result->num_rows > 0) { // mysqli_num_rows()
        while ($record = $result->fetch_assoc()) { // mysqli_fetch_assoc()
            array_push($jobseekers,$record);
        }
    } else {
        echo 'Data not found';
    }
    // print_r($products);
}catch(Exception $ex){
    die('Error: ' . $ex->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>jobseeker</title>
</head>
<body>
<h3>List of jobseeker</h3>
    <table>
        <tr>
            <th>P_id</th>
            <th>Name</th>
            <th>Applied Jobs</th>
            <th>Address</th>
            <th>Action</th>
        </tr>
        <?php foreach ($jobseekers as $key => $jobseeker) { ?>
            <tr>
                <td><?php echo $jobseeker['p_id'] ?></td>
                <td><?php echo $jobseeker['fname'] . ' ' . $jobseeker['lname']; ?></td>
                <td>2</td>
                <td><?php echo $jobseeker['address'] ?></td>
                <td>
                <a onclick="return confirm('Are you sure to update?')" href="jobseekerupdate.php?id=<?php echo $jobseeker['p_id'] ?>">Update</a>
                <a onclick="return confirm('Are you sure to delete?')" href="delete.php?p_id=<?php echo $jobseeker['p_id'] ?>">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
