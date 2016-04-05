<?php
require_once "rb.php";
$dbName="kurdkala";
$dbUName="admin";
$dbPass="admin123";
R::setup( 'mysql:host=localhost;dbname='.$dbName,
    $dbUName, $dbPass);
?>