<?php
//error_reporting(0);
$id= $_GET['id'];
try{
    $connection = new mysqli('localhost', 'root', '', 'jobportal'); 
    $sql = "delete from jobs where id=$id";
    $connection->query($sql);
    echo "jobs deleted successfully";
    header('location:admindashboard.php?page=job');
}catch(Exception $ex){
    die('Error: ' . $ex->getMessage());
}
?>
<!-- <?php
//error_reporting(0);
$id= $_GET['id'];
try{
    $connection = new mysqli('localhost', 'root', '', 'jobportal'); 
    $sql = "delete from jobseeker where id=$id";
    $connection->query($sql);
    echo "jobseeker deleted successfully";
    header('location:admindashboard.php?page=job');
}catch(Exception $ex){
    die('Error: ' . $ex->getMessage());
}
?> -->