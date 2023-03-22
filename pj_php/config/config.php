<?php

try{
    $conn = new pdo("mysql:host=localhost;dbname=projet_php;charset=utf8","root","");

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

} catch (Exception $e)
{
    $e->getMessage();
}

?>