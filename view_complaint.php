<?php

include "connect.php";

$id = $_GET['id'];

$query = mysqli_query($conn,"SELECT * FROM complaints WHERE id='$id'");

$row = mysqli_fetch_assoc($query);

?>

<!DOCTYPE html>
<html>
<head>

<title>Complaint Details</title>

<style>

body{
font-family:Arial;
background:#f5f5f5;
}

.box{

width:500px;
margin:50px auto;
background:white;
padding:25px;
border-radius:15px;
box-shadow:0 0 10px #ccc;

}

h2{
color:#ef7d00;
text-align:center;
}

p{
font-size:18px;
}

img{

width:200px;
border-radius:10px;

}

</style>

</head>

<body>


<div class="box">

<h2>तक्रार माहिती</h2>


<p><b>ID :</b>
<?php echo $row['id']; ?>
</p>


<p><b>नाव :</b>
<?php echo $row['name']; ?>
</p>


<p><b>मोबाईल :</b>
<?php echo $row['mobile']; ?>
</p>


<p><b>तक्रार प्रकार :</b>
<?php echo $row['complaint_type']; ?>
</p>


<p><b>तपशील :</b>
<?php echo $row['details']; ?>
</p>


<p><b>स्थिती :</b>
<?php echo $row['status']; ?>
</p>


<?php

if(!empty($row['photo']))
{

?>

<img src="uploads/<?php echo $row['photo']; ?>">

<?php

}

?>


</div>


</body>
</html>