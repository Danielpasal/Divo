<?php

$bn = $_SESSION['bn'] ;

if (isset($_SESSION['fout_melding'])) { ?>
<div class="alert alert-danger" role="alert">

    <?php
    echo '<p class="melding">' . $_SESSION['fout_melding'] . "</p>";
    unset($_SESSION['fout_melding']);
    } ?>
</div>


<form action="php/verificatie.php" method="post">
    <div class="form-group">
        <label for="postcode">Postcode</label>
        <input type="text" class="form-control" id="postcode" name="postcode" required placeholder="postcode">
    </div>
    <div class="form-group">
        <label for="huisnummer">Huisnummer</label>
        <input type="text" class="form-control" id="class" name="huisnummer" required placeholder="huisnummer">
    </div>
    <input type="hidden" name="bn" value="<?php echo $bn ?>">
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
