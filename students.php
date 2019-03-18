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
    // echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

$sql = "USE marksdb";
$conn->query($sql);

 $q = "SELECT * FROM `enrolled` WHERE Courses='".array_values($_POST)[0]."'";
$quer = $conn->query($q);
while($row = $quer->fetch_assoc()){
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
     
        <div id="details">
            <form action="enter_marks.php" method="post" >
                <?php
                for ($i=0; $i <count($row) ; $i++) { ?>
                    <div>
                    <?php print_r(array_keys($row)[$i].":".array_values($row)[$i]."<br>");?></div>
                        <input type="hidden" value="<?php echo array_values($row)[$i]; ?>" name="<?php echo array_keys($row)[$i]; ?>">
                        <?php
                }
                ?>
                <button type="submit" value="submit" name="submit">Enter marks</button>
            </form>
        </div>
        <script src="script1.js"></script>
    </body>
    </html>
    <?php
}
?>