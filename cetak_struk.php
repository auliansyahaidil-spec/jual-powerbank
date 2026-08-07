<?php
// Data Toko
$namaToko = "Toko Powerbank";
$alamat = "Jl. Contoh No. 123";

// Data Barang
$barang = [
    ["nama" => "Powerbank 5.000 mAh", "qty" => 1, "harga" => 45000],
    ["nama" => "Powerbank 10.000 mAh", "qty" => 1, "harga" => 85000],
    ["nama" => "Powerbank 20.000 mAh", "qty" => 1, "harga" => 100000]
];

$total = 0;
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Cetak Struk</title>
<style>
body{
    font-family: monospace;
    width:300px;
    margin:auto;
}
h3,p{
    text-align:center;
    margin:5px;
}
table{
    width:100%;
    border-collapse:collapse;
}
td{
    padding:2px;
}
.right{
    text-align:right;
}
hr{
    border:1px dashed #000;
}
@media print{
    button{
        display:none;
    }
}
</style>
</head>
<body>

<h3><?= $namaToko ?></h3>
<p><?= $alamat ?></p>

<hr>

<table>
<?php foreach($barang as $item): ?>
<?php
$subtotal = $item['qty'] * $item['harga'];
$total += $subtotal;
?>
<tr>
    <td><?= $item['nama']; ?></td>
    <td class="right">
        <?= $item['qty']; ?> x Rp <?= number_format($item['harga'],0,',','.'); ?>
    </td>
</tr>
<tr>
    <td></td>
    <td class="right">
        Rp <?= number_format($subtotal,0,',','.'); ?>
    </td>
</tr>
<?php endforeach; ?>
</table>

<hr>

<table>
<tr>
    <td><strong>Total</strong></td>
    <td class="right">
        <strong>Rp <?= number_format($total,0,',','.'); ?></strong>
    </td>
</tr>
</table>

<hr>

<p>Terima Kasih</p>
<p><?= date('d-m-Y H:i:s'); ?></p>

<button onclick="window.print()">Cetak Struk</button>

</body>
</html>