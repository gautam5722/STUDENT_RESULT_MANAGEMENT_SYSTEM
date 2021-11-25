<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" type="text/css" href="./css/form.css" media="all">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="./css/font-awesome-4.7.0/css/font-awesome.css">
    <title>Add Students</title>
    <style>
        #logo {
            margin-top: 10px;
            height: 80px;
            width: 80px;
        }
        #logo {
            border: 2px solid red;
            border-radius: 5px;
        }
        #logo {
            background-color: green;
            transition: transform .2s;
            /* Animation */
            width: 80px;
            height: 80px;
            margin: 0 auto;
        }
        #logo:hover {
            transform: scale(1.5);
        }
    </style>
</head>

<body>

    <div class="title">
    <a href="dashboard.php"><img src="./images/cutm.png" alt="CUTM" id="logo"></a>

        <h1 class="heading" style="color: #ccff00">Dashboard</h1>

        <a href="logout.php" style="color: #ffbc00"><span class="fa fa-sign-out fa-2x">Logout</span></a>
    </div>

    <div class="nav">
        <ul>
            <li class="dropdown" onclick="toggleDisplay('1')">
                <a href="" class="dropbtn" style="color: rgb(0 255 196)"> <b>C L A S S E S </b> &nbsp
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="1">
                    <a href="add_classes.php" style="color: rgb(239 255 0)"> <B> A d d &nbsp C l a s s </B></a>
                    <a href="manage_classes.php" style="color: rgb(239 255 0)"> <b> M a n a g e &nbsp C l a s s </b></a>
                </div>
            </li>
            <li class="dropdown" onclick="toggleDisplay('2')">
                <a href="#" class="dropbtn" style="color: rgb(0 255 196)"><B>S T U D E N T </B> &nbsp
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="2">
                    <a href="add_students.php" style="color: rgb(239 255 0)"> <b>A d d &nbsp S t u d e n t s</b> </a>
                    <a href="manage_students.php" style="color: rgb(239 255 0)"> <b> M a n a g e &nbsp S t u d e n t s </b> </a>
                </div>
            </li>
            <li class="dropdown" onclick="toggleDisplay('3')">
                <a href="#" class="dropbtn" style="color: rgb(0 255 196)"><B>R E S U L T S </B> &nbsp
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="3">
                    <a href="add_results.php" style="color: rgb(239 255 0)"> <b> A d d &nbsp R e s u l t s </b></a>
                    <a href="manage_results.php" style="color: rgb(239 255 0)"> <b> M a n a g e &nbsp R e s u l t s </b></a>
                </div>
            </li>
        </ul>
    </div>

    <div class="main">
        <form action="" method="post">
            <fieldset>
                <legend>Add Student</legend>
                <input type="text" name="student_name" placeholder="Student Name">
                <input type="text" name="roll_no" placeholder="Roll No">
                <?php
                include('init.php');
                include('session.php');

                $class_result = mysqli_query($conn, "SELECT `name` FROM `class`");
                echo '<select name="class_name" style="color: rgb(228 255 0)" >';
                echo '<option selected disabled>Select Class</option>';
                while ($row = mysqli_fetch_array($class_result)) {
                    $display = $row['name'];
                    echo '<option value="' . $display . '">' . $display . '</option>';
                }
                echo '</select>'
                ?>
                <input type="submit" value="Submit">
            </fieldset>
        </form>
    </div>

    <div class="footer">
     </div>
</body>

</html>

<?php

if (isset($_POST['student_name'], $_POST['roll_no'])) {
    $name = $_POST['student_name'];
    $rno = $_POST['roll_no'];
    if (!isset($_POST['class_name']))
        $class_name = null;
    else
        $class_name = $_POST['class_name'];

    // validation
    if (empty($name) or empty($rno) or empty($class_name) or preg_match("/[a-z]/i", $rno) or !preg_match("/^[a-zA-Z ]*$/", $name)) {
        if (empty($name))
            echo '<p class="error">Please enter name</p>';
        if (empty($class_name))
            echo '<p class="error">Please select your class</p>';
        if (empty($rno))
            echo '<p class="error">Please enter your roll number</p>';
        if (preg_match("/[a-z0-9A-Z]/i", $rno))
            echo '<p class="error">Please enter valid roll number</p>';
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            echo '<p class="error">No numbers or symbols allowed in name</p>';
        }
        exit();
    }

    $sql = "INSERT INTO `students` (`name`, `rno`, `class_name`) VALUES ('$name', '$rno', '$class_name')";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        echo '<script language="javascript">';
        echo 'alert("Invalid Details")';
        echo '</script>';
    } else {
        echo '<script language="javascript">';
        echo 'alert("Successful")';
        echo '</script>';
    }
}
?>
