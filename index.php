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
    <title>Enterprise Dashboard - Kelompok 4 A</title>
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
            --accent-amber: #fbbf24;
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

        .rule-section-title {
            font-size: 15px;
            font-weight: 600;
            margin-bottom: 15px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: var(--accent-blue);
        }

        .rule-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .rule-card {
            background-color: var(--bg-surface);
            border-left: 4px solid var(--border-color);
            padding: 15px 20px;
            border-radius: 0 12px 12px 0;
            border-top: 1px solid var(--border-color);
            border-right: 1px solid var(--border-color);
            border-bottom: 1px solid var(--border-color);
        }

        .rule-card.konvensional { border-left-color: var(--accent-blue); }
        .rule-card.listrik { border-left-color: var(--accent-teal); }
        .rule-card.moge { border-left-color: var(--accent-amber); }

        .rule-card h5 {
            margin: 0 0 5px 0;
            font-size: 14px;
            font-weight: 600;
        }

        .rule-card code {
            font-family: 'JetBrains Mono', monospace;
            font-size: 13px;
            color: #e2e8f0;
            background: rgba(0,0,0,0.2);
            padding: 2px 6px;
            border-radius: 4px;
            display: inline-block;
            margin-top: 5px;
        }

        .output-section {
            background-color: var(--bg-surface);
            border: 1px solid var(--border-color);
            border-radius: 16px;
            padding: 25px;
            margin-bottom: 30px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
        }

        pre {
            background-color: #090d16 !important;
            color: #a7f3d0 !important;
            font-family: 'JetBrains Mono', monospace !important;
            font-size: 13.5px !important;
            padding: 25px !important;
            border-radius: 12px !important;
            border: 1px solid #1e293b !important;
            line-height: 1.6 !important;
            overflow-x: auto;
            margin: 0;
        }
    </style>
</head>
<body>

<div class="dashboard-container">
    
    <header>
        <div class="header-title">
            <h1>Sistem Laporan Polimorfisme Showroom</h1>
            <p>Implementasi Atur Overriding Fungsi Kalkulasi Pajak Kendaraan</p>
        </div>
    </header>

    <div class="rule-section-title">Aturan Overriding Polimorfisme Aktual</div>
    <div class="rule-grid">
        <div class="rule-card konvensional">
            <h5 style="color: var(--accent-blue);">Mobil Konvensional</h5>
            <small style="color: var(--text-muted);">Proporsi nilai aset + volume silinder mesin:</small><br>
            <code>(2% * Harga Dasar) + (CC * 500)</code>
        </div>
        <div class="rule-card listrik">
            <h5 style="color: var(--accent-teal);">Mobil Listrik</h5>
            <small style="color: var(--text-muted);">Insentif khusus emisi karbon nol pemerintah:</small><br>
            <code>0.5% * Harga Dasar</code>
        </div>
        <div class="rule-card moge">
            <h5 style="color: var(--accent-amber);">Motor Besar (Moge)</h5>
            <small style="color: var(--text-muted);">Tarif kendaraan hobi kubikasi tinggi:</small><br>
            <code>1.5% * Harga Dasar</code>
        </div>
    </div>

    <section class="output-section">
        <h2 style="font-size: 18px; margin-top:0;">📊 Output Data Logika Dynamic Binding</h2>
        <p style="color: var(--text-muted); font-size:14px; margin-bottom:20px;">Menampilkan kalkulasi tarif pajak tahunan murni hasil pemrosesan objek polimorfik secara real-time.</p>
        
        <?php $showroom->tampilkanLaporanShowroom(); ?>
    </section>

</div>

</body>
</html>