<?php 

    require_once('confige.php');
    $subject_dlt = $_REQUEST['id'];

    $stm = $pdo->prepare("DELETE FROM subject WHERE id=?");
    $delete = $stm->execute(array($subject_dlt));

    if($delete == true){
        header('location:subject_all.php?success=Delete Successfully!');
    }

?>