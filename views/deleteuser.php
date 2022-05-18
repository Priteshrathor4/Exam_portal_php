<?php
$id = $_POST['id'];

echo "$id";

include("database.php");

    $sql =
   " DELETE FROM regdetails where id=$id";
   $stmt = $db->prepare($sql);
    $stmt->execute();
 if(!$stmt) {
    echo pg_last_error($db);
} else {
    echo '<script>alert("Record deleted successfully")</script>';
    // echo "Record deleted successfully\n";
    header('location:usershow.php');
 }
