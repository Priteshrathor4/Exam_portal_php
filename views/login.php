<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link href="./style.css" rel="stylesheet" type="text/css">
    <title>Login</title>
    <style>
        .main {
            padding: 0px;
            margin-top: 100px;
        }
    </style>
</head>

<body>
    <script>
        login = () => {
            let flag = true;
            let Lun = $('#email').val();
            let Lpa = $('#password').val();

            let letter = /^[ a-zA-Z]+$/;
            let mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

            if (Lun == "") {
                $("#elo").html("please enter email");
                $('#email').focus();
                flag = false;
            } else if (Lun.match(mailformat) == null) {
                $("#elo").html("please enter valid email");
                $('#email').focus();
                flag = false;
            } else if (Lpa == "") {
                $("#elo").html("please enter password");
                $('#password').focus();

                flag = false;
            }
            return flag;
        }
    </script>
    <div class="main">
        <div class="main">
            <div class="container ">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="./signin-image.jpg" alt="sing up image"></figure>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title" id="lg">Log in</h2>
                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="luser"><i class="bi bi-person-badge-fill"></i></label>
                                <input type="text" name="email" id="email" placeholder="Email" />
                            </div>
                            <div class="form-group">
                                <label for="lpass"><i class="bi bi-file-lock2-fill"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password" />
                            </div>
                            <span id="elo" class="serr" style="color:red; font-size:20px;"></span>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" onclick="return login()" class="form-submit" value="Log in" />
                            </div>

                            <div>
                                <a href="./register.php" class="signup-image-link">Create an account</a>

                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</body>

</html>
<?php
include("database.php");
session_start();
$_SESSION['time']=30;
if (isset($_POST['signin']) && !empty($_POST['signin'])) {
    //  $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $encriptpwd =md5($password);
    $_SERVER['PHP_AUTH_USER']=$email;
    $_SERVER['PHP_AUTH_PW']=$encriptpwd;
    $sql = "select email,password,id,name from regdetails where email = '$email' and password = '$encriptpwd'";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $check = $stmt->rowCount();
    $row = $stmt->fetch(PDO::FETCH_NUM);
    // $data = pg_query($db, $sql);
    // $check = pg_num_rows($data);
    // $row = pg_fetch_row($data);
    $id = $row[2];
    $name=$row[3];
    $email1=$row[0];
    $password1=$row[1];
    $admin = 'admin@gmail.com';
   
    if ($_SERVER['PHP_AUTH_USER']==$email1 && $_SERVER['PHP_AUTH_PW']==$password1) {
        $sql1 = $db->prepare("select * from logininfo where email = '$email'");
        $sql1->execute();
        $check1 = $sql1->rowCount();
        if ($check1 == 0) {
            if ($email == "admin@gmail.com") {
                $_SESSION['emaill'] = $admin;
                $_SESSION['id'] = $id;
                $_SESSION['start'] = time(); 
                
                $sql2 = $db->prepare("INSERT INTO logininfo(id,name,email) 
                values ('$id','$name','$email')");
                $sql2->execute();
                echo '<script>alert("admin login successfully")</script>';
                header('Location: admin.php');
            } else {
                $_SESSION['email'] = $email;
                $_SESSION['id'] = $id;
                $_SESSION['start'] = time(); 
               
                $sql3 = $db->prepare("INSERT INTO logininfo(id,name,email) 
                values ('$id','$name','$email')");
                $sql3->execute();
                header("Location: first.php");
                echo '<script>alert("user login successfully")</script>';
            }
        }else{
            // echo '<script>alert(" You Are already login")</script>';
            ?><script>
            if (confirm("You are already loggedin on another device!!                                        Are you sure to logout from another device?") == true) {
                window.location.href = 'logout.php';
              } else {
                window.location.href = 'login.php';
              }
              </script>
            <?php
        }
    } else {
        echo '<script>alert("incorrect email or password!")</script>';
    }
}
?>