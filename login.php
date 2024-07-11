
<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="login-style.css">
    <title>Login By Cyber Warriors</title>
</head>
<body>
    <div class="center">
        <h1>Login</h1>
     
       <form action="#" method="POST" autocomplete="off">

        <div class="form">
            <input type="text" name="username" class="textfield" placeholder="username">
            <input type="password" name="password" class="textfield" placeholder="passwword">
            <div class="forgetpass"> <a href="#" class="link" onclick="message()">Forget password</a></div>
            <input type="submit" name="login" value="Login" class="btn">
            <div class="singup">New member ? <a href="#" class="link"> Signup</a></div>
        </div>
    </div>

    </form>

    <script>
        function message()
        {
            alert("Toh password yad kro");
        }
    </script>
    
</body>

</html>



<?php

include("connection.php");

if(isset($_POST['login']))
{
 $username = $_post['username'];
$pwd = $_POST['password'];

$query="SELECT * FROM from where email= '$username' &&  password = '$pwd' ";
 $data=mysqli_query($conn,$query);
$total=mysqli_num_rows($data);
//echo $total;

if($total == 1){
    $_SESSION['user_name'] = $username;
    header('location:display.php');
}
else{
    echo "Login Failed";
}

}
?>



