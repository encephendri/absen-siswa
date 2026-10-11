<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sistem Absensi Siswa</title>
    
    <!-- Google Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet">
    <link href="css/themes/all-themes.css" rel="stylesheet" />

    <style>
        body { background-color: #e9e9e9; font-family: 'Roboto', sans-serif; }
        .info-box-3 { border-radius: 4px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); border: none; margin-bottom: 20px; }
        .card { border-radius: 4px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); border: none; margin-bottom: 25px; }
        .header-title-custom { font-size: 18px; font-weight: bold; color: #444; margin-bottom: 15px; margin-top: 10px; }
    </style>
</head>
<body class="theme-red">

    <section class="content" style="margin: 20px;">
        <div class="container-fluid">
            
            <!-- Header Tanggal -->
            <div class="row clearfix">
                <div class="block-header" style="display: flex; align-items: center; margin-bottom: 15px;">
                    <i class="material-icons" style="font-size: 24px; margin-right: 8px; color: #555;">date_range</i>
                    <h2 style="font-size: 16px; font-weight: 500; color: #333; margin: 0;">
                        <?php 
                            // Tanggal sesuai contoh gambar: Minggu, 11 Oct 2026[cite: 4]
                            $tanggal = date('d M Y');
                            $day = date('D', strtotime($tanggal));
                            $dayList = array(
                                'Sun' => 'Minggu', 'Mon' => 'Senin', 'Tue' => 'Selasa',
                                'Wed' => 'Rabu', 'Thu' => 'Kamis', 'Fri' => 'Jumat', 'Sat' => 'Sabtu'
                            );
                            echo $dayList[$day].", ".$tanggal;
                        ?>
                    </h2>
                </div>

                <!-- 4 Kotak Statistik Atas[cite: 4] -->
                <div class="row">
                    <!-- SISWA AKTIF -->
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box-3 bg-blue hover-zoom-effect">
                            <div class="icon"><i class="material-icons">people</i></div>
                            <div class="content">
                                <div class="text">SISWA AKTIF</div>
                                <div class="number"><?php 
                                    $s_karyawan = mysqli_query($absen["___mysqli_ston"], "SELECT * from karyawan");
                                    $t_karyawan = mysqli_num_rows($s_karyawan);
                                    echo $t_karyawan;
                                ?></div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- SISWA MASUK -->
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box-3 bg-green hover-zoom-effect">
                            <div class="icon"><i class="material-icons">check_box</i></div>
                            <div class="content">
                                <div class="text">SISWA MASUK</div>
                                <div class="number"><?php 
                                    $skr = date('Y-m-d');
                                    $s_absen = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from absensi where tanggal='$skr' and ijin is NULL order by masuk DESC");
                                    $t_absen = mysqli_num_rows($s_absen); echo $t_absen; 
                                ?></div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- SISWA TIDAK MASUK -->
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box-3 bg-red hover-zoom-effect">
                            <div class="icon"><i class="material-icons">highlight_off</i></div>
                            <div class="content">
                                <div class="text">SISWA TIDAK MASUK</div>
                                <div class="number"><?= $t_karyawan - $t_absen;?></div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- SISWA PULANG -->
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box-3 bg-cyan hover-zoom-effect">
                            <div class="icon"><i class="material-icons">home</i></div>
                            <div class="content">
                                <div class="text">SISWA PULANG</div>
                                <div class="number"><?php 
                                    $s_pulang = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from absensi where tanggal='$skr' AND pulang !='0' order by pulang DESC");
                                    $t_pulang = mysqli_num_rows($s_pulang); echo $t_pulang; 
                                ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Judul Sistem Absensi[cite: 4] -->
            <div class="row clearfix">
                <div class="block-header">
                    <h3 class="header-title-custom">Sistem Absensi Siswa SMK YAPPRI SUMEDANG</h3>
                </div>
                <div class="row">
                    
                    <!-- REKAP MASUK PER KELAS[cite: 4] -->
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="card" style="border-top: 3px solid #4CAF50;">
                            <div class="header" style="background: #fff; padding: 15px; border-bottom: 1px solid #eee; text-align: center;">
                                <h2 style="color: #4CAF50; font-weight: bold; font-size: 14px; margin: 0;">REKAP MASUK PER KELAS</h2>
                            </div>
                            <div class="body" style="padding: 15px;">
                                <ul class="list-group" style="margin-bottom: 0;">
                                    <?php
                                    $s_area = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from area");
                                    while ($d_area = mysqli_fetch_array($s_area)){
                                        $d_masuk = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from absensi,karyawan where absensi.nik= karyawan.nik AND karyawan.area='$d_area[kode_area]' AND absensi.tanggal='$skr' AND absensi.ijin is NULL"));
                                    ?>
                                    <li class="list-group-item" style="display: flex; justify-content: space-between; align-items: center; border: 1px solid #f0f0f0; margin-bottom: 5px; border-radius: 3px;">
                                        <span style="font-weight: bold; color: #333;"><?php echo strtoupper($d_area['area']);?></span>
                                        <span class="badge" style="background-color: #e8f5e9; color: #4CAF50; font-weight: bold; padding: 5px 12px; border-radius: 12px; border: 1px solid #c8e6c9;">
                                            <?php echo $d_masuk; ?> orang
                                        </span>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <!-- REKAP TIDAK MASUK PER KELAS[cite: 4] -->
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="card" style="border-top: 3px solid #F44336;">
                            <div class="header" style="background: #fff; padding: 15px; border-bottom: 1px solid #eee; text-align: center;">
                                <h2 style="color: #F44336; font-weight: bold; font-size: 14px; margin: 0;">REKAP TIDAK MASUK PER KELAS</h2>
                            </div>
                            <div class="body" style="padding: 15px;">
                                <ul class="list-group" style="margin-bottom: 0;">
                                    <?php
                                    $s_area1 = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from area");
                                    while ($d_area1 = mysqli_fetch_array($s_area1)){
                                        $d_masuk1 = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from absensi,karyawan where absensi.nik= karyawan.nik AND karyawan.area='$d_area1[kode_area]' AND absensi.tanggal='$skr' AND absensi.ijin is NULL"));
                                        $d_total = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from karyawan where area='$d_area1[kode_area]'"));
                                        $t_tdk_masuk = $d_total - $d_masuk1;
                                    ?>
                                    <li class="list-group-item" style="display: flex; justify-content: space-between; align-items: center; border: 1px solid #f0f0f0; margin-bottom: 5px; border-radius: 3px;">
                                        <span style="font-weight: bold; color: #333;"><?php echo strtoupper($d_area1['area']);?></span>
                                        <span class="badge" style="background-color: #ffebee; color: #F44336; font-weight: bold; padding: 5px 12px; border-radius: 12px; border: 1px solid #ffcdd2;">
                                            <?php echo $t_tdk_masuk; ?> orang
                                        </span>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Tabel Data Absensi Lengkap[cite: 4] -->
            <div class="row clearfix">
                <div class="card">
                    <div class="header" style="background: #fff; padding: 15px 20px; border-bottom: 1px solid #eee; display: flex; align-items: center; gap: 8px;">
                        <i class="material-icons" style="color: #2196F3;">tab</i>
                        <h2 style="font-weight: bold; color: #333; font-size: 15px; margin: 0;">DATA ABSENSI LENGKAP</h2>
                    </div>
                    <div class="body" style="padding: 15px;">
                        
                        <!-- Tombol Export & Search (Visual UI Sesuai Gambar)[cite: 4] -->
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px; flex-wrap: wrap; gap: 10px;">
                            <div style="display: flex; gap: 5px;">
                                <button class="btn btn-default btn-sm waves-effect" style="background: #607d8b; color: #fff;">Copy</button>
                                <button class="btn btn-default btn-sm waves-effect" style="background: #607d8b; color: #fff;">CSV</button>
                                <button class="btn btn-default btn-sm waves-effect" style="background: #607d8b; color: #fff;">Excel</button>
                                <button class="btn btn-default btn-sm waves-effect" style="background: #607d8b; color: #fff;">PDF</button>
                                <button class="btn btn-default btn-sm waves-effect" style="background: #607d8b; color: #fff;">Print</button>
                            </div>
                            <div style="display: flex; align-items: center; gap: 8px;">
                                <span style="font-size: 13px; color: #555;">Search:</span>
                                <input type="text" class="form-control input-sm" style="width: 180px; display: inline-block;" />
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable" style="margin-bottom: 0;">
                                <thead>
                                    <tr style="background-color: #f9f9f9; color: #333; font-size: 12px;">
                                        <th>NISN ↕</th>
                                        <th>Nama ↕</th>
                                        <th>Status Siswa ↕</th>
                                        <th>Lokasi ↕</th>
                                        <th>Area ↕</th>
                                        <th>SubArea ↕</th>
                                        <th>Tanggal ↕</th>
                                        <th>Jam Masuk ↕</th>
                                        <th>Jam Pulang ↕</th>
                                        <th>Jam Sekolah ↕</th>
                                        <th>Aksi ↕</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $start_date = isset($_GET['start_date']) ? $_GET['start_date'] : $skr;
                                        $end_date = isset($_GET['end_date']) ? $_GET['end_date'] : $skr;
                                        $filter_area = isset($_GET['area']) ? $_GET['area'] : '';

                                        $s_absen = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM absensi,karyawan WHERE absensi.nik=karyawan.nik AND tanggal BETWEEN '$start_date' AND '$end_date' AND karyawan.area LIKE '%$filter_area%'");
                                        
                                        if($s_absen && mysqli_num_rows($s_absen) > 0){
                                            while ($d_absen = mysqli_fetch_array($s_absen)){
                                    ?>
                                        <tr>
                                            <td><?= $d_absen['nik'];?></td>
                                            <td><?= $d_absen['nama'];?></td>
                                            <td><?= $d_absen['job_title'];?></td>
                                            <td><?= $d_absen['lokasi'];?></td>
                                            <td>
                                                <?php 
                                                    $a = $d_absen['area']; 
                                                    $d_a = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from area where kode_area ='$a'")); 
                                                    echo isset($d_a['area']) ? $d_a['area'] : '';
                                                ?>
                                            </td>
                                            <td><?= $d_absen['sub_area'];?></td>
                                            <td><?= $d_absen['tanggal'];?></td>
                                            <td><?= $d_absen['masuk'];?></td>
                                            <td><?= $d_absen['pulang'];?></td>
                                            <td>
                                                <?php 
                                                    $hourdiff = round((strtotime($d_absen['pulang']) - strtotime($d_absen['masuk']))/3600, 1);
                                                    echo $hourdiff;
                                                ?>
                                            </td>   
                                            <td style="text-align: center;">
                                                <?php 
                                                    $session_area = isset($_SESSION['area']) ? $_SESSION['area'] : 'all';
                                                    if($session_area == 'all' || $a == $session_area){
                                                ?>
                                                <a class="pilih_absen" data-toggle="modal" data-target="#edit_absen" p1="<?= $d_absen['nik'];?>" p2="<?= $d_absen['masuk'];?>" p3="<?= $d_absen['pulang'];?>" p4="<?= $d_absen['tanggal'];?>">
                                                    <button type="button" class="btn bg-blue btn-xs">Edit</button>
                                                </a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php 
                                            }
                                        } else {
                                            // Teks sesuai gambar saat data kosong[cite: 4]
                                            echo '<tr><td colspan="11" style="padding: 15px; color: #555;">No data available in table</td></tr>';
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Scripts -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.js"></script>
    <script src="plugins/node-waves/waves.js"></script>
    <script src="js/admin.js"></script>
</body>
</html>