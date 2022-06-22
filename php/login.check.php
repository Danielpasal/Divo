<?php
require '../private/connection.php';
session_start();
$bn =$_POST['burgerservicenummer'];


$sql = 'SELECT b.burgerservicenummer , tr.roll FROM tbl_burgers b 
    INNER JOIN tbl_rollen tr on b.roll_id = tr.id
    WHERE burgerservicenummer = :burgerservicenummer ';
$q = $conn->prepare($sql);
$q->execute(array(
    ':burgerservicenummer' => $bn
));

$RowCount = $q->rowCount();

$rs = $q->fetch();

if ($RowCount > 0){
    $_SESSION['bn'] = $bn;

    header('location:../index.php?page=verificatie');

}else{
    $_SESSION['fout_melding'] = 'burgerservicenummer bestaat niet probeer iets anders';
    header('location:../index.php?page=login.burger');

}
?>