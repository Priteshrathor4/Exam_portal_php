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
    <script src="js/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <title>Online Quiz</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>
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
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>
    <script>
        //   function om(){
        //   $("#myModal").modal('show');}

        function showUpdate(name, email, username, password, qua,id) {
            
            document.getElementById('name1').value = name;
            document.getElementById('email1').value = email;
            document.getElementById('unm1').value = username;
            document.getElementById('pass1').value = password;
            document.getElementById('qaa').value = qua;
           
            document.getElementById('update_user').action = `updateuser.php?id=${id}`;
            console.log(id);
        }


        store = () => {
            let flag = true;

            let Nm = $('#name').val();
            let Qa = $('#qa').val();
            let Em = $('#email').val();
            let Un = $('#unm').val();
            let Pa = $('#pass').val();
            let Number = /^[0-9]+$/;
            let letter = /^[ a-zA-Z]+$/;
            let mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;


            if (Nm == "") {
                $("#est").html("please enter name");
                $('#name').focus();
                flag = false;
            } else if (Nm.length < 2) {
                $("#est").html("Name must be 2 charactor");
                $('#name').focus();
                flag = false;
            } else if (Nm.match(letter) == null) {
                $("#est").html("please enter valid name");
                $('#name').focus();
                flag = false;
            } else if (Qa == "high") {
                $("#est").html("please enter qualification");
                $('#qa').focus();
                flag = false;
            } else if (Em == "") {
                $("#est").html("please enter email");
                $('#email').focus();
                flag = false;
            } else if (Em.match(mailformat) == null) {
                $("#est").html("please enter valid email");
                $('#email').focus();
                flag = false;
            } else if (Un == "") {
                $("#est").html("please enter username");
                $('#unm').focus();
                flag = false;
            } else if (Un.match(letter) == null) {
                $("#est").html("please enter valid username");
                $('#unm').focus();
                flag = false;
            } else if (Un.length < 2 || Un.length > 25) {
                $("#est").html("username must between 2 to 25 character");
                $('#unm').focus();
                flag = false;
            } else if (Pa == "") {
                $("#est").html("please enter password");
                $('#pass').focus();

                flag = false;
            } else if (Pa.length < 8) {
                $("#est").html("password must be 8 character");
                $('#pass').focus();

                flag = false;
            }
            if (flag != false) {

            }


            return flag;
        }
        store1 = () => {
            let flag = true;

            let Nm = $('#name1').val();
            let Qa = $('#qa1').val();
            let Em = $('#email1').val();
            let Un = $('#unm1').val();
            let Pa = $('#pass1').val();
            let Number = /^[0-9]+$/;
            let letter = /^[ a-zA-Z]+$/;
            let mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;


            if (Nm == "") {
                $("#est1").html("please enter name");
                $('#name1').focus();
                flag = false;
            } else if (Nm.length < 2) {
                $("#est1").html("Name must be 2 charactor");
                $('#name1').focus();
                flag = false;
            } else if (Nm.match(letter) == null) {
                $("#est1").html("please enter valid name");
                $('#name1').focus();
                flag = false;
            } else if (Qa == "high") {
                $("#est1").html("please enter qualification");
                $('#qa1').focus();
                flag = false;
            } else if (Em == "") {
                $("#est1").html("please enter email");
                $('#email1').focus();
                flag = false;
            } else if (Em.match(mailformat) == null) {
                $("#est1").html("please enter valid email");
                $('#email1').focus();
                flag = false;
            } else if (Un == "") {
                $("#est1").html("please enter username");
                $('#unm1').focus();
                flag = false;
            } else if (Un.match(letter) == null) {
                $("#est1").html("please enter valid username");
                $('#unm1').focus();
                flag = false;
            } else if (Un.length < 2 || Un.length > 25) {
                $("#est").html("username must between 2 to 25 character");
                $('#unm1').focus();
                flag = false;
            } else if (Pa == "") {
                $("#est1").html("please enter password");
                $('#pass1').focus();

                flag = false;
            } else if (Pa.length < 8) {
                $("#est").html("password must be 8 character");
                $('#pass1').focus();

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



                    <div>
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->

                        <!-- recent orders  -->
                        <!-- ============================================================== -->
                        <div>
                            <div class="card" style="height: auto;">

                                <table>
                                    <tr>
                                        <td>
                                            <h3 class="card-header" style="background-color:  rgb(86, 145, 255);color: black; font-weight: bolder; text-align: center;">Users Details</h3>
                                        </td>
                                    </tr>
                                </table>
                                <table>
                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <label for="" style="float: left;padding-top: 10px;">Select No. of Rows : &emsp;</label>
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
                                        <td colspan="9" style="float:center;"><button style="background-color: rgb(86, 145, 255); color: black;" data-toggle="modal" data-target="#myModal1" id="mybtn1" class="btn btn-outline-light float-right">ADD STUDENT</button></td>

                                    </tr>
                                </table>

                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table" id="table-id">
                                            <thead class="bg-light">
                                                <tr class="border-0">
                                                    <th class="border-0">Id</th>
                                                    <th class="border-0">Student Name</th>
                                                    <th class="border-0">Email</th>
                                                    <th class="border-0">User Name</th>
                                                    <th class="border-0">Password</th>

                                                    <th class="border-0">Qualification</th>
                                                    <!-- <th class="border-0">Update</th>
                                                        <th class="border-0">Delete</th> -->

                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php include("database.php");
                                               $stmt = $db->query("SELECT * from regdetails ORDER BY id ASC");
                                                ?>
                                                <?php $i = 0; ?>
                                                <?php while ($row = $stmt->fetch(PDO::FETCH_NUM)) {   ?>
                                                    <tr>
                                                        <?php $i++; ?>
                                                        <td><?php echo $i ?></td>
                                                        <td><?php echo $row[0];  ?></td>
                                                        <td><?php echo $row[2];  ?></td>
                                                        <td><?php echo $row[3]; ?></td>
                                                        <td><?php echo $row[4]; ?></td>
                                                        <td><?php echo $row[1];  ?></td>
                                                    
                                                        <td>
                                                            <button class="btn btn-success rounded-sm" name="submitN" style="border-radius: 10px;"onclick="showUpdate('<?php echo $row[0] ?>','<?php echo $row[2] ?>','<?php echo $row[3] ?>','<?php echo $row[4] ?>','<?php echo $row[1] ?>','<?php echo $row[5] ?>')" id="mybtn1" data-toggle="modal" data-target="#myModal">UPDATE</button>
                                                        </td>
                                                        <form action="deleteuser.php" method="POST">
                                                        <td>
                                                            <!-- <button class="btn btn-danger rounded-sm" style="border-radius: 10px;">DELETE</button> -->
                                                            <input type="hidden" name="id" value="<?php echo $row[5]; ?>">
                                                                <button type="submit" name="delete" class="btn btn-danger rounded-sm" style="border-radius: 10px;" data-toggle="modal" data-target="#exampleModal">DELETE</button>

                                                        </td>
                                                </form>
                                                    </tr>

                                                <?php } ?>


                                                <tr>


                                                    <div class="container">

                                                        <div class="container">
                                                            <!-- <h2>Modal Login Example</h2> -->
                                                            <!-- Trigger the modal with a button -->
                                                            <!-- <button type="button" class="btn btn-default btn-lg" id="myBtn">Login</button> -->

                                                            <!-- Modal -->
                                                            <div class="modal fade" id="myModal1" role="dialog">
                                                                <div class="modal-dialog">

                                                                    <!-- Modal content-->
                                                                    <div class="modal-content">
                                                                        <div class="modal-header" style="padding:35px 50px;">
                                                                            <h4>Add Student</h4>
                                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                            <!-- <h4><span class="glyphicon glyphicon-lock"></span> Login</h4> -->
                                                                        </div>
                                                                        <div class="modal-body" style="padding:40px 50px;">
                                                                            <form role="form"  method="POST" onsubmit="return store()">
                                                                                <div class="form-group">
                                                                                    <label for="usrname"><span class="glyphicon glyphicon-user"></span> <b>Name</b></label>
                                                                                    <input type="text" class="form-control" id="name" name="name" style="border-color: #3d405c;" placeholder="Enter name">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="usrname"><span class="glyphicon glyphicon-user"></span>Email<b></b></label>
                                                                                    <input type="text" class="form-control" id="email" name="email" style="border-color: #3d405c;" placeholder="Enter email">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
                                                                                    <input type="text" class="form-control" name="username" style="border-color: #3d405c;" id="unm" placeholder="Enter username">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="usrname"><span class="glyphicon glyphicon-user"></span>Qualification</label>
                                                                                    <!-- <input type="text" class="form-control" id="usrname" placeholder="Enter qualification"> -->
                                                                                    <select style="width: 400px; height: 35px; color: #71728e;border-color: #3d405c;" name="qua" id="qa">
                                                                                        <option value="">select qualification</option>
                                                                                        <option value="10">10th</option>
                                                                                        <option value="12">12th</option>
                                                                                        <option value="btech">B.Tech</option>
                                                                                    </select>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
                                                                                    <input type="password" class="form-control" id="pass" name="password" style="border-color: #3d405c;" placeholder="Enter password">
                                                                                </div>
                                                                                <span id="est" style="font-size: larger; color: red;"></span>
                                                                                <!-- <div class="checkbox">
                                                                                            <label><input type="checkbox" value="" checked>Remember me</label>
                                                                                          </div> -->
                                                                                <br>
                                                                                <button type="submit" name="submitN" class="btn btn-success btn-block" style="background: #3d405c;"><span class="glyphicon glyphicon-off"></span>Add Student</button>
                                                                                <button type="reset" class="btn btn-success btn-block" style="background: #3d405c;"><span class="glyphicon glyphicon-off"></span>Reset</button>
                                                                            </form>
                                                                        </div>
                                                                        <?php
                                                                        include("database.php");
                                                                        if (isset($_POST['submitN'])) {
                                                                            $name = $_POST['name'];
                                                                            $qua = $_POST['qua'];
                                                                            $email = $_POST['email'];
                                                                            $username = $_POST['username'];
                                                                            $password = $_POST['password'];
                                                                            $encriptpwd =md5($password);

                                                                            $sql = "select *from regdetails where email = '$email'";
                                                                            $stmt = $db->prepare($sql);
                                                                            $stmt->execute();
                                                                            $check= $stmt->rowCount();
                                                                            
                                                                            // $data = pg_query($db, $sql);
                                                                            // $check = pg_num_rows($data);
                                                                            if ($check > 0) {
                                                                                echo '<script>alert("user already exist!")</script>';
                                                                            } else {
                                                                                $query = "INSERT INTO regdetails(name,qua,email,username,password) 
                                                                                          values ('$name','$qua','$email','$username','$encriptpwd')";
                                                                                          $res = $db->prepare($query);
                                                                                          $res->execute();
                                                                                if ($res) {
                                                                                    echo '<script>alert("registration successfully done")</script>';
                                                                        ?>
                                                                                    <script>
                                                                                        window.location.href = 'usershow.php';
                                                                                    </script>
                                                                        <?php
                                                                                } else {
                                                                                    echo "Error.";
                                                                                }
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- <h2>Modal Login Example</h2> -->
                                                            <!-- Trigger the modal with a button -->
                                                            <!-- <button type="button" class="btn btn-default btn-lg" id="myBtn">Login</button> -->

                                                            <!-- Modal -->
                                                            <div class="modal fade" id="myModal" role="dialog">
                                                                <div class="modal-dialog">

                                                                    <!-- Modal content-->
                                                                    <div class="modal-content">
                                                                        <div class="modal-header" style="padding:35px 50px;">
                                                                            <h4>Update User Details</h4>
                                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                            <!-- <h4><span class="glyphicon glyphicon-lock"></span> Login</h4> -->
                                                                        </div>
                                                                        <div class="modal-body" style="padding:40px 50px;">
                                                                            <form role="form" name="update_user" id="update_user" method="POST" onsubmit="return store1()">
                                                                                <div class="form-group">
                                                                                    <label for="usrname"><span class="glyphicon glyphicon-user"></span> <b>Name</b></label>
                                                                                    <input type="text" class="form-control" id="name1" name="name" style="border-color: #3d405c;" placeholder="Enter name">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="usrname"><span class="glyphicon glyphicon-user"></span>Email<b></b></label>
                                                                                    <input type="text" class="form-control" id="email1" name="email" style="border-color: #3d405c;" placeholder="Enter email">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
                                                                                    <input type="text" class="form-control" name="username" style="border-color: #3d405c;" id="unm1" placeholder="Enter email">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="usrname"><span class="glyphicon glyphicon-user"></span>Qualification</label>
                                                                                    <!-- <input type="text" class="form-control" id="usrname" placeholder="Enter qualification"> -->
                                                                                    <select style="width: 400px; height: 35px; color: #71728e;border-color: #3d405c;" name="qua" id="qaa">
                                                                                        <option value="">select qualification</option>
                                                                                        <option value="10">10th</option>
                                                                                        <option value="12">12th</option>
                                                                                        <option value="btech">B.Tech</option>
                                                                                    </select>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
                                                                                    <input type="password" class="form-control" id="pass1" name="password" style="border-color: #3d405c;" placeholder="Enter password">
                                                                                </div>
                                                                                <span id="est1" style="font-size: larger; color: red;"></span>
                                                                                <!-- <div class="checkbox">
                                                                                            <label><input type="checkbox" value="" checked>Remember me</label>
                                                                                          </div> -->
                                                                                <br>
                                                                                <button type="submit" name="submitN" class="btn btn-success btn-block" style="background: #3d405c;"><span class="glyphicon glyphicon-off"></span>Save Change</button>
                                                                                <button type="reset" class="btn btn-success btn-block" style="background-color: #3d405c;"><span class="glyphicon glyphicon-off"></span>Reset</button>
                                                                            </form>
                                                                        </div>


                                                                    </div>
                                                                </div>
                                                            </div>
                                                </tr>




                                            </tbody>
                                        </table>
                                        <!--		Start Pagination -->
                                        <div class='pagination-container'>
                                            <nav>
                                                <ul class="pagination">

                                                    <li data-page="prev">
                                                        <span>
                                                            < <span class="sr-only">(current)
                                                        </span></span>
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

        // $(function() {
        //     // Just to append id number for each row
        //     $('table tr:eq(0)').prepend('');

        //     var id = 0;

        //     $('table tr:gt(0)').each(function() {
        //         id++;
        //         $(this).prepend('<td>' + id + '</td>');
        //     });
        // });

        //  Developed By Yasser Mas
        // yasser.mas2@gmail.com
    </script>

</body>

</html>