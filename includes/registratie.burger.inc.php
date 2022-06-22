<?php

if (isset($_SESSION['fout_melding'])) { ?>
<div class="alert alert-danger" role="alert">

    <?php
    echo '<p class="melding">' . $_SESSION['fout_melding'] . "</p>";
    unset($_SESSION['fout_melding']);
    } ?>
</div>


<form action="php/registratie.php" method="post">
    <div class="form-group">
        <label for="burgerservicenummer">Burgerservicenummer</label>
        <input type="number"  data-maxlength="9" oninput="this.value=this.value.slice(0,this.dataset.maxlength)" name="burgerservicenummer" class="form-control" id="exampleInputEmail1" required aria-describedby="emailHelp" placeholder="burgerservicenummer">
    </div>
    <div class="form-group">
        <label for="postcode">Postcode</label>
        <input type="text" class="form-control" id="postcode" name="postcode" required placeholder="postcode">
    </div>
    <div class="form-group">
        <label for="huisnummer">Huisnummer</label>
        <input type="text" class="form-control" id="class" name="huisnummer" required placeholder="huisnummer">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
