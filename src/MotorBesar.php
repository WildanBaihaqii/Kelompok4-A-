<?php
declare(strict_types=1);
require_once __DIR__ . '/Kendaraan.php';

class MotorBesar extends Kendaraan {
    private string $tipeRantai;
    private string $modeBerkendara;

    public function __construct(int $id, string $brand, string $model, int $tahun, float $hargaDasar, string $tipeRantai, string $modeBerkendara) {
        parent::__construct($id, $brand, $model, $tahun, $hargaDasar, 'MotorBesar');
        $this->tipeRantai = $tipeRantai;
        $this->modeBerkendara = $modeBerkendara;
    }

    public function hitungHargaTotal(): float {
        $ppnbm = $this->hargaDasar * 0.15;
        return $this->hargaDasar + $ppnbm;
    }
}