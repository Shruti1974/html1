<?php

//Database config

$server = "localhost";
$un = "root";
$pass= "";
$db = "resumedb";

//connection
$con= new mysqli($server, $un, $pass, $db);

if($con->connect_error)
{
die("connection Failed:" .$con->connect_error);
}
else
{ echo "Database has been connected!";}

// get form data
$fname= $_POST['fname'];
$email= $_POST['email'];
$contact= $_POST['contact'];
$rating= $_POST['rating'];




//prepare and bind

$st= $con->prepare("INSERT INTO info(fname,email,contact,rating)
VALUES(?,?,?,?)");

$st-> bind_param("ssss",$fname,$email,$contact,$rating);

if($st-> execute())
{
echo "<br> <br> record added";
}
else
{ echo "Error:".$st->error;}

$st->close();
$con->close();


?>