<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Jawa - Selamat Datang</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        /* Hero Section */
        .hero {
            background: linear-gradient(45deg, #6a11cb, #2575fc);
            color: white;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            animation: fadeIn 1.5s ease-in-out;
        }

        .hero h1 {
            font-size: 4rem;
            font-weight: bold;
        }

        .hero p {
            font-size: 1.25rem;
            margin-top: 20px;
        }

        .hero .btn {
            margin-top: 30px;
            padding: 15px 40px;
            font-size: 1.2rem;
        }

        /* Fitur Section */
        .fitur h2 {
            color: #333;
            font-weight: bold;
        }

        .fitur .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .fitur .card:hover {
            transform: translateY(-10px);
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.15);
        }

        /* CTA Section */
        .cta {
            background: linear-gradient(45deg, #ff512f, #dd2476);
            color: white;
        }

        .cta h2 {
            font-size: 2.5rem;
            font-weight: bold;
        }

        .cta .btn {
            padding: 15px 40px;
            font-size: 1.2rem;
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
    </style>
</head>
<body>

<!-- Hero Section -->
<section class="hero">
    <div class="container text-center">
        <h1>TOKO JAWA BISA</h1>
        <p>Aplikasi POS "Toko Jawa Bisa" Aplikasi Pengelolaan Stok, Penjualan, dan Pengguna.</p>
        <a href="login" class="btn btn-light btn-lg">Mulai 🚀</a>
    </div>
</section>

<!-- Fitur Unggulan -->
<section id="fitur" class="fitur py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-5">Fitur Unggulan</h2>
        <div class="row text-center">
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm p-3">
                    <h5 class="card-title fw-bold">Pengelolaan Stok</h5>
                    <p class="card-text">Pantau stok barang dengan mudah agar dapat memantau saat stok menipis.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm p-3">
                    <h5 class="card-title fw-bold">Pencatatan Penjualan Real-Time</h5>
                    <p class="card-text">Lacak penjualan langsung saat terjadi tanpa khawatir kehilangan data.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm p-3">
                    <h5 class="card-title fw-bold">Laporan User</h5>
                    <p class="card-text">Analisa user yang terdaftar dan dapat menganalisa pembeli.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta py-5 text-center">
    <div class="container">
        <h2>Siap Meningkatkan Bisnis Anda?</h2>
        <a href="register" class="btn btn-light btn-lg mt-3">Daftar Sekarang</a>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
