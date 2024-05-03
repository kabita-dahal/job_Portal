<?php
error_reporting(0);
try{
    require_once 'connection.php';
    $sql = "select c_id,cname, industry, location, contact_no from employer ";
    $result = $connection->query($sql);
    $employers = [];
    if ($result->num_rows > 0) { // mysqli_num_rows()
        while ($record = $result->fetch_assoc()) { // mysqli_fetch_assoc()
            array_push($employers,$record);
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
    <title>employer</title>
</head>
<body>
<h3>List of employer</h3>
    <table>
        <tr>
            <th>c_id</th>
            <th>Company Name</th>
            <th>Industry</th>
            <th>Contact No</th>
            <th>Location</th>
            <th>Action</th>
        </tr>
        <?php foreach ($employers as $key => $employer) { ?>
            <tr>
                <td><?php echo $employer['c_id'] ?></td>
                <td><?php echo $employer['cname'] ?></td>
                <td><?php echo $employer['industry'] ?></td>
                <td><?php echo $employer['contact_no'] ?></td>
                <td><?php echo $employer['location'] ?></td>
                <td>
                    <a onclick="return confirm('are you sure to update?')" href="employerupdate.php?c_id=<?php echo $employer['c_id'] ?>">Update</a>
                    <a onclick="return confirm('are you sure to delete?')" href="delete.php?c_id=<?php echo $employer['c_id'] ?>">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
