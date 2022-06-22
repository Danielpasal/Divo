<?php
require '../private/connection.php';

session_start();

$id = $_POST['user_id'];
$email = $_POST['email'];
$voornaam = $_POST['voornaam'];
$tussenvoegsel = $_POST['tussenvoegsel'];
$achternaam = $_POST['achternaam'];
$postcode = $_POST['postcode'];
$straatnaam = $_POST['straatnaam'];
$huisnummer = $_POST['huisnummer'];
$provincie = $_POST['provincie'];
$roll = 3;
//ENCRYPT FUNCTION


$sql1 = 'SELECT * FROM tbl_gebruikers where email = :email AND NOT id = :id ';
$query1 = $conn->prepare($sql1);
$query1->execute(array(':email' => $email,
                        ':id' => $id
                        ));

$RowCount = $query1->rowCount();
if ($RowCount > 0){
    $_SESSION['fout_melding'] = 'Email bestaat al,vul opnieuw de gegevens';
    $_SESSION['user_id'] = $id;
    header('location:../index.php?page=bewerk.beheerder');
}else {




    $sql = 'UPDATE tbl_gebruikers
        SET email = :email,
            voornaam = :voornaam,
            tussenvoegsel = :tussenvoegsel ,
            achternaam = :achternaam ,
            postcode = :postcode,
            straatnaam = :straatnaam,
            huisnummer = :huisnummer,
            provincie = :provincie
     WHERE id =:id';
    $query = $conn->prepare($sql);
    $query->execute(array(
        ':email' => $email,
        ':voornaam' => $voornaam,
        ':tussenvoegsel' => $tussenvoegsel,
        ':achternaam' => $achternaam,
        ':postcode' => $postcode,
        ':straatnaam' => $straatnaam,
        ':huisnummer' => $huisnummer,
        ':provincie' => $provincie,
        ':id' => $id


    ));
    header('location:../index.php?page=beheer.beheerders');

}

?>