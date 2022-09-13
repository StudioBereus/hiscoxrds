<?php
global $connection;
$connection="";
try {
    $connection = new PDO('mysql:host=localhost;dbname=assurance', 'root', '', array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_CASE => PDO::CASE_LOWER,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
    ));

} catch (PDOException $e) {
    echo '<p>non</p>';
    die("Database connection failed: " . $e->getMessage());
}
?>