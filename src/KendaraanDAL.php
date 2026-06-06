<?php
require_once 'Database.php';

class KendaraanDAL extends Database {

    // 1. READ: Mengambil seluruh data kendaraan gabungan (Sangat krusial untuk Polymorphic Collection rekan tim Anda)
    public function getAllKendaraan() {
        $query = "SELECT k.*, 
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

    // 2. CREATE: Menambahkan data kendaraan baru menggunakan Database Transaction
    public function createKendaraan($brand, $model, $tahun, $hargaDasar, $kategori, $atributTambahan = []) {
        $this->conn->begin_transaction();

        try {
            $stmt = $this->conn->prepare("INSERT INTO kendaraan (brand, model, tahun, harga_dasar, kategori) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssds", $brand, $model, $tahun, $hargaDasar, $kategori);
            $stmt->execute();
            
            $id_kendaraan = $this->conn->insert_id;

            if ($kategori === 'Konvensional') {
                $stmtAnak = $this->conn->prepare("INSERT INTO mobil_konvensional (id_kendaraan, kapasitas_mesin, jenis_bahan_bakar) VALUES (?, ?, ?)");
                $stmtAnak->bind_param("iis", $id_kendaraan, $atributTambahan['kapasitas_mesin'], $atributTambahan['jenis_bahan_bakar']);
            } elseif ($kategori === 'Listrik') {
                $stmtAnak = $this->conn->prepare("INSERT INTO mobil_listrik (id_kendaraan, kapasitas_baterai, jarak_tempuh) VALUES (?, ?, ?)");
                $stmtAnak->bind_param("iii", $id_kendaraan, $atributTambahan['kapasitas_baterai'], $atributTambahan['jarak_tempuh']);
            } elseif ($kategori === 'MotorBesar') {
                $stmtAnak = $this->conn->prepare("INSERT INTO motor_besar (id_kendaraan, tipe_rantai, mode_berkendara) VALUES (?, ?, ?)");
                $stmtAnak->bind_param("iss", $id_kendaraan, $atributTambahan['tipe_rantai'], $atributTambahan['mode_berkendara']);
            }

            $stmtAnak->execute();
            $this->conn->commit();
            return true;

        } catch (Exception $e) {
            $this->conn->rollback();
            return false;
        }
    }

    // 3. DELETE: Menghapus data kendaraan berdasarkan ID (Memicu CASCADE otomatis di MariaDB)
    public function deleteKendaraan($id_kendaraan) {
        $stmt = $this->conn->prepare("DELETE FROM kendaraan WHERE id_kendaraan = ?");
        $stmt->bind_param("i", $id_kendaraan);
        return $stmt->execute();
    }
}