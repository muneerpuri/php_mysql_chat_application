<?php
session_start();
if(isset($_SESSION['usern']))
{
    unset($_SESSION['usern']);
    header("location:login.php");
}
else
{
    header("location:login.php");
}
?>