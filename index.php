<?php 



require_once './connection.php';

$sql = 'SELECT * FROM  restaurant';

$getData = $db->query($sql);  /*echo resault this>>> PDOStatement Object ( [queryString] => SELECT * FROM restaurant )*/

$food = $getData->fetchAll(PDO::FETCH_OBJ);  /*عشان ترجعيلي معلومات عن طعام يعني معلومات الي بدخلها اليوزر في فورم بتنحظ فيها */






?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>restaurant</title>
</head>
<body>
    
<form action="create.php" method="post"> 
<label>name</label>
<input type="text" name="name">
<label>	ingerdients</label>
<input type="text" name="ingerdients" >
<label>	image</label>
<input type="text" name="image">
<label>	price</label>
<input type="number" name="price" >
<input type="submit" name="submit"> 
</form>

<table border>
<tr>
    <th>Name</th>
    <th>ingerdients</th>
    <th>image</th>
    <th>price</th>
    <th>edit</th>
    <th>delete</th>
</tr> 
<?php foreach($food as $type)   { ?>

<tr>
<td><?php echo  $type->name ?></td>
<td><?php echo $type->ingerdients ?></td>
<td><img src="<?php echo $type->image ?>"width =50px height = 50px></td>
<td><?php echo $type->price ?></td>
<td><a href="edit.php?id=<?php echo $type->id ?>">edit</a></td>
<td><a href="delete.php?id=<?php echo $type->id ?>">delete</a></td>

</tr>
<?php  } ?>

 </table>
</body>
</html>