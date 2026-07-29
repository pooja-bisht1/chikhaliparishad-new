<?php

include("connect.php");

// Form Data

$name = $_POST['name'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];
$address = $_POST['address'];
$ward = $_POST['ward'];
$request_type = $_POST['request_type'];
$details = $_POST['details'];

// Document Upload

$document = "";

if(isset($_FILES['document']) && $_FILES['document']['name'] != "")
{
    $document = time() . "_" . $_FILES['document']['name'];

    move_uploaded_file(
        $_FILES['document']['tmp_name'],
        "uploads/" . $document
    );
}

// Insert Query

$sql = "INSERT INTO requests
(name,mobile,email,address,ward,request_type,details,document)

VALUES

('$name','$mobile','$email','$address','$ward','$request_type','$details','$document')";

if(mysqli_query($conn,$sql))
{
    echo '

<!DOCTYPE html>

<html lang="mr">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>यशस्वीरित्या नोंद</title>

<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Devanagari:wght@400;500;700&display=swap" rel="stylesheet">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:"Noto Sans Devanagari",sans-serif;
}

body{

height:100vh;
display:flex;
justify-content:center;
align-items:center;
background:#f4f6fb;

}

.card{

width:420px;
background:#fff;
padding:45px 35px;
border-radius:22px;
text-align:center;
box-shadow:0 20px 40px rgba(0,0,0,.12);

}

.redirect{

margin-top:25px;
font-size:15px;
color:#888;
letter-spacing:1px;
opacity:0;
animation:fadeIn .6s ease forwards;
animation-delay:1.3s;

}

.circle{

width:90px;
height:90px;
margin:auto;
border-radius:50%;
background:#22c55e;
display:flex;
justify-content:center;
align-items:center;
font-size:48px;
color:white;

animation:pop .6s ease;

}

@keyframes pop{

0%{
transform:scale(0);
opacity:0;
}

60%{
transform:scale(1.2);
}

100%{
transform:scale(1);
opacity:1;
}

}

h2{

margin-top:25px;
color:#22c55e;
font-size:28px;
opacity:0;
animation:fadeIn .6s ease forwards;
animation-delay:.4s;

}

p{

margin-top:15px;
color:#666;
font-size:17px;
line-height:1.8;
opacity:0;
animation:fadeIn .6s ease forwards;
animation-delay:.8s;

}

@keyframes fadeIn{

from{
opacity:0;
transform:translateY(15px);
}

to{
opacity:1;
transform:translateY(0);
}

}
</style>

</head>

<body>

<div class="card">

<div class="circle">
✓
</div>

<h2>
मागणी यशस्वीरित्या नोंदवली!
</h2>

<p>
आपली मागणी यशस्वीरित्या सादर झाली आहे.
</p><div class="redirect">
Redirecting...
</div>


</div>
<script>

setTimeout(function(){

window.location.href="request.html";

},3000);

</script>
</body>

</html>

';
}
else
{
    echo "Error : " . mysqli_error($conn);
}