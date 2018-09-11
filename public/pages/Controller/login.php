
    <?php
    session_start();
    include '../views/shared/bdd.php';

    // Récupération de l'id et du password de l'utilisateur voulant se connecter
    $checkMailR = $conn->prepare('SELECT password, id, nom, prenom FROM utilisateur WHERE mail = :mail');
    $checkMailR -> execute(array(
        'mail' => $_POST['name_account']
    ));
    $checkMailF = $checkMailR->fetch();

    // Le pseudo éxiste t'il?
    if ($checkMailF['id'] AND password_verify($_POST['password'], $checkMailF['password'])){
        header("location: ../views/home.php");
        
        $_SESSION["id"] = $checkMailF['id'];
        
        
    }
    else{
        header("location: ../../index.php");
    }


    ?>



