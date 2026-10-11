<?php

include 'include/koneksi.php';
include 'include/app.php';

$skr = date('Y-m-d');

/*
|--------------------------------------------------------------------------
| Tanggal Indonesia
|--------------------------------------------------------------------------
*/
$hari = [
    'Sun' => 'Minggu',
    'Mon' => 'Senin',
    'Tue' => 'Selasa',
    'Wed' => 'Rabu',
    'Thu' => 'Kamis',
    'Fri' => 'Jumat',
    'Sat' => 'Sabtu'
];

$bulan = [
    'Jan' => 'Jan',
    'Feb' => 'Feb',
    'Mar' => 'Mar',
    'Apr' => 'Apr',
    'May' => 'Mei',
    'Jun' => 'Jun',
    'Jul' => 'Jul',
    'Aug' => 'Agu',
    'Sep' => 'Sep',
    'Oct' => 'Okt',
    'Nov' => 'Nov',
    'Dec' => 'Des'
];

$hariSekarang = $hari[date('D')];
$bulanSekarang = $bulan[date('M')];

$tanggalIndonesia = $hariSekarang . ', ' . date('d') . ' ' . $bulanSekarang . ' ' . date('Y');

?>
<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        <?= $app['nama_aplikasi']; ?> -
        <?= $app['nama_perusahaan']; ?>
    </title>

    <meta name="description" content="Sistem Absensi Siswa SMK YAPPRI SUMEDANG">

    <meta name="author" content="SMK YAPPRI SUMEDANG">

    <link rel="shortcut icon" href="images/icon/logoyappri.jpg">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="css1/font-awesome.min.css">


<style>

/* =========================================================
   RESET & LAYOUT FULLSCREEN 100VH
========================================================= */

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

html,
body {
    height: 100vh;
    width: 100vw;
    overflow: hidden; /* Menghilangkan scrollbar */
}

body {
    font-family: 'Inter', Arial, sans-serif;
    background: #f4f9ff;
    color: #102a56;
    display: flex;
    flex-direction: column;
}


/* =========================================================
   TOP NAVBAR
========================================================= */

