<?php
session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION['mahasiswa_id'])) {
    // Jika belum, arahkan ke halaman login
    header('Location: login.php');
    exit();
}

// Memasukkan model MataKuliah
require_once 'models/MataKuliah.php';

// Membuat instance dari kelas MataKuliah
$mataKuliah = new MataKuliah();

// Mengambil data mata kuliah berdasarkan id mahasiswa dari sesi
$result = $mataKuliah->readByMahasiswa($_SESSION['mahasiswa_id']);
?>

<html>
<head>
    <title>Dashboard - Portal Mahasiswa</title>
</head>
<body>
    <h1>Portal Mahasiswa - Dashboard</h1>
    <br>
    
    <!-- Menampilkan informasi mahasiswa -->
    <p>Halo, <?php echo $_SESSION['mahasiswa_nama']; ?> (<?php echo $_SESSION['mahasiswa_nim']; ?>)</p>
    <p><a href="logout.php">Logout</a></p>
    <br><br>
    
    <h2>Mata Kuliah Saya</h2>
    <br>
    
    <p><a href="tambah_matakuliah.php">+ Tambah Mata Kuliah Baru</a></p>
    <br><br>
    
    <?php if ($result->num_rows > 0): ?>
        <table border="1">
            <tr>
                <th>No</th>
                <th>Kode MK</th>
                <th>Nama Mata Kuliah</th>
                <th>SKS</th>
                <th>Semester</th>
                <th>Dosen</th>
                <th>Aksi</th>
            </tr>
            <?php 
            $no = 1;
            // Loop melalui hasil query dan tampilkan dalam tabel
            while ($row = $result->fetch_assoc()): 
            ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $row['kode_mk']; ?></td>
                    <td><?php echo $row['nama_mk']; ?></td>
                    <td><?php echo $row['sks']; ?></td>
                    <td><?php echo $row['semester']; ?></td>
                    <td><?php echo $row['dosen']; ?></td>
                    <td>
                        <!-- Link untuk mengedit dan menghapus mata kuliah -->
                        <a href="edit_matakuliah.php?id=<?php echo $row['id']; ?>">Edit</a> | 
                        <a href="hapus_matakuliah.php?id=<?php echo $row['id']; ?>" 
                           onclick="return confirm('Yakin ingin menghapus mata kuliah ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <!-- Pesan jika tidak ada mata kuliah -->
        <p>Belum ada mata kuliah. <a href="tambah_matakuliah.php">Tambah mata kuliah pertama</a></p>
    <?php endif; ?>
</body>
</html>
