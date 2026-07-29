<?php

session_start();

if(!isset($_SESSION['admin']))
{
    header("Location: adminlogin.php");
    exit();
}

include("connect.php");

/* ===========================
   Dashboard Counts
=========================== */

// Total Complaints
$c1 = mysqli_query($conn,"SELECT COUNT(*) AS total FROM complaints");
$totalComplaint = mysqli_fetch_assoc($c1)['total'];

// Total Requests
$c2 = mysqli_query($conn,"SELECT COUNT(*) AS total FROM requests");
$totalRequest = mysqli_fetch_assoc($c2)['total'];

// Pending
$c3 = mysqli_query($conn,"SELECT COUNT(*) AS total FROM complaints WHERE status='Pending'");
$pendingComplaint = mysqli_fetch_assoc($c3)['total'];

// Completed
$c4 = mysqli_query($conn,"SELECT COUNT(*) AS total FROM complaints WHERE status='Completed'");
$completedComplaint = mysqli_fetch_assoc($c4)['total'];

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Admin Dashboard</title>

<link rel="stylesheet" href="admindashboard.css">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body>

<!-- ================= NAVBAR ================= -->

<header class="topbar">

<div class="logo">

<i class="fa-solid fa-building-columns"></i>

<div>

<h2>चिखली नगर परिषद</h2>

<p>Admin Dashboard</p>

</div>

</div>

<div class="top-right">

<div class="admin">

<i class="fa-solid fa-user-shield"></i>

<span>Administrator</span>

</div>

<a href="adminlogout.php" class="logout">

<i class="fa-solid fa-right-from-bracket"></i>

Logout

</a>

</div>

</header>

<!-- ================= LAYOUT ================= -->

<div class="container">

<!-- ============ SIDEBAR ============ -->

<aside class="sidebar">

<ul>

<li class="active">

<a href="admindashboard.php">

<i class="fa-solid fa-chart-line"></i>

<span>Dashboard</span>

</a>

</li>

<li>

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

<li>

<a href="adminlogout.php">

<i class="fa-solid fa-right-from-bracket"></i>

<span>Logout</span>

</a>

</li>

</ul>

</aside>

<!-- ============ MAIN CONTENT ============ -->

<main class="main-content">

<h1 class="page-title">
Dashboard
</h1>

<div class="cards">

<div class="card">

<div class="card-icon blue">

<i class="fa-solid fa-file-circle-exclamation"></i>

</div>

<h3>Total Complaints</h3>

<h2><?php echo $totalComplaint; ?></h2>

</div>

<div class="card">

<div class="card-icon purple">

<i class="fa-solid fa-file-circle-plus"></i>

</div>

<h3>Total Requests</h3>

<h2><?php echo $totalRequest; ?></h2>

</div>

<div class="card">

<div class="card-icon orange">

<i class="fa-solid fa-hourglass-half"></i>

</div>

<h3>Pending</h3>

<h2><?php echo $pendingComplaint; ?></h2>

</div>

<div class="card">

<div class="card-icon green">

<i class="fa-solid fa-circle-check"></i>

</div>

<h3>Completed</h3>

<h2><?php echo $completedComplaint; ?></h2>

</div>

</div>

<!-- ================= COMPLAINT TABLE START ================= -->

<div class="table-box">

<h2>Recent Complaints</h2>

<table>

<tr>

<th>ID</th>

<th>Name</th>

<th>Mobile</th>

<th>Complaint</th>

<th>Status</th>

<th>Action</th>

</tr>

<tbody>

<?php

$data = mysqli_query($conn,
"SELECT * FROM complaints ORDER BY id DESC LIMIT 5"
);

while($row = mysqli_fetch_assoc($data))
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

<?php

if($row['status']=="Completed")
{
    echo "<span class='status complete'>Completed</span>";
}
else if($row['status']=="Processing")
{
    echo "<span class='status processing'>Processing</span>";
}
else
{
    echo "<span class='status pending'>Pending</span>";
}

?>

</td>


<td>

<a href="viewcomplaint.php?id=<?php echo $row['id']; ?>" 
class="view-btn">

<i class="fa-solid fa-eye"></i>
View

</a>


</td>


</tr>


<?php

}

?>

</tbody>

</table>

</div>



<!-- ================= REQUEST TABLE ================= -->


<div class="table-box">


<h2>Recent Requests</h2>


<table>


<tr>

<th>ID</th>

<th>Name</th>

<th>Mobile</th>

<th>Request Type</th>

<th>Status</th>

<th>Action</th>

</tr>


<tbody>


<?php


$request = mysqli_query($conn,
"SELECT * FROM requests ORDER BY id DESC LIMIT 5"
);


while($req = mysqli_fetch_assoc($request))
{


?>


<tr>


<td>
<?php echo $req['id']; ?>
</td>


<td>
<?php echo $req['name']; ?>
</td>


<td>
<?php echo $req['mobile']; ?>
</td>


<td>
<?php echo $req['request_type']; ?>
</td>


<td>

<span class="status pending">

Pending

</span>


</td>


<td>


<a href="viewrequest.php?id=<?php echo $req['id']; ?>" 
class="view-btn">


<i class="fa-solid fa-eye"></i>

View


</a>


</td>


</tr>



<?php

}

?>


</tbody>


</table>


</div>



</main>


</div>



</body>


</html>