<?php
// Tester le statut admin de l'utilisateur connecté
$isAdmin = $conn->prepare("SELECT admin FROM utilisateur WHERE id = :id");
$isAdmin->execute(array(
    'id' => $_SESSION['id']
));
$isAdminF = $isAdmin->fetch();

// Mise du statut admin ou non dans la variable $admin
$admin = $isAdminF['admin'];
?>
