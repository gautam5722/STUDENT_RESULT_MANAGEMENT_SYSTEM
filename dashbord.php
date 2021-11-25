<?php
include("init.php");

$no_of_classes = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM `class`"));
$no_of_students = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM `students`"));
$no_of_result = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM `result`"));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/home.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="./css/font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="normalize.css">
    <title>Dashboard</title>
    <style>
        .main {
            border-radius: 10px;
            border-width: 5px;
            border-style: solid;
            padding: 20px;
            margin: 7% 20% 0 20%;
            color: rgb(110 255 0);
        }
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
        <?php
        echo '<p>Number of classes:' . $no_of_classes[0] . '</p>';
        echo '<p>Number of students:' . $no_of_students[0] . '</p>';
        echo '<p>Number of results:' . $no_of_result[0] . '</p>';
        ?>
    </div>

    <div class="footer">
        <!-- <span>Designed & Coded By Jibin Thomas</span> -->
    </div>
</body>

</html>

<?php
include('session.php');
?>
