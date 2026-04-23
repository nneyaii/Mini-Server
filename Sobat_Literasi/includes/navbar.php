<?php
// $activePage: 'home', 'news', 'news-detail', 'donate'
$activePage = isset($activePage) ? $activePage : 'home';
?>

<style>
/* efek smooth */
.navbar {
    transition: all 0.3s ease;
}

/* efek saat scroll */
.navbar-scrolled {
    background-color: #ffffff !important;
}

/* nav link */
.navbar .nav-link {
    position: relative;
    transition: all 0.3s ease;
}

/* hover warna */
.navbar .nav-link:hover {
    color: #00d0a0 !important;
}

/* garis bawah animasi */
.navbar .nav-link::after {
    content: "";
    position: absolute;
    width: 0%;
    height: 2px;
    left: 0;
    bottom: 0;
    background-color: #00d0a0;
    transition: 0.3s;
}

/* saat hover */
.navbar .nav-link:hover::after {
    width: 100%;
}
</style>

<nav class="navbar navbar-expand-lg bg-light shadow-lg">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <img src="images/logo.png" class="logo img-fluid" alt="Sobat Literasi">
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
                    <a class="nav-link" href="index.php">Beranda</a>
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
                    <a class="custom-btn custom-border-btn btn <?php echo $activePage === 'gabung' ? 'active' : ''; ?>"
                        href="gabung.php">Gabung Relawan</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script>
window.addEventListener("scroll", function () {
    const navbar = document.querySelector(".navbar");

    if (window.scrollY > 50) {
        navbar.classList.add("navbar-scrolled");
    } else {
        navbar.classList.remove("navbar-scrolled");
    }
});
</script>