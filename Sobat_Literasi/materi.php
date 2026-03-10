<?php
$pageTitle = 'Halaman Materi';
$pageDescription = 'Materi Pembelajaran';
$activePage = '';

include 'includes/head.php';


// Data CAUSES
$causes = [
    [
        'title' => 'Kelas 10 - Fondasi Ilmu',
        'desc'  => 'Kumpulan materi pembelajaran kelas 10 lengkap per mata pelajaran untuk memperkuat dasar akademik.',
        'img'   => 'images/causes/1.png',
    ],
    [
        'title' => 'Kelas 11 - Pendalaman Konsep',
        'desc'  => 'Materi lanjutan yang lebih mendalam untuk membantu pemahaman konsep dan persiapan ujian.',
        'img'   => 'images/causes/2.png',
    ],
    [
        'title' => 'Kelas 12 - Persiapan Ujian',
        'desc'  => 'Materi pembelajaran lengkap untuk persiapan kelulusan dan ujian akhir dengan pembahasan terstruktur.',
        'img'   => 'images/causes/3.png',
    ],
];
?>

<main>

    <?php include 'includes/navbar.php'; ?>

    <header class="site-header d-flex flex-column justify-content-center align-items-center">
        <div class="container">
            <div class="row justify-content-center align-items-center">

                <div class="col-lg-5 col-12 mb-5">
                    <h2 class="text-white">Materi <br> Pembelajaran</h2>
                    <div class="d-flex align-items-center mt-5">
                        <a href="#topics-detail" class="btn custom-border-btn smoothscroll">
                            Read More
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-5 col-12">
                    <div class="topics-detail-block bg-white shadow-lg">
                        <img src="images/topics/9.png"
                            class="topics-detail-block-image img-fluid">
                    </div>
                </div>

            </div>
        </div>
    </header>


    <section class="topics-detail-section section-padding" id="topics-detail">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12 m-auto">
                    <h3 class="mb-4">Pengantar Materi Pembelajaran</h3>

                    <p>Materi pembelajaran yang tersedia di website <strong>Sobat Literasi</strong> disusun untuk membantu siswa SMA memahami berbagai konsep pelajaran secara lebih mudah dan terstruktur. Melalui materi ini, siswa dapat mempelajari kembali topik-topik penting yang diajarkan di sekolah serta memperdalam pemahaman mereka secara mandiri.</p>
                    <p>Setiap materi disusun berdasarkan kurikulum pembelajaran SMA dan dilengkapi dengan penjelasan yang jelas, contoh soal, serta rangkuman konsep utama. Dengan adanya materi ini, diharapkan siswa dapat meningkatkan kemampuan berpikir kritis, memahami konsep secara lebih mendalam, serta mempersiapkan diri menghadapi ujian.</p>
                    <p>Website ini juga menjadi wadah bagi relawan pendidikan untuk berbagi ilmu dan pengalaman dalam bidang pembelajaran. Dengan kontribusi dari para relawan, materi yang tersedia dapat terus berkembang dan memberikan manfaat bagi lebih banyak siswa.</p>
                    <p><strong>Sobat Literasi</strong> berkomitmen untuk mendukung peningkatan budaya belajar dan literasi di kalangan pelajar melalui penyediaan materi pembelajaran yang mudah diakses, informatif, dan bermanfaat.</p>


  <!-- CAUSES SECTION -->
    <section class="section-padding" id="section_3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12 text-center mb-4">
                    <h2>Materi Pembelajaran</h2>
                </div>

                <?php foreach ($causes as $cause): ?>
                <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                    <div class="custom-block-wrap">
                        <img src="<?php echo $cause['img']; ?>" class="custom-block-image img-fluid" alt="">
                        <div class="custom-block">
                            <div class="custom-block-body">
                                <h5 class="mb-3"><?php echo htmlspecialchars($cause['title']); ?></h5>
                                <p><?php echo htmlspecialchars($cause['desc']); ?></p>
                            </div>
                            <a href="materi.php" class="custom-btn btn">Materi</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>


                    <blockquote>
                        Ilmu akan lebih bermakna ketika dibagikan kepada orang lain.
                    </blockquote>

                    <div class="row my-4">
                        <div class="col-lg-6 col-md-6 col-12">
                            <img src="images/topics/10.png"
                                class="topics-detail-block-image img-fluid">
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 mt-4 mt-lg-0 mt-md-0">
                            <img src="images/topics/8.png"
                                class="topics-detail-block-image img-fluid">
                        </div>
                    </div>

                                    <h3>Penjelasan Peran Relawan</h3>
                    <p>
                        Relawan Sobat Literasi berperan sebagai kontributor ilmu yang membantu 
                        menyediakan materi pembelajaran untuk dibagikan kepada masyarakat.
                    </p>

                    <ul>
                        <li>Membuat materi pembelajaran yang informatif.</li>
                        <li>Berbagi pengetahuan melalui artikel atau rangkuman.</li>
                        <li>Mengirimkan materi dalam bentuk PDF atau dokumen.</li>
                        <li>Membantu meningkatkan akses belajar melalui konten edukatif.</li>
                    </ul>



<?php include 'includes/footer.php'; ?>