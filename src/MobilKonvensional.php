<?php
declare(strict_types=1);
require_once __DIR__ . '/Kendaraan.php';

class MobilKonvensional extends Kendaraan {
    private int $kapasitasMesin;
    private string $jenisBahanBakar;

    public function __construct(int $id, string $brand, string $model, int $tahun, float $hargaDasar, int $kapasitasMesin, string $jenisBahanBakar) {
        parent::__construct($id, $brand, $model, $tahun, $hargaDasar, 'Konvensional');
        $this->kapasitasMesin = $kapasitasMesin;
        $this->jenisBahanBakar = $jenisBahanBakar;
    }

    public function hitungHargaTotal(): float {
        $pajakEmisi = $this->hargaDasar * 0.10;
        $pajakCC = $this->kapasitasMesin * 2000;
        return $this->hargaDasar + $pajakEmisi + $pajakCC;
    }
}