# 🏎️ Status Proyek: Job 1 (Selesai)

1. **Database (`Database/showroom.sql`)** Menerapkan *Class Table Inheritance* (Tabel Induk `kendaraan` & Tabel Anak `mobil_konvensional`, `mobil_listrik`, `motor_besar`) + **20 Data Dummy** siap pakai dengan fitur `ON DELETE CASCADE`.

2. **Koneksi OOP (`src/Koneksi.php`)** Enkapsulasi kredensial (`private`/`protected`) dengan otomatisasi koneksi melalui magic method `__construct()` dan pemutusan via `__destruct()`.

3. **Akses Data (`src/KendaraanDAL.php`)** Isolasi kueri CRUD murni. Menyediakan fungsi `getAllKendaraan()` menggunakan `LEFT JOIN` untuk mendukung *Polymorphic Collection* pada tahap Controller (Job berikutnya).
