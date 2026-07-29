<?php

include "connect.php";


$id = $_POST['id'];
$name = $_POST['name'];
$mobile = $_POST['mobile'];
$complaint_type = $_POST['complaint_type'];
$ward_no = $_POST['ward_no'];
$details = $_POST['details'];



$query = mysqli_query($conn,

"UPDATE complaints SET

name='$name',
mobile='$mobile',
complaint_type='$complaint_type',
ward_no='$ward_no',
details='$details'

WHERE id='$id'

");



if($query)
{

echo "
<script>

alert('तक्रार Update झाली');

window.location='admindashboard.php';

</script>
";

}

else
{

echo "Update Error";

}


?>