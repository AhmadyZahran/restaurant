<?php 
require_once './connection.php';

$id= $_GET["id"];

$sql = "DELETE FROM restaurant WHERE id=:id";

$query = $db->prepare($sql);

$query->bindParam(':id',$id, PDO::PARAM_STR);

$result = $query->execute();

header("location: index.php");

?>

