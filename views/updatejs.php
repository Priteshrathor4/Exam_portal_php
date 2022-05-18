<?php
include("database.php");
if (isset($_POST['submitN'])) {
    $id = $_GET['id'];
    $q11 = $_POST['question'];
    $o11 = $_POST['op1'];
    $o21 = $_POST['op2'];
    $o31 = $_POST['op3'];
    $o41 = $_POST['op4'];
    $ansU = $_POST['ans'];
    // echo "$id";

    $query = "UPDATE javascript SET  question='$q11', op1='$o11', op2='$o21',  op3='$o31' , op4='$o41',ans='$ansU' WHERE id=$id ";
    // $query_run = pg_query($db, $query);
    $stmt = $db->prepare($query);
    $stmt->execute();
    

    if ($query) {
        // echo "Data Updated";
?>
        <script>
            alert('Update sucssefully');
            window.location.href = 'editforJS.php';
        </script>
<?php
    } else {
        echo "Data Not Updated";
    }
}
?>