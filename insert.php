<?php

include 'db.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if (isset($_POST['submit']))
    {
        $Name   = $_POST['name'];
        $Description  = $_POST['description'];
        $Price = $_POST['price'];
        $Quantity    = $_POST['quantity'];
       
    
    
         $sql = 'INSERT INTO products(name, description, price, quantity) values (?,?,?,?)';
         $stmt = $con -> prepare ($sql);
         $stmt -> execute (array($Name, $Description, $Price, $Quantity));

         if($stmt -> rowCount() > 0 ){  ?>
            <div>Super Save</div>
            <?php } else { ?>
                <div>May Wrong</div>
            <?php
            }
    }
    ?>

    <h1>Add Products</h1>
    <form action="" method="post">            
<p>
    <label for="name">Name:</label>
    <input type="text" name="name" id="name">
</p>
<p>
    <label for="description">Description:</label>
    <input type="text" name="description" id="description">
</p>        
<p>
    <label for="price">Price:</label>
    <input type="text" name="price" id="price">
</p>        
<p>
    <label for="quantity">Quantity:</label>
    <input type="text" name="quantity" id="quantity">
</p>         
    <button type="submit" name="submit">Add</button>
    <a href="index.php" role="button">All Products</a>
    </form>

</body>
</html>