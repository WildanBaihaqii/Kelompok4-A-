<?php
declare(strict_types=1);

class Koneksi {
    private string $host = "127.0.0.1";
    private string $username = "Baihaqy";
    private string $password = "1023"; // <--- Sesuaikan password MariaDB Anda
    private string $database = "showroom";
    protected mysqli $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);

        if ($this->conn->connect_error) {
            die("Koneksi Basis Data phpMyAdmin Gagal: " . $this->conn->connect_error);
        }
    }

    public function __destruct() {
        if (isset($this->conn) && $this->conn) {
            $this->conn->close();
        }
    }
}