<?php
include 'koneksi.php';

if(isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    $layanan = $_POST['layanan'];
    $tipe_ac = $_POST['tipe_ac'];
    $keluhan = $_POST['keluhan'];
    $tanggal = $_POST['tanggal'];

    $sql = "INSERT INTO pesanan (nama, no_hp, alamat, layanan, tipe_ac, keluhan, tanggal) 
            VALUES ('$nama', '$no_hp', '$alamat', '$layanan', '$tipe_ac', '$keluhan', '$tanggal')";
    
    if($conn->query($sql) === TRUE) {
        $pesan_wa = "Halo Sea Mitra Aircond,%0A%0ASaya ingin memesan layanan:%0A*Nama:* $nama%0A*No HP:* $no_hp%0A*Alamat:* $alamat%0A*Layanan:* $layanan%0A*Tipe AC:* $tipe_ac%0A*Keluhan:* $keluhan%0A*Tanggal:* $tanggal";
        echo "<script>
                alert('Pesanan berhasil disimpan di sistem!');
                window.location.href = 'https://wa.me/6287743485838?text=$pesan_wa';
              </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Booking Servis - Sea Mitra Aircond</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-lg mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold mb-4">Form Pemesanan Servis AC</h2>
        <form method="POST" action="">
            <input type="text" name="nama" placeholder="Nama Lengkap" class="w-full mb-3 p-2 border rounded" required>
            <input type="text" name="no_hp" placeholder="No. WhatsApp" class="w-full mb-3 p-2 border rounded" required>
            <textarea name="alamat" placeholder="Alamat Lengkap" class="w-full mb-3 p-2 border rounded" required></textarea>
            
            <select name="layanan" class="w-full mb-3 p-2 border rounded">
                <option value="Cuci AC">Cuci AC</option>
                <option value="Bongkar Pasang">Bongkar Pasang</option>
                <option value="Perbaikan">Perbaikan (Tidak Dingin/Bocor)</option>
            </select>

            <select name="tipe_ac" class="w-full mb-3 p-2 border rounded">
                <option value="Split Wall">Split Wall</option>
                <option value="Cassette">Cassette</option>
                <option value="VRF/VRV">VRF/VRV</option>
            </select>
            
            <textarea name="keluhan" placeholder="Detail Keluhan (Opsional)" class="w-full mb-3 p-2 border rounded"></textarea>
            <input type="date" name="tanggal" class="w-full mb-4 p-2 border rounded" required>
            
            <button type="submit" name="submit" class="w-full bg-blue-600 text-white font-bold py-2 rounded hover:bg-blue-700">Kirim Pesanan & Lanjut ke WA</button>
        </form>
    </div>
</body>
</html>