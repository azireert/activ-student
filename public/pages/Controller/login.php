<?php 
include '../views/shared/bdd.php';

// Récupération de l'id et du password de l'utilisateur voulant se connecter
$checkMailR = $conn->prepare('SELECT password, id FROM utilisateur WHERE mail = :mail');
$checkMailR -> execute(array(
    'mail' => $_POST['name_account']
));
$checkMailF = $checkMailR->fetch();

// Le pseudo éxiste t'il?
if ($checkMailF['id'] AND $_POST['password'] == $checkMailF['password']){
    header("location: ../views/home.php");
    
}
else{
    header("location: ../../index.php");
}


?>