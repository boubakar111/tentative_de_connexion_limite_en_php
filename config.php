<?php


$host = 'localhost';
$dbname = 'tentative_connexion';
$user = 'root';
$password = '';
$dsn = "mysql:host=$host;dbname=$dbname;charset=UTF8";

try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo " tentative de connection a la base de données ". $e->getMessage();
}
