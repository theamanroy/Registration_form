<?php
session_start();

?>

<html>  
    <head>
        <title>Display</title>
         <style>
            body
            {
                background-color: #d071f9;
            }
            table{
               background-color: white;
            }
            .update,.delete
            {
               background-color: green;
               color:white;
               outline:none;
               border-radius:5px;
               height:22px;
               width:80px;
               font-weight:bold;
               cursor:pointer;
            }
            .delete{
               background-color:red;
               
            }
            
            </style>

</head>
<?php
include("connection.php");

$userprofile =$_SESSION['user_name'];
if($userprofile == true)
{

}
else{
   header('location:login.php');
}

$query= "SELECT * FROM form";
$data= mysqli_query($conn,$query);
$total= mysqli_num_rows($data);



if($total !=0)
{
    ?>
    <h2 align="center"><mark>Display All Records</mark></h2>
    <center>
<table border="1" cellspacing="7" width="100%" align="center">
<tr>
 <th width="2%">ID</th>
 <th width="10%">image</th>
<th width="8%">First Name</th>
<th width="10%">Last Name</th>
<th width="10%">Gender</th>
<th width="12%">Email</th>
<th width="8%">Phone</th>
<th width="7%">caste</th>
<th width="8%">Language</th>
<th width="10%">Address</th>
<th width="15%">Operation</th>
</tr>

<?php
   while($result=mysqli_fetch_assoc($data))
   {
   
echo"<tr>
         <td>".$result['id']."</td>
         <td><img src= '".$result['std_img']."' height='100px' width='100px'></td>
         <td>".$result['fname']."</td>
         <td>".$result['lname']."</td>
         <td>".$result['gender']."</td>
         <td>".$result['email']."</td>
         <td>".$result['phone']."</td>
          <td>".$result['caste']."</td>
          <td>".$result['language']."</td>
         <td>".$result['address']."</td>
         <td><a href='update_design.php?id=$result[id]'><input type='submit' value='Update' class='update'</a>

          <a href='delete.php?id=$result[id]'><input type='submit' value='Delete'class='delete' onclick= 'return checkdelete()'</a></td>

         
        
</tr>";
    
   }
}
else
{
echo "no records found";
}



?>
</table>
</center>
<a href="logout.php"><input type="submit" name="" value="Logout" style="background:blue; color:white; height:35px; width:100px; margin_top:20px; font-size:18px; border:0; border-radious:5px" cursor:pointer;></a>
<script>
   function checkdelete()
   {
      return confirm('Are you sure you want to delete this Record?');
   }
</script>

