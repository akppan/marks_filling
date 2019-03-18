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
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style1.css" />
    <script src="script1.js"></script>
</head>
<body>
    <div id="dav">
<?php
$quer1 = users();
while ($row=$quer1->fetch_assoc()) {
    if($row['Tables_in_marksdb']!='enrolled'){?>
    <form action="marks.php" method="post">
        <button class="crs" type="submit" name="submit" value="<?php echo $row['Tables_in_marksdb']; ?>"><?php echo $row['Tables_in_marksdb']; ?></button>
    </form>
    
    <?php
    }
    print('<br>');
}
?>
</div>
</body>
</html>
