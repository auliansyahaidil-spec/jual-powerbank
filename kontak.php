<?php
$nama = "";
$email = "";
$pesan = "";
$hasil = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = htmlspecialchars($_POST["nama"]);
    $email = htmlspecialchars($_POST["email"]);
    $pesan = htmlspecialchars($_POST["pesan"]);

    $hasil = "
        <h3>Pesan Berhasil Dikirim</h3>
        <p><strong>Nama:</strong> $nama</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Pesan:</strong> $pesan</p>
    ";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kontak</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
        }
        .container {
            width: 400px;
            margin: 50px auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 8px rgba(0,0,0,0.2);
        }
        h2 {
            text-align: center;
            color: #007BFF;
        }
        input, textarea {
            width: 100%;
            padding: 8px;
            margin: 8px 0;
            box-sizing: border-box;
        }
        button {
            width: 100%;
            padding: 10px;
            background: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background: #0056b3;
        }
        .hasil {
            margin-top: 20px;
            background: #e8f5e9;
            padding: 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Form Kontak</h2>

    <form method="POST">
        <label>Nama</label>
        <input type="text" name="nama" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Pesan</label>
        <textarea name="pesan" rows="5" required></textarea>

        <button type="submit">Kirim</button>
    </form>

    <?php
    if (!empty($hasil)) {
        echo "<div class='hasil'>$hasil</div>";
    }
    ?>
</div>

</body>
</html>