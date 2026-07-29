<?php

include "connect.php";


$id = $_POST['id'];

$status = $_POST['status'];


$query = mysqli_query($conn,
"UPDATE complaints SET status='$status' WHERE id='$id'");


if($query)
{

header("Location: admindashboard.php");

}
else
{

echo "Error";

}

?>