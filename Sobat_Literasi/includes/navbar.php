<?php
// $activePage: 'home', 'news', 'news-detail', 'donate'
$activePage = isset($activePage) ? $activePage : 'home';
?>
<nav class="navbar navbar-expand-lg bg-light shadow-lg">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <img src="images/logo.png" class="logo img-fluid" alt="Kind Heart Charity">
            <span>
                Sobat Literasi
                <small>Layanan Pendidikan & Literasi</small>
            </span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link click-scroll <?php echo $activePage === 'home' ? 'active' : ''; ?>"
                        href="index.php#section_1">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">Tentang Kami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="materi.php">Materi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="relawan.php">Relawan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php#section_6">Kontak</a>
                </li>
                <li class="nav-item ms-3">
                    <a class="nav-link custom-btn custom-border-btn btn <?php echo $activePage === 'donate' ? 'active' : ''; ?>"
                        href="donate.php">Gabung Relawan</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
