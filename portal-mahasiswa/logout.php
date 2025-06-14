<?php
/**
 * Skrip ini digunakan untuk logout mahasiswa dari sistem.
 *
 * Skrip ini akan menghapus semua session yang ada dan mengarahkan
 * pengguna kembali ke halaman login.
 */

// Mulai session
session_start();

// Hapus semua session
session_unset();

// Hapus session
session_destroy();

// Arahkan pengguna kembali ke halaman login
header('Location: login.php');
exit();
