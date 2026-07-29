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
    "SELECT * FROM requests WHERE id='$id'");


    $row = mysqli_fetch_assoc($query);

}


?>


<!DOCTYPE html>
<html lang="mr">

<head>

<meta charset="UTF-8">

<title>मागणी माहिती</title>


<style>


body{

font-family:Arial;
background:#f5f6fa;

}


.card{

width:600px;
margin:40px auto;
background:white;
padding:30px;
border-radius:15px;
box-shadow:0 5px 20px rgba(0,0,0,0.15);

}


h2{

text-align:center;
color:#ef7d00;

}


.info{

font-size:17px;
margin:20px 0;
line-height:1.8;

}

.info b{

color:#333;

}


.document{

margin-top:15px;
margin-bottom:35px;

}

.document a{

background:#ef7d00;
color:white;
padding:10px 20px;
border-radius:8px;
text-decoration:none;

}


.status{

display:inline-block;
margin-left:10px;
padding:10px 18px;
border-radius:6px;   /* Square look */
font-size:15px;
font-weight:600;
min-width:110px;
text-align:center;

}


.back{

display:inline-block;
margin-top:20px;
background:#333;
color:white;
padding:10px 20px;
border-radius:8px;
text-decoration:none;

}

.doc-btn{

background:#ef7d00;
color:#fff;
padding:10px 20px;
border-radius:8px;
text-decoration:none;

}

.doc-btn:hover{

background:#d96500;

}


/* Modal */

.modal{

display:none;
position:fixed;
left:0;
top:0;
width:100%;
height:100%;
background:rgba(0,0,0,.85);
z-index:9999;

}

.modal-content{

display:block;
margin:60px auto;
max-width:90%;
max-height:80%;
border-radius:10px;

}

.close{

position:absolute;
top:20px;
right:35px;
font-size:45px;
color:white;
cursor:pointer;

}

.close:hover{

color:#ef7d00;

}


</style>


</head>


<body>


<div class="card">


<h2>
📄 मागणी माहिती
</h2>


<div class="info">

<b>नाव:</b>

<?php echo $row['name']; ?>

</div>



<div class="info">

<b>मोबाईल:</b>

<?php echo $row['mobile']; ?>

</div>



<div class="info">

<b>Email:</b>

<?php echo $row['email']; ?>

</div>



<div class="info">

<b>पत्ता:</b>

<?php echo $row['address']; ?>

</div>



<div class="info">

<b>प्रभाग:</b>

<?php echo $row['ward']; ?>

</div>



<div class="info">

<b>मागणी प्रकार:</b>

<?php echo $row['request_type']; ?>

</div>



<div class="info">

<b>तपशील:</b>

<br>

<?php echo $row['details']; ?>

</div>



<div class="info">

<b>कागदपत्र:</b>

<br><br>


<?php

if($row['document']!="")
{

?>

<div class="document">

<a href="#" class="doc-btn" onclick="openModal(); return false;">

📂 Document पहा

</a>

</div>


<?php

}

else
{

echo "Document उपलब्ध नाही";

}

?>


</div>

<div class="info">

<b>Status:</b>

<span class="status">

<?php echo $row['status']; ?>

</span>

</div>



<a class="back" href="requests.php">

← मागे जा

</a>



</div>

<div id="imageModal" class="modal">

<span class="close" onclick="closeModal()">&times;</span>

<img class="modal-content"
src="uploads/<?php echo $row['document']; ?>">

</div>

<script>

function openModal()
{
document.getElementById("imageModal").style.display="block";
}

function closeModal()
{
document.getElementById("imageModal").style.display="none";
}

window.onclick=function(event)
{
let modal=document.getElementById("imageModal");

if(event.target==modal)
{
modal.style.display="none";
}
}

</script>
</body>

</html>