<?php

$port = "3306";
$host = "127.0.0.1";
$dbname = 'coindineloan_POO';



$password = "";
$user = 'root';


$connexionString = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8";


try {
    $db = new PDO(
        $connexionString,
        $user,
        $password
    );
} catch (PDOException $e) {
    die('Une error sest produite' . $e->getMessage());
};
