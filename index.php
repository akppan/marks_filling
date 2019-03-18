<?php

    if(isset($_POST['submit'])){
        $nos = $_POST['num_of_subjects'];
        $a=array();
        for ($i=1; $i <= $nos; $i++) { 
            array_push($a,$_POST["subject_name".$i]);
        }
        $s="";
        for ($i=0; $i < sizeof($a); $i++) { 
           $s=$s.",".$a[$i]." int"; 
        }
		
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
        
        $c_name = $_POST['course_name'];
        $sql = "USE marksdb";
        $conn->query($sql);
        $sql = "CREATE TABLE if not exists ".$c_name." (s_roll varchar(20) PRIMARY KEY,s_name varchar(40)".$s.")";
        // echo $sql;
        if ($conn->query($sql) === TRUE) {
            header("Location:avl_crs.php");
            // echo "Table created successfully";
        } else {
            echo "Error creating table: " . $conn->error;
        }
        // $conn->close();
    }
?>
