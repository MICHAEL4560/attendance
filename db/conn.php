<?php


$host = 'localhost';
$db = 'attendance_db';
$user= 'root';
$password='';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try{

    $pdo = new PDO ($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);
    //echo 'Hello Database';

} catch(PDOException $e){

    throw new PDOException ($e->getMessage());


}

require_once 'crud.php';
$crud = new crud($pdo);




?>