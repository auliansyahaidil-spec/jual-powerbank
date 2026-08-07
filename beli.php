<?php
include "koneksi.php";

$id = $_GET['id_barang'] ?? 0;
$jumlah = $_GET['jumlah'] ?? 1;

// ambil data barang
$data = mysqli_query($koneksi, "SELECT * FROM tmbhhbrg WHERE id_barang='$id'");
$row = mysqli_fetch_assoc($data);

$harga = $row['harga'];
$total = $harga * $jumlah;

// 🔥 WAJIB: buat kode verifikasi
$kode = rand(100000,999999);
?>

<!DOCTYPE html>
<html>
<head>
<title>Checkout Powerbank</title>

<style>
body {
    background:#0f0f0f;
    color:white;
    font-family:'Segoe UI', sans-serif;
    padding:20px;
}

h1{
    text-align:center;
}

.container{
    display:flex;
    gap:40px;
    margin-top:20px;
}

.box{
    flex:1;
    background:#1a1a1a;
    padding:20px;
    border-radius:10px;
}

input, select{
    width:100%;
    padding:8px;
    margin:5px 0 15px;
    border-radius:6px;
    border:1px solid #333;
    background:#2a2a2a;
    color:white;
    box-sizing:border-box;
}

.total{
    color:gold;
    font-weight:bold;
}

button{
    width:100%;
    padding:10px;
    background:linear-gradient(45deg,gold,orange);
    border:none;
    border-radius:8px;
    font-weight:bold;
    cursor:pointer;
}

button:disabled{
    background:#555;
    color:#888;
}

#qrisBox{
    background:#222;
    padding:10px;
    border-radius:10px;
    margin-top:10px;
}
</style>

</head>

<body>

<h1>Checkout Powerbank</h1>


<form action="proses_beli.php" method="POST">

<div class="container">


<!-- KIRI -->
<div class="box">

<h3>Identitas Powerbank</h3>


<label>Nama:</label>
<input type="text" 
value="<?= htmlspecialchars($row['nama_barang'] ?? '') ?>" readonly>


<label>Jenis / Seri:</label>
<input type="text"
value="<?= htmlspecialchars($row['seri'] ?? '') ?>" readonly>


<label>Harga:</label>
<input type="text"
value="Rp <?= number_format($harga,0,',','.') ?>"
readonly>


<label>Jumlah:</label>
<input type="text"
value="<?= $jumlah ?>" readonly>


<label>Total:</label>
<input type="text"
class="total"
value="Rp <?= number_format($total,0,',','.') ?>"
readonly>


</div>




<!-- KANAN -->
<div class="box">

<h3>Data Pembeli</h3>


<input type="hidden" name="id_barang" value="<?= $id ?>">

<input type="hidden" name="jumlah" value="<?= $jumlah ?>">

<input type="hidden" name="total" value="<?= $total ?>">

<input type="hidden" name="kode_verifikasi" value="<?= $kode ?>">



<label>No Faktur:</label>
<input type="text" name="no_faktur" required>


<label>Tanggal:</label>
<input type="date" 
name="tanggal"
value="<?= date('Y-m-d') ?>">


<label>Nama Pembeli:</label>
<input type="text" name="nama_pembeli" required>


<label>Alamat:</label>
<input type="text" name="alamat" required>


<label>No KTP:</label>
<input type="text" name="ktp" required>



<label>Metode Pembayaran:</label>

<select name="metode" id="metode" onchange="showPayment()" required>

<option value="">-- Pilih --</option>

<option value="transfer">
Transfer Bank
</option>

<option value="ewallet">
E-Wallet
</option>

<option value="cod">
COD
</option>

</select>




<div id="transferBox" style="display:none">

<label>Pilih Bank:</label>

<select name="bank">

<option>BCA</option>
<option>BRI</option>
<option>BNI</option>

</select>

</div>




<div id="ewalletBox" style="display:none">

<label>Pilih E-Wallet:</label>

<select name="wallet">

<option>DANA</option>
<option>OVO</option>
<option>GoPay</option>

</select>

</div>




<div id="qrisBox" style="display:none;text-align:center">

<h3>Scan QRIS</h3>

<img src="uploads/qris.jpg" width="180">

<p>Total Bayar:</p>

<b style="color:gold">
Rp <?= number_format($total,0,',','.') ?>
</b>


<p>Kode Verifikasi:</p>

<b style="color:lightgreen">
<?= $kode ?>
</b>

</div>





<div id="verifikasiBox" style="display:none">

<label>
Masukkan Kode Verifikasi:
</label>


<input type="text"
id="inputKode"
onkeyup="cekKode()">


<p id="statusBayar"></p>


</div>



<button type="submit" id="btnSubmit">
Proses Pembelian
</button>


</div>


</div>

</form>




<script>

let kodeBenar = "<?= $kode ?>";


function showPayment(){

let metode =
document.getElementById("metode").value;


document.getElementById("transferBox").style.display="none";

document.getElementById("ewalletBox").style.display="none";

document.getElementById("qrisBox").style.display="none";

document.getElementById("verifikasiBox").style.display="none";



if(metode=="transfer"){

document.getElementById("transferBox").style.display="block";

}


if(metode=="ewallet"){

document.getElementById("ewalletBox").style.display="block";

document.getElementById("qrisBox").style.display="block";

document.getElementById("verifikasiBox").style.display="block";

}


if(metode=="cod"){

document.getElementById("btnSubmit").disabled=false;

}

}



function cekKode(){

let input =
document.getElementById("inputKode").value;


if(input==kodeBenar){

document.getElementById("statusBayar").innerHTML=
"Pembayaran berhasil ✔";


document.getElementById("btnSubmit").disabled=false;


}else{


document.getElementById("statusBayar").innerHTML=
"Kode salah";


document.getElementById("btnSubmit").disabled=true;

}

}


</script>


</body>
</html>