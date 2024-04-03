<?php
error_reporting(0);
try{
    require_once 'connection.php';
    $sql = "select c_id,cname from employer ";
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
            <th>Email</th>
            <th>Job posting</th>
            <th>Registered By</th>
            <th>Action</th>
        </tr>
        <?php foreach ($employers as $key => $employer) { ?>
            <tr>
                <td><?php echo $employer['c_id'] ?></td>
                <td><?php echo $employer['cname'] ?></td>
                <td><?php echo 'company@gmail.com' ?></td>
                <td>1</td>
                <td>Sandeep</td>
                <td>
                    <a onclick="return confirm('are you sure to update?')" href="update.php?id=<?php echo $employer['id'] ?>">Update</a>
                    <a onclick="return confirm('are you sure to delete?')" href="delete.php?id=<?php echo $employer['id'] ?>">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
