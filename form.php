<?php
 
 include("connection.php");

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
        <form action="#" method="POST" enctype="multipart/form-data">
        <div class="title">
            Registration form
        </div>
        <div class="form">

        <div class="input_field">
            <label>Upload Image</label>
            <input type="file" name="uploadfile" style="width:100%;" required>
           </div> 

          
        <div class="input_field">
            <label>First Name</label>
            <input type="text" class="input" name="fname" required>
           </div> 

           <div class="input_field">
            <label>Last Name</label>
            <input type="text" class="input" name="lname" required>
           </div> 

           <div class="input_field">
            <label>Password</label>
            <input type="password" class="input" name="password" required>
           </div> 

           <div class="input_field">
            <label>Confirm Password</label>
            <input type="password" class="input" name="conpassword" required>
           </div> 

           <div class="input_field">
            <label>Gender</label>
            <div class="custom_select">
            <select name="gender" required>
                <option  values="Not selected">Select</option>
                <option values="male">Male</option>
                <option values="female">Female</option>
            </select>
            </div>
           </div> 

           <div class="input_field">
            <label>Email Address</label>
            <input type="text" class="input" name="email" required>
           </div> 

           <div class="input_field">
            <label>Phone Number</label>
            <input type="text" class="input" name="number" required>
           </div> 

           <div class="input_field">
            <label style="margin-right:100px;">Caste</label>
            <input type="radio" name="caste" value="General" required><label style="margin-left:5px;">General</label>
            <input type="radio" name="caste"  value="OBC" required><label style="margin-left:5px;">OBC</label>
            <input type="radio" name="caste"  value="SC" required><label style="margin-left:5px;">SC</label>
            <input type="radio" name="caste"  value="ST" required><label style="margin-left:5px;">ST</label>
           </div> 

           <div class="input_field">
            <label style="margin-right:100px;">Language</label>
            <input type="checkbox" name="language[]" value="English" ><label style="margin-left:5px;">English</label>
            <input type="checkbox" name="language[]"  value="Hindi" ><label style="margin-left:5px;">Hindi</label>
            <input type="checkbox" name="language[]"  value="Sanskrit" ><label style="margin-left:5px;">Sanskrit</label>
            <input type="checkbox" name="language[]"  value="Mathili"><label style="margin-left:5px;">Mathili</label>
           </div> 

           <div class="input_field">
            <label>Address</label>
            <textarea class="textarea" name="address" required>
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
            <input type="submit" value="register" class="btn" name="register" required>
        </div>

           
        </div>
</form>
    </div>
</body>
</html>
<?php

if(isset($_POST['register']))
{


      //print_r($_FILES["uploadfile"]);
$filename = $_FILES["uploadfile"]["name"];
$tempname = $_FILES["uploadfile"]["tmp_name"];
$folder = "img/".$filename;
move_uploaded_file($tempname , $folder);
       


    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $pwd=$_POST['password'];
    $cpwd=$_POST['conpassword'];
    $gender=$_POST['gender'];
    $email=$_POST['email'];
    $phone=$_POST['number'];
    $caste=$_POST['caste'];
    $lang=$_POST['language'];
    $lang1=implode(",",$lang);
    
    $address=$_POST['address'];

   
        $query="INSERT INTO form (std_img,fname,lname,password,cpassword,gender,email,phone,caste,language,address)values('$folder','$fname','$lname','$pwd','$cpwd','$gender','$email','$phone','$caste','$lang1','$address')";
        $data=mysqli_query($conn,$query);
        if($data)
        {
            echo"<script>alert('data inserted into database')</script>";
        }
        else{
            echo"<script>alert('data inserted into database')</script>";
        }  
    }
    //else
    //{
     //echo"please filled the form first";
    //}




?>