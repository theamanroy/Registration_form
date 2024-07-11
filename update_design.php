<?php
 
 include("connection.php");
 session_start();
 $id = $_GET['id'];
 $userprofile = $_SESSION['user_name'];
 if($userprofile == true)
 {

 }
 else
 {
    header('location:login.php');
 }
 $query= "SELECT * FROM form where id= '$id'";
$data= mysqli_query($conn,$query);
$total= mysqli_num_rows($data);
$result=mysqli_fetch_assoc($data);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> php crud operation</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <form action="#" method="POST">
        <div class="title">
            Update Student Details
        </div>
        <div class="form">
          
        <div class="input_field">
            <label>First Name</label>
            <input type="text" class="input" value="<?php echo $result['fname']; ?>" name="fname" required>
           </div> 

           <div class="input_field">
            <label>Last Name</label>
            <input type="text" class="input" value="<?php echo $result['lname'];
              ?>"name="lname" required>
           </div> 

           <div class="input_field">
            <label>Password</label>
            <input type="password" class="input" value="<?php echo $result['password'];
            ?>" name="password" required>
           </div> 

           <div class="input_field">
            <label>Confirm Password</label>
            <input type="password" class="input" value="<?php echo $result['cpassword'];?>" name="conpassword" required>
           </div> 

           <div class="input_field">
            <label>Gender</label>
            <div class="custom_select">
            <select name="gender"  required>
                <option values="">Select</option>
                <option value="male"
                <?php
                if($result['gender'] == 'male')
                {
                    echo "selected";
                }
                ?>
            >Male</option>
                <option value="female"
                <?php
                if($result['gender'] == 'female')
                {
                    echo "selected";
                }
                ?>
                >Female</option>
            </select>
            </div>
           </div> 

           <div class="input_field">
            <label>Email Address</label>
            <input type="text" class="input" value="<?php echo $result['email'];
            ?>" name="email" required>
           </div> 

           <div class="input_field">
            <label>Phone Number</label>
            <input type="text" class="input" value="<?php echo $result['phone'];
            ?>" name="number" required>
           </div> 

           <div class="input_field">
            <label style="margin-right:100px;">Caste</label>
            <input type="radio" name="caste" value="General" required 
         <?php

         ?>   
            
            ><label style="margin-left:5px;">General</label>
            <input type="radio" name="caste"  value="OBC" required><label style="margin-left:5px;">OBC</label>
            <input type="radio" name="caste"  value="SC" required><label style="margin-left:5px;">SC</label>
            <input type="radio" name="caste"  value="ST" required><label style="margin-left:5px;">ST</label>
           </div> 


           <div class="input_field">
            <label>Address</label>
            <textarea class="textarea" name="address" required>
                <?php echo $result['address'];?>
                 </textarea>
           </div> 

        <div class="input_field terms">
            <label class="check">
                <input type="checkbox">
                <span class="checkmark"></span>
            </label>
            <p>Agree to terms and conditions</p>
        </div>
        <div class="input_field">
            <input type="submit" value="Update Details" class="btn" name="update" required>
        </div>

           
        </div>
</form>
    </div>
</body>
</html> 
<?php

if(isset($_POST['update']))
{   
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $pwd=$_POST['password'];
    $cpwd=$_POST['conpassword'];
    $gender=$_POST['gender'];
    $email=$_POST['email'];
    $phone=$_POST['number'];
    $caste=$_POST['caste'];
    $language=$_POST['language'];
    $address=$_POST['address'];
    

   
        $query="UPDATE form set fname='$fname',lname='$lname',password='$pwd',cpassword='$cpwd',gender='$gender',email='$email',phone='$phone',caste='$caste',language='$language',address='$address' where id='$id'";
        $data=mysqli_query($conn,$query);
        if($data)
        {
            echo"<script>alert('Record Updated')</script>";
        ?>

    
        

        <meta http-equiv="refresh" 
        content="0; url = http://localhost/crud/display.php" />


        <?php
        
        } 
        else
        {
            echo"failed to update";
        }  
}
    
   ?>



