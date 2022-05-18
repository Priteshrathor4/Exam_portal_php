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
$id = $_SESSION["id"];
$query = "SELECT * FROM result WHERE sid='$id'";
$res = $db->prepare($query);
$res->execute();
$row = $res->fetch(PDO::FETCH_BOTH);
// $row1 = $res->fetch(PDO::FETCH_ASSOC);
// $res = pg_query($db, $query);
// $row = pg_fetch_row($res);
// $row1=pg_fetch_assoc($res);
// echo $row[2];
// echo $id;    
// echo $row[3];
?>
<!DOCTYPE html>
<html>

<head>
    <title>Terms</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- <link rel="stylesheet" type="text/css" href="exam.css"> -->
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: poppins;
            background-image: linear-gradient(to right, #F4F9FC, #EEE0ED, #afbce9);

        }

        /* .container{
    background-image: url(ee1.jpg);
    background-size: cover;
    background-position: center center;
    background-repeat: no-repeat;
  
} */

        li {
            font-size: 20px;
            line-height: 1.5;
        }

        button {
            background-image: linear-gradient(to right, #afbce9, #ECD3E6);
            /* background: #4292dc; */
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
            /* border: 2px solid purple; */
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

        table,
        td,
        tr {
            text-align: center;
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
            window.location.href = "http://localhost/Project2/views/terms.php";
        }
    </script>

    <div class="wrapper">
        <header>
            <h1 style="background-image: linear-gradient(to right, #afbce9, #ECD3E6);">
                Result
            </h1>
        </header>
        <br>
        <section class="columns">
            <div class="column">
                <h2 style="color: blue;"></h2>
                <table class="table table-striped table-bordered table-hover">
                    <?php if ($res != null) { ?>
                        <!-- <%if(examresult !=null){%> -->
                        <thead class="table-active">
                            <th>Subject</th>
                            <th>Score</th>
                            <th>correct ans.</th>
                            <th>incorrect ans.</th>
                            <th>date</th>
                            <th>Time</th>
                        </thead>

                        
                        <tbody>
                            
                            <!-- <?php if ($row[3] !== NULL) { ?> -->
                            <tr>
                                <td>HTML</td>
                                <td>
                                    <?php echo $row[3] ?>
                                </td>
                                <td>
                                    <!-- <%=examresult.correctanshtml%> -->
                                    <?php echo $row[4] ?>
                                </td>
                                <td>
                                    <!-- <%=examresult.incorrectanshtml%> -->
                                    <?php echo $row[5] ?>
                                </td>
                                <td>
                                    <!-- <%=examresult.subb_date.toLocaleString().slice(0, 8)%> -->
                                    <?php echo $row[13] ?>
                                </td>
                                <td>
                                    <!-- <%=examresult.subb_time.toLocaleString().slice(0, 8)%> -->
                                    <?php echo $row[14] ?>
                                </td>
                            </tr>

                        <?php } ?>
                        <!-- <?php if ($row[6] !== null) { ?> -->


                        <tr>
                            <td>CSS</td>
                            <td>
                                <?php echo $row[6] ?>
                                <!-- <%=examresult.scorecss%> -->
                            </td>
                            <td>
                                <?php echo $row[7] ?>
                                <!-- <%=examresult.correctanscss%> -->
                            </td>
                            <td>
                                <?php echo $row[8] ?>
                                <!-- <%=examresult.incorrectanscss%> -->
                            </td>
                            <td>
                                <?php echo $row[15] ?>
                                <!-- <%=examresult.css_date.toLocaleString().slice(0, 8)%> -->
                            </td>
                            <td>
                                <?php echo $row[16] ?>
                                <!-- <%=examresult.css_time.toLocaleString().slice(0, 8)%> -->
                            </td>
                        </tr>

                    <?php } ?>
                    <!-- <?php if ($row[9] !==null) { ?> -->
                    <tr>
                        <td>JavaScript</td>
                        <td>
                            <?php echo $row[9] ?>
                            <!-- <%=examresult.scorejs%> -->
                        </td>
                        <td>
                            <?php echo $row[10] ?>
                            <!-- <%=examresult.correctansjs%> -->
                        </td>
                        <td>
                            <?php echo $row[11] ?>
                            <!-- <%=examresult.incorrectansjs%> -->
                        </td>
                        <td>
                            <?php echo $row[17] ?>
                            <!-- <%=examresult.js_date.toLocaleString().slice(0, 8)%> -->
                        </td>
                        <td>
                            <?php echo $row[18] ?>
                            <!-- <%=examresult.js_time.toLocaleString().slice(0, 8)%> -->
                        </td>
                    </tr>

                <?php } ?>
                <!-- <?php if (
                            $row[3] == null && $row[6] == null &&
                            $row[9] == null
                        ) { ?> -->
                <!-- <% if(examresult.scorejs==null && examresult.scorecss==null &&
                                                        examresult.scorehtml==null){%> -->
                <tr>
                    <center>
                        <h3>Not attempt any exam</h3>
                    </center>
                </tr>

                <!-- <?php } ?> -->
            <?php } else { ?>
                <tr>
                    <center> <b>
                            <h3>Not attempt any exam</h3>
                        </b>
                    </center>
                </tr>

            <?php } ?>


                        </tbody>
                </table>
            </div>
            <!-- &nbsp;   &nbsp;   &nbsp;   &nbsp;
                <div class="column">
                    <div style="font-size: 15px; margin-top: 20px;margin-left: 25px;margin: right 25px;border: 4mm ridge rgba(170, 50, 220, .6); width: 320px;text-align: left; padding-top: 5px; padding-left: 25px;padding-bottom: 25px;"
                    class="container">
            
                    <p class="container-fiuid"><b>Please Select your Intrested Exam</b></p>
                    <div class="container-fluid"><input type="radio" name="exam" class="form-group">HTML</div>
                    <div class="container-fluid"><input type="radio" name="exam" class="form-group">CSS</div>
                    <div class="container-fluid"> <input type="radio" name="exam" class="form-group">JavaScript</div>
                </div>
                </div> -->
        </section>
        <br>




    </div>
    <center><button class="button-34" style="width:300px;height:40px;font-size: 20px;" style="background-color:#fcf4a3" style="height:200px" onclick="check()"><b>Start New Exam</b></button>
    </center>


</body>

</html>