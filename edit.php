<?php 
require_once './connection.php';

$id = $_GET["id"];

$sql = "SELECT * FROM  restaurant WHERE id=$id";

$getData = $db->query($sql);  /*echo resault this>>> PDOStatement Object ( [queryString] => SELECT * FROM restaurant )*/

$food = $getData->fetchAll(PDO::FETCH_OBJ);

print_r($food);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit</title>
</head>
<body>
<form action="#" method="post"> 
<label>name</label>
<input type="text" name="name" value= "<?php echo $food[0]->name?>">
<label>	ingerdients</label>
<input type="text" name="ingerdients" value= "<?php echo $food[0]->ingerdients?>" >
<label>	image</label>
<input type="text" name="image" value= "<?php echo $food[0]->image?>">
<label>	price</label>
<input type="number" name="price" value= "<?php echo $food[0]->price?>" >
<button type="submit" name="submit" >edit</button>
</form>    

</body>
</html>

<?php 
if(isset($_POST["submit"])){
 $name= $_POST["name"];
 $ingerdients = $_POST["ingerdients"];
 $image = $_POST["image"];
 $price = $_POST["price"];

$sql = "UPDATE restaurant SET name=:name ,ingerdients=:ingerdients , image=:image , price=:price WHERE id=:id";

$query = $db->prepare($sql);

$query->bindParam(':name',$name, PDO::PARAM_STR);
$query->bindParam(':ingerdients',$ingerdients, PDO::PARAM_STR);
$query->bindParam(':image',$image, PDO::PARAM_STR);
$query->bindParam(':price',$price, PDO::PARAM_STR);
$query->bindParam(':id',$id, PDO::PARAM_STR);



$result = $query->execute();

header("location: index.php");

}
?>