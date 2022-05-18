<?php
include("database.php");
if (isset($_POST['submitN'])) {
    $id = $_GET['id'];
    $name = $_POST['name'];
    $qua = $_POST['qua'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $encriptpwd =md5($password);
    echo $id;

    $sql = "select *from regdetails where email = '$email'";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $check = $stmt->rowCount();
    $row = $stmt->fetch(PDO::FETCH_NUM);
    // $data = pg_query($db, $sql);
    // $check = pg_num_rows($data);

    $query = "UPDATE  regdetails SET name='$name',qua='$qua',email='$email',username='$username',password ='$encriptpwd' WHERE id=$id ";
    $res = $db->prepare($query);
    $res->execute();
    if ($res) {
        echo '<script>alert("Update successfully done")</script>';
?>
        <script>
            window.location.href = 'usershow.php';
        </script>
<?php
    } else {
        echo "Error.";
    }
}
?>