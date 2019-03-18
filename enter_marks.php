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

$q = "desc ".$_POST['Courses'];
$quer = $conn->query($q);
$pd = "SHOW COLUMNS FROM ".$_POST['Courses'];
$pdr = $conn->query($pd);
$arr = array();
while($row1=$pdr->fetch_assoc()){
	array_push($arr,$row1['Field']);
}

$cols = $quer->num_rows;

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Enter Marks</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style1.css" />
    
</head>
<body>
    <form action="entry.php" method="post" id = "enroll_form">
    <input type="hidden" value="<?php echo $_POST['Courses'] ?>" class="me" name="i0" readonly >
    <input type="hidden" value="<?php echo $cols ?>" class="me" name="i00" readonly >
    <input type="hidden" value="<?php echo $_POST['Roll'] ?>" class="me" name="i1" readonly >
    <input type="hidden" value="<?php echo $_POST['Fullname'] ?>" class="me" name="i2" readonly >
    <?php
        for ($i=0; $i < ($cols)-2 ; $i++) { ?>
            <input type="number" value="<?php echo "i".strval($i+3) ?>" class="me" name="<?php echo "i".strval($i+3) ?>" placeholder=" <?php print_r($arr[$i+2]) ?>" min=0 max=100 onkeydown="maxip(this.value)" >
            <?php
        }
    ?>
    <button name="submit1" class="enroll_button" type="submit" value="submit">Enter marks</button>
    </form>

<script src="script1.js"></script>
</body>
</html>

<?php


?>
