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