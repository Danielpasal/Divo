<?php
require 'private/connection.php';

$sql = "SELECT * FROM tbl_partij_leden WHERE partij_id  IS NULL ";
$query = $conn->prepare($sql);
$query->execute();


$sql1 = "SELECT * FROM tbl_partijen ";
$query1 = $conn->prepare($sql1);
$query1->execute();


$partijen = $query1->fetchAll()

?>


echo
<table class="table">

    <tr>
        <th scope="col">Voornaam</th>
        <th scope="col">Tussenvoegsel</th>
        <th scope="col">Achternaam</th>
        <th scope="col">Geboortedatum</th>
        <th scope="col">Woonplaats</th>
        <th scope="col">Geslacht</th>
        <th scope="col">Partijen</th>
        <th scope="col">Actie</th>

    </tr>

    <label for="Partijen">Partijen</label>
    <?php
    while ($result_set = $query->fetch()) { ?>
        <tr>
            <td><?php echo $result_set['voornaam'] ?></td>
            <td><?php echo $result_set['tussenvoegsel'] ?></td>
            <td><?php echo $result_set['achternaam'] ?></td>
            <td><?php echo $result_set['geboortedatum'] ?></td>
            <td><?php echo $result_set['woonplaats'] ?></td>
            <td><?php echo $result_set['geslacht'] ?></td>

            <td>
                <div class="form-group">
                    <form action="php/herstel.lid.php" method="post">

                    <select required name="partij_id" id="partij_id">

                                <?php foreach ($partijen as $partij) { ?>
                                <option value="<?php echo $partij['id'] ?>"><?php echo $partij['naam'] ?></option>
                                <?php }?>
                    </select>
                </div>
            </td>
            <td>
                <form action="php/herstel.lid.php" method="post">
                    <input type="hidden" name="user_id" value="<?php echo $result_set['id'] ?>">
                    <button type="submit"  class="btn btn-dark">
                        Voeg
                    </button>
                </form>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>




