<?php

session_start();


if(!isset($_SESSION['admin']))
{
    header("Location: adminlogin.php");
    exit();
}


include("connect.php");


if(isset($_POST['id']) && isset($_POST['status']))
{

    $id = $_POST['id'];

    $status = $_POST['status'];


    $update = mysqli_query($conn,

    "UPDATE requests 
     SET status='$status'
     WHERE id='$id'"

    );


    if($update)
    {

        header("Location: requests.php");
        exit();

    }

    else
    {

        echo "Status Update Failed";

    }

}


?>