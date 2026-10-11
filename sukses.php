<?php
include 'include/koneksi.php';
include 'include/app.php';
$s_karyawan = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from karyawan where nik='$_GET[nik]'");
$karyawan = mysqli_fetch_array($s_karyawan);
$t_karyawan = mysqli_num_rows($s_karyawan);
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

    <!-- Auto Redirect ke Halaman Masuk dalam 2 Detik -->
    <script language="javascript">
        setTimeout("location.href='masuk'", 2000);
    </script>

    <style>
        * {
            box-sizing: border-box;
        }
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #0f2027 0%, #203a43 50%, #2c5364 100%);
            min-height: 100vh;
            color: #fff;
            margin: 0;
            padding: 20px 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .main-container {
            max-width: 650px;
            width: 100%;
            margin: 0 auto;
            padding: 0 15px;
        }
        .app-title {
            text-align: center;
            margin-bottom: 20px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: #2ecc71;
            text-shadow: 0 4px 10px rgba(0,0,0,0.3);
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.3);
            text-align: center;
        }
        .success-icon {
            font-size: 60px;
            color: #2ecc71;
            margin-bottom: 10px;
            animation: pulse 1.5s infinite;
        }
        .user-photo {
            width: 160px;
            height: 160px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #2ecc71;
            box-shadow: 0 6px 20px rgba(46, 204, 113, 0.4);
            margin: 15px auto;
        }
        .user-name {
            font-size: 24px;
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 5px;
        }
        .user-nik {
            font-size: 16px;
            font-weight: 600;
            color: #2ecc71;
            background: rgba(46, 204, 113, 0.15);
            display: inline-block;
            padding: 4px 15px;
            border-radius: 20px;
            margin-bottom: 10px;
        }
        .user-info {
            font-size: 14px;
            color: #bdc3c7;
            margin-bottom: 20px;
        }
        .clock-display {
            border-top: 1px solid rgba(255,255,255,0.15);
            padding-top: 15px;
            margin-top: 15px;
        }
        .clock-digital {
            font-size: 26px;
            font-weight: 700;
            letter-spacing: 2px;
            color: #3498db;
        }
        #Date {
            font-size: 13px;
            color: #bdc3c7;
        }
        .copyright-text {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: rgba(255,255,255,0.6);
        }
    </style>
</head>
<body>

    <div class="main-container">
        <!-- Card Sukses Absensi -->
        <div class="glass-card wow zoomIn">
            <div class="success-icon">
                <i class="fa fa-check-circle"></i>
            </div>
            
            <h2 class="app-title" style="margin: 0;">ABSENSI SUKSES</h2>
            
            <!-- Foto Karyawan/Siswa -->
            <img src="app/images/<?= $karyawan['foto'];?>" class="user-photo" alt="Foto Profile" />
            
            <!-- Detail Karyawan/Siswa -->
            <div class="user-name"><?= $karyawan['nama'];?></div>
            <div class="user-nik">NIK : <?= $karyawan['nik'];?></div>
            
            <div class="user-info">
                <?php 
                    $d_jt = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from jobtitle where kode_jobtitle ='$karyawan[job_title]'")); 
                    $d_a = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from area where kode_area ='$karyawan[area]'")); 
                    echo $d_jt['jobtitle'] . " - " . $d_a['area'];
                ?>
            </div>

            <!-- Tanggal & Jam Absen -->
            <div class="clock-display">
                <div id="Date"></div>
                <div class="clock-digital">
                    <span id="hours">00</span>:<span id="min">00</span>:<span id="sec">00</span>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="copyright-text">
            <p>© 2026 | <?= $app['nama_perusahaan'];?>. All Rights Reserved <img src="images/botom.webp" alt="Bottom Icon" style="height: 15px;"></p>
        </div>
    </div>

    <!-- Script Clock Logic -->
    <script type="text/javascript">
        $(document).ready(function() {
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