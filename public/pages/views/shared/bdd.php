<?php
    use Symfony\Component\Yaml\Yaml;
    require_once __DIR__ . '/../../../../vendor/autoload.php'; // Connexion à la base de donnée
    $connectionParams = Yaml::parseFile(__DIR__.'/../../../../config/db.yml');
    $config = new \Doctrine\DBAL\Configuration();
    $conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams, $config);

