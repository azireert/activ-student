<?php
include '../views/shared/bdd.php';
session_start();


// Les actu liées à l'utilisateur
$listeActu = $conn->prepare("SELECT * FROM actu WHERE auteur = :id");
$listeActu->execute(array(
    'id' => $_POST['delete']
));

// Delete actu_com different de actu
$delActu = $conn->prepare("DELETE FROM actu_com WHERE id_utilisateur = :id");
$delActu->execute(array(
    'id' => $_POST['delete']
));

// Les covoit liées à l'utilisateur
$listeCovoit = $conn->prepare("SELECT * FROM covoit WHERE auteur = :id");
$listeCovoit->execute(array(
    'id' => $_POST['delete']
));

// Les bde liées à l'utilisateur
$listeBde = $conn->prepare("SELECT * FROM bde WHERE auteur = :id");
$listeBde->execute(array(
    'id' => $_POST['delete']
));

// Delete image
$delImg = $conn->prepare("DELETE FROM image WHERE id_user = :id");
$delImg->execute(array(
    'id' => $_POST['delete']
));



// Parcours des actu liées à l'utilisateur
while ($listeActuF = $listeActu->fetch()){
    // Delete actu_com
    $deleteActu_com = $conn->prepare("DELETE FROM actu_com WHERE id_actu_com = :id");
    $deleteActu_com->execute(array(
        'id' => $listeActuF['id_actu']
    ));

    
    $deleteActu = $conn->prepare("DELETE FROM actu WHERE auteur = :auteur");
    $deleteActu->execute(array(
        'auteur' => $_POST['delete']
    ));
};


// Parcours des covoit liées à l'utilisateur
while ($listeCovoitF = $listeCovoit->fetch()){
    // Delete covoit_com
    $deleteCovoit_com = $conn->prepare("DELETE FROM covoit_com WHERE id_covoit = :id");
    $deleteCovoit_com->execute(array(
        'id' => $listeCovoitF['id_covoit']
    ));

    
    $deleteCovoit = $conn->prepare("DELETE FROM covoit WHERE auteur = :auteur");
    $deleteCovoit->execute(array(
        'auteur' => $_POST['delete']
    ));
};


// Parcours des bde liées à l'utilisateur
while ($listeBdeF = $listeBde->fetch()){
    // Delete bde_com
    $deleteBde_com = $conn->prepare("DELETE FROM bde_com WHERE id_bde = :id");
    $deleteBde_com->execute(array(
        'id' => $listeBdeF['id']
    ));

    
    $deleteBde = $conn->prepare("DELETE FROM bde WHERE auteur = :auteur");
    $deleteBde->execute(array(
        'auteur' => $_POST['delete']
    ));
};



// Suppression de l'utilisateur
$deleteUser = $conn->prepare("DELETE FROM utilisateur WHERE id = :id");
$deleteUser->execute(array(
    'id' => $_POST['delete']
));

header("location: ../views/listeUser.php");

