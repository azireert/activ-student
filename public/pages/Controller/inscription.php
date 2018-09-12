<?php 

include '../views/shared/bdd.php';

// Check de la correspondance mot de passe
if ($_POST['password'] != $_POST['passwordBis'] or is_int($_POST['age']) or !strstr($_POST['mail'], "@epsi.fr")){
    header("location: ../views/account.php");
    if ($_POST['password'] != $_POST['passwordBis']){
        echo "password";
    }
    if (!strstr($_POST['mail'], "@epsi.fr")){
        echo "mail non conforme";
    }
}
else{
    // Existe t'il déjà un mail comme lui
    $reqMail = $conn->prepare("SELECT mail FROM utilisateur");
    $reqMail->execute();
    $varTest = 0;
    while ($Fmail = $reqMail->fetch()){
        if($Fmail['mail'] == $_POST['mail'])
            $varTest = $varTest + 1;
    }
    if ($varTest == 0){
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

        $image = $conn->prepare("SELECT id FROM utilisateur WHERE mail = :mail");
        $image->execute(array(
            'mail' => $_POST['mail']
        ));
        $imageF = $image->fetch();
        session_start();
        $_SESSION['id'] = $imageF['id'];

        $ima = $conn->prepare("INSERT INTO image (id_user, nom) VALUES (:id, :nom)");
        $ima->execute(array(
            'id' => $_SESSION['id'],
            'nom' => "default.jpg"
        ));

        header("location: ../../index.php");
    
        }
    
    else{
        header("location: ../views/account.php");
        if ($_POST['password'] != $_POST['passwordBis']){
            echo "password";
        }
        if (!strstr($_POST['mail'], "@epsi.fr")){
            echo "mail non conforme";
        }
        if ($varTest == 1){
            echo "le mail existe deja";
        }
    }
}






   



