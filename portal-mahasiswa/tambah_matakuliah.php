<?php
/**
 * Halaman untuk menambahkan mata kuliah yang diikuti oleh mahasiswa
 */

session_start();

// Cek apakah user sudah login
if(!isset($_SESSION['mahasiswa_id'])) {
    header('Location: login.php');
    exit();
}

// Memanggil model MataKuliah
require_once 'models/MataKuliah.php';

// Variabel untuk menyimpan pesan error
$error = '';

// Jika form dikirim, maka proses
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mataKuliah = new MataKuliah();
    
    // Unboxing form
    $mataKuliah->kode_mk = $_POST['kode_mk'];
    $mataKuliah->nama_mk = $_POST['nama_mk'];
    $mataKuliah->sks = $_POST['sks'];
    $mataKuliah->semester = $_POST['semester'];
    $mataKuliah->dosen = $_POST['dosen'];
    $mataKuliah->mahasiswa_id = $_SESSION['mahasiswa_id'];
    
    // Jika berhasil, maka redirect ke halaman dashboard
    if($mataKuliah->create()) {
        header('Location: dashboard.php');
        exit();
    } else {
        // Jika gagal, maka tampilkan pesan error
        $error = 'Gagal menambahkan mata kuliah. Pastikan kode MK belum digunakan.';
    }
}
?>

<html>
<head>
    <title>Tambah Mata Kuliah - Portal Mahasiswa</title>
</head>
<body>
    <h1>Tambah Mata Kuliah</h1>
    <br>
    
    <p><a href="dashboard.php">&lt; Kembali ke Dashboard</a></p>
    <br><br>
    
    <?php if(!empty($error)): ?>
        <p><strong>Error:</strong> <?php echo $error; ?></p>
        <br>
    <?php endif; ?>
    
    <form method="POST">
        <label>Kode Mata Kuliah:</label><br>
        <input type="text" name="kode_mk" required maxlength="10"><br><br>
        
        <label>Nama Mata Kuliah:</label><br>
        <input type="text" name="nama_mk" required maxlength="100"><br><br>
        
        <label>SKS:</label><br>
        <input type="number" name="sks" required min="1" max="6"><br><br>
        
        <label>Semester:</label><br>
        <select name="semester" required>
            <option value="">Pilih Semester</option>
            <option value="Ganjil">Ganjil</option>
            <option value="Genap">Genap</option>
        </select><br><br>
        
        <label>Nama Dosen:</label><br>
        <input type="text" name="dosen" required maxlength="100"><br><br>
        
        <input type="submit" value="Tambah Mata Kuliah">
    </form>
</body>
</html>
