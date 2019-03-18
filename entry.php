<?php


$s="'".$_POST['i1']."','".$_POST['i2']."',";

for ($i=3; $i < $_POST['i00']; $i++) { 
    $s = $s.$_POST["i".strval($i)]."," ;
}
$s = $s.$_POST["i".strval($_POST['i00'])];


$q = "INSERT INTO ".$_POST['i0']." values(".$s.")";

 $servername = "localhost";
 $username = "root";
 $password = "";

 // Create connection
 $conn = new mysqli($servername, $username, $password);
 // Check connection
 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
 } 

 // Create database
 $sql = "CREATE DATABASE if not exists marksdb";
 if ($conn->query($sql) === TRUE) {
     echo "Database created successfully";
 } else {
     echo "Error creating database: " . $conn->error;
 }

 $sql = "USE marksdb";
 $conn->query($sql);

 if($conn->query($q)===TRUE){
     header("Location:avl_crs.php");
 }
 else{
     echo "not entered";
 }


?>