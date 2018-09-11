<?php 

include '../views/shared/bdd.php';

// Check de la correspondance mot de passe
if ($_POST['password'] != $_POST['passwordBis']){
    header("location: ../views/account.php");
}
else{
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mail = $_POST['mail'];
    $tel = $_POST['tel'];
    $age = $_POST['age'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);


    // Convertion de permis en 1-0
    if ($_POST['permis'] == true){ 
        $permis = 1;
    }
    else{
        $permis = 0;
    }
        

    // Requête insertion d'utilisateur
    $req = $conn->prepare("INSERT INTO utilisateur (nom, prenom, tel, mail, password, admin, bde, age, permis, promo) VALUES (:nom, :prenom, :tel, :mail, :password, 0, 0, :age, :permis, :promo) ");
    $req->execute(array(
        'mail' => $mail,
        'nom' => $nom,
        'prenom' => $prenom,
        'tel' => $tel,
        'age' => $age,
        'password' => $password,
        'permis' => $permis,
        'promo' => $_POST['promo']
    ));

    
    header("location: ../../index.php");

    }



