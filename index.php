

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client</title>
    
</head>
<body>
    <div class="container my-5">
        <h2>List of Clients</h2>
        <a class="btn btn-primary" href="insert.php" role="button">Add Products</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "arrendb";

                
                $connection = new mysqli($servername, $username, $password, $database);

                
                if ($connection->connect_error) {
                    die("Connection failed: " . $connection->connect_error);
                }

                
                $sql = "SELECT * FROM products";
                $result = $connection->query($sql);

                
                while ($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['description']}</td>
                        <td>{$row['price']}</td>
                        <td>{$row['quantity']}</td>
                        <td>{$row['atcreated']}</td>
                        <td>{$row['atupdated']}</td>
                        <td>
                            <a class='btn btn-primary btn-sm' href='update.php?ID={$row['id']}'>Edit</a>
                            <a class='btn btn-danger btn-sm' href='delete.php?id={$row['id']}'>Erase</a>
                        </td>
                    </tr>
                    ";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>