<?php

session_start();

if(!isset($_SESSION['admin']))
{
    header("Location: adminlogin.php");
    exit();
}

include("connect.php");


$data = mysqli_query($conn,
"SELECT * FROM complaints ORDER BY id DESC"
);


?>


<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Complaints</title>

<link rel="stylesheet" href="admindashboard.css">


<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">


</head>


<body>


<header class="topbar">


<div class="logo">

<i class="fa-solid fa-building-columns"></i>

<div>

<h2>चिखली नगर परिषद</h2>

<p>Admin Panel</p>

</div>

</div>


<div class="top-right">


<div class="admin">

<i class="fa-solid fa-user-shield"></i>

<span>Administrator</span>

</div>


<a href="adminlogout.php" class="logout">

Logout

</a>


</div>


</header>



<div class="container">



<aside class="sidebar">


<ul>


<li>

<a href="admindashboard.php">

<i class="fa-solid fa-chart-line"></i>

<span>Dashboard</span>

</a>

</li>



<li class="active">

<a href="complaints.php">

<i class="fa-solid fa-file-circle-exclamation"></i>

<span>Complaints</span>

</a>

</li>



<li>

<a href="requests.php">

<i class="fa-solid fa-file-circle-plus"></i>

<span>Requests</span>

</a>

</li>


</ul>


</aside>





<main class="main-content">


<h1 class="page-title">

All Complaints

</h1>




<div class="table-box">


<table>


<tr>

<th>ID</th>

<th>Name</th>

<th>Mobile</th>

<th>Complaint Type</th>

<th>Ward</th>

<th>Status</th>

<th>Action</th>


</tr>



<?php

while($row=mysqli_fetch_assoc($data))

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

<?php echo $row['complaint_type']; ?>

</td>


<td>

<?php echo $row['ward']; ?>
</td>



<td>


<form method="post" action="update_status.php">


<input type="hidden" name="id" value="<?php echo $row['id'];?>">


<select name="status">


<option>

<?php echo $row['status']; ?>

</option>


<option>Pending</option>

<option>Processing</option>

<option>Completed</option>


</select>


<button class="view-btn">

Update

</button>


</form>


</td>



<td>


<a class="view-btn"
href="viewcomplaint.php?id=<?php echo $row['id']; ?>">


<i class="fa fa-eye"></i>

View


</a>


</td>



</tr>


<?php

}

?>


</table>


</div>


</main>


</div>



</body>

</html>