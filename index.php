<!doctype html>
<html>
<head>
<style>
.grp nav li a:hover{
    
    color:#d11149;
}
.grp nav:hover{
    background-color:#f0e100;
    color:#d11149;
}
.grp nav{
 border:1px solid black;
 width:350px;
 float:right;
 margin-top:-35px;
 border-radius:10px;
 background-color:black;
 color:white;
 height:70px; 
}
.grp nav li{
    display:inline;
    padding:10px 25px;
    margin:10px 10px 20px 10px;
    line-height:30px;
    font-family:Segoe Print;
    

}
.grp nav li a{
    color:white;
    text-decoration:none;
    
    font-family:Segoe Print;
}
input[type="text"]:focus,input[type="password"]:focus{

border:5px solid #f17105;
}
input[type="text"]:hover,input[type="password"]:hover{

background-color:#ffa496;
}

input[type="submit"]:hover{
background-color:#ff715b;

}

body{
    background-image:url("mesg.jpg");
    background-size:cover;
}
*{
padding:0px;
margin:0px;
}
#main{
    
    padding:10px 20px;
    margin:50px 10px 10px 50px;
    border:1px solid black;
    width:600px;
    height:550px;
    background-color:#83bcff ;
    border-radius:10px;
    
    }
    .footer{
        left:0;
  position: fixed;
  bottom: 0;
  text-align: center;
  background-color: red;
  color: white;
  width: 100%;

    
}
#mes{
    background-color:#6c9ad1;
    margin:12px 10px 10px 15px;
    border:1px solid black;
    width:550px;
    height:450px;
    overflow:hidden;
    overflow-y:scroll;
    overflow-x:scroll;
    border-radius:5px;
}

input[type="text"]{

    padding:10px 140px;
    margin:10px 10px 20px 15px;
    font-family:Segoe Print;
    outline:none;
} 
input[type="submit"]{
    font-family:Segoe Print;
    padding:10px 15px;
    outline:none;
    border:none;
}

</style>
</head>
<body>
<div class="grp">
<nav >
<?php
session_start();
if(isset($_SESSION['usern']))
{
    echo'<li>'."WELCOME ".$_SESSION['usern'].'</li>';
    echo'<li>'.'<a href="logout.php">LOGOUT</a>'.'</li>';
}
else
{
    header("location:login.php");
}
?>
</nav></div>
<div id=main>
<div id=mes>
<?php
include("connection.php");
$q1="SELECT * FROM message";
$r1=mysqli_query($con,$q1);
while($row=mysqli_fetch_assoc($r1))
{
    $m=$row['message'];
    $un=$row['username'];
    echo'<h3 style="color:#e4e4e2;">'.' &nbsp '.$un.'</h3>';
    echo'<h4 style="color:#fafaf8;">'.' &nbsp '.$m.'</h4>';
    echo'<hr size="2">';
}




if(isset($_POST['submit']))
{
    $m=$_POST['message'];
    $q='INSERT INTO MESSAGE(id,message,username)
    VALUES("","'.$m.'","'.$_SESSION['usern'].'")';
    $r=mysqli_query($con,$q);
    if($r)
    {
        echo'<h3 style="color:#e4e4e2;">'.' &nbsp '.$_SESSION['usern'].'</h3>';
        echo'<h4 style="color:#fafaf8;">'.' &nbsp '.$m.'</h4>';
        echo'<hr size="2">';
    }

}

?>
</div>
<form method="post">
<input type="text" name="message" placeholder="ENTER MESSAGE" autocomplete="off"/>
<input type="submit" value="SEND" name="submit"/>
</div>
<div class="footer">
<p>Copyright © Muneer Puri</p>
</div>
</body>
</html>