<?php

try {
    $dbConnection = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);
} catch (PDOException $exception) {
    die('Database Connection failed!');
}