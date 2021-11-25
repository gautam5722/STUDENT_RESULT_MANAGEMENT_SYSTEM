<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/home.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="./css/font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="./css/form.css">
    <title>Dashboard</title>
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
        <br><br>
        <form action="" method="post">
            <fieldset>
                <legend>Delete Result</legend>
                <?php
                    include('init.php');
                    include('session.php');
                    
                    $class_result=mysqli_query($conn,"SELECT `name` FROM `class`");
                        echo '<select name="class_name" style="color: rgb(228 255 0)" >';
                        echo '<option selected disabled>Select Class</option>';
                    while($row = mysqli_fetch_array($class_result)){
                        $display=$row['name'];
                        echo '<option value="'.$display.'">'.$display.'</option>';
                    }
                    echo'</select>'
                ?>
                <input type="text" name="rno" placeholder="Roll No">
                <input type="submit" value="Delete">
            </fieldset>
        </form>
        <br><br>

        <form action="" method="post">
            <fieldset>
                <legend>Update Result</legend>
                
                <?php
                    $class_result=mysqli_query($conn,"SELECT `name` FROM `class`");
                        echo '<select name="class" style="color: rgb(228 255 0)" >';
                        echo '<option selected disabled>Select Class</option>';
                    while($row = mysqli_fetch_array($class_result)){
                        $display=$row['name'];
                        echo '<option value="'.$display.'">'.$display.'</option>';
                    }
                    echo'</select>'
                ?>
                
                <input type="text" name="rn" placeholder="Roll No">
                <input type="text" name="p1" id="" placeholder="Assignment">
                <input type="text" name="p2" id="" placeholder="Attendance">
                <input type="text" name="p3" id="" placeholder="Class Test-I">
                <input type="text" name="p4" id="" placeholder="Class Test-II">
                <input type="text" name="p5" id="" placeholder="External Marks">
                <input type="submit" value="Update">
            </fieldset>
        </form>
    </div>

    <!-- <div class="footer">
        <span>Designed & Coded By Jibin Thomas</span>
    </div> -->
    
</body>
</html>

<?php
    if(isset($_POST['class_name'],$_POST['rno'])) {
        $class_name=$_POST['class_name'];
        $rno=$_POST['rno'];
        echo $class_name;
        echo $rno;
        $delete_sql=mysqli_query($conn,"DELETE from `result` where `rno`='$rno' and `class`='$class_name'");
        if(!$delete_sql){
            echo '<script language="javascript">';
            echo 'alert("Not available")';
            echo '</script>';
        } else {
            echo '<script language="javascript">';
            echo 'alert("Deleted")';
            echo '</script>';
        }
    }

    if(isset($_POST['rn'],$_POST['p1'],$_POST['p2'],$_POST['p3'],$_POST['p4'],$_POST['p5'],$_POST['class'])) {
        $rno=$_POST['rn'];
        $class_name=$_POST['class'];
        $p1=(int)$_POST['p1'];
        $p2=(int)$_POST['p2'];
        $p3=(int)$_POST['p3'];
        $p4=(int)$_POST['p4'];
        $p5=(int)$_POST['p5'];

        $marks=$p1+$p2+$p3+$p4+$p5;
        $percentage=$marks/5;
        

        $sql="UPDATE `result` SET `p1`='$p1',`p2`='$p2',`p3`='$p3',`p4`='$p4',`p5`='$p5',`marks`='$marks',`percentage`='$percentage' WHERE `rno`='$rno' and `class`='$class_name'";
        $update_sql=mysqli_query($conn,$sql);

        if(!$update_sql){
            echo '<script language="javascript">';
            echo 'alert("Invalid Details")';
            echo '</script>';
        } else {
            echo '<script language="javascript">';
            echo 'alert("Updated")';
            echo '</script>';
        }
    }
?>
