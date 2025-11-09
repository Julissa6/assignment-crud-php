<?php
$rem=$_GET['b'];
$con=mysqli_connect('localhost','root','','event_management');
$query=mysqli_query($con,"delete from event where eve_id='$rem'");
if($query){
    header("location:insert.php");
}
else{
    header("location:index.php");
}

?>