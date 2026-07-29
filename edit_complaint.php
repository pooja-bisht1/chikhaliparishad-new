<?php

include "connect.php";


$id = $_GET['id'];


$result = mysqli_query($conn,
"SELECT * FROM complaints WHERE id='$id'");


$row = mysqli_fetch_assoc($result);


?>


<!DOCTYPE html>
<html lang="mr">

<head>

<meta charset="UTF-8">

<title>Edit Complaint</title>


<style>

body{

font-family:Arial;
background:#f5f5f5;

}


.box{

width:500px;
margin:40px auto;
background:white;
padding:25px;
border-radius:15px;
box-shadow:0 0 10px #ccc;

}


h2{

text-align:center;
color:#ef7d00;

}


input,select,textarea{

width:100%;
padding:10px;
margin:8px 0;
border-radius:8px;
border:1px solid #ccc;

}


button{

width:100%;
padding:12px;
background:#ef7d00;
color:white;
border:none;
border-radius:8px;
font-size:16px;

}


</style>

</head>


<body>


<div class="box">


<h2>तक्रार Edit करा</h2>


<form action="update_complaint.php" method="POST">


<input type="hidden" name="id" 
value="<?php echo $row['id']; ?>">


<label>नाव</label>

<input type="text" 
name="name"
value="<?php echo $row['name']; ?>">



<label>मोबाईल</label>

<input type="text" 
name="mobile"
value="<?php echo $row['mobile']; ?>">



<label>तक्रार प्रकार</label>

<input type="text"
name="complaint_type"
value="<?php echo $row['complaint_type']; ?>">



<label>वॉर्ड नंबर</label>

<input type="text"
name="ward_no"
value="<?php echo $row['ward_no']; ?>">



<label>तपशील</label>

<textarea name="details"><?php echo $row['details']; ?></textarea>



<button type="submit">
Update करा
</button>


</form>


</div>


</body>

</html>