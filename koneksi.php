<?php
// koneksi.php

// Konfigurasi database
$servername = "localhost"; // Server Laragon lokal
$username = "root";        // Username default MySQL di Laragon
$password = "";            // Password default MySQL kosong
$dbname = "pbd";           // Ganti dengan nama database yang Anda buat

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Optionally, set the character set for the connection
$conn->set_charset("utf8");
?>
