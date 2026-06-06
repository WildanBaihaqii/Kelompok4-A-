<?php
declare(strict_types=1);

require_once __DIR__ . '/src/ManajemenShowroom.php';

$showroom = new ManajemenShowroom();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelompok 4 (A)</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --bg-primary: #0f172a;
            --bg-surface: #1e293b;
            --text-main: #f8fafc;
            --text-muted: #94a3b8;
            --accent-blue: #38bdf8;
            --accent-teal: #2dd4bf;
            --accent-green: #34d399;
            --border-color: #334155;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-primary);
            color: var(--text-main);
            margin: 0;
            padding: 30px 20px;
            min-height: 100vh;
        }

        .dashboard-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Header Area Styling */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
            padding: 25px 35px;
            border-radius: 16px;
            border: 1px solid var(--border-color);
            margin-bottom: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .header-title h1 {
            font-size: 26px;
            font-weight: 700;
            margin: 0;
            background: linear-gradient(to right, var(--accent-blue), var(--accent-teal));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .header-title p {
            color: var(--text-muted);
            margin: 5px 0 0 0;
            font-size: 14px;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            background: rgba(52, 211, 153, 0.1);
            color: var(--accent-green);
            padding: 6px 14px;
            border-radius: 99px;
            font-size: 13px;
            font-weight: 600;
            border: 1px solid rgba(52, 211, 153, 0.2);
        }

        .status-badge::before {
            content: '';
            display: inline-block;
            width: 8px;
            height: 8px;
            background-color: var(--accent-green);
            border-radius: 50%;
            margin-right: 8px;
            box-shadow: 0 0 10px var(--accent-green);
        }

        /* Grid info kelompok & stack */
        .info-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 20px;
            margin-bottom: 30px;
        }

        .info-box {
            background-color: var(--bg-surface);
            border: 1px solid var(--border-color);
            padding: 20px 25px;
            border-radius: 16px;
        }

        .info-box h3 {
            margin-top: 0;
            font-size: 16px;
            font-weight: 600;
            color: var(--accent-blue);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .team-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 12px;
            margin-top: 15px;
        }

        .team-member {
            background: rgba(255, 255, 255, 0.03);
            padding: 10px 15px;
            border-radius: 8px;
            border: 1px solid rgba(255, 255, 255, 0.05);
            font-size: 14px;
        }

        /* Driver Output Terminal Styling */
        .output-section {
            background-color: var(--bg-surface);
            border: 1px solid var(--border-color);
            border-radius: 16px;
            padding: 25px;
            margin-bottom: 30px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
        }

        .output-section h2 {
            font-size: 18px;
            margin-top: 0;
            margin-bottom: 5px;
            font-weight: 600;
        }

        .output-section p {
            color: var(--text-muted);
            font-size: 14px;
            margin-bottom: 20px;
        }

        /* Mengganti gaya bawaan teks <pre> agar menyatu sempurna */
        pre {
            background-color: #090d16 !important;
            color: #a7f3d0 !important; /* Hijau terminal neon lembut */
            font-family: 'JetBrains Mono', monospace !important;
            font-size: 13.5px !important;
            padding: 25px !important;
            border-radius: 12px !important;
            border: 1px solid #1e293b !important;
            line-height: 1.6 !important;
            overflow-x: auto;
            margin: 0;
            box-shadow: inset 0 2px 10px rgba(0,0,0,0.5);
        }

        /* Cards OOP Pillar Explanation */
        .pillar-section-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 15px;
            color: var(--text-main);
        }

        .oop-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 20px;
        }

        .pillar-card {
            background-color: var(--bg-surface);
            border: 1px solid var(--border-color);
            padding: 22px;
            border-radius: 16px;
            transition: transform 0.2s ease, border-color 0.2s ease;
        }

        .pillar-card:hover {
            transform: translateY(-3px);
            border-color: var(--accent-blue);
        }

        .pillar-card h4 {
            margin-top: 0;
            margin-bottom: 10px;
            font-size: 15px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .pillar-card h4 span {
            background: rgba(56, 189, 248, 0.1);
            color: var(--accent-blue);
            padding: 2px 8px;
            border-radius: 6px;
            font-size: 12px;
        }

        .pillar-card p {
            font-size: 13px;
            color: var(--text-muted);
            line-height: 1.6;
            margin: 0;
        }

        @media (max-width: 768px) {
            .info-grid { grid-template-columns: 1fr; }
            header { flex-direction: column; align-items: flex-start; gap: 15px; }
        }
    </style>
</head>
<body>

<div class="dashboard-container">
    
    <header>
        <div class="header-title">
            <h1>Sistem Laporan Polimorfisme Showroom</h1>
            <p>Arsitektur Pemrograman Berorientasi Objek Mandiri (Job 2 - Job 6)</p>
        </div>
        <div class="status-badge">Sistem Aktif</div>
    </header>

    <div class="info-grid">
        <div class="info-box">
            <h3>Tim Pengembang (Kelompok 4 - Kelas A)</h3>
            <div class="team-list">
                <div class="team-member">Afif Nur Faizin</div>
                <div class="team-member">Ayla Azzura P. M.</div>
                <div class="team-member">Fabian Adila R.</div>
                <div class="team-member">Maghfira Dhinantyas</div>
                <div class="team-member">Tatag Wildan Baihaqy</div>
            </div>
        </div>
        <div class="info-box">
            <h3>Teknologi Stack</h3>
            <div class="team-list" style="grid-template-columns: 1fr;">
                <div class="team-member" style="color: var(--accent-teal); border-color: rgba(45, 212, 191, 0.2);">
                    PHP 8.5 Strict Types & MariaDB & phpMyAdmin
                </div>
            </div>
        </div>
    </div>

    <section class="output-section">
        <h2>📊 Hasil Eksekusi Koleksi Polimorfisme</h2>
        <p>Data di bawah dienkapsulasi dari sub-tabel relasional <em>Class Table Inheritance</em>, kemudian diproses runtime melalui metode <em>Dynamic Binding</em>.</p>
        
        <?php $showroom->tampilkanLaporanShowroom(); ?>
    </section>

    <div class="pillar-section-title">Implementasi 4 Pilar OOP Utama</div>
    <section class="oop-grid">
        <div class="pillar-card">
            <h4><span>Pilar 1</span> Encapsulation</h4>
            <p>Kredensial database diisolasi dalam modifier <code>private</code> pada file <code>Koneksi</code>. Properti kendaraan diset ke <code>protected</code> agar aman namun bisa diakses oleh kelas turunan.</p>
        </div>
        <div class="pillar-card">
            <h4><span>Pilar 2</span> Inheritance</h4>
            <p>Subclass konkrit (<code>MobilListrik</code>, <code>MobilKonvensional</code>, <code>MotorBesar</code>) memperluas fungsionalitas dan mewarisi karakteristik dari kelas abstrak utama <code>Kendaraan</code>.</p>
        </div>
        <div class="pillar-card">
            <h4><span>Pilar 3</span> Abstraction</h4>
            <p>Kelas induk dideklarasikan sebagai <code>abstract class</code>, yang memuat blueprint <code>abstract public function hitungHargaTotal()</code> tanpa tubuh fungsi untuk memaksa standarisasi aturan bisnis kelas anak.</p>
        </div>
        <div class="pillar-card">
            <h4><span>Pilar 4</span> Polymorphism</h4>
            <p>Koleksi array heterogen disatukan dalam tipe objek induk tunggal. Pemanggilan metode kalkulasi menghasilkan nilai berbeda secara otomatis bergantung tipe objek memori yang sedang diproses.</p>
        </div>
    </section>

</div>

</body>
</html>