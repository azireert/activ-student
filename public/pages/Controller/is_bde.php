<?php
// Tester le statut bde de l'utilisateur connecté
$isBde = $conn->prepare("SELECT bde FROM utilisateur WHERE id = :id");
$isBde->execute(array(
    'id' => $_SESSION['id']
));
$isBdeF = $isBde->fetch();

// Mise du statut bde ou non dans la variable $bde
$Bde = $isBdeF['bde'];
?>
