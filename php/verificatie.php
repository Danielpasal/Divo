<?php
session_start();

require '../private/connection.php';

$bn = $_POST['bn'];

$hn = $_POST['huisnummer'];
$postcode = $_POST['postcode'];


$sql1 =  'SELECT huisnummer , postcode  FROM tbl_burgers WHERE burgerservicenummer = :bn';
$q = $conn->prepare($sql1);
$q->execute(array(
    ':bn' => $bn
));

$rs = $q->fetch();

var_dump($rs);
if($rs['huisnummer'] == $hn && $rs['postcode'] == $postcode) {
    $_SESSION['user'] = 'burger';
    header('location:../index.php?page=stem');
}else{

    $_SESSION['fout_melding'] = 'klopt niet';
    $_SESSION['bn'] = $bn;
    header('location:../index.php?page=verificatie');
}



?>