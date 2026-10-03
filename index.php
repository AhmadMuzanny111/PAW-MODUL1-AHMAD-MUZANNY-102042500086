<?php

$produk_list = [
    [
        "nama" => "CIA Keyboard Mechanical K75",
        "kategori" => "keyboard mechanical",
        "harga" => 1500000,
        "stok" => 17
    ],
    [
        "nama" => "CIA Mouse Wireless M200",
        "kategori" => "mouse wireless",
        "harga" => 185000,
        "stok" => 32
    ],
    [
        "nama" => "CIA Monitor Gaming 144Hz",
        "kategori" => "monitor gaming",
        "harga" => 3400000,
        "stok" => 14
    ],
    [
        "nama" => "CIA Power Bank PB20",
        "kategori" => "power bank",
        "harga" => 289000,
        "stok" => 26
    ],
    [
        "nama" => "CIA USB-C Hub U7",
        "kategori" => "kabel usb-c",
        "harga" => 49000,
        "stok" => 0
    ],
    [
        "nama" => "CIA Webcam 1080p",
        "kategori" => "Webcam",
        "harga" => 399000,
        "stok" => 21
    ],
];

$total_produk = count($produk_list);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cia Store</title>
</head>
<body>
    
    <!-- Navigasi -->
     <nav class="navbar">
        <a href="#" class="navbar-toko">Cia Store</a>
        <ul class="navbar-top">
            <li><a href="#">Beranda</a></li>
            <li><a href="#produk">Produk</a></li>
            <li><a href="#">Tentang kami</a></li>
        </ul>
     </nav>

    <!-- Hero Section -->
     <header class="hero">
        <h1>Selamat datang di Cia Store</h1>
        <p>Temukan perangkat dan aksesoris teknologi kualitas tinggi dengan harga terbaik!</p>
     </header>

    <!-- Konten Utama -->
    <main class="container" id="produk">
    <!-- Informasi jumlah produk -->
        <div class="produk-header">
            <h2 class="produk-tittle">Daftar Produk</h2>
            <div class="produk-totalproduk">
                Total produk: <strong><?= $total_produk; ?></strong> 
            </div>
    </div>

    <!-- Looping PHP buat nampilin card produk -->
    <div class="produk-grid">
        <?php foreach ($produk_list as $produk): ?>
            <?php 
                // 1. HITUNG LOGIKA DISKON DI SINI (Sebelum HTML dirender)
                $harga_normal = $produk['harga'];
                $dapet_diskon = $harga_normal >= 1000000; // Syarat modul: >= Rp 1.000.000
                $persen_diskon = 10;
                
                if ($dapet_diskon) {
                    $potongan = $harga_normal * ($persen_diskon / 100);
                    $harga_setelah_diskon = $harga_normal - $potongan;
                }
            ?>

    <div class="card">
        <div class="kategori">
            <?= htmlspecialchars($produk['kategori']); ?>
        </div>
        <h3 class="nama-produk"><?= htmlspecialchars($produk['nama']); ?></h3>
                
    <!-- Area Tampilan Harga & Diskon -->
        <div class="area-harga">
            <?php if ($dapet_diskon): ?>
    <!-- Baris Harga Coret & Badge Diskon -->
        <div class="harga-diskon-wrapper">
            <span class="harga-normal-coret">Rp <?= number_format($harga_normal, 0, ',', '.'); ?></span>
            <span class="badge-diskon">Hemat <?= $persen_diskon; ?>%</span>
        </div>
    <!-- Harga Akhir Setelah Diskon -->
        <div class="harga">
            Rp <?= number_format($harga_setelah_diskon, 0, ',', '.'); ?>
        </div>
        <?php else: ?>
    <!-- Harga Normal Jika Tidak Ada Diskon -->
        <div class="harga">
            Rp <?= number_format($harga_normal, 0, ',', '.'); ?>
        </div>
            <?php endif; ?>
        </div>
                
    <!-- Informasi Stok & Tombol Beli -->
        <div class="info-stok">
                    <div class="stok-row">
                        <span>Sisa Stok: <strong><?= $produk['stok']; ?></strong></span>

                        <?php
                        // Percabangan 1: Cek stok
                        if ($produk['stok'] > 0) {
                            echo '<span class="badge badge-tersedia">Tersedia</span>';
                        } else {
                            echo '<span class="badge badge-tidaktersedia">Stok Habis</span>';
                        }
                        ?>
                    </div>

                    <?php 
                    // Percabangan 2: Cek tombol beli
                    if ($produk['stok'] > 0) {
                        echo '<button class="btn-beli">Beli Sekarang</button>';
                    } else {
                        echo '<button class="btn-beli btn-disabled" disabled>Stok Habis</button>';
                    }
                    ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    </main>

    <footer>
        <p>&copy; 2026 Cia Store. All rights reserved.</p>
    </footer>

