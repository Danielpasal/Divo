<?php
require 'private/connection.php';

$id = $_POST['partij_id'] ?? $_SESSION['partij_id'];
$sql = "SELECT * FROM tbl_partij_leden WHERE partij_id = :id ";
$query = $conn->prepare($sql);
$query->execute(array(
    ':id' => $id
));

$RowCount = $query->rowCount();

?>

<td><?php echo $RowCount ?></td>

echo
<table class="table">
    <form action="index.php?page=voeg.lid" method="post">
        <button type="submit" class="btn btn-primary">Voeg</button>
        <input type="hidden" name="partij_id" value="<?php echo $id ?>">
    </form>
    <tr>
        <th scope="col"> Voornaam</th>
        <th scope="col">Tussenvoegsel</th>
        <th scope="col">Achternaam</th>
        <th scope="col">Geboortedatum</th>
        <th scope="col">Woonplaats</th>
        <th scope="col">Geslacht</th>
        <th scope="col">Volgorde kieslijst</th>
        <th scope="col">Actie</th>

    </tr>
    <?php
    $volgorde = 1;
    while ($result_set = $query->fetch()) {

        ?>
            <tr>
            <td><?php echo $result_set['voornaam'] ?></td>
        <td><?php echo $result_set['tussenvoegsel'] ?></td>
        <td><?php echo $result_set['achternaam'] ?></td>
        <td><?php echo $result_set['geboortedatum'] ?></td>
        <td><?php echo $result_set['woonplaats'] ?></td>
        <td><?php echo $result_set['geslacht'] ?></td>
        <td><?php echo $volgorde++; ?></td>
        <td>
            <form action="index.php?page=bewerk.lid" method="post">
                <input type="hidden" name="user_id" value="<?php echo $result_set['id'] ?>">
                <input type="hidden" name="partij_id" value="<?php echo $id ?>">
                <button type="submit" class="btn btn-warning">Bewerken</button>
            </form>
            <form action="php/herstel_lid.lid.php" method="post">
                <input type="hidden" name="partij_id" value="<?php echo $id ?>">
                <input type="hidden" name="user_id" value="<?php echo $result_set['id'] ?>">
                <button type="submit" onclick="return confirm('Wil je het echt verwijderen ')" class="btn btn-danger">
                    Verwijderen
                </button>
            </form>
        </td>
        </tr>
    <?php } ?>
    </tbody>
</table>




