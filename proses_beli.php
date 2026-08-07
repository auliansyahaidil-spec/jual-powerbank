<?php
include "koneksi.php";

// 1. Ambil data dari form POST dengan aman
$no_faktur = $_POST['no_faktur'] ?? '';
$tanggal   = $_POST['tanggal'] ?? date('Y-m-d');
$nama      = $_POST['nama_pembeli'] ?? '';
$alamat    = $_POST['alamat'] ?? '';
$ktp       = $_POST['no_ktp'] ?? $_POST['ktp'] ?? ''; // Menangani perbedaan nama input KTP

$id        = $_POST['id_barang'] ?? $_GET['id_barang'] ?? 0;
$jumlah    = $_POST['jumlah'] ?? $_GET['jumlah'] ?? 1;

// 2. Ambil data barang dari database dengan aman
$data = mysqli_query($koneksi, "SELECT * FROM tmbhhbrg WHERE id_barang='$id'");

if ($data && mysqli_num_rows($data) > 0) {
    $row = mysqli_fetch_assoc($data);
} else {
    $row = null; // Mencegah crash jika ID barang tidak ditemukan
}

// 3. Set harga dan total dengan penanganan aman (null coalescing)
$nama_barang = $row['nama_barang'] ?? $row['nama'] ?? 'Powerbank';
$harga       = $row['harga'] ?? 0;
$total       = $_POST['total'] ?? ($harga * $jumlah);

// Kode verifikasi
$kode        = rand(100000, 999999);

// 4. Simpan ke database jika ada data dikirim
if (!empty($no_faktur)) {
    mysqli_query($koneksi, "INSERT INTO transaksi
    (no_faktur, tanggal, nama_pembeli, alamat, ktp, id_barang, jumlah, total)
    VALUES
    ('$no_faktur', '$tanggal', '$nama', '$alamat', '$ktp', '$id', '$jumlah', '$total')");
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Struk Pembelian</title>
    <style>
        body {
            font-family: monospace;
            background: #f5f5f5;
        }

        .struk {
            width: 300px;
            background: white;
            padding: 15px;
            margin: 30px auto;
            border: 1px solid #ccc;
        }

        .center {
            text-align: center;
        }

        hr {
            border: 1px dashed #000;
        }

        button {
            display: block;
            margin: 10px auto;
            padding: 8px 15px;
            cursor: pointer;
        }

        @media print {
            button {
                display: none;
            }
            body {
                background: white;
            }
        }
    </style>
</head>
<body>

<div class="struk">

    <div class="center">
        <h3>TOKO POWERBANK</h3>
        <p>Terima Kasih 🙏</p>
    </div>

    <hr>

    <p>No Faktur: <?php echo htmlspecialchars($no_faktur); ?></p>
    <p>Tanggal: <?php echo htmlspecialchars($tanggal); ?></p>

    <hr>

    <p>Nama: <?php echo htmlspecialchars($nama); ?></p>
    <p>KTP: <?php echo htmlspecialchars($ktp); ?></p>
    <p>Barang: <?php echo htmlspecialchars($nama_barang); ?></p>
    <p>Jumlah: <?php echo htmlspecialchars($jumlah); ?></p>
    <p>Total: Rp <?php echo number_format((float)$total, 0, ',', '.'); ?></p>
    <p>Kode Verifikasi: <strong><?php echo $kode; ?></strong></p>

    <button onclick="window.print()">Cetak Struk</button>

</div>

</body>
</html>