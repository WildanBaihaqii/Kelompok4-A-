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

    // Overriding Polimorfisme: (2% * hargaDasar) + (cc * 500)
    public function hitungPajakTahunan(): float {
        return ($this->hargaDasar * 0.02) + ($this->kapasitasMesin * 500);
    }
}