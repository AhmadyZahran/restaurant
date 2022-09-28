<?php
$server = 'mysql:host=localhost;dbname=task';
$user   = 'root';
$pass    = 'root';

try{

    $db = new PDO ($server,$user,$pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo 'connect succsefull';
}
catch(PDOException $error){

echo 'connection filed'.$error->getmessage();
}


?>