<?php
include("connection.php");
$id=$_GET['id'];
$query="DELETE FROM form where id='$id'";
$data=mysqli_query($conn,$query);
if($data){
    echo"<script>alert('Record Deleted')</script>";
?>

<meta http-equiv="refresh" 
content="0; url = http://localhost/crud/display.php" />
<?php
}
else{
    echo"Failed To Delete";
}
?>