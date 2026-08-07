<?php
// Data Profil
$nama = "Deanisa rida pangesti";
$umur = 16;
$alamat = "Yogyakarta";
$email = "dea@email.com";
$hobi = "membaca , menulis";
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #91bdf0; , berikan efek awan di backgeound;
        }
        .card {
            width: 400px;
            margin: 50px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
        }
        h2 {
            text-align: center;
            color: #007BFF;
        }
        p {
            font-size: 16px;
        }
        strong {
            color: #333;
        }
    </style>
</head>
<body>

<div class="card">
    <h2>Profil Saya</h2>

    <p><strong>Nama:</strong> <?php echo $nama; ?></p>
    <p><strong>Umur:</strong> <?php echo $umur; ?> Tahun</p>
    <p><strong>Alamat:</strong> <?php echo $alamat; ?></p>
    <p><strong>Email:</strong> <?php echo $email; ?></p>
    <p><strong>Hobi:</strong> <?php echo $hobi; ?></p>
</div>

</body>
</html>