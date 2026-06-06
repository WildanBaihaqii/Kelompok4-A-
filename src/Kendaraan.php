<?php
declare(strict_types=1);

abstract class Kendaraan {
    protected int $id;
    protected string $brand;
    protected string $model;
    protected int $tahun;
    protected float $hargaDasar;
    protected string $kategori;

    public function __construct(int $id, string $brand, string $model, int $tahun, float $hargaDasar, string $kategori) {
        $this->id = $id;
        $this->brand = $brand;
        $this->model = $model;
        $this->tahun = $tahun;
        $this->hargaDasar = $hargaDasar;
        $this->kategori = $kategori;
    }

    public function getId(): int { return $this->id; }
    public function getBrand(): string { return $this->brand; }
    public function getModel(): string { return $this->model; }
    public function getTahun(): int { return $this->tahun; }
    public function getHargaDasar(): float { return $this->hargaDasar; }
    public function getKategori(): string { return $this->kategori; }

    abstract public function hitungHargaTotal(): float;
}