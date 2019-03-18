<?php
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
    //echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

$sql = "USE marksdb";
$conn->query($sql);

$q = "SELECT * FROM ".$_POST['submit'];
$quer = $conn->query($q);

$p = "Show COLUMNS FROM ".$_POST['submit'];
$pr = $conn->query($p);


?>
<!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Page Title</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="style1.css" />
        
    </head>
    <body>
     <?php
while($row=$quer->fetch_assoc()){
	$keys = array_keys($row);
	$values = array_values($row);
	$str="";
	for($i=0;$i<count($row);$i++){
		$str = $str.$keys[$i]."&emsp;&emsp;:&emsp;&emsp;".$values[$i]."<br>";
	}?>
	<div id="details"><?php print_r($str);?></div>
	
	<?php
}?>
<script src="script1.js"></script>
    </body>
    </html>