.topbar {
    height: 75px;
    background: linear-gradient(135deg, #0754c7 0%, #0b64dc 50%, #0344a8 100%);
    color: #fff;
    display: flex;
    align-items: center;
    padding: 0 3.5%;
    position: relative;
    z-index: 20;
    box-shadow: 0 4px 15px rgba(0, 61, 145, .20);
    flex-shrink: 0;
}

/* Logo */

.brand {
    display: flex;
    align-items: center;
    gap: 12px;
}

.brand-logo {
    width: 50px;
    height: 50px;
    object-fit: contain;
    background: #fff;
    border-radius: 50%;
    padding: 3px;
    box-shadow: 0 4px 10px rgba(0,0,0,.15);
}

.brand-text {
    line-height: 1.1;
}

.brand-text strong {
    display: block;
    font-size: 20px;
    font-weight: 800;
    letter-spacing: -.5px;
}

.brand-text span {
    display: block;
    font-size: 13px;
    font-weight: 600;
    letter-spacing: 3px;
}

/* Navigation */

.nav-home {
    height: 100%;
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 0 25px;
    margin-left: 20px;
    position: relative;
    font-size: 15px;
    font-weight: 600;
}

.nav-home i {
    font-size: 18px;
}

.nav-home::after {
    content: "";
    position: absolute;
    left: 20px;
    right: 20px;
    bottom: 15px;
    height: 4px;
    border-radius: 10px;
    background: #24a8ff;
}

/* Right Navigation */

.top-info {
    margin-left: auto;
    display: flex;
    align-items: center;
    gap: 20px;
    font-size: 14px;
    font-weight: 500;
}

.top-info-item {
    display: flex;
    align-items: center;
    gap: 8px;
}

.top-info-item i {
    font-size: 16px;
    color: #fff;
}

.top-divider {
    width: 1px;
    height: 20px;
    background: rgba(255,255,255,.35);
}


/* =========================================================
   MAIN AREA
========================================================= */

.main {
    flex: 1;
    position: relative;
    overflow: hidden;
    background:
        radial-gradient(circle at 10% 30%, rgba(62,181,255,.12), transparent 30%),
        radial-gradient(circle at 90% 45%, rgba(0,112,255,.08), transparent 32%),
        linear-gradient(180deg, #f7fbff 0%, #edf6ff 100%);
    display: flex;
    flex-direction: column;
    justify-content: space-evenly;
    padding: 10px 0;
}


/* =========================================================
   DECORATION
========================================================= */

.shape {
    position: absolute;
    pointer-events: none;
    z-index: 0;
}

.shape-one {
    width: 200px;
    height: 200px;
    border-radius: 50%;
    background: rgba(33,163,246,.09);
    top: 20px;
    left: -80px;
}

.shape-two {
    width: 250px;
    height: 250px;
    border-radius: 50%;
    background: rgba(0,83,200,.06);
    right: -100px;
    top: 150px;
}


/* =========================================================
   HERO
========================================================= */

.hero {
    width: 100%;
    max-width: 1260px;
    margin: 0 auto;
    padding: 10px 30px;
    position: relative;
    z-index: 2;
}

.hero-school {
    position: absolute;
    right: 0;
    top: -10px;
    width: 45%;
    height: 120%;
    background:
        linear-gradient(90deg, #f7fbff 0%, rgba(247,251,255,.75) 20%, rgba(247,251,255,.15) 100%),
        url('images/sekolah.jpg');
    background-size: cover;
    background-position: center;
    opacity: .9;
    z-index: -1;
    border-radius: 0 0 0 80px;
}

.hero-content {
    width: 65%;
    position: relative;
    z-index: 2;
}

.hero-inner {
    display: flex;
    align-items: center;
    gap: 25px;
}

.hero-logo {
    width: 90px;
    height: 90px;
    object-fit: contain;
    flex-shrink: 0;
    filter: drop-shadow(0 6px 12px rgba(0,64,150,.15));
}

.hero-small {
    color: #1385e8;
    font-size: 13px;
    font-weight: 800;
    letter-spacing: 3px;
    margin-bottom: 4px;
    text-transform: uppercase;
}

.hero-title {
    font-size: clamp(26px, 3vw, 38px);
    line-height: 1.1;
    color: #102f72;
    font-weight: 800;
    letter-spacing: -1px;
    margin-bottom: 4px;
}

.hero-school-name {
    color: #62718d;
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 8px;
}

.hero-tagline {
    display: flex;
    align-items: center;
    gap: 10px;
    color: #6b7890;
    font-size: 14px;
    font-style: italic;
}

.hero-tagline::before {
    content: "";
    display: block;
    width: 40px;
    height: 4px;
    border-radius: 10px;
    background: #1399ef;
}


/* =========================================================
   ACTION CARDS
========================================================= */

.action-container {
    max-width: 1260px;
    width: 100%;
    margin: 0 auto;
    padding: 0 30px;
    position: relative;
    z-index: 5;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
}

.action-card {
    height: 120px;
    border-radius: 20px;
    position: relative;
    overflow: hidden;
    color: #fff;
    text-decoration: none;
    display: flex;
    align-items: center;
    padding: 15px 25px;
    box-shadow: 0 12px 25px rgba(26,90,170,.14);
    transition: transform .25s ease, box-shadow .25s ease;
}

.action-card:hover {
    color: #fff;
    text-decoration: none;
    transform: translateY(-4px);
    box-shadow: 0 18px 30px rgba(20,75,150,.22);
}

.action-masuk {
    background: linear-gradient(135deg, #18b5d8 0%, #0aa6bb 100%);
}

.action-pulang {
    background: linear-gradient(135deg, #fa2870 0%, #ee155a 100%);
}

.action-kembali {
    background: linear-gradient(135deg, #18d86b 0%, #0abb5d 100%);
}

.action-card::before {
    content: "";
    position: absolute;
    width: 300px;
    height: 300px;
    border: 1px solid rgba(255,255,255,.15);
    border-radius: 50%;
    right: -100px;
    bottom: -180px;
}

.action-icon {
    width: 70px;
    height: 70px;
    border-radius: 50%;
    border: 2px solid rgba(255,255,255,.20);
    background: rgba(255,255,255,.06);
    display: flex;
    justify-content: center;
    align-items: center;
    flex-shrink: 0;
    position: relative;
    z-index: 2;
}

.action-icon i {
    font-size: 32px;
}

.action-content {
    margin-left: 18px;
    position: relative;
    z-index: 2;
}

.action-title {
    font-size: 22px;
    font-weight: 800;
    margin-bottom: 2px;
}

.action-description {
    font-size: 13px;
    line-height: 1.3;
    opacity: .95;
}

.action-arrow {
    margin-left: auto;
    width: 38px;
    height: 38px;
    background: #fff;
    color: #1593e9;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    z-index: 5;
    font-size: 16px;
    flex-shrink: 0;
}

.action-pulang .action-arrow {
    color: #f21c64;
}

.action-kembali .action-arrow {
    color: #0abb5d;
}


/* =========================================================
   CLOCK CARD
========================================================= */

.clock-container {
    max-width: 1260px;
    width: 100%;
    margin: 0 auto;
    padding: 0 30px;
    position: relative;
    z-index: 5;
}

.clock-card {
    height: 130px;
    border-radius: 20px;
    overflow: hidden;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #0873e8 0%, #0752c1 55%, #063d9d 100%);
    color: #fff;
    box-shadow: 0 12px 25px rgba(0,75,180,.18);
}

.clock-card::before {
    content: "";
    position: absolute;
    width: 250px;
    height: 250px;
    border-radius: 50%;
    background: rgba(44,157,255,.35);
    left: -120px;
    top: -120px;
}

.clock-card::after {
    content: "";
    position: absolute;
    width: 350px;
    height: 180px;
    border-radius: 50%;
    background: #1499f4;
    right: -120px;
    bottom: -120px;
    transform: rotate(-12deg);
}

/* Analog Clock */

.analog-clock {
    width: 85px;
    height: 85px;
    border-radius: 50%;
    background: #fff;
    border: 5px solid #167eea;
    box-shadow: 0 5px 15px rgba(0,0,0,.2), inset 0 0 0 2px #c9e7ff;
    position: absolute;
    left: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 4;
}

.clock-center {
    width: 8px;
    height: 8px;
    background: #0d67d5;
    border-radius: 50%;
    position: absolute;
    z-index: 5;
}

.clock-hand {
    position: absolute;
    width: 3px;
    background: #1267d1;
    border-radius: 10px;
    transform-origin: bottom center;
    left: 50%;
    bottom: 50%;
}

.clock-hour {
    height: 24px;
}

.clock-minute {
    height: 33px;
}

/* Digital */

.clock-info {
    position: relative;
    z-index: 4;
    text-align: center;
}

.digital-time {
    font-size: 38px;
    line-height: 1;
    font-weight: 800;
    letter-spacing: 2px;
}

.digital-date {
    margin-top: 4px;
    font-size: 15px;
    font-weight: 600;
}

.clock-line {
    width: 40px;
    height: 3px;
    border-radius: 10px;
    background: #22b5ff;
    margin: 6px auto;
}

.clock-credit {
    font-size: 11px;
    opacity: .9;
}

/* Motto */

.motto {
    position: absolute;
    right: 40px;
    z-index: 4;
    font-family: cursive;
    font-size: 16px;
    line-height: 1.15;
    font-style: italic;
    font-weight: 600;
    transform: rotate(-3deg);
    text-align: left;
}

.motto::after {
    content: "";
    display: block;
    width: 80px;
    height: 3px;
    background: #ffc928;
    margin-top: 4px;
}


/* =========================================================
   FOOTER
========================================================= */

.footer {
    height: 45px;
    background: linear-gradient(135deg, #0874e8, #0753bd);
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 5%;
    position: relative;
    flex-shrink: 0;
}

.footer-item {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 12px;
    font-weight: 500;
    position: relative;
    z-index: 2;
}

.footer-item i {
    font-size: 16px;
}

.footer-motto {
    font-style: italic;
}


/* =========================================================
   RESPONSIVE LAYOUTS
========================================================= */

@media (max-width: 900px) {
    .action-container {
        grid-template-columns: 1fr;
        gap: 10px;
    }
    .action-card {
        height: 80px;
        padding: 10px 20px;
    }
    .action-icon {
        width: 50px;
        height: 50px;
    }
    .action-icon i {
        font-size: 24px;
    }
    .analog-clock, .motto {
        display: none;
    }
    .hero-school {
        display: none;
    }
    .hero-content {
        width: 100%;
    }
}

</style>

</head>


<body>


<!-- =====================================================
     TOP NAVBAR
===================================================== -->

<header class="topbar">

    <div class="brand">

        <img src="images/1.jpg" class="brand-logo" alt="Logo SMK YAPPRI">

        <div class="brand-text">

            <strong>SMK YAPPRI</strong>

            <span>SUMEDANG</span>

        </div>

    </div>


    <div class="nav-home">

        <i class="fa fa-home"></i>

        <span>Beranda</span>

    </div>


    <div class="top-info">

        <div class="top-info-item">

            <i class="fa fa-calendar"></i>

            <span>
                <?= $tanggalIndonesia; ?>
            </span>

        </div>

        <div class="top-divider"></div>

        <div class="top-info-item">

            <i class="fa fa-user"></i>

            <span>
                Sistem Absensi Siswa
            </span>

        </div>

    </div>

</header>


<!-- =====================================================
     MAIN
===================================================== -->

<main class="main">


    <div class="shape shape-one"></div>

    <div class="shape shape-two"></div>


    <!-- =================================================
         HERO
    ================================================== -->

    <section class="hero">

        <div class="hero-school"></div>


        <div class="hero-content">

            <div class="hero-inner">


                <img src="images/1.jpg" class="hero-logo" alt="Logo SMK YAPPRI SUMEDANG">


                <div>

                    <div class="hero-small">
                        <h2>Selamat Datang Di</h2>
                    </div>


                    <h1 class="hero-title">
                        Sistem Absensi Siswa
                    </h1>


                    <div class="hero-school-name">
                        <h2>SMK YAPPRI SUMEDANG</h2>
                    </div>


                    <div class="hero-tagline">
                        Disiplin hari ini, masa depan yang lebih baik
                    </div>

                </div>

            </div>

        </div>

    </section>



    <!-- =================================================
         ACTION BUTTON
    ================================================== -->

    <section class="action-container">


        <!-- MASUK -->

        <a href="masuk" class="action-card action-masuk">

            <div class="action-icon">

                <i class="fa fa-sign-in"></i>

            </div>


            <div class="action-content">

                <div class="action-title">
                    Masuk
                </div>

                <div class="action-description">
                    Absensi saat datang ke sekolah
                </div>

            </div>


            <div class="action-arrow">

                <i class="fa fa-arrow-right"></i>

            </div>

        </a>



        <!-- PULANG -->

        <a href="pulang" class="action-card action-pulang">

            <div class="action-icon">

                <i class="fa fa-sign-out"></i>

            </div>


            <div class="action-content">

                <div class="action-title">
                    Pulang
                </div>

                <div class="action-description">
                    Absensi saat selesai sekolah
                </div>

            </div>


            <div class="action-arrow">

                <i class="fa fa-arrow-right"></i>

            </div>

        </a>



        <!-- KEMBALI KE LOGIN -->

        <a href="index" class="action-card action-kembali">

            <div class="action-icon">

                <i class="fa fa-undo"></i>

            </div>


            <div class="action-content">

                <div class="action-title">
                    BACK LOGIN
                </div>

                <div class="action-description">
                    Kembali Ke Halaman Login
                </div>

            </div>


            <div class="action-arrow">

                <i class="fa fa-arrow-right"></i>

            </div>

        </a>

    </section>



    <!-- =================================================
         CLOCK
    ================================================== -->

    <section class="clock-container">

        <div class="clock-card">


            <!-- Analog Clock -->

            <div class="analog-clock">

                <div class="clock-hand clock-hour"></div>

                <div class="clock-hand clock-minute"></div>

                <div class="clock-center"></div>

            </div>


            <!-- Digital Clock -->

            <div class="clock-info">

                <div class="digital-time" id="clock">
                    00:00:00
                </div>


                <div class="digital-date">

                    <?= $tanggalIndonesia; ?>

                </div>


                <div class="clock-line"></div>


                <div class="clock-credit">

                    @2026 | SMK YAPPRI SUMEDANG | Encep Hendri Setiawan, S.Kom.

                </div>

            </div>


            <!-- Motto -->

            <div class="motto">

                Sekolah
                <br>
                Berkarakter
                <br>
                Berprestasi

            </div>


        </div>

    </section>

</main>



<!-- =====================================================
     FOOTER
===================================================== -->

<footer class="footer">


    <div class="footer-item">

        <i class="fa fa-graduation-cap"></i>

        <span>
            SMK YAPPRI SUMEDANG
        </span>

    </div>


    <div class="footer-item footer-motto">

        Mendidik dengan Hati, Membangun Masa Depan

    </div>


    <div class="footer-item footer-values">

        <i class="fa fa-shield"></i>

        <span>
            Disiplin &nbsp;•&nbsp;
            Jujur &nbsp;•&nbsp;
            Berprestasi
        </span>

    </div>


</footer>



<script>

/* =========================================================
   DIGITAL CLOCK
========================================================= */

function updateClock() {
    const now = new Date();

    let hour   = String(now.getHours()).padStart(2, '0');
    let minute = String(now.getMinutes()).padStart(2, '0');
    let second = String(now.getSeconds()).padStart(2, '0');

    document.getElementById('clock').textContent = hour + ':' + minute + ':' + second;
}

updateClock();
setInterval(updateClock, 1000);


/* =========================================================
   ANALOG CLOCK
========================================================= */

function updateAnalogClock() {

    const now = new Date();

    const seconds = now.getSeconds();
    const minutes = now.getMinutes();
    const hours = now.getHours() % 12;

    const minuteDeg = minutes * 6 + seconds * 0.1;
    const hourDeg = hours * 30 + minutes * 0.5;

    const minuteHand = document.querySelector('.clock-minute');
    const hourHand = document.querySelector('.clock-hour');

    if (minuteHand) {
        minuteHand.style.transform = 'translateX(-50%) rotate(' + minuteDeg + 'deg)';
    }

    if (hourHand) {
        hourHand.style.transform = 'translateX(-50%) rotate(' + hourDeg + 'deg)';
    }

}

updateAnalogClock();
setInterval(updateAnalogClock, 1000);

</script>

</body>
</html>