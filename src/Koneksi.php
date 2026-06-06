<?php

class Database {
    // Sesuai dengan konfigurasi sistem Arch Linux & MariaDB Anda
    private $host = "127.0.0.1";
    private $username = "Baihaqy";
    private $password = "1023"; // Masukkan password root MariaDB Anda
    private $database = "showroom"; // Nama database yang Anda buat di MariaD
    protected $conn;

    // OOP Constructor otomatis memicu koneksi saat instansiasi objek
    public function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);

        if ($this->conn->connect_error) {
            die("Koneksi Basis Data phpMyAdmin Gagal: " . $this->conn->connect_error);
        }
    }

    // OOP Destructor otomatis menutup koneksi di akhir program
    public function __destruct() {
        if ($this->conn) {
            $this->conn->close();
        }
    }
}