<?php
    require_once('confige.php');
    $student_id = $_REQUEST['id'];

    $stm = $pdo->prepare('DELETE from students WHERE id=?');
    $result = $stm->execute(array($student_id));

    if($result == true){
        header('location:student_all.php?Success = Student Delete Successfully!');
    }
?>