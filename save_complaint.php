<?php

include("connect.php");

// Form Data

$name = $_POST['name'];
$mobile = $_POST['mobile'];
$address = $_POST['address'];
$ward = $_POST['ward'];
$complaint_type = $_POST['complaint_type'];
$details = $_POST['details'];

// Photo Upload

$photo = "";

if(isset($_FILES['photo']) && $_FILES['photo']['name'] != "")
{
    $photo = time() . "_" . $_FILES['photo']['name'];

    move_uploaded_file(
        $_FILES['photo']['tmp_name'],
        "uploads/" . $photo
    );
}

// Insert Query

$sql = "INSERT INTO complaints
(name,mobile,address,ward,complaint_type,details,photo)

VALUES

('$name','$mobile','$address','$ward','$complaint_type','$details','$photo')";

if(mysqli_query($conn,$sql))
{

echo '

<!DOCTYPE html>
<html lang="mr">

<head>

<meta charset="UTF-8">

<title>Success</title>


<style>

body{

margin:0;
height:100vh;
display:flex;
justify-content:center;
align-items:center;
background:#f5f5f5;
font-family:"Noto Sans Devanagari",sans-serif;

}

.success-card{

width:380px;
background:white;
padding:35px;
text-align:center;
border-radius:20px;
box-shadow:0 10px 30px rgba(0,0,0,0.15);

animation:show 0.5s ease;

}


@keyframes show{

from{
transform:scale(0.7);
opacity:0;
}

to{
transform:scale(1);
opacity:1;
}

}


.check{

width:80px;
height:80px;
background:#28a745;
color:white;
font-size:50px;
border-radius:50%;
margin:auto;
line-height:80px;

}


h2{

color:#28a745;
margin-top:20px;

}


p{

color:#555;
font-size:17px;

}


button{

margin-top:20px;
padding:12px 25px;
border:none;
background:#ef7d00;
color:white;
border-radius:25px;
font-size:16px;
cursor:pointer;

}

/* Celebration Confetti */

.confetti{

position:absolute;
width:10px;
height:10px;
top:-10px;
animation:fall 3s linear infinite;

}


@keyframes fall{

0%{
transform:translateY(0) rotate(0deg);
opacity:1;
}

100%{
transform:translateY(100vh) rotate(720deg);
opacity:0;
}

}


/* Check Animation */

.check{

animation:pop 0.6s ease;

}


@keyframes pop{

0%{
transform:scale(0);
}

70%{
transform:scale(1.2);
}

100%{
transform:scale(1);
}

}


</style>


</head>


<body>


<div class="success-card">


<div class="check">
✓
</div>


<h2>
तक्रार यशस्वीरित्या नोंदवली!
</h2>


<p>
आपल्या तक्रारीची लवकरच दखल घेतली जाईल.
</p>


<button onclick="window.location=\'complaint.html\'">
ठीक आहे
</button>


</div>


</body>

</html>

';


}