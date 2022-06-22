<?php
require '../private/connection.php';

session_start();
$id = $_POST['id'];
$naam = $_POST['naam'];
$afkorting = $_POST['afkorting'];
$or = $_POST['oriëntatie'];

$sql3 = 'SELECT naam FROM tbl_partijen where naam = :naam AND NOT id = :id';
$query3 = $conn->prepare($sql3);
$query3->execute(array(
    ':naam' => $naam,
    ':id' => $id
));

$sql4 = 'SELECT afkorting FROM tbl_partijen where afkorting = :ak AND NOT id = :id ';
$query4 = $conn->prepare($sql4);
$query4->execute(array(
    ':ak' => $afkorting,
    ':id' => $id
));

$row_count = $query3->rowCount();

if ($row_count > 0) {
    $_SESSION['fout_melding'] = 'Partij naam bestaat al';
    $_SESSION['id'] = $_POST['id'];
    header('location:../index.php?page=bewerk.partijen');
    exit();

}

$row_count2 = $query4->rowCount();

if ($row_count2 > 0) {
    $_SESSION['fout_melding'] = 'Afkorting naam bestaat is';

    header('location:../index.php?page=bewerk.partijen');
    exit();

}


if ($_FILES['logo']['tmp_name'] == NULL) {
    $sql = 'UPDATE tbl_partijen SET naam = :naam, afkorting = :afkorting , oriëntatie = :or WHERE id = :id ';
    $query = $conn->prepare($sql);
    $query->execute(array(
        ':naam' => $naam,
        ':afkorting' => $afkorting,
        ':or' => $or,
        ':id' => $id
    ));
    header('location:../index.php?page=beheer.partijen');

} else {
    $logo = base64_encode(file_get_contents($_FILES['logo']['tmp_name']));
    $sql2 = 'UPDATE tbl_partijen SET naam = :naam, afkorting = :afkorting , oriëntatie = :or , logo = :logo WHERE id = :id';
    $query2 = $conn->prepare($sql2);
    $query2->execute(array(
        ':naam' => $naam,
        ':afkorting' => $afkorting,
        ':or' => $or,
        ':logo' => $logo,
        ':id' => $id
    ));


    header('location:../index.php?page=beheer.partijen');
}


