<?php
require '../private/connection.php';

session_start();

$voornaam = $_POST['voornaam'];
$tussenvoegsel = $_POST['tussenvoegsel'];
$achternaam= $_POST['achternaam'];
$geboortedatum = $_POST['geboorte-datum'];
$woonplaats = $_POST['woonplaats'];
$geslacht = $_POST['geslacht'];
$partij_id = $_POST['id'];
$roll = 4;

$sql = 'INSERT INTO tbl_partij_leden (voornaam, tussenvoegsel, achternaam, geboortedatum, woonplaats, geslacht,  roll_id, partij_id) 
         VALUES (:voornaam,:tussenvoegsel, :achternaam,:geboortedatum,:woonplaats,:geslacht,:roll_id,:partij_id) ';
$qry = $conn->prepare($sql);
$qry->execute(array(
    ':voornaam' => $voornaam,
    ':tussenvoegsel' => $tussenvoegsel,
    ':achternaam' => $achternaam,
    ':geboortedatum' => $geboortedatum,
    ':woonplaats' => $woonplaats,
    ':geslacht' => $geslacht,
    ':roll_id' => $roll,
    'partij_id' => $partij_id,


));

$_SESSION['partij_id'] = $partij_id;

header('location:../index.php?page=beheer.leden');