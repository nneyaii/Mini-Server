<?php
$pageTitle = 'Halaman Materi';
$pageDescription = 'Materi Pembelajaran';
$activePage = '';

include 'includes/head.php';?>

<main>  
    <?php include 'includes/navbar.php'; ?>


    <header class="site-header d-flex flex-column justify-content-center align-items-center">
        <div class="container">
            <div class="row justify-content-center align-items-center">


                <div class="col-lg-5 col-12 mb-5">
                    <h2 class="text-white">Materi <br> Pembelajaran</h2>


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

    <!-- PENGANTAR MATERI -->
    <section class="section-padding" id="pengantar">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12 m-auto">
                    <h3 class="mb-4 text">Pengantar Materi Pembelajaran</h3>
                    <p>
                        Materi pembelajaran pada website <strong>Sobat Literasi</strong> disusun untuk membantu siswa SMA memahami berbagai konsep pelajaran secara lebih mudah, sistematis, dan terstruktur. Setiap materi dirancang agar dapat dipelajari secara mandiri maupun sebagai pendukung pembelajaran di sekolah.
                    </p>
                    <p>
                        Materi yang tersedia mencakup berbagai mata pelajaran untuk kelas 10, 11, dan 12, yang disusun berdasarkan kurikulum yang berlaku. Setiap topik dilengkapi dengan penjelasan konsep, contoh soal, serta rangkuman untuk mempermudah pemahaman siswa.
                    </p>
                    <p>
                        Dengan adanya materi ini, diharapkan siswa dapat meningkatkan kemampuan berpikir kritis, memahami konsep secara mendalam, serta lebih siap dalam menghadapi ujian sekolah maupun ujian akhir.
                    </p>
                    <p>
                        <strong>Sobat Literasi</strong> juga menjadi wadah bagi para relawan pendidikan untuk berbagi ilmu dan pengalaman, sehingga materi yang tersedia dapat terus berkembang dan memberikan manfaat bagi lebih banyak pelajar di Indonesia.
                    </p>
                </div>
                
            </div>
        </div>
    </section>

<!-- DATA MATERI -->
<?php
$materi = [
    'kelas10' => [
        [   
            'nama' => 'Pendidikan Agama Islam dan Budi Pekerti', 
            'file' => 'materi/kelas10/agama_islam-kelas10.pdf',
            'img'  => 'images/materi/kelas10-agama_islam.jpeg',
        ],
        [
            'nama' => 'Pendidikan Agama Katolik dan Budi Pekerti', 
            'file' => 'materi/kelas10/agama_katolik-kelas10.pdf',
            'img'  => ''
        ],
        [
            'nama' => 'Pendidikan Agama Kristen dan Budi Pekerti', 
            'file' => 'materi/kelas10/agama_kristen-kelas10.pdf',
            'img'  => ''
        ],
        [
            'nama' => 'Bahasa Indonesia', 
            'file' => 'materi/kelas10/bindo-kelas10.pdf',
            'img'  => ''
        ],
        [
            'nama' => 'Bahasa Inggris', 
            'file' => 'materi/kelas10/bing-kelas10.pdf',
            'img'  => ''
        ],
        [
            'nama' => 'Matematika', 
            'file' => 'materi/kelas10/mtk-kelas10.pdf',
            'img'  => ''
        ],
        [
            'nama' => 'IPA', 
            'file' => 'materi/kelas10/ipa-kelas10.pdf',
            'img'  => ''
        ],
        [
            'nama' => 'IPS', 
            'file' => 'materi/kelas10/ips-kelas10.pdf',
            'img'  => ''
        ],
        [
            'nama' => 'Sejarah', 
            'file' => 'materi/kelas10/sejarah-kelas10.pdf',
        ],
    ],
    'kelas11' => [
        [
            'nama' => 'Pendidikan Agama Islam dan Budi Pekerti', 
            'file' => 'materi/kelas11/agama_islam-kelas11.pdf',
            'img'  => 'images/materi/kelas11-agama_islam.jpeg'
        ],
        ['nama' => 'Pendidikan Agama Katolik dan Budi Pekerti', 'file' => 'materi/kelas11/agama_katolik-kelas11.pdf'],
        ['nama' => 'Pendidikan Agama Kristen dan Budi Pekerti', 'file' => 'materi/kelas11/agama_kristen-kelas11.pdf'],
        ['nama' => 'Bahasa Indonesia', 'file' => 'materi/kelas11/bindo-kelas11.pdf'],
        ['nama' => 'Bahasa Inggris', 'file' => 'materi/kelas11/bing-kelas11.pdf'],
        ['nama' => 'Matematika', 'file' => 'materi/kelas11/mtk-kelas11.pdf'],
        ['nama' => 'Matematika Tingkat Lanjut', 'file' => 'materi/kelas11/mtk_tingkat_lanjut-kelas11.pdf'],
        ['nama' => 'Fisika', 'file' => 'materi/kelas11/fisika-kelas11.pdf'],
        ['nama' => 'Biologi', 'file' => 'materi/kelas11/biologi-kelas11.pdf'],
        ['nama' => 'Ekonomi', 'file' => 'materi/kelas11/ekonomi-kelas11.pdf'],
        ['nama' => 'Pendidikan Pancasila dan Kewarganegaraan', 'file' => 'materi/kelas11/ppkn-kelas11.pdf'],
    ],
    'kelas12' => [
        ['nama' => 'Pendidikan Agama Islam dan Budi Pekerti', 'file' => 'materi/kelas12/agama_islam-kelas12.pdf'],
        ['nama' => 'Pendidikan Agama Katolik dan Budi Pekerti', 'file' => 'materi/kelas12/agama_katolik-kelas12.pdf'],
        ['nama' => 'Pendidikan Agama Kristen dan Budi Pekerti', 'file' => 'materi/kelas12/agama_kristen-kelas12.pdf'],
        ['nama' => 'Bahasa Indonesia', 'file' => 'materi/kelas12/bindo-kelas12.pdf'],
        ['nama' => 'Bahasa Inggris', 'file' => 'materi/kelas12/bing-kelas12.pdf'],
        ['nama' => 'Matematika', 'file' => 'materi/kelas12/mtk-kelas12.pdf'],
        ['nama' => 'Matematika Tingkat Lanjut', 'file' => 'materi/kelas12/mtk_tingkat_lanjut-kelas12.pdf'],
        ['nama' => 'Fisika', 'file' => 'materi/kelas12/fisika-kelas12.pdf'],
        ['nama' => 'Biologi', 'file' => 'materi/kelas12/biologi-kelas12.pdf'],
        ['nama' => 'Ekonomi', 'file' => 'materi/kelas12/ekonomi-kelas12.pdf'],
        ['nama' => 'Sosiologi', 'file' => 'materi/kelas12/sosiologi-kelas12.pdf'],
    ],
];
?>

