<?php

session_start();

if(!isset($_SESSION['admin']))
{
    header("Location: adminlogin.php");
    exit();
}

include("connect.php");


if(isset($_GET['id']))
{
    $id = $_GET['id'];

    $query = mysqli_query($conn,
    "SELECT * FROM complaints WHERE id='$id'");

    $row = mysqli_fetch_assoc($query);
}

?>

<!DOCTYPE html>
<html>
<head>

<title>View Complaint</title>

<style>

body{
    font-family: Arial;
    background:#f4f6f9;
}

.container{

    width:600px;
    margin:40px auto;
    background:white;
    padding:25px;
    border-radius:15px;
    box-shadow:0 5px 20px rgba(0,0,0,0.15);

}


h2{

text-align:center;
color:#ef7d00;

}


.info{

font-size:17px;
margin:15px 0;

}


.info b{

color:#333;

}


img{

width:250px;
height:200px;
object-fit:cover;
border-radius:10px;
margin-top:10px;

}


.status{

padding:8px 15px;
border-radius:20px;
background:#ef7d00;
color:white;
display:inline-block;

}


.back{

display:inline-block;
margin-top:20px;
background:#333;
color:white;
padding:10px 20px;
text-decoration:none;
border-radius:8px;

}


</style>

</head>


<body>


<div class="container">


<h2>Complaint Details</h2>


<div class="info">
<b>Name:</b>
<?php echo $row['name']; ?>
</div>


<div class="info">
<b>Mobile:</b>
<?php echo $row['mobile']; ?>
</div>


<div class="info">
<b>Address:</b>
<?php echo $row['address']; ?>
</div>


<div class="info">
<b>Ward:</b>
<?php echo $row['ward']; ?>
</div>


<div class="info">
<b>Complaint Type:</b>
<?php echo $row['complaint_type']; ?>
</div>


<div class="info">
<b>Details:</b>
<br>
<?php echo $row['details']; ?>
</div>



<div class="info">

<b>Photo:</b>
<br>

<?php

if($row['photo']!="")
{

?>

<img src="uploads/<?php echo $row['photo']; ?>">

<?php

}
else
{

echo "No Photo Uploaded";

}

?>

</div>



<div class="info">

<b>Status:</b>

<span class="status">

<?php echo $row['status']; ?>

</span>

</div>



<a class="back" href="complaints.php">
← Back
</a>



</div>


</body>
</html>