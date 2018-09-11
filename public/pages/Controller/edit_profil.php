<?php
//login.php
require __DIR__.'/../../../vendor/autoload.php';
use Symfony\Component\Yaml\Yaml;

$db = Yaml::parse(file_get_contents('../../../config/db.yml'));

//lecture
$config = new \Doctrine\DBAL\Configuration();
//..
$connectionParams = array(
    'dbname' => $db['name'],
    'user' => $db['login'],
    'password' => $db['password'],
    'host' => $db['host'],
    'driver' => 'pdo_mysql',
);
$conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams, $config);

if($_POST) {   //Creation des variables du profil si il y a un POST

    $id_customer = $_POST['id_customer'];
    $password = $_POST['password'];

    $sql = "SELECT*
    FROM customer
    WHERE id_customer = ".$conn->quote($id_customer)."";
    $stmt = $conn->executeQuery($sql);
    $row = $stmt->fetch();
    // var_dump($row['Password']);
    // echo $row;
    if (password_verify($password, $row['password'])) {

        $id_customer = $_POST['id_customer'];
        $title = $_POST['title'];
        $gender = $_POST['gender'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $nationality = $_POST['nationality'];
        $email = $_POST['email'];
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $birthdate = $_POST['birthdate'];
        $phone_number = $_POST['phone_number'];
        $id_type = $_POST['id_type'];
        $id_number = $_POST['id_number'];
        
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            if (isset($_POST['title']) && isset($_POST['gender']) && isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['nationality']) && isset($_POST['email']) && isset($_POST['birthdate']) && isset($_POST['phone_number']) && isset($_POST['id_type']) && isset($_POST['id_number']) && isset($_POST['id_customer'])){

                // version protégée contre les injections sql
                $sql =    //insertion des donnees dans la base de donnee
                'UPDATE profil_customer SET title="'.$_POST['title'].'" , gender = "'.$_POST['gender'].'", first_name = "'.$_POST['first_name'].'", last_name = "'.$_POST['last_name'].'", nationality = "'.$_POST['nationality'].'", email = "'.$_POST['email'].'", birthdate = "'.$_POST['birthdate'].'", phone_number = "'.$_POST['phone_number'].'", id_type = "'.$_POST['id_type'].'", id_number = "'.$_POST['id_number'].'" WHERE id_customer = "'.$_POST['id_customer'].'" ';
                // var_dump($sql);
                $conn->query($sql);
                header('Location: ../view/customer_html.php');    //envoi sur une page  
            }
        }

        else{     // Si False, message d'erreur
        echo("Your email is not a valid email address");
        }

    }

    else{
        echo ("Your ID Customer or your password is Wrong");
    }
    
}