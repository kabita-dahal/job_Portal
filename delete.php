<?php
//error_reporting(0);
require_once 'connection.php';
if(isset ($_GET['id'])){
try{
    $id = $_GET['id'];
    $sql = "delete from jobs where id=$id";
    $connection->query($sql);
    echo "jobs deleted successfully";
    header('location:admindashboard.php?page=job');
    exit();
}catch(Exception $ex){
    die('Error: ' . $ex->getMessage());
}
}

if(isset($_GET['p_id'])){
try{
    $p_id = $_GET['p_id'];
    $sql = "delete from jobseeker where p_id=$p_id";
    $connection->query($sql);
    echo "jobseeker deleted successfully";
    header('location:admindashboard.php?page=jobseeker');
    exit();
}catch(Exception $ex){
    die('Error: ' . $ex->getMessage());
}
}

if(isset($_GET['c_id'])){
    try{
        $c_id = $_GET['c_id'];
        $sql = "delete from employer where c_id=$c_id";
        $connection->query($sql);
        echo "employer deleted successfully";
        header('location:admindashboard.php?page=employer');
        exit();
    }catch(Exception $ex){
        die('Error: ' . $ex->getMessage());
    }
    }
?> 
