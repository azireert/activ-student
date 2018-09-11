<?php 

include '../views/shared/bdd.php';

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$mail = $_POST['mail'];
$tel = $_POST['tel'];
$age = $_POST['age'];
$password = $_POST['password'];
$permis = $_POST['permis'];


$req = $conn->prepare("INSERT INTO utilisateur (nom, prenom, tel, mail, password, admin, bde, age, permis, promo) VALUES (:nom, :prenom, :tel, :mail, :password, 0, 0, :age, 1, 'B5') ");
$req->execute(array(
    'mail' => $mail,
    'nom' => $nom,
    'prenom' => $prenom,
    'tel' => $tel,
    'age' => $age,
    'password' => $password
));




