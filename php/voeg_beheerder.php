<?php
require '../private/connection.php';

session_start();
$id = $_POST['user_id'];
$email = $_POST['email'];
$wachtwoord = $_POST['wachtwoord'];
$voornaam = $_POST['voornaam'];
$tussenvoegsel = $_POST['tussenvoegsel'];
$achternaam = $_POST['achternaam'];
$postcode = $_POST['postcode'];
$straatnaam = $_POST['straatnaam'];
$huisnummer = $_POST['huisnummer'];
$provincie = $_POST['provincie'];
$passwordhash = password_hash($wachtwoord, PASSWORD_DEFAULT);
$roll = 3;


$sql1 = 'SELECT email FROM tbl_gebruikers where email = :email ';
$query1 = $conn->prepare($sql1);
$query1->execute(array(':email' => $email));

$RowCount = $query1->rowCount();

if ($RowCount > 0){
    $_SESSION['fout_melding'] = 'Email bestaat al,vul opnieuw de gegevens';
    header('location:../index.php?page=voeg.beheerders');
}else {
    $sql = 'INSERT INTO tbl_gebruikers (email, wachtwoord, voornaam, tussenvoegsel, achternaam, postcode, straatnaam, huisnummer, roll_id, provincie) 
        VALUES (:email , :wachtwoord ,:voornaam, :tussenvoegsel,:achternaam,:postcode,:straatnaam,:huisnummer, :roll,:provinci  )';
    $query = $conn->prepare($sql);
    $query->execute(array(
        ':email' => $email,
        ':wachtwoord' => $passwordhash,
        ':voornaam' => $voornaam,
        ':tussenvoegsel' => $tussenvoegsel,
        ':achternaam' => $achternaam,
        ':postcode' => $postcode,
        ':straatnaam' => $straatnaam,
        ':huisnummer' => $huisnummer,
        ':provinci' => $provincie,
        ':roll' => $roll


    ));
    header('location:../index.php?page=beheer.beheerders');

}

?>