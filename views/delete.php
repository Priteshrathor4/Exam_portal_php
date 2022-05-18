<?php
$id = $_POST['id'];
include("database.php");

// echo "$id";
// for html question 
if (isset($_POST['deleteHtml'])) {


    $sql =" DELETE FROM qhtml where id=$id";
    $stmt = $db->prepare($sql);
    $stmt->execute();
//  $ret = pg_query($db, $sql);
 if(!$stmt) {
    echo pg_last_error($db);
} else {
    echo '<script>alert("Record deleted successfully")</script>';
    // echo "Record deleted successfully\n";
    header('location:editforHTML.php');
 }

}
// thsi is for terms 
if (isset($_POST['deleteTerms'])) {

    
        $sql =
       " DELETE FROM rules where id=$id";
       $stmt = $db->prepare($sql);
       $stmt->execute();
    //  $ret = pg_query($db, $sql);
     if(!$stmt) {
        echo pg_last_error($db);
    } else {
        echo '<script>alert("Record deleted successfully")</script>';
        // echo "Record deleted successfully\n";
        header('location:term_cond.php');
     }
    
    }
?>