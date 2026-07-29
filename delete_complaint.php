<?php

include "connect.php";


$id = $_GET['id'];


$query = mysqli_query($conn,
"DELETE FROM complaints WHERE id='$id'");


if($query)
{

header("Location: admindashboard.php");

}
else
{

echo "Delete Error";

}

?>