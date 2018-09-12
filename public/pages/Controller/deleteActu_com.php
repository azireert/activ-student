<?php
include '../views/shared/bdd.php';

// Delete de commentaire sur actu
$deleteActu_com = $conn-> prepare("DELETE FROM actu_com WHERE id = :id");
$deleteActu_com->execute(array(
    'id' => $_POST['id']
));

header("location: ../views/home.php");