<!-- Import Google Fonts (Plus Jakarta Sans) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Plus Jakarta Sans', sans-serif;
            -webkit-font-smoothing: antialiased;
        }

        .btn-beli {
             margin-top: 12px; 
        }

        .badge {
            margin-left: 10px;
            margin-bottom: 20px;
        }



        :root {
            --primary-color: #800020;        /* Maroon Utama */
            --primary-hover: #5a0017;        /* Maroon Gelap */
            --bg-color: #fff0f3;             /* Soft Pink Warm Background */
            --card-bg: #ffffff;
            --text-color: #2b1017;           /* Text Dark Maroon */
            --text-muted: #7a5860;
            --border-color: #f7cbd4;         /* Border Pink Soft */
            --green-badge: #1b7e32;
            --red-badge: #c62828;
        }

        body {
            background-color: var(--bg-color);
            color: var(--text-color);
            line-height: 1.5;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Navigasi Utama Setengah Lingkaran */
        .navbar {
            background: linear-gradient(135deg, #800020 0%, #5a0017 100%);
            padding: 28px 20px 48px 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 18px;
            border-bottom-left-radius: 50% 50px;
            border-bottom-right-radius: 50% 50px;
            box-shadow: 0 10px 25px rgba(128, 0, 32, 0.25);
            width: 100%;
        }

        .navbar-toko {
            font-size: 2.2rem;
            font-weight: 800;
            color: #ffffff;
            text-decoration: none;
            letter-spacing: -0.5px;
            text-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }

        .navbar-top {
            display: flex;
            list-style: none;
            gap: 14px;
        }

        .navbar-top a {
            text-decoration: none;
            color: #ffffff;
            font-weight: 700;
            font-size: 0.95rem;
            padding: 8px 22px;
            border-radius: 50px;
            transition: all 0.25s ease;
            background-color: rgba(255, 255, 255, 0.22);
            border: 1px solid rgba(255, 255, 255, 0.35);
            backdrop-filter: blur(4px);
        }

        .navbar-top a:hover {
            color: var(--primary-color);
            background-color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }

        /* Hero Section Simetris */
        .hero {
            background: linear-gradient(135deg, #800020 0%, #5a0017 100%);
            color: white;
            padding: 44px 24px;
            text-align: center;
            margin: 30px auto 0 auto;
            width: 90%;
            max-width: 900px;
            border-radius: 24px;
            box-shadow: 0 10px 25px rgba(128, 0, 32, 0.18);
        }

        .hero h1 {
            font-size: 2.1rem;
            font-weight: 800;
            margin-bottom: 8px;
            letter-spacing: -0.5px;
        }

        .hero p {
            color: #ffdce3;
            font-size: 0.98rem;
            font-weight: 400;
        }

        /* Outer Container */
        .container {
            max-width: 900px;
            margin: 30px auto 50px auto;
            padding: 32px;
            background-color: var(--card-bg);
            border: 2px solid var(--border-color);
            border-radius: 28px;
            box-shadow: 0 10px 30px rgba(128, 0, 32, 0.06);
            width: 90%;
        }

        .produk-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            padding-bottom: 14px;
            border-bottom: 2px solid var(--border-color);
        }

        .produk-tittle {
            color: var(--primary-color);
            font-weight: 800;
            font-size: 1.4rem;
        }

        .produk-totalproduk {
            background-color: #ffe6eb;
            color: var(--primary-color);
            padding: 8px 18px;
            border-radius: 50px;
            font-size: 0.88rem;
            font-weight: 800;
            border: 1.5px solid var(--border-color);
        }

        /* Grid Layout 2 Kolom Simetris */
        .produk-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 24px;
        }

        .card {
            background-color: var(--card-bg);
            border: 2px solid var(--border-color);
            border-radius: 20px;
            padding: 24px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            gap: 20px;
            transition: all 0.25s ease;
        }

        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 24px rgba(128, 0, 32, 0.12);
            border-color: #f0a3b3;
        }

        .card-top {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .kategori {
            font-size: 0.72rem;
            color: #a04058;
            text-transform: uppercase;
            font-weight: 800;
            letter-spacing: 0.6px;
        }

        .nama-produk {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--text-color);
            line-height: 1.35;
        }

        .harga {
            font-size: 1.25rem;
            font-weight: 800;
            color: var(--primary-color);
            margin-top: 4px;
            margin-bottom: 6px;
        }

        /* Perbaikan Area Bawah Kartu & Jarak Antar Elemen */
        .card-bottom {
            display: flex;
            flex-direction: column;
            gap: 18px; /* Gap utama antar baris stok & tombol beli */
            padding-top: 16px;
            border-top: 1.5px dashed var(--border-color);
            margin-top: auto;
        }

        .stok-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            font-size: 0.9rem;
            color: var(--text-muted);
        }

        .stok-row strong {
            color: var(--text-color);
            font-size: 1rem;
        }

        /* Badge Status */
        .badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 6px 14px;
            border-radius: 50px;
            font-size: 0.78rem;
            font-weight: 800;
            letter-spacing: 0.3px;
            text-transform: uppercase;
            white-space: nowrap;
            line-height: 1;
        }

        .badge-tersedia {
            background-color: var(--green-badge);
            color: #ffffff;
            box-shadow: 0 2px 8px rgba(27, 126, 50, 0.25);
        }

        .badge-tidaktersedia {
            background-color: var(--red-badge);
            color: #ffffff;
            box-shadow: 0 2px 8px rgba(198, 40, 40, 0.25);
        }

        /* Tombol Beli */
        .btn-beli {
            width: 100%;
            padding: 13px;
            background: linear-gradient(135deg, #800020 0%, #5a0017 100%);
            color: white;
            border: none;
            border-radius: 12px;
            font-weight: 800;
            font-size: 0.95rem;
            cursor: pointer;
            transition: all 0.2s ease;
            box-shadow: 0 4px 12px rgba(128, 0, 32, 0.25);
        }

        .btn-beli:hover {
            opacity: 0.95;
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(128, 0, 32, 0.35);
        }

        /* Area Tempat Harga & Diskon */
.area-harga {
    margin-top: 6px;
    margin-bottom: 8px;
    display: flex;
    flex-direction: column;
    gap: 4px;
}

/* Wrapper Baris Harga Coret & Badge Diskon */
.harga-diskon-wrapper {
    display: flex;
    align-items: center;
    gap: 10px;
}

/* Tampilan Harga Awal (Dicoret & Agak Redup) */
.harga-normal-coret {
    font-size: 0.9rem;
    color: #9e737c;
    text-decoration: line-through;
    font-weight: 600;
}

/* Badge Diskon Menarik dengan Border Radius & Gradasi Warm Red */
.badge-diskon {
    background: linear-gradient(135deg, #ff4d6d 0%, #c62828 100%);
    color: #ffffff;
    font-size: 0.75rem;
    font-weight: 800;
    padding: 3px 10px;
    border-radius: 20px; /* Radius melengkung halus */
    box-shadow: 0 2px 6px rgba(198, 40, 40, 0.3);
    letter-spacing: 0.4px;
    text-transform: uppercase;
    display: inline-flex;
    align-items: center;
}

/* Tampilan Harga Akhir Setelah Diskon (Besar & Menonjol) */
.harga {
    font-size: 1.3rem;
    font-weight: 800;
    color: var(--primary-color);
    letter-spacing: -0.3px;
}

        .btn-disabled {
            background: #e8d0d5;
            color: #9c7880;
            cursor: not-allowed;
            box-shadow: none;
            border: 1px solid var(--border-color);
        }

        footer {
            background-color: #ffffff;
            border-top: 2px solid var(--border-color);
            border-radius: 24px 24px 0 0;
            text-align: center;
            padding: 22px;
            color: var(--text-muted);
            font-size: 0.85rem;
            font-weight: 600;
            margin-top: auto;
        }

        @media (max-width: 640px) {
            .produk-grid {
                grid-template-columns: 1fr;
            }
            .navbar {
                border-bottom-left-radius: 50% 30px;
                border-bottom-right-radius: 50% 30px;
            }
        }
    </style>


</body>
</html>
