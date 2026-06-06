<?php
declare(strict_types=1);

require_once __DIR__ . '/Koneksi.php';

class KendaraanDAL extends Koneksi {

    public function getAllKendaraan(): array {
        // Nama-nama kolom diselaraskan 100% dengan struktur showroom.sql Anda
        $query = "SELECT k.id_kendaraan, k.brand, k.model, k.tahun, k.harga_dasar, k.kategori, 
                         mk.kapasitas_mesin, mk.jenis_bahan_bakar,
                         ml.kapasitas_baterai, ml.jarak_tempuh,
                         mb.tipe_rantai, mb.mode_berkendara
                  FROM kendaraan k
                  LEFT JOIN mobil_konvensional mk ON k.id_kendaraan = mk.id_kendaraan
                  LEFT JOIN mobil_listrik ml ON k.id_kendaraan = ml.id_kendaraan
                  LEFT JOIN motor_besar mb ON k.id_kendaraan = mb.id_kendaraan";
                  
        $result = $this->conn->query($query);
        $data = [];
        
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }
}