<?php
session_start();
include('../views/shared/bdd.php');

$updateUser = $conn->prepare("UPDATE utilisateur SET nom = :nom, prenom = :prenom, promo = :promo, admin = :admin, bde = :bde WHERE id = :id");
$updateUser->execute(array(
    'nom' => $_POST['nom'],
    'prenom' => $_POST['prenom'],
    'promo' => $_POST['promo'],
    'admin' => $_POST['admin'],
    'bde' => $_POST['bde'],
    'id' => $_POST['submit']
));

header("location: ../views/listeUser.php");


