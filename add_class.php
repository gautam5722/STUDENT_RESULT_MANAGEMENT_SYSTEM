<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" href="./css/form.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="./css/font-awesome-4.7.0/css/font-awesome.css">
    <title>Add Class</title>
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
    <a href="dashboard.php"><img src="./images/cutm.png" alt="CUTM" id="logo"></a>         <h1 class="heading" style="color: #ccff00">Dashboard</h1>

        <a href="logout.php" style="color: #ffbc00"><span class="fa fa-sign-out fa-2x">Logout</span></a>
    </div>

    <div class="nav">
        <ul>
            <li class="dropdown" onclick="toggleDisplay('1')">
                <a href="" class="dropbtn" style="color: rgb(0 255 196)"> <b>C L A S S E S </b> &nbsp
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="1">
                    <a href="add_classes.php" style="color: rgb(0 255 20)"> <B> A d d &nbsp C l a s s </B></a>
                    <a href="manage_classes.php" style="color: rgb(0 255 20)"> <b> M a n a g e &nbsp C l a s s </b></a>
                </div>
            </li>
            <li class="dropdown" onclick="toggleDisplay('2')">
                <a href="#" class="dropbtn" style="color: rgb(0 255 196)"><B>S T U D E N T </B> &nbsp
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="2">
                    <a href="add_students.php" style="color: rgb(0 255 20)"> <b>A d d &nbsp S t u d e n t s</b> </a>
                    <a href="manage_students.php" style="color: rgb(0 255 20)"> <b> M a n a g e &nbsp S t u d e n t s </b> </a>
                </div>
            </li>
            <li class="dropdown" onclick="toggleDisplay('3')">
                <a href="#" class="dropbtn" style="color: rgb(0 255 196)"><B>R E S U L T S </B> &nbsp
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="3">
                    <a href="add_results.php" style="color: rgb(0 255 20)"> <b> A d d &nbsp R e s u l t s </b></a>
                    <a href="manage_results.php" style="color: rgb(0 255 20)"> <b> M a n a g e &nbsp R e s u l t s </b></a>
                </div>
            </li>
        </ul>
    </div>

    <div class="main">
        <form action="" method="post">
            <fieldset>
                <legend>Add Class</legend>
                <input type="text" name="class_name" placeholder="Class Name">
                <input type="text" name="class_id" placeholder="Class ID">
                <input type="submit" value="Submit">
            </fieldset>
        </form>
    </div>

    <div class="footer">
    </div>
</body>

</html>

<?php
include('init.php');
include('session.php');

if (isset($_POST['class_name'], $_POST['class_id'])) {
    $name = $_POST["class_name"];
    $id = $_POST["class_id"];

    $sql = "INSERT INTO `class` (`name`, `id`) VALUES ('$name', '$id')";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        echo '<script language="javascript">';
        echo 'alert("Invalid class name or class id")';
        echo '</script>';
    } else {
        echo '<script language="javascript">';
        echo 'alert("Successful)';
        echo '</script>';
    }
}

?>
