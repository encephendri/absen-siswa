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
    <title><?= $app['nama_aplikasi'];?> - <?= $app['nama_perusahaan'];?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <!-- Bootstrap CSS & Font Awesome -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/font-awesome.css" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/bootstrap.js"></script>

    <!-- Custom CSS Modern UI -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: url('images/sekolah.jpeg') no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            padding: 20px 0;
        }
        .login-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            padding: 30px;
            max-width: 450px;
            width: 100%;
            margin: auto;
            transition: all 0.3s ease;
        }
        .header-kop img {
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        .login-title {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-bottom: 25px;
            color: #1a252f;
            font-weight: 700;
        }
        .login-title img {
            width: 35px;
            height: auto;
        }
        .form-group-custom {
            position: relative;
            margin-bottom: 18px;
        }
        .form-group-custom i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #7f8c8d;
        }
        .form-control-custom {
            width: 100%;
            padding: 12px 15px 12px 45px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            outline: none;
            transition: border-color 0.3s ease;
            font-size: 14px;
        }
        .form-control-custom:focus {
            border-color: #3498db;
        }
        .btn-role {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 10px;
            color: #fff;
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 10px;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        .btn-role:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            color: #fff;
        }
        .btn-siswa {
            background: linear-gradient(45deg, #2ecc71, #27ae60);
        }
        .btn-walikelas {
            background: linear-gradient(45deg, #e67e22, #d35400);
        }
        .btn-admin {
            background: linear-gradient(45deg, #3498db, #2980b9);
        }
        .admin-link {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #7f8c8d;
            text-decoration: none;
            font-size: 13px;
            font-weight: 500;
        }
        .admin-link:hover {
            color: #2c3e50;
            text-decoration: underline;
        }
        .copyright-text {
            text-align: center;
            color: rgba(255, 255, 255, 0.7);
            font-size: 12px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<body background="images/sekolah.png"></body>
    <div class="container">
        <div class="login-card">
            
            <!-- Header Gambar Kop -->
            <div class="header-kop text-center">
                <img src="images/KOPSMK.jpg" class="img-responsive" alt="Kop SMK">
            </div>

            <!-- Judul Form -->
            <div class="login-title">
                <img src="images/scan.png" alt="Scan Icon">
                <h4 style="margin: 0; font-weight: 700;">PANEL LOGIN ABSENSI</h4>
            </div>

            <!-- Form Login -->
            <form method="POST" action="controllers/login_proses.php">
                
                <div class="form-group-custom">
                    <i class="fa fa-user"></i>
                    <input type="text" class="form-control-custom" name="username" placeholder="Username" required autocomplete="off">
                </div>

                <div class="form-group-custom">
                    <i class="fa fa-lock"></i>
                    <input type="password" class="form-control-custom" name="password" placeholder="Password" required>
                </div>

                <!-- Pilihan Tombol Login Akses Berbeda (Kirim Parameter 'level') -->
                <button type="submit" name="level" value="siswa" class="btn-role btn-siswa">
                    <i class="fa fa-graduation-cap"></i> Login OrangTua / Siswa
                </button>

                <button type="submit" name="level" value="wali_kelas" class="btn-role btn-walikelas">
                    <i class="fa fa-user-circle"></i> Login Wali Kelas
                </button>

                <button type="submit" name="level" value="admin" class="btn-role btn-admin">
                    <i class="fa fa-shield"></i> Login Administrator
                </button>

                <a href="login" class="admin-link">
                    <i class="fa fa-sign-in"></i> Masuk Sebagai Admin Utama
                </a>
            </form>
        </div>

        <div class="copyright-text">
            <p>© 2026 | SMK YAPPRI SUMEDANG | Encep Hendri Setiawan, S.Kom.</p>
        </div>
    </div>

</body> 
</html>