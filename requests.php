<?php

session_start();

if(!isset($_SESSION['admin']))
{
    header("Location: adminlogin.php");
    exit();
}

include("connect.php");


$result = mysqli_query($conn,"SELECT * FROM requests ORDER BY id DESC");


?>


<!DOCTYPE html>
<html lang="mr">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>मागणी यादी</title>


<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Devanagari:wght@400;600;700&display=swap" rel="stylesheet">


<style>


body{

font-family:'Noto Sans Devanagari',sans-serif;
background:#f4f6fb;
padding:30px;

}



h2{

text-align:center;
color:#ef7d00;
font-size:32px;
margin-bottom:30px;

}



table{

width:95%;
margin:auto;
background:white;
border-collapse:collapse;
border-radius:15px;
overflow:hidden;
box-shadow:0 10px 25px rgba(0,0,0,0.12);

}



th{
    background:#1f2937;   
    color:#fff;
    padding:15px;
    font-size:17px;
    font-weight:600;
}



td{

padding:15px;
text-align:center;
border-bottom:1px solid #eee;
font-size:16px;

}



tr:hover{

background:#fff7ed;

}



select{

padding:8px 12px;
border-radius:8px;
border:1px solid #ccc;
font-size:14px;

}



button{

background:#ef7d00;
color:white;
border:none;
padding:8px 15px;
border-radius:8px;
cursor:pointer;
margin-left:5px;

}



button:hover{

background:#d96500;

}



.view-btn{

background:#ef7d00;
color:white;
padding:9px 18px;
border-radius:8px;
text-decoration:none;
display:inline-block;

}



.view-btn:hover{

background:#ef7d00;

}



.status-form{

display:flex;
justify-content:center;
align-items:center;

}



</style>


</head>



<body>



<h2>
📄 मागणी नोंदणी यादी
</h2>



<table>


<tr>

<th>ID</th>

<th>नाव</th>

<th>मोबाईल</th>

<th>मागणी प्रकार</th>

<th>प्रभाग</th>

<th>Status</th>

<th>Action</th>


</tr>



<?php

while($row=mysqli_fetch_assoc($result))

{

?>


<tr>


<td>

<?php echo $row['id']; ?>

</td>



<td>

<?php echo $row['name']; ?>

</td>



<td>

<?php echo $row['mobile']; ?>

</td>



<td>

<?php echo $row['request_type']; ?>

</td>



<td>

<?php echo $row['ward']; ?>

</td>




<td>


<form class="status-form" action="update_request.php" method="POST">


<input type="hidden" 
name="id" 
value="<?php echo $row['id']; ?>">



<select name="status">


<option value="Pending"
<?php if($row['status']=="Pending") echo "selected"; ?>>
Pending
</option>



<option value="Processing"
<?php if($row['status']=="Processing") echo "selected"; ?>>
Processing
</option>



<option value="Completed"
<?php if($row['status']=="Completed") echo "selected"; ?>>
Completed
</option>


</select>



<button type="submit">
Update
</button>


</form>


</td>





<td>


<a class="view-btn"
href="viewrequest.php?id=<?php echo $row['id']; ?>">

👁 View

</a>


</td>



</tr>



<?php

}

?>


</table>



</body>

</html>