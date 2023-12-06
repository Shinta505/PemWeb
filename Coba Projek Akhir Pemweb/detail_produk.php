<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman 3</title>
</head>
<body>
    <?php 
        include 'koneksi.php';
        $ProductID = $_GET['ProductID'];
        
        $query = mysqli_query($connect, "SELECT * FROM products WHERE ProductID=$ProductID");
        $data = mysqli_fetch_array($query);
    ?>
    <table>
        <tr>
            <th>Product ID</th>
            <td>: </td>
            <td><?php echo $data['ProductID']; ?></td>
        </tr>
        <tr>
            <th>Product Name</th>
            <td>: </td>
            <td><?php echo $data['ProductName']; ?></td>
        </tr>
        <tr>
            <th>Supplier ID</th>
            <td>: </td>
            <td><?php echo $data['SupplierID']; ?></td>
        </tr>
        <tr>
            <th>Category ID</th>
            <td>: </td>
            <td><?php echo $data['CategoryID']; ?></td>
        </tr>
        <tr>
            <th>Quantity Per Unit</th>
            <td>: </td>
            <td><?php echo $data['QuantityPerUnit']; ?></td>
        </tr>
        <tr>
            <th>Unit Price</th>
            <td>: </td>
            <td><?php echo $data['UnitPrice']; ?></td>
        </tr>
        <tr>
            <th>Units In Stock</th>
            <td>: </td>
            <td><?php echo $data['UnitsInStock']; ?></td>
        </tr>
        <tr>
            <th>ReOrder Level</th>
            <td>: </td>
            <td><?php echo $data['ReorderLevel']; ?></td>
        </tr>
        <tr>
            <th>Discountinued</th>
            <td>: </td>
            <td><?php echo $data['Discontinued']; ?></td>
        </tr>
    </table>
    <br>
        <form action="shopping_cart.php?ProductID=<?php echo $data['ProductID']; ?>" method="POST">
            <!-- FORM untuk menginput jumlah produk yang ingin dibeli -->
           <label for="jumlahProduk">Jumlah Produk yang ingin di beli : </label>
           <input type="number" name="jumlahProduk" id="jumlahProduk" required>
            <br> <br>
           <!-- Button Kirim -->
           <button type="submit" value="Kirim">Kirim</button>
        </form>
</body>
</html>