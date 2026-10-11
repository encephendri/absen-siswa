<?php
include '../include/koneksi.php';

// Memulai session
session_start();
error_reporting(0);

/**
 * Jika tidak login atau sudah login tapi bukan sebagai admin
 * maka akan dibawa kembali ke halaman login.
 */
if (!isset($_SESSION['level'])) {
    header('location:../login');
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">

<?php include 'include/head.php'; ?>

<!-- Google Font & Font Awesome -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

<style>
    /* Styling Umum Modern */
    body {
        font-family: 'Poppins', sans-serif !important;
        background-color: #f4f7f6 !important;
    }

    /* Page Loader Modern */
    .page-loader-wrapper {
        background: rgba(15, 32, 39, 0.9) !important;
        backdrop-filter: blur(8px);
    }
    .page-loader-wrapper p {
        color: #fff !important;
        font-weight: 600;
        letter-spacing: 1px;
        margin-top: 15px;
    }

    /* Search Bar Design */
    .search-bar {
        background: rgba(255, 255, 255, 0.95) !important;
        box-shadow: 0 5px 25px rgba(0, 0, 0, 0.15) !important;
        border-bottom: 3px solid #3f51b5;
    }

    /* Modern Card Layout */
    .card {
        border-radius: 15px !important;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05) !important;
        border: none !important;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        overflow: hidden;
    }
    .card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1) !important;
    }
    .card .header {
        background: #fff;
        border-bottom: 1px solid #f0f0f0 !important;
        padding: 20px 25px !important;
    }
    .card .header h2 {
        font-weight: 700 !important;
        color: #2c3e50 !important;
    }

    /* Top & Sidebar Enhancement */
    .navbar {
        background: linear-gradient(135deg, #3f51b5 0%, #2196f3 100%) !important;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1) !important;
    }
    section.content {
        margin: 100px 15px 15px 315px !important;
        transition: all 0.5s;
    }
    @media (max-width: 1170px) {
        section.content {
            margin: 80px 15px 15px 15px !important;
        }
    }
</style>

<body class="theme-indigo">

    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader pl-size-l">
                <div class="spinner-layer pl-indigo">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Memuat Halaman, Harap Tunggu...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->

    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->

    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="Ketik kata kunci pencarian...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->

    <!-- Top Bar Navigation -->
    <?php include 'include/top_bar.php'; ?>

    <section>
        <!-- Left Sidebar Navigation -->
        <?php include 'include/side_bar_k.php'; ?>
    </section>

    <!-- Main Content Dynamic -->
    <section class="content">
        <?php include 'content/content_karyawan.php'; ?>    
    </section>

    <!-- Include Scripts -->
    <?php include 'include/script.php'; ?>
    <script src="../js/notie/notie.js"></script>
    <script src="../js/notie/notie-init.js"></script>

    <!-- Alert Handler Logic (Hanya Muncul Jika Ada Data GET) -->
    <?php if (isset($_GET['sukses']) && !empty($_GET['sukses'])): ?>
    <script type="text/javascript">
        $(document).ready(function(){
            notie.alert(1, 'Terimakasih! <?= htmlspecialchars(base64_decode($_GET['sukses'])); ?>', 3);
        });
    </script>
    <?php endif; ?>

    <?php if (isset($_GET['error']) && !empty($_GET['error'])): ?>
    <script type="text/javascript">
        $(document).ready(function(){
            notie.alert(3, '<?= htmlspecialchars(base64_decode($_GET['error'])); ?>', 3);
        });
    </script>
    <?php endif; ?>

</body>
</html>