<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form </title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="./style.css" rel="stylesheet" type="text/css">
    <!-- Main css -->
    <style>
        .main {
            padding-top: 0px;
            padding-bottom: 0px;
            margin-top: 0px;
        }
    </style>
</head>

<body>

    <script>
        store = () => {
            let flag = true;
            // let Sid = $('#id').val();
            let Nm = $('#name').val();
            let Qa = $('#qua').val();
            let Em = $('#email').val();
            let Un = $('#username').val();
            let Pa = $('#password').val();
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
                $('#qua').focus();
                flag = false;
            }
            // } else if (Qa.match(letter) == null) {
            //     $("#est").html("please enter valid field");
            //     $('#qua').focus();
            //     flag = false;}
            else if (Em == "") {
                $("#est").html("please enter email");
                $('#email').focus();
                flag = false;
            } else if (Em.match(mailformat) == null) {
                $("#est").html("please enter valid email");
                $('#email').focus();
                flag = false;
            } else if (Un == "") {
                $("#est").html("please enter username");
                $('#username').focus();
                flag = false;
            } else if (Un.length < 8 || Un.length > 25) {
                $("#est").html("username must between 8 to 25 character");
                $('#username').focus();
                flag = false;
            } else if (Pa == "") {
                $("#est").html("please enter password");
                $('#password').focus();

                flag = false;
            } else if (Pa.length < 8) {
                $("#est").html("password must be 8 character");
                $('#password').focus();

                flag = false;
            }
            if (flag != false) {
                $("#est").html("");
            }
            return flag;

        }
    </script>
    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title" id="su">Sign up</h2>
                        <form method="POST" class="register-form" id="register-form">
                            <!-- <div class="form-group">
                                <label for="student id"><i class="bi bi-text-indent-left"></i></label>
                                <input type="text" name="id" id="id" placeholder="Student Id" />
                            </div> -->
                            <div class="form-group">
                                <label for="name"><i class="bi bi-person"></i></label>
                                <input type="text" name="name" id="name" placeholder="Name" />
                            </div>
                            <div class="form-group">
                                <label for="Qualification"><i class="bi bi-mortarboard-fill"></i></label> &nbsp;

                                <select style="padding-left: 20px;border:none;" name="qua" id="qua">
                                    <option value="high">Higher qualification</option>
                                    <option value="10th">10th</option>
                                    <option value="12th">12th</option>
                                    <option value="B.tech">Btech</option>

                                </select>
                                <hr style="width:100%;text-align:left;margin-left:0">
                                <!-- <input type="text" name="Qualification" id="qa" placeholder="Qualification"/> -->
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="bi bi-envelope-check-fill"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" />
                            </div>
                            <div class="form-group">
                                <label for="username"><i class="bi bi-person-badge-fill"></i></label>
                                <input type="text" name="username" id="username" placeholder="username" />
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="bi bi-file-lock2-fill"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password" />
                            </div>

                            <span id="est" class="serr" style="color:red; font-size:20px;"></span>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register" onclick="return store()" />
                            </div>

                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="./signup-image.jpg" alt="sing up image"></figure>
                        <a href="./login.php" class="signup-image-link">Already registered?Login here</a>
                    </div>
                </div>
            </div>
        </section>


        <script src="vendor/jquery/jquery.min.js"></script>

        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    </div>
</body>
<!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<?php
include("database.php");
if (isset($_POST['signup'])) {
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
    $row = $stmt->fetch(PDO::FETCH_NUM);
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
                window.location.href = 'login.php';
            </script>
<?php
        } else {
            echo "Error.";
        }
    }
}
?>