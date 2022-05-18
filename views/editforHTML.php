<?php
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

if (!isset($_SESSION['emaill'])) {
    // header("Location:userI.php");  
    header("Location:logout.php");
}

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>
    <title>Online Quiz</title>
    <style>
        .pagination span {
            color: black;
            float: left;
            align-items: center;
            padding: 8px 16px;
            text-decoration: none;
            transition: background-color .3s;
        }

        .pagination span.active {
            background-color: dodgerblue;
            color: white;
        }

        .pagination span:hover:not(.active) {
            background-color: #ddd;
        }
    </style>
</head>

<body>
    <script>
        //         function om(){
        //   $("#myModal1").modal('show');}
        function showUpdate(question, opp1, opp2, opp3, opp4, ansU, id) {

            document.getElementById('q11').value = question;
            document.getElementById('o11').value = opp1;
            document.getElementById('o21').value = opp2;
            document.getElementById('o31').value = opp3;
            document.getElementById('o41').value = opp4;
            document.getElementById('ansU').value = ansU;
            document.getElementById('update_html').action = `updatehtml.php?id=${id}`;
            console.log(id);
        }



        store = () => {
            let flag = true;

            let Q = $('#q1').val();
            let o1 = $('#o1').val();
            let o2 = $('#o2').val();
            let o3 = $('#o3').val();
            let o4 = $('#o4').val();
            let ansA = $('#ansA').prop('selected', true).val();
            // let Number = /^[0-9]+$/;
            // let letter = /^[ a-zA-Z]+$/;
            // let mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;


            if (Q == "") {
                $("#est").html("please enter question");
                $('#q1').focus();
                flag = false;
            } else if (Q.length > 100) {
                $("#est").html("Character limit is 100!");
                $('#q1').focus();
                flag = false;
            } else if (o1 == "") {
                $("#est").html("please enter option1");
                $('#o1').focus();
                flag = false;
            } else if (o1.length > 100) {
                $("#est").html("Character limit is 100!");
                $('#o1').focus();
                flag = false;
            } else if (o2 == "") {
                $("#est").html("please enter option2");
                $('#o2').focus();
                flag = false;
            } else if (o2.length > 100) {
                $("#est").html("Character limit is 100!");
                $('#o2').focus();
                flag = false;
            } else if (o3 == "") {
                $("#est").html("please enter option3");
                $('#o3').focus();
                flag = false;
            } else if (o3.length > 100) {
                $("#est").html("Character limit is 100!");
                $('#o3').focus();
                flag = false;
            } else if (o4 == "") {
                $("#est").html("please enter option4");
                $('#o4').focus();
                flag = false;
            } else if (o4.length > 100) {
                $("#est").html("Character limit is 100!");
                $('#o4').focus();
                flag = false;
            } else if ($("#ansA").val() == 0) {
                $("#est").html("Select Answer");
                $('#ansA').focus();
                flag = false;
            }

            if (flag != false) {

            }
            return flag;
        }

        store1 = () => {
            let flag = true;

            let Q = $('#q11').val();
            let o1 = $('#o11').val();
            let o2 = $('#o21').val();
            let o3 = $('#o31').val();
            let o4 = $('#o41').val();
            let ansU = $('#ansU').prop('selected', true).val();
            // let Number = /^[0-9]+$/;
            // let letter = /^[ a-zA-Z]+$/;
            // let mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;


            if (Q == "") {
                $("#est1").html("please enter question");
                $('#q11').focus();
                flag = false;
            } else if (Q.length > 100) {
                $("#est1").html("Character limit is 100!");
                $('#q11').focus();
                flag = false;
            } else if (o1 == "") {
                $("#est1").html("please enter option1");
                $('#o11').focus();
                flag = false;
            } else if (o1.length > 100) {
                $("#est1").html("Character limit is 100!");
                $('#o11').focus();
                flag = false;
            } else if (o2 == "") {
                $("#est1").html("please enter option2");
                $('#o21').focus();
                flag = false;
            } else if (o2.length > 100) {
                $("#est1").html("Character limit is 100!");
                $('#o21').focus();
                flag = false;
            } else if (o3 == "") {
                $("#est1").html("please enter option3");
                $('#o31').focus();
                flag = false;
            } else if (o3.length > 100) {
                $("#est1").html("Character limit is 100!");
                $('#o31').focus();
                flag = false;
            } else if (o4 == "") {
                $("#est1").html("please enter option4");
                $('#o41').focus();

                flag = false;
            } else if (o4.length > 100) {
                $("#est1").html("Character limit is 100!");
                $('#o41').focus();
                flag = false;
            } else if ($("#ansU").val() == 0) {
                $("#est1").html("Select Answer");
                $('#ansU').focus();
                flag = false;
            }
            if (flag != false) {

            }

            return flag;
        }
    </script>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="/admin">Quiz Portal</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item">
                            <div id="custom-search" class="top-search-bar">
                                <input class="form-control" type="text" placeholder="Search..">
                            </div>
                        </li>

                        <li class="nav-item dropdown connection">
                            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-fw fa-th"></i> </a>
                            <ul class="dropdown-menu dropdown-menu-right connection-dropdown">
                                <li class="connection-list">
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="#" class="connection-item"><img src="assets/images/github.png" alt=""> <span>Mail Box</span></a>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="#" class="connection-item"><img src="assets/images/dribbble.png" alt=""> <span>Contact List</span></a>
                                        </div>

                                    </div>

                                </li>
                                <li>
                                    <div class="conntection-footer"><a href="#">More</a></div>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/images/avatar-1.jpg" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name">Admin </h5>
                                    <span class="status"></span><span class="ml-2">Available</span>
                                </div>
                                <a class="dropdown-item" href="#"><i class="fas fa-user mr-2"></i>Account</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>Setting</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <!-- <li class="nav-item ">
                                <a class="nav-link active"  href="/admin" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>Dashboard <span class="badge badge-success">6</span></a>
                                <div id="submenu-1" class="collapse submenu">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link"  href="/admin" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1-2" aria-controls="submenu-1-2">Admin</a>
                                            
                                        </li>
                                       
                                       
                                        
                                    </ul>
                                </div>
                            </li> -->
                            <li class="nav-item ">
                                <a class="nav-link active" href="/admin" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>Dashboard</a>
                                <div id="submenu-1" class="collapse submenu">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="admin.php">Admin</a>
                                        </li>



                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3"><i class="fas fa-fw fa-chart-pie"></i>Quiz</a>
                                <div id="submenu-3" class="collapse submenu">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="editforHTML.php">HTML</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="editforCSS.php">CSS</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="editforJS.php">JAVA SCRIPT</a>
                                        </li>
                                        <!-- <li class="nav-item">
                                            <a class="nav-link"  href="/addq">ADD QUIZ</a>
                                        </li> -->

                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4"><i class="fab fa-fw fa-wpforms"></i>User</a>
                                <div id="submenu-4" class="collapse submenu">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="usershow.php">User Details</a>
                                        </li>

                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-6" aria-controls="submenu-6"><i class="fas fa-fw fa-list-alt"></i>Result</a>
                                <div id="submenu-6" class="collapse submenu">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="adminresultHtml.php">HTML</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="adminresultCss.php">CSS</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="adminresultJS.php">JAVA SCRIPT</a>
                                        </li>


                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" data-toggle="collapse" aria-expanded="false" data-target="#submenu-5" aria-controls="submenu-5"><i class="bi bi-card-checklist"></i>Terms & Conditions </a>
                                <div id="submenu-5" class="collapse submenu">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="term_cond.php">Edit T & C</a>
                                        </li>



                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="logout.php"><i class="fas fa-fw fa-table"></i>Logout</a>

                            </li>


                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->

                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->



                    <div class="table-responsive-md" style="background-color: white;">
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->

                        <!-- recent orders  -->
                        <!-- ============================================================== -->
                        <div>
                            <div class="card" style="height: auto;">



                                <div class="card-body p-0">
                                    <div>
                                        <h1 style="text-align: center; color: rgb(86, 145, 255);"> HTML</h1>
                                        <table style="width: 100%;">
                                            <tr>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="" style="float: left;padding-top: 10px;">Select No.
                                                            of
                                                            Rows : &emsp;</label>
                                                        <select class="form-control" name="state" id="maxRows" style="width: fit-content;border: 7 ;">
                                                            <option value="5000">Show ALL Rows</option>
                                                            <option value="3">3</option>
                                                            <option value="5">5</option>
                                                            <option value="10">10</option>
                                                            <option value="20">20</option>
                                                            <option value="50">50</option>
                                                            <option value="70">70</option>

                                                        </select>

                                                    </div>
                                                </td>
                                                <td style="float:right ">
                                                    <button data-toggle="modal" data-target="#myModal" id="mybtn" class="btn btn-light" style="border-radius: 10px;width:100px;background-color: rgb(86, 145, 255); color: black;">ADD</button>
                                                </td>
                                            </tr>
                                        </table>
                                        <table class="table" id="table-id">
                                            <thead class="bg-lightfor">

                                                <tr class="border-0">
                                                    <th class="border-0">ID</th>
                                                    <th class="border-0">QUESTION</th>
                                                    <th class="border-0">OPTIONA</th>
                                                    <th class="border-0">OPTIONB</th>
                                                    <th class="border-0">OPTIONC</th>
                                                    <th class="border-0">OPTIOND</th>
                                                    <th class="border-0">ANSWER</th>



                                                    <th></th>
                                                    <th></th>

                                                    <!-- <th class="border-0">Update</th>
                                                        <th class="border-0">Delete</th> -->

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php include("database.php");
                                                $stmt = $db->query("SELECT * from qhtml ORDER BY id ASC");
                                                ?>
                                                <?php $i = 0; ?>
                                                <?php while ($row = $stmt->fetch(PDO::FETCH_NUM)) {   ?>
                                                    <tr>
                                                        <?php $i++; ?>
                                                        <td><?php echo $i ?></td>
                                                        <td><?php echo $row[0];  ?></td>
                                                        <td><?php echo $row[1];  ?></td>
                                                        <td><?php echo $row[2]; ?></td>
                                                        <td><?php echo $row[3]; ?></td>
                                                        <td><?php echo $row[4];  ?></td>
                                                        <td><?php echo $row[6];  ?></td>
                                                        <td>
                                                            <button class="btn btn-success rounded-sm" style="border-radius: 10px;" onclick="showUpdate('<?php echo $row[0] ?>','<?php echo $row[1] ?>','<?php echo $row[2] ?>','<?php echo $row[3] ?>','<?php echo $row[4] ?>','<?php echo $row[6] ?>','<?php echo $row[5] ?>')" id="mybtn1" data-toggle="modal" data-target="#myModal1">UPDATE</button>
                                                        </td>
                                                        <form action="delete.php" method="POST">
                                                            <td>
                                                                <input type="hidden" name="id" value="<?php echo $row[5]; ?>">
                                                                <button type="submit" name="deleteHtml" class="btn btn-danger rounded-sm" style="border-radius: 10px;" data-toggle="modal" data-target="#exampleModal">DELETE</button>


                                                            </td>
                                                            <!-- Modal -->
                                                            <!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header" style="background-color: white;">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Delete Question And Answer</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <h3>Your sure you want to delete this </h3>
                                                                            <br> <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                            <button type="submit" class="btn btn-primary" >Yes</button>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div> -->
                                                        </form>
                                                    </tr>
                                                    <!-- Button trigger modal -->
                                                    <!-- <button type="button" class="btn btn-primary">
                                                        Launch demo modal
                                                    </button> -->

                                                <?php } ?>
                                                <tr>

                                                <tr>

                                                    <div class="container">
                                                        <!-- <h2>Modal Login Example</h2> -->
                                                        <!-- Trigger the modal with a button -->
                                                        <!-- <button type="button" class="btn btn-default btn-lg" id="myBtn">Login</button> -->

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="myModal1" role="dialog">
                                                            <div class="modal-dialog">

                                                                <!-- Modal content-->
                                                                <div class="modal-content">
                                                                    <div class="modal-header" style="padding:15px 20px;">
                                                                        <h4>Update Question</h4>
                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                        <!-- <h4><span class="glyphicon glyphicon-lock"></span> Login</h4> -->
                                                                    </div>
                                                                    <div class="modal-body" style="padding:40px 50px;">
                                                                        <form role="form" name="update_html" method="POST" onsubmit="return store1()" id="update_html">
                                                                            <div class="form-group">
                                                                                <input type="text" class="form-control" id="q11" name="question" placeholder="Q-1">
                                                                            </div>
                                                                            <br>
                                                                            <div class="from-group">
                                                                                <input type="text" placeholder="option A" id="o11" name="op1">
                                                                            </div>
                                                                            <br>
                                                                            <div class="from-group">
                                                                                <input type="text" placeholder="option B" id="o21" name="op2">
                                                                            </div> <br>
                                                                            <div class="from-group">
                                                                                <input type="text" placeholder="option C" id="o31" name="op3">
                                                                            </div> <br>
                                                                            <div class="from-group">
                                                                                <input type="text" placeholder="option D" id="o41" name="op4">
                                                                            </div> <br>

                                                                            <div class="form-group">
                                                                                <select style="width: 170px; height: 35px; color: #71728e;border-color: #3d405c;" name="ans" id="ansU">
                                                                                    <option value="">
                                                                                        Select Answer
                                                                                    </option>
                                                                                    <option value="A">A
                                                                                    </option>
                                                                                    <option value="B">B
                                                                                    </option>
                                                                                    <option value="C">C
                                                                                    </option>
                                                                                    <option value="D">D
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                            <span id="est1" style="font-size: larger; color: red;"></span>

                                                                            <br>
                                                                            <button name="submitN" type="submit" class="btn btn-success btn-block" style="background-color: #3d405c;"><span class="glyphicon glyphicon-off"></span>Save
                                                                                Change</button>
                                                                            <button type="reset" class="btn btn-success btn-block" style="background-color: #3d405c;"><span class="glyphicon glyphicon-off"></span>Reset</button>
                                                                        </form>
                                                                    </div>



                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="container">
                                                            <!-- <h2>Modal Login Example</h2> -->
                                                            <!-- Trigger the modal with a button -->
                                                            <!-- <button type="button" class="btn btn-default btn-lg" id="myBtn">Login</button> -->

                                                            <!-- Modal -->
                                                            <div class="modal fade" id="myModal" role="dialog">
                                                                <div class="modal-dialog">

                                                                    <!-- Modal content-->
                                                                    <div class="modal-content">
                                                                        <div class="modal-header" style="padding:15px 20px;">
                                                                            <h4>Add Question</h4>
                                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                            <!-- <h4><span class="glyphicon glyphicon-lock"></span> Login</h4> -->
                                                                        </div>
                                                                        <div class="modal-body" style="padding:40px 50px;">
                                                                            <form role="form" action="#" name="submitp" method="GET" onsubmit="return store()">
                                                                                <div class="form-group">

                                                                                    <input type="text" class="form-control" name="qui" id="q1" placeholder="Q-1">

                                                                                </div>
                                                                                <br>
                                                                                <div class="from-group">
                                                                                    <input type="text" name="opi1" placeholder="option A" id="o1">
                                                                                </div>
                                                                                <br>
                                                                                <div class="from-group">
                                                                                    <input type="text" name="opi2" id="o2" placeholder="option B">
                                                                                    
                                                                                </div> <br>
                                                                                <div class="from-group">
                                                                                    <input type="text" name="opi3" id="o3" placeholder="option C">
                                                                                </div> <br>
                                                                                <div class="from-group">
                                                                                    <input type="text" name="opi4" id="o4" placeholder="option D ">
                                                                                </div> <br>
                                                                                <div class="form-group">
                                                                                    <select style="width: 170px; height: 35px; color: #71728e;border-color: #3d405c;" name="ansi" id="ansA">
                                                                                        <option value="">
                                                                                            Select
                                                                                            Answer
                                                                                        </option>
                                                                                        <option value="A">A
                                                                                        </option>
                                                                                        <option value="B">B
                                                                                        </option>
                                                                                        <option value="C">C
                                                                                        </option>
                                                                                        <option value="D">D
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                                <span id="est" style="font-size: larger; color: red;"></span>

                                                                                <button type="submit" class="btn btn-success btn-block" style="background-color: #3d405c;" name="submitNi"><span class="glyphicon glyphicon-off"></span>Add
                                                                                    Quetion</button>
                                                                                <button type="reset" class="btn btn-success btn-block" style="background-color: #3d405c;"><span class="glyphicon glyphicon-off"></span>Reset</button>
                                                                            </form>
                                                                        </div>

                                                                        <?php
                                                                        include("database.php");
                                                                        if (isset($_GET['submitNi'])) {
                                                                            $qu = $_GET['qui'];
                                                                            $opone = $_GET['opi1'];
                                                                            $optwo = $_GET['opi2'];
                                                                            $opthree = $_GET['opi3'];
                                                                            $opfour = $_GET['opi4'];
                                                                            $ans = $_GET['ansi'];

                                                                            $sql = "select *from qhtml where question = '$qu'";
                                                                            $stmt = $db->prepare($sql);
                                                                            $stmt->execute();
                                                                            $check= $stmt->rowCount();
                                                        
                                                                            // $data = pg_query($db, $sql);
                                                                            // $check = pg_num_rows($data);
                                                                            if ($check > 0) {
                                                                                echo '<script>alert("Question already exist!")</script>';
                                                                            } else {
                                                                                $sql2 = "INSERT INTO qhtml(question, op1, op2, op3, op4, ans)
                                                                              VALUES('$qu', '$opone', '$optwo', '$opthree','$opfour','$ans')";
                                                                                         $res = $db->prepare($sql2);
                                                                                         $res->execute();
                                                                                // $ret = pg_query($db, $sql2);
                                                                                if ($res) {
                                                                                    echo '<script>alert("Add question successfully done")</script>';
                                                                        ?>
                                                                                    <script>
                                                                                        window.location.href = 'http://localhost/Project2/views/editforHTML.php';
                                                                                    </script>
                                                                        <?php
                                                                                } else {
                                                                                    echo '<script>alert("Add not project successfully done")</script>';
                                                                                }
                                                                            }
                                                                        }
                                                                        ?>

                                                                    </div>
                                                                </div>
                                                            </div>

                                                </tr>


                                            </tbody>
                                        </table>
                                        <div class='pagination-container'>
                                            <nav>
                                                <ul class="pagination">

                                                    <li data-page="prev">
                                                        <span> <span class="sr-only">(current)</span></span>
                                                    </li>
                                                    <!--	Here the JS Function Will Add the Rows -->
                                                    <li data-page="next" id="prev">
                                                        <span> > <span class="sr-only">(current)</span></span>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end recent orders  -->


                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- customer acquistion  -->
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- end customer acquistion  -->
                        <!-- ============================================================== -->
                    </div>





                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <div class="footer">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="text-md-right footer-links d-none d-sm-block">
                            <a href="javascript: void(0);">About</a>

                            <a href="javascript: void(0);">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end wrapper  -->
    <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="assets/libs/js/main-js.js"></script>
    <!-- chart chartist js -->
    <script src="assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
    <!-- sparkline js -->
    <script src="assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
    <!-- morris js -->
    <script src="assets/vendor/charts/morris-bundle/raphael.min.js"></script>
    <script src="assets/vendor/charts/morris-bundle/morris.js"></script>
    <!-- chart c3 js -->
    <script src="assets/vendor/charts/c3charts/c3.min.js"></script>
    <script src="assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
    <script src="assets/vendor/charts/c3charts/C3chartjs.js"></script>
    <script src="assets/libs/js/dashboard-ecommerce.js"></script>
    <script>
        getPagination('#table-id');
        //getPagination('.table-class');
        //getPagination('table');

        /*					PAGINATION 
        - on change max rows select options fade out all rows gt option value mx = 5
        - append pagination list as per numbers of rows / max rows option (20row/5= 4pages )
        - each pagination li on click -> fade out all tr gt max rows * li num and (5*pagenum 2 = 10 rows)
        - fade out all tr lt max rows * li num - max rows ((5*pagenum 2 = 10) - 5)
        - fade in all tr between (maxRows*PageNum) and (maxRows*pageNum)- MaxRows 
        */


        function getPagination(table) {
            var lastPage = 1;

            $('#maxRows')
                .on('change', function(evt) {
                    //$('.paginationprev').html('');						// reset pagination

                    lastPage = 1;
                    $('.pagination')
                        .find('li')
                        .slice(1, -1)
                        .remove();
                    var trnum = 0; // reset tr counter
                    var maxRows = parseInt($(this).val()); // get Max Rows from select option

                    if (maxRows == 5000) {
                        $('.pagination').hide();
                    } else {
                        $('.pagination').show();
                    }

                    var totalRows = $(table + ' tbody tr').length; // numbers of rows
                    $(table + ' tr:gt(0)').each(function() {
                        // each TR in  table and not the header
                        trnum++; // Start Counter
                        if (trnum > maxRows) {
                            // if tr number gt maxRows

                            $(this).hide(); // fade it out
                        }
                        if (trnum <= maxRows) {
                            $(this).show();
                        } // else fade in Important in case if it ..
                    }); //  was fade out to fade it in
                    if (totalRows > maxRows) {
                        // if tr total rows gt max rows option
                        var pagenum = Math.ceil(totalRows / maxRows); // ceil total(rows/maxrows) to get ..
                        //	numbers of pages
                        for (var i = 1; i <= pagenum;) {
                            // for each page append pagination li
                            $('.pagination #prev')
                                .before(
                                    '<li data-page="' +
                                    i +
                                    '">\
                          <span>' +
                                    i++ +
                                    '<span class="sr-only">(current)</span></span>\
                        </li>'
                                )
                                .show();
                        } // end for i
                    } // end if row count > max rows
                    $('.pagination [data-page="1"]').addClass('active'); // add active class to the first li
                    $('.pagination li').on('click', function(evt) {
                        // on click each page
                        evt.stopImmediatePropagation();
                        evt.preventDefault();
                        var pageNum = $(this).attr('data-page'); // get it's number

                        var maxRows = parseInt($('#maxRows').val()); // get Max Rows from select option

                        if (pageNum == 'prev') {
                            if (lastPage == 1) {
                                return;
                            }
                            pageNum = --lastPage;
                        }
                        if (pageNum == 'next') {
                            if (lastPage == $('.pagination li').length - 2) {
                                return;
                            }
                            pageNum = ++lastPage;
                        }

                        lastPage = pageNum;
                        var trIndex = 0; // reset tr counter
                        $('.pagination li').removeClass('active'); // remove active class from all li
                        $('.pagination [data-page="' + lastPage + '"]').addClass('active'); // add active class to the clicked
                        // $(this).addClass('active');					// add active class to the clicked
                        limitPagging();
                        $(table + ' tr:gt(0)').each(function() {
                            // each tr in table not the header
                            trIndex++; // tr index counter
                            // if tr index gt maxRows*pageNum or lt maxRows*pageNum-maxRows fade if out
                            if (
                                trIndex > maxRows * pageNum ||
                                trIndex <= maxRows * pageNum - maxRows
                            ) {
                                $(this).hide();
                            } else {
                                $(this).show();
                            } //else fade in
                        }); // end of for each tr in table
                    }); // end of on click pagination list
                    limitPagging();
                })
                .val(5)
                .change();

            // end of on select change

            // END OF PAGINATION
        }

        function limitPagging() {
            // alert($('.pagination li').length)

            if ($('.pagination li').length > 7) {
                if ($('.pagination li.active').attr('data-page') <= 3) {
                    $('.pagination li:gt(5)').hide();
                    $('.pagination li:lt(5)').show();
                    $('.pagination [data-page="next"]').show();
                }
                if ($('.pagination li.active').attr('data-page') > 3) {
                    $('.pagination li:gt(0)').hide();
                    $('.pagination [data-page="next"]').show();
                    for (let i = (parseInt($('.pagination li.active').attr('data-page')) - 2); i <= (parseInt($('.pagination li.active').attr('data-page')) + 2); i++) {
                        $('.pagination [data-page="' + i + '"]').show();

                    }

                }
            }
        }



        //  Developed By Yasser Mas
        // yasser.mas2@gmail.com
    </script>

</body>

</html>