<?php

$con=mysqli_connect("localhost","root","","chatapp");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>