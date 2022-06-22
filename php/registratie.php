<?php
session_start();

require '../private/connection.php';

$bn = $_POST['burgerservicenummer'];
$postcode = $_POST['postcode'];
$hn = $_POST['huisnummer'];
$roll = 1;

$sql1 =  'SELECT burgerservicenummer FROM tbl_burgers WHERE burgerservicenummer = :bn';
$q = $conn->prepare($sql1);
$q->execute(array(
    ':bn' => $bn
));

$RowCount = $q->rowCount();

if($RowCount > 0){
    $_SESSION['fout_melding'] = 'burgerservicenummer bestaat al,vul opnieuw de gegevens';
    header('location:../index.php?page=registratie.burger');
}else{
    $sql =  "INSERT INTO tbl_burgers (burgerservicenummer, huisnummer, postcode,roll_id) VALUES (:burger, :huisnummer ,:postcode,:rol)";
    $query = $conn->prepare($sql);
    $query->execute(array(
        ':burger' => $bn,
        ':huisnummer' => $hn,
        ':postcode' => $postcode,
        ':rol' => $roll
    ));

    header('location:../index.php?page=login.burger');

}



?>