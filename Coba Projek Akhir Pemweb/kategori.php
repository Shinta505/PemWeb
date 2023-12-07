<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman 1</title>
</head>
<body>
    <table border=1>
        <tr>
            <th>Category ID</th>
            <th>Category Name</th>
            <th>Description</th>
        </tr>
    <?php 
        include 'koneksi.php';
        $query = mysqli_query($connect, "SELECT * FROM categories");
        while ($data = mysqli_fetch_array($query)) {
    ?>
        <tr>
            <td><a href="produk.php?CategoryID=<?php echo $data['CategoryID']; ?>"><?php echo $data['CategoryID'] ?></a></td>
            <td><a href="produk.php?CategoryID=<?php echo $data['CategoryID']; ?>"><?php echo $data['CategoryName'] ?></a></td>
            <td><?php echo $data['Description'] ?></td>
        </tr>
    <?php 
        }
    ?>
    </table> 
    <br>
    <a href="shopping_cart.php">Lihat Keranjang</a>
</body>
</html>