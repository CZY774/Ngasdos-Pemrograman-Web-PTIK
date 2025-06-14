<?php
/**
 * Halaman login untuk portal mahasiswa
 *
 * Jika user sudah login, maka akan di redirect ke halaman dashboard
 */
session_start();

// Jika sudah login, redirect ke dashboard
if(isset($_SESSION['mahasiswa_id'])) {
    header('Location: dashboard.php');
    exit();
}

require_once 'models/Mahasiswa.php';

/**
 * Variabel untuk menyimpan pesan error
 *
 * @var string
 */
$error = '';

/**
 * Jika form login dikirim, maka proses login
 */
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nim = $_POST['nim'];
    $password = $_POST['password'];
    
    $mahasiswa = new Mahasiswa();
    
    /**
     * Jika login berhasil, maka simpan data user ke session
     * dan redirect ke halaman dashboard
     */
    if($mahasiswa->login($nim, $password)) {
        $_SESSION['mahasiswa_id'] = $mahasiswa->id;
        $_SESSION['mahasiswa_nim'] = $mahasiswa->nim;
        $_SESSION['mahasiswa_nama'] = $mahasiswa->nama;
        
        header('Location: dashboard.php');
        exit();
    } else {
        /**
         * Jika login gagal, maka tampilkan pesan error
         */
        $error = 'NIM atau password salah!';
    }
}
?>

<html>
<head>
    <title>Portal Mahasiswa - Login</title>
</head>
<body>
    <h1>Portal Mahasiswa</h1>
    <h2>Login</h2>
    <br>
    
    <?php if(!empty($error)): ?>
        <p><strong>Error:</strong> <?php echo $error; ?></p>
        <br>
    <?php endif; ?>
    
    <form method="POST">
        <label>NIM:</label><br>
        <input type="text" name="nim" required><br><br>
        
        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>
        
        <input type="submit" value="Login">
    </form>
    
    <br><br>
    <h3>Demo Account:</h3>
    <p>NIM: 123456789</p>
    <p>Password: password123</p>
    <p>Nama: John Doe</p>
</body>
</html>
