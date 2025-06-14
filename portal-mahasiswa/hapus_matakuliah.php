<?php
/**
 * Halaman hapus mata kuliah yang diikuti oleh mahasiswa
 *
 * @author Imam Teguh Saptono <teguhsaptono@gmail.com>
 */

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

// Hapus mata kuliah
if($mataKuliah->delete($id, $_SESSION['mahasiswa_id'])) {
    header('Location: dashboard.php?msg=deleted');
} else {
    header('Location: dashboard.php?msg=delete_error');
}
exit();
