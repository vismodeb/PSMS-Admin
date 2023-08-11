<?php

    $servername = "localhost";
    $db_name = "PSMS";
    $username = "root";
    $password = "";

    date_default_timezone_set("Asia/Dhaka");
    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$db_name", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    function getCount($tbl,$col,$val){
        global $pdo;
        $stm = $pdo->prepare("SELECT $col FROM $tbl WHERE $col=?");
        $stm->execute(array($val));
        $count = $stm->rowCount();
        return $count;
    }

    function getSubjectName($id){
        global $pdo;
        $stm = $pdo->prepare("SELECT name,code FROM subject WHERE id=?");
        $stm->execute(array($id));
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $result[0]['name']."-".$result[0]['code'];
    }

    // get Student data
    // function Student($col,$id){
    //     global $pdo;
    //     $stm = $pdo->prepare("SELECT $col FROM students WHERE id=?");
    //     $stm->execute(array($id));
    //     $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    //     return $result[0][$col];
    // }

?>