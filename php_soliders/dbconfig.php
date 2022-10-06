<?php

$host = "localhost";
$dbname = "youth_care";
$user = "root";
$pass = "";
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',
);

$pdo = new PDO("mysql:host=$host; dbname=$dbname", "$user", "$pass", $options);
if ($pdo === null)
    throw new PDOException("Connection Error : An Error Happen Within Connecting DataBase... try another time");