<!-- TAB KELAS -->
<section class="section-padding">
<div class="container">

<ul class="nav nav-tabs mb-4">
    <li class="nav-item">
        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#kelas10">Kelas 10</button>
    </li>
    <li class="nav-item">
        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#kelas11">Kelas 11</button>
    </li>
    <li class="nav-item">
        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#kelas12">Kelas 12</button>
    </li>
</ul>

<div class="tab-content">

    <!-- KELAS 10 -->
    <div class="tab-pane fade show active" id="kelas10">
        <div class="row">
            <?php foreach ($materi['kelas10'] as $m): ?>
            <div class="col-lg-4 mb-4">
                <div class="card p-3 shadow materi-item"
                     data-file="<?php echo $m['file']; ?>"
                     data-nama="<?php echo $m['nama']; ?>">

                    <h5><?php echo $m['nama']; ?></h5>
                    <p>Klik untuk melihat materi</p>

                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- KELAS 11 -->
    <div class="tab-pane fade" id="kelas11">
        <div class="row">
            <?php foreach ($materi['kelas11'] as $m): ?>
            <div class="col-lg-4 mb-4">
                <div class="card p-3 shadow materi-item"
                     data-file="<?php echo $m['file']; ?>"
                     data-nama="<?php echo $m['nama']; ?>">

                    <h5><?php echo $m['nama']; ?></h5>
                    <p>Klik untuk melihat materi</p>

                </div>


            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- KELAS 12 -->
    <div class="tab-pane fade" id="kelas12">
        <div class="row">
            <?php foreach ($materi['kelas12'] as $m): ?>
            <div class="col-lg-4 mb-4">
                <div class="card p-3 shadow materi-item"
                     data-file="<?php echo $m['file']; ?>"
                     data-nama="<?php echo $m['nama']; ?>">

                    <h5><?php echo $m['nama']; ?></h5>
                    <p>Klik untuk melihat materi</p>

                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

</div>

</div>
</section>

<!-- PREVIEW PDF -->
<section class="section-padding">
<div class="container">

<div id="preview-box" style="display:none;">
    <h3 id="judul-materi"></h3>

    <iframe id="pdf-frame"
            width="100%"
            height="600px"
            style="border-radius:10px; border:1px solid #ddd;">
    </iframe>

    <a id="download-btn" class="btn btn-primary mt-3" download>
        Download PDF
    </a>
</div>

</div>
</section>

<?php include 'includes/footer.php'; ?>

<!-- JAVASCRIPT -->
<script>
document.querySelectorAll('.materi-item').forEach(item => {
    item.addEventListener('click', function() {

        let file = this.getAttribute('data-file');
        let nama = this.getAttribute('data-nama');

        document.getElementById('pdf-frame').src = file;
        document.getElementById('download-btn').href = file;
        document.getElementById('judul-materi').innerText = nama;

        document.getElementById('preview-box').style.display = 'block';

        document.getElementById('preview-box').scrollIntoView({
            behavior: 'smooth'
        });
    });
});
</script>

</main>
