<?php
include 'database.php';
session_start();
if(isset($_SESSION['start'])) {
    $now = time() - $_SESSION['start'];
    if ($now >= $_SESSION['time']) {
        // session_destroy();
        // echo "<p align='center'>Session has been destoryed!!";
        header("Location: logout.php");
    }
}

$_SESSION['start'] = time(); 

if (!isset($_SESSION['email'])) {
    // header("Location:userI.php");  
    header("Location:logout.php");
}

$query = "SELECT * FROM rules";
$stmt = $db->prepare($query);
$stmt->execute();
// $res = pg_query($db, $query);
// $row = pg_fetch_row($res);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Terms</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: poppins;
            background-image: linear-gradient(to right, #F4F9FC, #EEE0ED, #afbce9);

        }

        li {
            font-size: 20px;
            line-height: 0.5;
        }

        button {
            background-image: linear-gradient(to right, #afbce9, #ECD3E6);
            cursor: pointer;
            border-radius: 25px;
            color: black;
            box-shadow: 0 8px 16px 0 blue 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        h1 {
            font-size: 30px;
            border-style: outset;
            box-shadow: 3px 5px #888888;
            padding-left: 50px;
            padding-right: 50px;
            text-align: center;
            margin-top: 50px;
        }

        .wrapper {
            padding: 5px;
            max-width: 960px;
            width: 95%;
            margin: 20px auto;
        }

        header {
            padding: 0 15px;
            text-align: center;
            font-size: 21px;
        }

        .columns {
            display: flex;
            flex-flow: row wrap;
            justify-content: center;
            margin: 5px 0;
        }

        .column {
            flex: 1;
            border: transparent;
            border-radius: 20px;
            box-shadow: 5px 5px 5px 5px rgb(168, 86, 164);
            margin: 2px;
            padding: 10px;
            background: paleturquoise;
        }

        .column:first-child {
            margin-left: 0;
            background: #ECD3E6;
            background-position: fixed;
            background-repeat: no-repeat;
        }

        .column:last-child {
            margin-left: 0;
            background: white;
        }

        @media screen and (max-width:980px) {
            .columns .column {
                margin-bottom: 5px;
                flex-basis: 40%;
            }

            .columns .column:last-child {
                margin: 10%;
                flex-basis: 0;
            }
        }

        @media screen and (max-width:680px) {
            .columns .column {
                margin: 0 0 5px 0;
                flex-basis: 100%;
            }
        }
    </style>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>

<body>
    <script>
        let check = () => {
            let check = document.getElementById('p1').checked;
            let ExamValue = $('#exam').val();
            flag = true;
            if (check == false) {
                alert("please accept all terms and condition ");
                flag = false;
            } else if (ExamValue == '/') {
                alert("please select exam type ");
                flag = false;
            } else if (ExamValue == 'html') {
                $(form).attr('action', './htmlquestion.php');

                flag = true;
            } else if (ExamValue == 'css') {
                $(form).attr('action', './cssquestion.php');

                flag = true;
            } else if (ExamValue == 'javascript') {
                $(form).attr('action', './javascriptquestion.php');

                flag = true;
            }
            return flag;
        }
    </script>

    <div class="wrapper">
        <a class="btn btn-danger rounded-sm" style="float:right" href="./logout.php">Logout</a>
        <header>

            <h1 style="background-image: linear-gradient(to right, #afbce9, #ECD3E6);">
                Terms and Conditions
            </h1>
        </header>
        <br>
        <section class="columns">
            <div class="column">

                <h2 style="color: blue;">PLEASE REFER FOLLOWING DETAILS REGARDING YOUR ONLINE EXAM.:</h2>
                <?php while ($row = $stmt->fetch(PDO::FETCH_NUM)) {   ?>
                    <ol>
                        <ul>
                            <li>
                                <?php echo $row[0] ?>
                            </li>

                        </ul>
                    </ol><?php  } ?>
                <div style="font-size: 20px;"><input style="margin-left: 30px;" type="checkbox" name="permission" id="p1">&nbsp;<b>I Have Read All the Instruction and Accept the Terms & Conditions</b>

                </div><br> &nbsp;
                <label><b>Student ID:</b></label>
                <input type="text" id="id" name="id" value="<?php echo $_SESSION['id']; ?>" readonly>
            </div>
        </section>
        <br>
        <form id="form" method="POST">

            <table>
                <tr>
                    <td style="font-size:20px; color: blue;"><b>Select Your Intrested Exam</b></td>
                    <td style="width:5px"></td>
                    <td>
                        <select name="sub" id="exam" style="width:150px;">
                            <option value="/">Select Exam</option>
                            <option value="html">HTML</option>
                            <option value="css">CSS</option>
                            <option value="javascript">JavaScript</option>
                        </select>
                    </td>
                </tr>
            </table>
            <br>

            <center><button type="submit" name="submit" class="button-34" style="width:300px;height:40px;font-size: 20px;" onclick="return check()"><b>Attempt
                        Exam Now</b></button>
            </center>
        </form>
    </div>

    <?php

    // session_start();
    if (isset($_POST['submit'])) {
        $subject = $_POST['sub'];
        // echo $subject;
        $_SESSION['sub'] = $subject;
        echo $_SESSION['sub'];
        // echo $subject;
    }

    ?>
</body>

</html>