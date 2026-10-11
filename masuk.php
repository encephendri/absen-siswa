<?php
include 'include/koneksi.php';
include 'include/app.php';

$s_karyawan = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from karyawan");
$karyawan = mysqli_fetch_array($s_karyawan);
$t_karyawan = mysqli_num_rows($s_karyawan);
$skr = date('Y-m-d');
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title><?= $app['nama_aplikasi'];?> - <?= $app['nama_perusahaan'];?> </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <!-- CSS Standard -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/font-awesome.css" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/clndr.css" type="text/css" />
    <link rel="stylesheet" href="css/master.css">
    <link href="css/fabochart.css" rel="stylesheet" type="text/css">
    <link href="css/animate.css" rel="stylesheet" type="text/css" media="all">

    <!-- JS Standard -->
    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/circliful.js"></script>
    <script src="js/Chart.js"></script>
    <script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
    <script src="js/underscore-min.js"></script>
    <script src="js/moment-2.2.1.js"></script>
    <script src="js/clndr.js"></script>
    <script src="js/site.js"></script>
    <script src="js/d3.min.js"></script>
    <script src="js/xcharts.min.js"></script>
    <script src="js/rainbow.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script>new WOW().init();</script>

    <style>
        * {
            box-sizing: border-box;
        }
        body {
            font-family: 'Poppins', sans-serif;
            background: url('images/bg1.jpeg') no-repeat center center fixed;
            min-height: 100vh;
            color: #fff;
            margin: 0;
            padding: 20px 0;
        }
        .main-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }
        .app-title {
            text-align: center;
            margin-bottom: 25px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: #ffffff;
            text-shadow: 0 4px 10px rgba(0,0,0,0.3);
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            padding: 20px;
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.3);
            margin-bottom: 20px;
            transition: transform 0.3s ease;
        }
        .glass-card:hover {
            transform: translateY(-3px);
        }
        .card-heading {
            text-align: center;
            font-weight: 600;
            border-bottom: 1px solid rgba(255,255,255,0.15);
            padding-bottom: 10px;
            margin-bottom: 15px;
            font-size: 16px;
        }
        
        /* Form Scan */
        .scan-box {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            padding: 20px;
            color: #333;
        }
        .scan-box img.kop {
            width: 100%;
            border-radius: 8px;
            margin-bottom: 15px;
        }
        .scan-title {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            font-size: 18px;
            font-weight: 700;
            color: #1a252f;
            margin-bottom: 15px;
        }
        .scan-input {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #3498db;
            border-radius: 10px;
            font-size: 16px;
            outline: none;
            text-align: center;
            font-weight: 600;
            transition: all 0.3s ease;
            color: #2c3e50;
        }
        .scan-input:focus {
            box-shadow: 0 0 10px rgba(52, 152, 219, 0.5);
            border-color: #2980b9;
        }
        .btn-home {
            background: linear-gradient(45deg, #e74c3c, #c0392b);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 600;
            margin-top: 15px;
            width: 100%;
            transition: background 0.3s;
        }
        .btn-home:hover {
            background: linear-gradient(45deg, #c0392b, #a93226);
            color: white;
        }

        /* Stats Section */
        .stat-card {
            background: rgba(255, 255, 255, 0.15);
            border-radius: 12px;
            padding: 15px;
            margin-bottom: 10px;
        }
        .stat-card h3 {
            margin: 0 0 5px 0;
            font-size: 14px;
            color: #ecf0f1;
        }
        .stat-card p {
            font-size: 24px;
            font-weight: 700;
            margin: 0;
        }
        .progress {
            height: 8px;
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.2);
            margin-top: 8px;
            margin-bottom: 0;
        }
        .progress-bar {
            background-color: #2ecc71;
        }
        .progress-bar-danger {
            background-color: #e74c3c;
        }

        /* Clock Box */
        .clock-display {
            text-align: center;
            padding: 10px 0;
        }
        .clock-digital {
            font-size: 28px;
            font-weight: 700;
            letter-spacing: 2px;
            margin-top: 10px;
        }
        #Date {
            font-size: 14px;
            color: #fcfdfe;
        }

        /* Recent Activity List */
        .post-grid1 {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        .post-grid1:last-child {
            border-bottom: none;
        }
        .post-pic img {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #3498db;
        }
        .post-pic-text b {
            color: #3498db;
            font-size: 13px;
        }
        .post-pic-text p {
            margin: 0;
            font-size: 11px;
            color: #bdc3c7;
        }

        .copyright-text {
            text-align: center;
            margin-top: 25px;
            font-size: 12px;
            color: rgba(255,255,255,0.6);
        }
    </style>
</head>
<body onload="setFocus()">

    <div class="main-container">
        <!-- Title Header -->
        <h2 class="app-title wow fadeInDown"><?= $app['nama_aplikasi'];?></h2>

        <div class="row">
            
            <!-- Kolom Kiri: Jam & Info Waktu -->
            <div class="col-md-4 col-sm-12">
                <div class="glass-card wow fadeInLeft">
                    <div class="card-heading">
                        <i class="fa fa-clock-o"></i> WAKTU SERU
                    </div>
                    <div class="clock-display">
                        <div id="myclock" style="margin: 0 auto;"></div>
                        <div id="Date"></div>
                        <div class="clock-digital">
                            <span id="hours">00</span>:<span id="min">00</span>:<span id="sec">00</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kolom Tengah: Scanner & Statistik -->
            <div class="col-md-4 col-sm-12">
                <div class="scan-box wow fadeInUp">
                    <img src="images/KOPSMK.jpg" class="kop" alt="Kop Sekolah">
                    
                    <div class="scan-title">
                        <img src="images/scan.png" width="30" alt="Scan Icon">
                        <span>ABSEN MASUK</span>
                    </div>

                    <form action="controllers/masuk" name="testForm" method="POST">
                        <input type="text" class="scan-input" onLoad="this.focus();" onChange="document.testForm.submit()" name="nik" placeholder="Silakan Scan Barcode..." autocomplete="off" />
                    </form>

                    <a href="login">
                        <button class="btn-home"><i class="fa fa-home"></i> BACK TO HOME</button>
                    </a>
                </div>

                <!-- Live Progress Statistik -->
                <div class="glass-card style="margin-top: 15px;" wow fadeInUp">
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="stat-card">
                                <h3>Masuk</h3>
                                <?php 
                                    $s_absen = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from absensi where tanggal='$skr' and ijin is NULL order by masuk DESC");
                                    $t_absen = mysqli_num_rows($s_absen); 
                                    $persen_masuk = $t_karyawan > 0 ? number_format($t_absen/$t_karyawan*100,0) : 0;
                                ?>
                                <p><?= $t_absen; ?> <small style="font-size: 12px; color: #2ecc71;"><?= $persen_masuk; ?>%</small></p>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: <?= $persen_masuk; ?>%;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="stat-card">
                                <h3>Absen</h3>
                                <?php 
                                    $sisa = $t_karyawan - $t_absen;
                                    $persen_sisa = $t_karyawan > 0 ? number_format($sisa/$t_karyawan*100,0) : 0;
                                ?>
                                <p><?= $sisa; ?> <small style="font-size: 12px; color: #e74c3c;"><?= $persen_sisa; ?>%</small></p>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" style="width: <?= $persen_sisa; ?>%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kolom Kanan: 5 Absensi Terakhir -->
            <div class="col-md-4 col-sm-12">
                <div class="glass-card wow fadeInRight">
                    <div class="card-heading">
                        <i class="fa fa-history"></i> 5 ABSENSI TERAKHIR
                    </div>
                    <div class="posts-grids">
                        <?php 
                        $s_absen1 = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from absensi where tanggal='$skr' AND masuk!='NULL' order by masuk DESC limit 5");
                        while ($d_absen=mysqli_fetch_array($s_absen1)){ 
                            $peg=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from karyawan where nik='$d_absen[nik]'"));
                        ?>
                        <div class="post-grid1">
                            <div class="post-pic">
                                <img src="app/images/<?= $peg['foto'];?>" alt="User">
                            </div>
                            <div class="post-pic-text">
                                <b><?= $peg['nama'];?></b>
                                <p><?= $peg['lokasi'];?> - <?= $peg['area'];?></p>
                                <p><i class="fa fa-check-circle" style="color:#2ecc71;"></i> Masuk : <strong><?= $d_absen['masuk'];?></strong></p>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                
                <div class="glass-card text-center">
                    <marquee scrollamount="4"><strong>Selamat Datang di Sistem Absensi Mandiri SMK YAPPRI SUMEDANG</strong></marquee>
                </div>
            </div>

        </div>

        <!-- Footer -->
        <div class="copyright-text">
            <p>© 2026 | SMK YAPPRI SUMEDANG | Encep Hendri Setiawan, S.Kom. <img src="images/botom.webp" alt="Bottom Icon" style="height: 15px;"></p>
        </div>
    </div>

    <!-- Script Autofocus & Clock Logic -->
    <script type="text/javascript">
        function setFocus() {
            var field = document.testForm.nik;
            if(field) {
                field.focus();
                field.value = field.value;
                field.focus();
            }
        }

        var intVal, myclock;
        $(window).resize(function(){
            window.location.reload();
        });

        $(document).ready(function(){
            var audioElement = new Audio("");

            $('#myclock').thooClock({
                size: 180,
                showNumerals: true,
                brandText: 'ABSENSI',
                brandText2: 'YAPPRI',
                onEverySecond: function(){}
            });

            var monthNames = [ "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "Nopember", "Desember" ]; 
            var dayNames= ["Minggu","Senin","Selasa","Rabu","Kamis","Jum'at","Sabtu"];

            var newDate = new Date();
            newDate.setDate(newDate.getDate());
            $('#Date').html(dayNames[newDate.getDay()] + ", " + newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + ' ' + newDate.getFullYear());

            setInterval(function() {
                var seconds = new Date().getSeconds();
                $("#sec").html(( seconds < 10 ? "0" : "" ) + seconds);
            }, 1000);
            
            setInterval(function() {
                var minutes = new Date().getMinutes();
                $("#min").html(( minutes < 10 ? "0" : "" ) + minutes);
            }, 1000);
            
            setInterval(function() {
                var hours = new Date().getHours();
                $("#hours").html(( hours < 10 ? "0" : "" ) + hours);
            }, 1000);
        });
    </script>

    <!-- Skills, Skycons & Chart Scripts -->
    <script src="js/bars.js"></script>
    <script src="js/jquery.thooClock.js"></script> 
    <script src="js/skycons.js"></script>
    <script src="js/jquery.graphly.min.js"></script>
    <script src="js/line_graph.js"></script>
    <script src="js/custom_colours.js"></script>
    <script src="js/grouped_graph.js"></script>
    <script src="js/negative_positive_graph.js"></script>
    <script src="js/fabochart.js"></script>

</body> 
</html>