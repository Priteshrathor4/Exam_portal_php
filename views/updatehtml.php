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

    $query = "UPDATE qhtml SET  question='$q11', op1='$o11', op2='$o21',  op3='$o31' , op4='$o41',ans='$ansU' WHERE id=$id ";
    // $query_run = pg_query($db, $query);
    $stmt = $db->prepare($query);
    $stmt->execute();

    if ($stmt) {
        // echo "Data Updated";
?>
        <script>
            alert('Update sucssefully');
            window.location.href = 'editforHTML.php';
        </script>
<?php
    } else {
        echo "Data Not Updated";
    }
}
if (isset($_POST['submitTerms'])) 
{
$id = $_GET['id'];
$term = $_POST['terms'];
// echo "$id";
$query = "UPDATE rules SET  terms='$term' WHERE id=$id ";
// $query_run = pg_query($db, $query);
$stmt = $db->prepare($query);
    $stmt->execute();

if ($stmt) {
    // echo "Data Updated";
?>  
    <script>
        alert('Update sucssefully');
        window.location.href = 'term_cond.php';
    </script>
<?php
} else {
    echo "Data Not Updated";
}
}
?>