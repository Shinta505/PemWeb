<?php
session_start(); // Mulai session

include 'koneksi.php';

if (isset($_POST['jumlahProduk'])) {
    // Jika form dikirim, tambahkan produk ke dalam session
    $ProductID = $_GET['ProductID'];
    $jumlahProduk = $_POST['jumlahProduk'];

    // Query untuk mendapatkan informasi produk
    $query_produk = mysqli_query($connect, "SELECT * FROM products WHERE ProductID=$ProductID");
    $data_produk = mysqli_fetch_array($query_produk);

    // Buat array untuk menyimpan informasi produk yang akan dibeli
    $cartItem = array(
        'ProductID' => $data_produk['ProductID'],
        'ProductName' => $data_produk['ProductName'],
        'UnitPrice' => $data_produk['UnitPrice'],
        'Quantity' => $jumlahProduk
    );

    // Tambahkan produk ke dalam session cart
    $_SESSION['cart'][] = $cartItem;
}

// Tampilkan isi shopping cart
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman 4</title>
</head>
<body>
    <h2>Shopping Cart</h2>

    <?php
    // Periksa apakah session cart sudah ada
    if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
        ?>
        <table border="1">
            <tr>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Unit Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>

            <?php
            $totalHarga = 0;

            // Loop through each item in the cart
            foreach ($_SESSION['cart'] as $item) {
                $subtotal = $item['UnitPrice'] * $item['Quantity'];
                $totalHarga += $subtotal;
                ?>
                <tr>
                    <td><?php echo $item['ProductID']; ?></td>
                    <td><?php echo $item['ProductName']; ?></td>
                    <td><?php echo $item['UnitPrice']; ?></td>
                    <td><?php echo $item['Quantity']; ?></td>
                    <td><?php echo $subtotal; ?></td>
                </tr>
                <?php
            }
            ?>

            <tr>
                <td colspan="4" align="right">Total Harga:</td>
                <td><?php echo $totalHarga; ?></td>
            </tr>
        </table>
        <br>
        <form action="checkout.php" method="POST">
            <button type="submit" name="checkout">Checkout</button>
        </form>

        <?php
    } else {
        echo "<p>Shopping cart masih kosong.</p>";
    }
    ?>

    <br>
    <a href="kategori.php">Kembali ke Kategori</a>

</body>
</html>