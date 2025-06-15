<?php
/**
 * Digunakan untuk logout mahasiswa dari sistem.
 *
 * Akan menghapus semua session yang ada dan mengarahkan
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
