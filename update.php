<?php 

include 'db.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update Product</title>
    </head>
<body>
    <div>
        <div>
            <div>
                <?php
                
                if(isset($_POST['submit'])) {

                   	
                    $ID = $_GET['id'];
                    $Name = $_POST['name'];
                    $Description = $_POST['description'];
                    $Price = $_POST['price'];
                    $Quantity = $_POST['quantity'];

                    
                    $sql = 'update products set name = ?, description = ?, price = ?, quantity = ? where id = ?';

                    
                    $stmt = $con->prepare($sql);

                    
                    $stmt->execute(array($Name, $Description, $Price, $Quantity, $ID));

                    
                    if($stmt->rowCount() > 0) { ?>
                        <div>Nice nag update</div>
                    <?php } else { ?>
                        <div>May mali</div>
                    <?php
                    }
                }
                ?>
                <h2>Update Product</h2>
                <?php
                
                $ID = !empty($_GET['id']) ? $_GET['id'] : '';

                
                $sql = 'select * from products where id = ?';

                
                $stmt = $con->prepare($sql);

                
                $stmt->execute(array($ID));

                
                $products = $stmt->fetch();
                ?>
                  <form action="" method="POST">
                    <div class="form-group">
                      <label for="name">Name:</label>
                      <input type="text" ID="name" name="name" value="<?php echo $products['name'];?>">
                    </div>
                    <div class="form-group">
                      <label for="description">Description:</label>
                      <input type="text"  ID="description" name="description"  value="<?php echo $products['description'];?>">
                    </div>
                    <div class="form-group">
                      <label for="price">Price:</label>
                      <input type="text" ID="price"  name="price" value="<?php echo $products['price'];?>">
                    </div>
                    <div class="form-group">
                      <label for="quantity">Quantity:</label>
                      <input type="text" ID="quantity" name="quantity"  value="<?php echo $products['quantity'];?>">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Update</button>&nbsp;<a href="insert.php" class="btn btn-primary" role="button">Add New</a>&nbsp;<a href="index.php" class="btn btn-primary" role="button">All Members</a>
                  </form>
            </div>
        </div>
    </div>
</body>
</html>