<?php
declare(strict_types=1);

require_once __DIR__ . '/KendaraanDAL.php';
require_once __DIR__ . '/MobilKonvensional.php';
require_once __DIR__ . '/MobilListrik.php';
require_once __DIR__ . '/MotorBesar.php';

class ManajemenShowroom {
    private KendaraanDAL $dal;
    private array $koleksiKendaraan = [];

    public function __construct() {
        $this->dal = new KendaraanDAL();
        $this->loadPolymorphicCollection();
    }

    private function loadPolymorphicCollection(): void {
        $rawData = $this->dal->getAllKendaraan();
        $this->koleksiKendaraan = [];

        foreach ($rawData as $row) {
            $id = (int)$row['id_kendaraan'];
            $brand = $row['brand'];
            $model = $row['model'];
            $tahun = (int)$row['tahun'];
            $hargaDasar = (float)$row['harga_dasar'];
            $kategori = $row['kategori'];

            if ($kategori === 'Konvensional') {
                $this->koleksiKendaraan[] = new MobilKonvensional(
                    $id, $brand, $model, $tahun, $hargaDasar,
                    (int)$row['kapasitas_mesin'], $row['jenis_bahan_bakar']
                );
            } elseif ($kategori === 'Listrik') {
                $this->koleksiKendaraan[] = new MobilListrik(
                    $id, $brand, $model, $tahun, $hargaDasar,
                    (int)$row['kapasitas_baterai'], (int)$row['jarak_tempuh']
                );
            } elseif ($kategori === 'MotorBesar') {
                $this->koleksiKendaraan[] = new MotorBesar(
                    $id, $brand, $model, $tahun, $hargaDasar,
                    $row['tipe_rantai'], $row['mode_berkendara']
                );
            }
        }
    }

    public function tampilkanLaporanShowroom(): void {
        echo "<pre>";
        echo "========================================================================================\n";
        echo "                    LAPORAN POLIMORFISME: KALKULASI PAJAK TAHUNAN                       \n";
        echo "========================================================================================\n";
        printf("%-3s | %-12s | %-25s | %-15s | %-18s\n", "ID", "Kategori", "Unit Kendaraan", "Harga Dasar", "Pajak Tahunan");
        echo "----------------------------------------------------------------------------------------\n";

        foreach ($this->koleksiKendaraan as $knd) {
            $namaUnit = $knd->getBrand() . ' ' . $knd->getModel() . ' (' . $knd->getTahun() . ')';
            printf(
                "%-3d | %-12s | %-25s | Rp %-12s | Rp %-15s\n",
                $knd->getId(),
                $knd->getKategori(),
                strlen($namaUnit) > 25 ? substr($namaUnit, 0, 22) . '...' : $namaUnit,
                number_format($knd->getHargaDasar(), 0, ',', '.'),
                number_format($knd->hitungPajakTahunan(), 0, ',', '.')
            );
        }
        echo "========================================================================================\n";
        echo "</pre>";
    }
}