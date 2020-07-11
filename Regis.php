<!doctype html>
<html>
<head><title>REGISTER NOW!!</title>
<style>
.footer{
    left:0;
  position: fixed;
  bottom: 0;
  text-align: center;
  background-color: red;
  color: white;
  width: 100%;
  height:30px;

    
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

body{
    background-image: url("reg.jpg");
    background-size:cover;
}

.group {
    
    border:1px solid black;
    width:300px;
    height:500px;
    text-align:center;
    padding:20px 20px;
    margin:0px 0px 0px 900px; 
    margin-top:-60px;
    border-radius:40px;
    background-color:rgba(0,0,0,0.3);
    
}

input[type=text],input[type="password"]{

    padding:10px 25px;
    margin:10px 10px 10px 10px;
    font-family:Segoe Print;
    border-radius:15px;
    outline:none;
    
}

input[type="submit"]{
    padding:10px 25px;
    margin:10px 10px 10px 10px;
    border:none;
    border-radius:10px;


}
 

</style>
</head>
<body>

<br><br><br><br><br><br>

<form method="post" autocomplete="off">
<div class="group">
<h2 style="color:#ffbc42; font-family:Segoe Print;font-size:30px">REGISTER</h2>
<INPUT TYPE="TEXT" NAME="first_name" placeholder="FIRST NAME"\><br>
<INPUT TYPE="TEXT" NAME="last_name" placeholder="LAST NAME"\><br>
<INPUT TYPE="TEXT" id="use" onclick="validate()" NAME="user_name"placeholder="EMAIL ADDRESS"\><br>
<INPUT TYPE="PASSWORD" NAME="password"placeholder="PASSWORD"\><br>
<INPUT TYPE="SUBMIT" VALUE="REGISTER" NAME="submit" onclick="validate()" \><br>
<small style="color:#ffbc42;">Already Registered? <a href="login.php" style="color:#f0f757;">LOGIN HERE</a></small>
<?php

include("connection.php");
if(isset($_POST['submit']))
{
    $fn=$_POST['first_name'];
    $ln=$_POST['last_name'];
    $un=$_POST['user_name'];
    $ps=$_POST['password'];
    if($fn !="" and $ln !="" and $un !="" and $ps !="")
    {   
        if(filter_var($un,FILTER_VALIDATE_EMAIL)==true)
        {
        $q="INSERT INTO user (id , first_name , last_name , username , password )
        VALUES('' , '".$fn."' , '".$ln."' , '".$un."' , '".$ps."' ) ";
        $res=mysqli_query($con,$q);
        if($res){
            echo'registered';
            header("location:login.php");
        }else{
            echo $q;
        }
    
    }
    else{
        echo'<br>'; echo'<h3 style="color:red;font-family:Segoe Print;">EMAIL INVALID</h3>';
    }


    }
    else{
       echo'<br>'; echo'<h3 style="color:red;font-family:Segoe Print;">PLEASE FILL ALL BOXES</h3>';
    }

}



?>

</div>

</form>
<div class="footer">
<p>Copyright © Muneer Puri</p>
</div>
</body>
</html>
