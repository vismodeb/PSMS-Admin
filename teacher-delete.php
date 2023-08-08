<?php 

    require_once('confige.php');
    $teacher_dlt = $_REQUEST['id'];

    $stm = $pdo->prepare("DELETE FROM teachers WHERE id=?");
    $delete = $stm->execute(array($teacher_dlt));

    if($delete == true){
        header('location:teacher-all.php?success=Delete Successfully!');
    }

?>