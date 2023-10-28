<?php
try {
    $options = array(

        PDO::ATTR_PERSISTENT => true,
        PDO::ATTR_EMULATE_PREPARES => false,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"

    );
    $pdo = new PDO($_ENV['DB_TYPE'] . ':host=' . $_ENV['DB_HOST'] . ';dbname=' . $_ENV['DB_NAME'], $_ENV['DB_USER'], $_ENV['DB_PASS'], $options);
} catch (PDOException $e) {
    // Manejo de errores
    print_r('Error connection: ' . $e->getMessage());
}
