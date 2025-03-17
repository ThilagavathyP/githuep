<?php
    $con= mysqli_connect("localhost","root","","testcrud");
    if($con == false){
    	die("db connection error".mysqli_connect_error());
    }
?>