
<?php
include('enroll_crs.php');
$quer = users();
?>
<html>
    <head>
        <title>
            ENROLL STUDENT
        </title>
        <link rel="stylesheet" type="text/css" href="style1.css">
    </head>
    <body>
        <form id="enroll_form" action="http://localhost/php/scratchcoder/enroll_crs.php" method="POST">
            <label for Fullname>Your Fullname:</label>
            <input type="text" class="enroll_form_ele" id="fullname" name="Fullname" placeholder="Enter your fullname">
            <label for Roll>Your Roll No.:</label>
            <input type="text" class="enroll_form_ele" id="roll" name="Roll" placeholder="Enter your roll Number">
            <label for Phone>Your Phone No.:</label>
            <input type="text" class="enroll_form_ele" id="phone" name="Phone" placeholder="Enter your phone number">
            <label for Email>Your Email:</label>
            <input type="text" class="enroll_form_ele" id="email" name="Email" placeholder="Enter your email id">
            <label for Courses>Your Course:</label>
            <select name="Courses" id="select1" class="enroll_form_ele" onmousedown="change()" onmouseup="change()" onchange = "change()">
                <option></option>
                <?php while($row=$quer->fetch_assoc()){ ?>
                    <option><?php if($row['Tables_in_marksdb']!='enrolled' && $row['Tables_in_marksdb']!=''){ echo $row['Tables_in_marksdb'];}?></option>
                <?php } ?>
            </select>
            <input type="hidden" class="enroll_form_ele" id="course" name="Course" placeholder="Enter your course name">
            <button name="submit1" class="enroll_button" type="submit" value="submit">Enroll A Student</button>
        </form>
        <script type="text/javascript" src="script1.js"></script>
    </body>
</html>