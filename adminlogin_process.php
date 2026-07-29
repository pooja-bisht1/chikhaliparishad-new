<?php

session_start();

$username = $_POST['username'];
$password = $_POST['password'];

// Admin Username & Password

if($username=="admin" && $password=="12345")
{
    $_SESSION['admin']="admin";

    header("Location: admindashboard.php");
    exit();
}
else
{
    echo "
    <script>
    alert('❌ Username किंवा Password चुकीचा आहे!');
    window.location='adminlogin.php';
    </script>
    ";
}

?>