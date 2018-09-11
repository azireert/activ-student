<?php

use Symfony\Component\Yaml\Yaml;

require __DIR__.'/../../../vendor/autoload.php';

$db = Yaml::parseFile('../../../config/db.yml');

$config = new \Doctrine\DBAL\Configuration();
$connectionParams = array(
    'dbname' => $db['name'],
    'user' => $db['login'],
    'password' => $db['password'],
    'host' => $db['host'],
    'driver' => 'pdo_mysql',
);
$conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams, $config);

// On démarre la session
session_start();
  if($_POST) {
    $name_account = $_POST['mail'];
    $password = $_POST['password'];
    // $result = mysqli_query($con, 'SELECT name_account, password FROM customer WHERE name_account="'.addslashes($name_account).'" and password = "'.addslashes($password).'" ');
    // var_dump($result);
    $sql = "SELECT*
    FROM users
    WHERE mail = ".$conn->quote($mail)."";
    $stmt = $conn->executeQuery($sql);
    $row = $stmt->fetch();
    // var_dump($row['Password']);
    // echo $row;
    if (password_verify($password, $row['password'])) {
      $_SESSION['name_account'] = $name_account;
      $_SESSION['id_costumer'] = $id_costumer;
      $_SESSION['ouvert'] = "true";
      header('Location: ../view/customer_html.php');}
      
    else {

    echo '<h3 style="color: red; text-align: center">
      Your account is invalid
      </h3>;
    }

  }