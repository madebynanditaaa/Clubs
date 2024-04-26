<?php
 $host = 'localhost';
 $dbname = 'clubs';
 $dbusername = 'root';
 $dbpassword = '';
 
try
{
$pdo = new PDO("mysql:host=$host; dbname=$dbname", $dbusername, $dbpassword);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

catch(PDOexception $e)
{
die ("Connection Faileeed: " . $e->getMessage());
}

