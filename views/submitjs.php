<?php
include("database.php");
session_start();

$id = $_SESSION['id'];
echo $id;
$query = "SELECT * FROM public.javascript  ORDER BY id ASC Limit 25";
$stmt = $db->prepare($query);
$stmt->execute();
$row_q = $stmt->fetchAll();
$num= $stmt->rowCount();
// $result = pg_query($db,$query);
// $row_q = pg_fetch_all($result);
// $num = pg_num_rows($result);
$sub=$_POST['js'];
$_POST['que1'] = isset($_POST['que1']) ? $_POST['que1'] : 'null';
$_POST['que2'] = isset($_POST['que2']) ? $_POST['que2'] : 'null';
$_POST['que3'] = isset($_POST['que3']) ? $_POST['que3'] : 'null';
$_POST['que4'] = isset($_POST['que4']) ? $_POST['que4'] : 'null';
$_POST['que5'] = isset($_POST['que5']) ? $_POST['que5'] : 'null';
$_POST['que6'] = isset($_POST['que6']) ? $_POST['que6'] : 'null';
$_POST['que7'] = isset($_POST['que7']) ? $_POST['que7'] : 'null';
$_POST['que8'] = isset($_POST['que8']) ? $_POST['que8'] : 'null';
$_POST['que9'] = isset($_POST['que9']) ? $_POST['que9'] : 'null';
$_POST['que10'] = isset($_POST['que10']) ? $_POST['que10'] : 'null';
$_POST['que11'] = isset($_POST['que11']) ? $_POST['que11'] : 'null';
$_POST['que12'] = isset($_POST['que12']) ? $_POST['que12'] : 'null';
$_POST['que13'] = isset($_POST['que13']) ? $_POST['que13'] : 'null';
$_POST['que14'] = isset($_POST['que14']) ? $_POST['que14'] : 'null';
$_POST['que15'] = isset($_POST['que15']) ? $_POST['que15'] : 'null';
$_POST['que16'] = isset($_POST['que16']) ? $_POST['que16'] : 'null';
$_POST['que17'] = isset($_POST['que17']) ? $_POST['que17'] : 'null';
$_POST['que18'] = isset($_POST['que18']) ? $_POST['que18'] : 'null';
$_POST['que19'] = isset($_POST['que19']) ? $_POST['que19'] : 'null';
$_POST['que20'] = isset($_POST['que20']) ? $_POST['que20'] : 'null';
$_POST['que21'] = isset($_POST['que21']) ? $_POST['que21'] : 'null';
$_POST['que22'] = isset($_POST['que22']) ? $_POST['que22'] : 'null';
$_POST['que23'] = isset($_POST['que23']) ? $_POST['que23'] : 'null';
$_POST['que24'] = isset($_POST['que24']) ? $_POST['que24'] : 'null';
$_POST['que25'] = isset($_POST['que25']) ? $_POST['que25'] : 'null';

$user_ans = array($_POST['que1'],$_POST['que2'],$_POST['que3'],$_POST['que4'],$_POST['que5'],$_POST['que6'],$_POST['que7'],$_POST['que8'],$_POST['que9'],$_POST['que10'],
$_POST['que11'],$_POST['que12'],$_POST['que13'],$_POST['que14'],$_POST['que15'],$_POST['que16'],$_POST['que17'],$_POST['que18'],$_POST['que19'],$_POST['que20'],$_POST['que21'],$_POST['que22'],
$_POST['que23'],$_POST['que24'],$_POST['que25']);

$i=0;
$marks = 0;
$incorrect =0;
while($i<$num){
    if($row_q[$i]['ans']==$user_ans[$i]){
        $marks++;
    } else {
        $incorrect++;
    }
    echo $row_q[$i]['ans'];
    // echo $values[$i];
    // echo $v['que'][$i];
    echo $user_ans[$i];
    $i++;
}

echo $marks;
echo $incorrect;





$queryU = "SELECT * FROM public.regdetails WHERE id=$id";
$stmt = $db->prepare($queryU);
$stmt->execute();
$row_U = $stmt->fetch(PDO::FETCH_BOTH);
// $resultU = pg_query($db,$queryU);
// $row_U = pg_fetch_assoc($resultU);
$name = $row_U['name'];
$email = $_SESSION['email'];

$query_check = "SELECT * FROM public.result WHERE sid=$id";
$stmt = $db->prepare($query_check);
$stmt->execute();
$num= $stmt->rowCount();
// $result_check = pg_query($db,$query_check);
// $num = pg_num_rows($result_check);
if($num==0){

    $queryR = "INSERT INTO public.result (name, email, scorejs, correctansjs, incorrectansjs,sid) VALUES ('$name','$email','$marks','$marks','$incorrect','$id')";
    // $resultR = pg_query($db,$queryR);
    $stmt = $db->prepare($queryR);
    $stmt->execute();
    
    header("Location: ../views/thankyou.php?m=$marks&incorrect=$incorrect&sub=$sub");
} else{
    $queryRU = "UPDATE public.result SET scorejs='$marks',correctansjs='$marks',  incorrectansjs='$incorrect' , js_date=CURRENT_DATE, js_time=CURRENT_TIME WHERE sid=$id ";
    // $resultRU = pg_query($db,$queryRU);
    $stmt = $db->prepare($queryRU);
    $stmt->execute();
    
    header("Location: ../views/thankyou.php?m=$marks&incorrect=$incorrect&sub=$sub");
}



?>