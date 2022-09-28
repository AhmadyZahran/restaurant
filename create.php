<?php 
require_once './connection.php';

if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $ingerdients = $_POST['ingerdients'];
    $image = $_POST['image'];
    $price = $_POST['price'];

    $sql = "INSERT INTO restaurant(name , ingerdients ,image , price  ) VALUES (:name , :ingerdients , :image , :price )";

    $query = $db->prepare($sql);

    $query->bindParam(':name' ,$name, PDO::PARAM_STR);
    $query->bindParam(':ingerdients' ,$ingerdients, PDO::PARAM_STR);
    $query->bindParam(':image' ,$image, PDO::PARAM_STR); 
    $query->bindParam(':price' ,$price, PDO::PARAM_STR); 

    $result = $query->execute();

    header("location: index.php");

 

}

?>