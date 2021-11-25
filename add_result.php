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
        <form action="" method="post">
            <fieldset>
            <legend>Enter Marks</legend>

                <?php
                    include("init.php");
                    include("session.php");

                    $select_class_query="SELECT `name` from `class`";
                    $class_result=mysqli_query($conn,$select_class_query);
                    //select class
                    echo '<select name="class_name" style="color: rgb(228 255 0)" >';
                    echo '<option selected disabled>Select Class</option>';
                    
                        while($row = mysqli_fetch_array($class_result)) {
                            $display=$row['name'];
                            echo '<option value="'.$display.'">'.$display.'</option>';
                        }
                    echo'</select>';                      
                ?>

                <input type="text" name="rno" placeholder="Roll No">
                <input type="text" name="p1" id="" placeholder="Assignment">
                <input type="text" name="p2" id="" placeholder="Attendance">
                <input type="text" name="p3" id="" placeholder="Class Test-I">
                <input type="text" name="p4" id="" placeholder="Class Test-II">
                <input type="text" name="p5" id="" placeholder="External Marks">
                <input type="submit" value="Submit">
            </fieldset>
        </form>
    </div>

</body>
</html>

<?php
    if(isset($_POST['rno'],$_POST['p1'],$_POST['p2'],$_POST['p3'],$_POST['p4'],$_POST['p5']))
    {
        $rno=$_POST['rno'];
        if(!isset($_POST['class_name']))
            $class_name=null;
        else
            $class_name=$_POST['class_name'];
        $p1=(int)$_POST['p1'];
        $p2=(int)$_POST['p2'];
        $p3=(int)$_POST['p3'];
        $p4=(int)$_POST['p4'];
        $p5=(int)$_POST['p5'];

        $marks=$p1+$p2+$p3+$p4+$p5;
        $percentage=$marks/5;

        // validation
        if (empty($class_name) or empty($rno) or $p1>100 or  $p2>100 or $p3>100 or $p4>100 or $p5>100 or $p1<0 or  $p2<0 or $p3<0 or $p4<0 or $p5<0 ) {
            if(empty($class_name))
                echo '<p class="error">Please select class</p>';
            if(empty($rno))
                echo '<p class="error">Please enter roll number</p>';
            if(preg_match("/[a-z]/i",$rno))
                echo '<p class="error">Please enter valid roll number</p>';
            if(preg_match("/[a-z]/i",$marks))
                echo '<p class="error">Please enter valid marks</p>';
            if($p1>100 or  $p2>100 or $p3>100 or $p4>100 or $p5>100 or $p1<0 or  $p2<0 or $p3<0 or $p4<0 or $p5<0)
                echo '<p class="error">Please enter valid marks</p>';
            exit();
        }

        $name=mysqli_query($conn,"SELECT `name` FROM `students` WHERE `rno`='$rno' and `class_name`='$class_name'");
        while($row = mysqli_fetch_array($name)) {
            $display=$row['name'];
            echo $display;
         }

        $sql="INSERT INTO `result` (`name`, `rno`, `class`, `p1`, `p2`, `p3`, `p4`, `p5`, `marks`, `percentage`) VALUES ('$display', '$rno', '$class_name', '$p1', '$p2', '$p3', '$p4', '$p5', '$marks', '$percentage')";
        $sql=mysqli_query($conn,$sql);

        if (!$sql) {
            echo '<script language="javascript">';
            echo 'alert("Invalid Details")';
            echo '</script>';
        }
        else{
            echo '<script language="javascript">';
            echo 'alert("Successful")';
            echo '</script>';
        }
    }
?>
