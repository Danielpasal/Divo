<?php
require '../private/connection.php';

session_start();

$partij_id = $_POST['partij_id'];

$voornaam = $_POST['voornaam'];
$tussenvoegsel = $_POST['tussenvoegsel'];
$achternaam = $_POST['achternaam'];
$geboortedatum = $_POST['geboorte-datum'];
$woonplaats = $_POST['woonplaats'];
$geslacht = $_POST['geslacht'];
$lid_id = $_POST['id'];
$roll = 4;

$sql = 'UPDATE tbl_partij_leden 
        SET voornaam = :voornaam , tussenvoegsel = :tussenvoegsel ,achternaam = :achternaam , geboortedatum = :geboortedatum ,woonplaats = :woonplaats , geslacht = :geslacht
         WHERE id = :lid_id
         ';
$qry = $conn->prepare($sql);
$qry->execute(array(
    ':voornaam' => $voornaam,
    ':tussenvoegsel' => $tussenvoegsel,
    ':achternaam' => $achternaam,
    ':geboortedatum' => $geboortedatum,
    ':woonplaats' => $woonplaats,
    ':geslacht' => $geslacht,
    'lid_id' => $lid_id,


));

$_SESSION['partij_id'] = $partij_id;

header('location:../index.php?page=beheer.leden');