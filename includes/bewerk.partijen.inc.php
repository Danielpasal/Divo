<?php

require 'private/connection.php';

$id = $_POST['id'] ?? $_SESSION['id'];

if (isset($_SESSION['fout_melding'])) { ?>
<div class="alert alert-danger" role="alert">

    <?php
    echo '<p class="melding">' . $_SESSION['fout_melding'] . "</p>";
    unset($_SESSION['fout_melding']);
    }

$sql = "SELECT * FROM tbl_partijen WHERE id = :id";
$query = $conn->prepare($sql);
$query->execute(array(
        ':id' => $id
));
  $rs = $query->fetch()
?>
</div>

<form method="post" action="php/bewerk.partij.php" enctype="multipart/form-data">

    <label for="email">Partij naam</label>
    <div class="form-group">
        <input type="text" name="naam" class="form-control" id="naam" aria-describedby="naam" value="<?php echo $rs['naam'] ?>" placeholder="Enter naam">
    </div>
    <div class="form-group">
        <label for="oriëntatie">Oriëntatie</label>
        <select required name="oriëntatie" id="oriëntatie" class="form-select"  aria-label="Default select example">
            <option value="<?php echo $rs['oriëntatie'] ?>"><?php echo $rs['oriëntatie'] ?></option>
            <option value="Links">links</option>
            <option value="Rechts">Rechts</option>
            <option value="Midden">Midden</option>
        </select>    </div>
    <div class="form-group">
        <label for="afkorting">Afkorting</label>
        <br>
        <input required type="text" class="form-control" id="afkorting" name="afkorting" aria-describedby="afkorting" value="<?php echo $rs['afkorting'] ?>" placeholder="Enter afkorting">
    </div>
    <div class="form-group">
        <label for="logo">Logo</label>
        <input  type="file" class="form-control" name="logo" id="logo" aria-describedby="logo" value="" placeholder="Enter tussenvoegsel">
    </div>
    <input type="hidden" name="id" value="<?php echo $rs['id'] ?>">
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
