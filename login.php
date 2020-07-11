<!doctype html>
<html>
<body>
<head><title>LOGIN</title>
<style>
body{
    background-image:url("login.jpg");
    background-size:cover;
}
.footer{
  position: fixed;
  left:0;
  bottom: 0;
  text-align: center;
  background-color: red;
  color: white;
  width: 100%;

    
}
.group{
 border-radius:15px;
 border:1px solid black;
 width:260px;
 height:360px;
 text-align:center;
 background-color:rgba(0,0,0,0.3);
 margin:auto;
 margin-top:150px;
}
input[type="text"],input[type="password"]{
padding:10px 25px;
margin:0px 10px 10px 10px;
border-radius:10px;
border:none;
font-family:Segoe Print;
color:#d19a37;

}
input[type="text"]:focus,input[type="password"]:focus{

    border-bottom:5px solid #f0f757;
}
input[type="text"]:hover,input[type="password"]:hover{

background-color:#91b2ff;
}

input[type="submit"]:hover{
    background-color:#3268e8;

}

input[type="submit"]{

    padding:10px 25px;
    border:none;
    margin:10px 10px 10px 10px;
    border-radius:10px;
}

</style>
</head>
<div id="main">
<form method="post" autocomplete="off">
<div class="group">
<h2 style="color:#ffbc42; font-family:Segoe Print;font-size:30px">LOGIN</h2>
<input type="text"  name="username" placeholder="EMAIL ADDRESS"/><br>
<input type="password" name="password" placeholder="PASSWORD"/><br>
<input type="submit" value="LOGIN" name="submit"/><br>
<small style="color:#ffbc42;">OR</small><br>
<a href="regis.php" style="color:#f0f757;">REGISTER NOW</a>
<?php
session_start();
include("connection.php");
if(isset($_POST['submit']))
{
    $un=$_POST['username'];
    $ps=$_POST['password'];

    if($un !="" and $ps !="")
    {
    if(filter_var($un,FILTER_VALIDATE_EMAIL)==true)
    {
$q='SELECT * FROM user WHERE username="'.$un.'" and password="'.$ps.'"';
$r=mysqli_query($con,$q);
if(mysqli_num_rows($r)>0)
{
    header("location:index.php");
    $_SESSION['usern']=$un;
}
else{
    echo'not registered';
}}else{
     echo'<h3 style="color:red;font-family:Segoe Print;">EMAIL INVALID</h3>';
}}else{
    echo'<h3 style="color:red;font-family:Segoe Print;">PLEASE FILL ALL BOXES</h3>';
 }


}



?>

</div>
</form>
</div>
<div class="footer">
<p>Copyright © Muneer Puri</p>
</div>
</html>
