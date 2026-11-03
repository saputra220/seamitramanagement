<?php
include 'koneksi.php';
$result = $conn->query("SELECT * FROM pesanan ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Admin Dashboard - Sea Mitra Aircond</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 p-8">
    <div class="max-w-6xl mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold mb-6">Dashboard Manajemen Pesanan</h2>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="p-3 border">ID</th>
                        <th class="p-3 border">Pelanggan</th>
                        <th class="p-3 border">Layanan</th>
                        <th class="p-3 border">Tanggal Servis</th>
                        <th class="p-3 border">Status</th>
                        <th class="p-3 border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result->fetch_assoc()): 
                        $teks_teknisi = "Tugas Baru!%0AAlamat: " . $row['alamat'] . "%0AKeluhan: " . $row['keluhan'] . "%0ALayanan: " . $row['layanan'] . "%0AHari: " . $row['tanggal'] . "%0AHP Pelanggan: " . $row['no_hp'];
                    ?>
                    <tr>
                        <td class="p-3 border">#<?= $row['id'] ?></td>
                        <td class="p-3 border">
                            <strong><?= $row['nama'] ?></strong><br>
                            <span class="text-sm text-gray-500"><?= $row['no_hp'] ?></span>
                        </td>
                        <td class="p-3 border">
                            <?= $row['layanan'] ?> (<?= $row['tipe_ac'] ?>)
                        </td>
                        <td class="p-3 border"><?= $row['tanggal'] ?></td>
                        <td class="p-3 border">
                            <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded text-sm"><?= $row['status'] ?></span>
                        </td>
                        <td class="p-3 border">
                            <a href="https://wa.me/?text=<?= $teks_teknisi ?>" target="_blank" class="bg-green-500 text-white px-3 py-1 rounded text-sm hover:bg-green-600">Teruskan ke Teknisi (WA)</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>