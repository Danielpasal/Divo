<?php


if (isset($_SESSION['fout_melding'])) { ?>
<div class="alert alert-danger" role="alert">

    <?php
    echo '<p class="melding">' . $_SESSION['fout_melding'] . "</p>";
    unset($_SESSION['fout_melding']);
    }

    $partij = ['VVD', 'CDA', 'DENK', 'PVV', 'FvD', 'SP', 'GL', 'CU', 'PvdD', 'PvdA', 'BBB'];
    $result = rand(0,9);
    echo $result;

      ?>

</div>



<form action="php/login.check.php" method="post">
    <div class="form-group">
        <label for="burgerservicenummer">Burgerservicenummer</label>
        <input  required type="number"  data-maxlength="9" oninput="this.value=this.value.slice(0,this.dataset.maxlength)"   name="burgerservicenummer" class="form-control" id="exampleInputEmail1" required aria-describedby="emailHelp" placeholder="burgerservicenummer">
    </div>


    <button type="submit" class="btn btn-primary">Submit</button>

</form>
 <?php
 require 'private/connection.php';
 $partij = ['VVD', 'CDA', 'DENK', 'PVV', 'FvD', 'SP', 'GL', 'CU', 'PvdD', 'PvdA', 'BBB'];

 $sql = "SELECT id FROM tbl_burgers";
 $stmt = $conn->prepare($sql);
 $stmt->execute();
 $rsUsers = $stmt->fetchAll(PDO::FETCH_ASSOC);

 foreach($rsUsers as $rsUser) {
     $id = $rsUser['id'];
     $partij_work = $partij;

     $index = rand(0,9);
     $vk1 = $partij_work[$index];
     $result = array_splice($partij_work, $index, 1);


     $index = rand(0,8);
     $vk2 = $partij_work[$index];
     array_splice($partij_work, $index, 1);

     $index = rand(0,7);
     $vk3 = $partij_work[$index];

     echo $id . ' ' . $vk1 . ' ' . $vk2 . ' ' . $vk3 . '<br/>';



 }

 ?>
?>