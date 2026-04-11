<?php
$pageTitle = 'Tentang Kami';
$pageDescription = 'Tentang Sobat Literasi';
$activePage = 'about';

include 'includes/head.php';
?>

<main>
<?php include 'includes/navbar.php'; ?>

<!-- HERO ABOUT -->
<section class="about-hero section-padding">
<div class="container">
<div class="row align-items-center">

<!-- KIRI (TEXT) -->
<div class="col-lg-6">

    <small class="text-muted">TENTANG KAMI</small>

    <h2 class="mb-3">
        Sobat Literasi <br> Untuk Generasi Cerdas
    </h2>

    <p>
        <strong>Sobat Literasi</strong> adalah platform volunteer pendidikan yang bergerak di bidang literasi dan pembelajaran untuk siswa SMA. Website ini menjadi wadah bagi relawan untuk berbagi ilmu, materi pembelajaran, serta artikel edukatif yang bermanfaat.
    </p>

    <p>
        <strong>Sobat Literasi</strong> bertujuan membantu siswa dalam memahami materi pelajaran dengan lebih mudah, sekaligus meningkatkan minat baca dan kemampuan literasi di kalangan pelajar.
    </p>

    <div class="row mt-4">

        <div class="col-6">
            <h5>Visi</h5>
            <p>Menjadi platform pendidikan berbasis volunteer yang mampu meningkatkan kualitas literasi dan pembelajaran siswa SMA.</p>
        </div>

        <div class="col-6">
            <h5>Misi</h5>
            <p>1. Menyediakan materi pembelajaran yang lengkap dan mudah dipahami</p>
            <p>2. Meningkatkan minat baca dan budaya literasi siswa</p>
            <p>3. Menjadi wadah bagi relawan untuk berbagi ilmu</p>
        </div>

    </div>

</div>

<!-- KANAN (GAMBAR OVAL) -->
<div class="col-lg-6 text-center">

    <div class="image-group">
        <img src="images/about/1.png" class="img-oval">
        <img src="images/about/2.png" class="img-oval">
        <img src="images/about/3.png" class="img-oval">
    </div>

</div>

</div>
</div>
</section>

<!-- ANGGOTA -->
<section class="section-padding">
<div class="container">

<h2 class="text-center mb-5">Tim Sobat Literasi</h2>

<div class="team-grid text-center">

<!-- CARD -->
    <div class="team-card">
        <img src="images/anggota/vinno.png" class="team-img">
        <h5>Vinno</h5>
        <p>Leader - Server Administrator</p>
        <small>Memimpin dan mengatur tim.</small>
    </div>

    <div class="team-card">
        <img src="images/anggota/azriel.png" class="team-img">
        <h5>Azriel</h5>
        <p>Server Administrator</p>
        <small>Mengelola server.</small>
    </div>

    <div class="team-card">
        <img src="images/anggota/aini.png" class="team-img">
        <h5>Aini</h5>
        <p>Web Developer</p>
        <small>Mengembangkan website.</small>
    </div>

    <div class="team-card">
        <img src="images/anggota/figaa.jpg" class="team-img">
        <h5>Figa</h5>
        <p>Web Developer</p>
        <small>Mengembangkan website.</small>
    </div>

    <div class="team-card">
        <img src="images/anggota/faizan.png" class="team-img">
        <h5>Faizan</h5>
        <p>Testing</p>
        <small>Menguji fitur website.</small>
    </div>

</div>

</div>
</section>

<?php include 'includes/footer.php'; ?>
</main>


<!-- CSS -->
<style>
/* ================= HERO ================= */
.about-hero {
    background: #f8fbff;
}

.about-hero h2 {
    font-weight: 600;
}

.about-hero p {
    color: #555;
    line-height: 1.7;
}

.about-hero h5 {
    margin-bottom: 10px;
}

.about-hero .col-6 p {
    font-size: 14px;
}

/* ================= GAMBAR OVAL ================= */
.image-group {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 20px;
}

.img-oval {
    width: 140px;
    height: 320px;
    object-fit: cover;
    border-radius: 80px;
    transition: 0.3s;
}

/* tengah lebih besar */
.img-oval:nth-child(2) {
    transform: scale(1.1);
}

/* hover */
.img-oval:hover {
    transform: scale(1.05);
}

/* ================= TEAM GRID ================= */
.team-grid {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: 25px;
}

/* ================= TEAM CARD ================= */
.team-card {
    background: #fff;
    padding: 15px;
    border-radius: 20px;
    transition: 0.3s;
    box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    height: 100%;
}

.team-card:hover {
    transform: translateY(-6px);
}

.team-img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    border-radius: 15px;
    margin-bottom: 15px;
}

.team-card h5 {
    margin-bottom: 5px;
    font-size: 16px;
}

.team-card p {
    margin-bottom: 5px;
    color: #5c6f7c;
    font-size: 14px;
}

.team-card small {
    color: #777;
    font-size: 13px;
}

/* ================= RESPONSIVE ================= */

/* Tablet */
@media (max-width: 992px) {

    .team-grid {
        grid-template-columns: repeat(3, 1fr);
    }

    .img-oval {
        height: 260px;
    }
}

/* Mobile */
@media (max-width: 768px) {

    .image-group {
        flex-direction: column;
        gap: 10px;
    }

    .img-oval {
        width: 80%;
        height: 220px;
    }

    .team-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .team-img {
        height: 160px;
    }
}

/* HP kecil */
@media (max-width: 480px) {

    .team-grid {
        grid-template-columns: 1fr;
    }
}
</style>