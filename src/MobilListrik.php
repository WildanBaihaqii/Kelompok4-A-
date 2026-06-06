<?php
declare(strict_types=1);
require_once __DIR__ . '/Kendaraan.php';

class MobilListrik extends Kendaraan {
    private int $kapasitasBaterai;
    private int $jarakTempuh;

    public function __construct(int $id, string $brand, string $model, int $tahun, float $hargaDasar, int $kapasitasBaterai, int $jarakTempuh) {
        parent::__construct($id, $brand, $model, $tahun, $hargaDasar, 'Listrik');
        $this->kapasitasBaterai = $kapasitasBaterai;
        $this->jarakTempuh = $jarakTempuh;
    }

    // Overriding Polimorfisme: 0.5% * hargaDasar
    public function hitungPajakTahunan(): float {
        return $this->hargaDasar * 0.005;
    }
}