<?php
function users(){
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
        // echo "Database created successfully";
    } else {
        // echo "Error creating database: " . $conn->error;
    }
    
    $sql = "USE marksdb";
    $conn->query($sql);
    $sql = "SHOW TABLES";
    $quer = $conn->query($sql);
    return $quer;
    // $conn->close();
}


if(isset($_POST['submit1'])){
    $s = "CREATE TABLE if not exists enrolled (".array_keys($_POST)[0]." varchar(30),".array_keys($_POST)[1]." varchar(14),".array_keys($_POST)[2]." varchar(15),".array_keys($_POST)[3]." varchar(20),".array_keys($_POST)[4]." varchar(40))";
    $q = "INSERT INTO enrolled values ('".array_values($_POST)[0]."','".array_values($_POST)[1]."','".array_values($_POST)[2]."','".array_values($_POST)[3]."','".array_values($_POST)[4]."')";
    
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
        // echo "Database created successfully";
    } else {
        // echo "Error creating database: " . $conn->error;
    }

    $sql = "USE marksdb";
    $conn->query($sql);
    if ($conn->query($s) === TRUE) {
        echo "Table created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }

    if ($conn->query($q) === TRUE) {
        header("Location:enroll.php");
        echo "Row added successfully";
    } else {
        echo "Error creating row: " . $conn->error;
    }


    // $conn->close();
}

    

?>
