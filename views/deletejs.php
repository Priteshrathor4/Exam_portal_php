<?php
$id = $_POST['id'];

// echo "$id";

include("database.php");

$sql = " DELETE FROM javascript where id=$id";

// $ret = pg_query($db, $sql);
$stmt = $db->prepare($sql);
   $stmt->execute();
if ($stmt) {
    // echo "Data Updated";
?>
    <script>
        alert('delete sucssefully');
        window.location.href = 'editforJS.php';
    </script>
<?php
} else {
    echo "Not Updated";
}


?>