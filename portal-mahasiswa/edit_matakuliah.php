<?php
/**
 * Halaman edit mata kuliah yang diikuti oleh mahasiswa
 */

session_start();

// Cek apakah user sudah login
if(!isset($_SESSION['mahasiswa_id'])) {
    header('Location: login.php');
    exit();
}

// Memanggil model MataKuliah
require_once 'models/MataKuliah.php';

// Jika id mata kuliah tidak ada, maka redirect ke halaman dashboard
if(!isset($_GET['id'])) {
    header('Location: dashboard.php');
    exit();
}

// Membuat instance dari kelas MataKuliah
$mataKuliah = new MataKuliah();
$id = $_GET['id'];

// Mengambil data mata kuliah
if(!$mataKuliah->readSingle($id) || $mataKuliah->mahasiswa_id != $_SESSION['mahasiswa_id']) {
    header('Location: dashboard.php');
    exit();
}

// Variabel untuk menyimpan pesan error
$error = '';

// Jika form edit dikirim, maka proses
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mataKuliah->kode_mk = $_POST['kode_mk'];
    $mataKuliah->nama_mk = $_POST['nama_mk'];
    $mataKuliah->sks = $_POST['sks'];
    $mataKuliah->semester = $_POST['semester'];
    $mataKuliah->dosen = $_POST['dosen'];
    $mataKuliah->mahasiswa_id = $_SESSION['mahasiswa_id'];
    
    // Jika berhasil, maka redirect ke halaman dashboard
    if($mataKuliah->update()) {
        header('Location: dashboard.php');
        exit();
    } else {
        // Jika gagal, maka tampilkan pesan error
        $error = 'Gagal mengupdate mata kuliah.';
    }
}
?>

<html>
<head>
    <title>Edit Mata Kuliah - Portal Mahasiswa</title>
</head>
<body>
    <h1>Edit Mata Kuliah</h1>
    <br>
    
    <p><a href="dashboard.php">&lt; Kembali ke Dashboard</a></p>
    <br><br>
    
    <?php if(!empty($error)): ?>
        <p><strong>Error:</strong> <?php echo $error; ?></p>
        <br>
    <?php endif; ?>
    
    <form method="POST">
        <label>Kode Mata Kuliah:</label><br>
        <input type="text" name="kode_mk" value="<?php echo $mataKuliah->kode_mk; ?>" required maxlength="10"><br><br>
        
        <label>Nama Mata Kuliah:</label><br>
        <input type="text" name="nama_mk" value="<?php echo $mataKuliah->nama_mk; ?>" required maxlength="100"><br><br>
        
        <label>SKS:</label><br>
        <input type="number" name="sks" value="<?php echo $mataKuliah->sks; ?>" required min="1" max="6"><br><br>
        
        <label>Semester:</label><br>
        <select name="semester" required>
            <option value="">Pilih Semester</option>
            <option value="Ganjil" <?php echo ($mataKuliah->semester == 'Ganjil') ? 'selected' : ''; ?>>Ganjil</option>
            <option value="Genap" <?php echo ($mataKuliah->semester == 'Genap') ? 'selected' : ''; ?>>Genap</option>
        </select><br><br>
        
        <label>Nama Dosen:</label><br>
        <input type="text" name="dosen" value="<?php echo $mataKuliah->dosen; ?>" required maxlength="100"><br><br>
        
        <input type="submit" value="Update Mata Kuliah">
    </form>
</body>
</html>
