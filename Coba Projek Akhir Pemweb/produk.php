<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman 2</title>
</head>
<body>
    <table border=1>
        <tr>
            <th>Category ID</th>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Unit Price</th>
        </tr>
        <?php 
            include 'koneksi.php';
            $CategoryID = $_GET['CategoryID'];

            $query = mysqli_query($connect, "SELECT p.ProductID, p.ProductName, p.UnitPrice, k.CategoryID FROM products p INNER JOIN categories k ON p.CategoryID = k.CategoryID WHERE k.CategoryID = '$CategoryID'");
            while ($data = mysqli_fetch_array($query)) {
        ?>
        <tr>
            <td><?php echo $data['CategoryID']; ?></td>
            <td><a href="detail_produk.php?ProductID=<?php echo $data['ProductID']; ?>"><?php echo $data['ProductID']; ?></a></td>
            <td><a href="detail_produk.php?ProductID=<?php echo $data['ProductID']; ?>"><?php echo $data['ProductName']; ?></a></td>
            <td><?php echo $data['UnitPrice']; ?></td>
        </tr>
        <?php 
            }
        ?>
    </table>
</body>
</html>