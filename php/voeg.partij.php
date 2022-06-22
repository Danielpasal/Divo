<?php
require '../private/connection.php';

session_start();

$naam = $_POST['naam'];
$afkorting = $_POST['afkorting'];
$or = $_POST['oriëntatie'];

$sql3 = 'SELECT naam FROM tbl_partijen where naam = :naam ';
$query3 = $conn->prepare($sql3);
$query3->execute(array(
    ':naam' => $naam
));

$sql4 = 'SELECT afkorting FROM tbl_partijen where afkorting = :ak';
$query4 = $conn->prepare($sql4);
$query4->execute(array(
    ':ak' => $afkorting
));

$row_count = $query3->rowCount();

if ($row_count > 0) {
    $_SESSION['fout_melding'] = 'Partij naam bestaat is';

    header('location:../index.php?page=voeg.partijen');
    exit();

}

$row_count2 = $query4->rowCount();

if ($row_count2 > 0) {
    $_SESSION['fout_melding'] = 'Afkorting naam bestaat is';

    header('location:../index.php?page=voeg.partijen');
    exit();

}


if ($_FILES['logo']['tmp_name'] == NULL) {
    $sql = 'INSERT INTO tbl_partijen (naam, afkorting, oriëntatie) VALUES (:naam , :afkorting, :or )';
    $query = $conn->prepare($sql);
    $query->execute(array(
        ':naam' => $naam,
        ':afkorting' => $afkorting,
        ':or' => $or
    ));
    header('location:../index.php?page=beheer.partijen');

} else {
    $logo = base64_encode(file_get_contents($_FILES['logo']['tmp_name']));
    $sql2 = 'INSERT INTO tbl_partijen (naam, afkorting, oriëntatie, logo) VALUES (:naam , :afkorting, :or ,:logo)';
    $query2 = $conn->prepare($sql2);
    $query2->execute(array(
        ':naam' => $naam,
        ':afkorting' => $afkorting,
        ':or' => $or,
        ':logo' => $logo
    ));


    header('location:../index.php?page=beheer.partijen');
}


