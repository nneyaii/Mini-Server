<?php
$pageTitle       = 'Sobat Literasi';
$pageDescription = 'Sobat Literasi';
$activePage      = 'home';

include 'includes/head.php';

// Data causes
$causes = [
    [
        'title'    => 'Kelas 10 - Fondasi Ilmu',
        'desc'     => 'Kumpulan materi pembelajaran kelas 10 lengkap per mata pelajaran untuk memperkuat dasar akademik.',
        'img'      => 'images/causes/1.png',
    ],
    [
        'title'    => 'Kelas 11 - Pendalaman Konsep',
        'desc'     => 'Materi lanjutan yang lebih mendalam untuk membantu pemahaman konsep dan persiapan ujian.',
        'img'      => 'images/causes/2.png',

    ],
    [
        'title'    => 'Kelas 12 - Persipaan Ujian',
        'desc'     => 'Materi pembelajaran lengkap untuk persiapan kelulusan dan ujian akhir dengan pembahasan terstruktur.',
        'img'      => 'images/causes/3.png',

    ],
];

// Data testimonial
$testimonials = [
    ['quote' => 'Tampilannya bersih dan nyaman dibaca. Materi literasinya juga tersusun rapi, jadi enak dipelajari.', 'name' => 'Aini',  'role' => 'Pelajar SMA',         'avatar' => 'images/avatar/portrait-beautiful-young-woman-standing-grey-wall.jpg'],
    ['quote' => 'Website Sobat Literasi sangat informatif dan mudah digunakan. Saya jadi cepat menemukan informasi program dan cara mendaftar sebagai relawan.',      'name' => 'Vinno', 'role' => 'Relawan',      'avatar' => 'images/avatar/portrait-young-redhead-bearded-male.jpg'],
    ['quote' => 'Saya suka karena informasinya lengkap, mulai dari kegiatan sampai kontak yang bisa dihubungi. Sangat membantu!', 'name' => 'Figa',   'role' => 'Pelajar SMA',      'avatar' => 'images/avatar/pretty-blonde-woman-wearing-white-t-shirt.jpg'],
    ['quote' => 'Website ini memudahkan saya mendapatkan informasi tentang program literasi tanpa harus bertanya langsung. Praktis dan jelas.',      'name' => 'Azriel',    'role' => 'Pelajar SMA', 'avatar' => 'images/avatar/studio-portrait-emotional-happy-funny.jpg'],
];


// Handle contact form
$contactSuccess = false;
$contactErrors  = [];
$contactData    = ['first_name' => '', 'last_name' => '', 'email' => '', 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['first-name'])) {
    $contactData['first_name'] = htmlspecialchars(trim($_POST['first-name'] ?? ''));
    $contactData['last_name']  = htmlspecialchars(trim($_POST['last-name'] ?? ''));
    $contactData['email']      = htmlspecialchars(trim($_POST['email'] ?? ''));
    $contactData['message']    = htmlspecialchars(trim($_POST['message'] ?? ''));

    if (empty($contactData['first_name'])) $contactErrors['first_name'] = 'Nama depan wajib diisi.';
    if (empty($contactData['last_name']))  $contactErrors['last_name']  = 'Nama belakang wajib diisi.';
    if (empty($contactData['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
                                           $contactErrors['email']      = 'Email tidak valid.';
    if (empty($contactData['message']))    $contactErrors['message']    = 'Pesan wajib diisi.';

    if (empty($contactErrors)) {
        // Proses simpan/kirim email di sini
        $contactSuccess = true;
        $contactData    = ['first_name' => '', 'last_name' => '', 'email' => '', 'message' => ''];
    }
}
?>

<?php include 'includes/topbar.php'; ?>
<?php include 'includes/navbar.php'; ?>

<main>

    <!-- HERO SECTION -->
    <section class="hero-section hero-section-full-height">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-12 p-0">
                    <div id="hero-slide" class="carousel carousel-fade slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <?php
                            $slides = [
                                ['img' => 'images/slide/3.jpeg', 'title' => 'Belajar',      'caption' => '"Petualangan Belajar Dimulai Disini!"'],
                                ['img' => 'images/slide/1.jpeg', 'title' => 'Berkembang',    'caption' => '"Belajar bukan hanya memahami, tapi juga bertumbuh."'],
                                ['img' => 'images/slide/4.jpeg', 'title' => 'Berprestasi',  'caption' => '"Persiapan hari ini menentukan keberhasilan esok."'],
                            ];
                            foreach ($slides as $i => $slide):
                            ?>
                            <div class="carousel-item <?php echo $i === 0 ? 'active' : ''; ?>">
                                <img src="<?php echo $slide['img']; ?>" class="carousel-image img-fluid" alt="">
                                <div class="carousel-caption d-flex flex-column justify-content-end">
                                    <h1><?php echo $slide['title']; ?></h1>
                                    <p><?php echo $slide['caption']; ?></p>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#hero-slide" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#hero-slide" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- WELCOME SECTION -->
    <section class="section-padding" id="section_2">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-12 text-center mx-auto">
                    <h2 class="mb-5">Selamat Datang di Sobat Literasi</h2>
                </div>

                <?php
                $features = [
                    ['img' => 'images/icons/hands.png',       'text' => 'Relawan <strong>Pendidikan</strong>'],
                    ['img' => 'images/icons/book.png',       'text' => '<strong>Materi</strong> Terstruktur'],
                    ['img' => 'images/icons/artikel.png',     'text' => 'Artikel <strong>Edukatif</strong>'],
                    ['img' => 'images/icons/dld.png', 'text' => '<strong>Unduh PDF</strong> Gratis'],
                ];
                foreach ($features as $feat):
                ?>
                <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                    <div class="featured-block d-flex justify-content-center align-items-center">
                        <a class="d-block">
                            <img src="<?php echo $feat['img']; ?>" class="featured-block-image img-fluid" alt="">
                            <p class="featured-block-text"><?php echo $feat['text']; ?></p>
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>


    <!-- CTA SECTION -->
    <section class="cta-section section-padding section-bg">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-5 col-12 ms-auto">
                    <h2 class="mb-0">Gerakan Literasi untuk<br> Generasi Cerdas</h2>
                </div>
                <div class="col-lg-5 col-12">
                    <a href="relawan.php" class="custom-btn btn smoothscroll">Menjadi Relawan</a>
                </div>
            </div>
        </div>
    </section>


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

    <!-- NEWS SECTION -->
    <section class="news-section section-padding" id="section_5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12 mb-5">
                    <h2>Artikel</h2>
                </div>

                <div class="col-lg-7 col-12">
                    <?php
                    $latestNews = [
                        [
                            'img'        => 'images/news/1.png',
                            'categories' => ['Tips Belajar Siswa', 'Strategi Lulus Ujian'],
                            'date'       => '3 Mei, 2026',
                            'author'     => 'Admin',
                            'comments'   => 32,
                            'title'      => 'Pentingnya Literasi Digital untuk Pelajar SMA',
                            'body'       => 'Di era digital, kebiasaan membaca tidak hanya dilakukan melalui buku cetak, tetapi juga melalui berbagai media digital. Literasi digital membantu siswa SMA memanfaatkan teknologi untuk membaca, mencari informasi, dan menambah wawasan secara lebih luas.',
                        ],
                        [
                            'img'        => 'images/news/2.png',
                            'categories' => ['Literasi', 'Etika',],
                            'date'       => '10 Februari, 2026',
                            'author'     => 'Admin',
                            'comments'   => 35,
                            'title'      => 'Literasi Digital dan Etika Bermedia Sosial',
                            'body'       => 'Media sosial telah menjadi bagian dari kehidupan sehari-hari siswa SMA. Namun, penggunaan media sosial perlu disertai dengan literasi digital dan etika agar siswa dapat menggunakan teknologi secara bijak, bertanggung jawab, serta terhindar dari dampak negatif di dunia digital.',
                    ]];

                    foreach ($latestNews as $i => $news):
                    ?>
                    <div class="news-block <?php echo $i > 0 ? 'mt-3' : ''; ?>">
                        <div class="news-block-top">
                            <a href="news-detail.php">
                                <img src="<?php echo $news['img']; ?>" class="news-image img-fluid" alt="">
                            </a>
                            <div class="news-category-block">
                                <?php foreach ($news['categories'] as $j => $cat): ?>
                                <a href="#" class="category-block-link"><?php echo htmlspecialchars($cat); ?><?php echo $j < count($news['categories'])-1 ? ',' : ''; ?></a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="news-block-info">
                            <div class="d-flex mt-2">
                                <div class="news-block-date">
                                    <p><i class="bi-calendar4 custom-icon me-1"></i><?php echo $news['date']; ?></p>
                                </div>
                                <div class="news-block-author mx-5">
                                    <p><i class="bi-person custom-icon me-1"></i>By <?php echo $news['author']; ?></p>
                                </div>
                                <div class="news-block-comment">
                                    <p><i class="bi-chat-left custom-icon me-1"></i><?php echo $news['comments']; ?> Comments</p>
                                </div>
                            </div>
                            <div class="news-block-title mb-2">
                                <h4><a href="news-detail.php" class="news-block-title-link"><?php echo htmlspecialchars($news['title']); ?></a></h4>
                            </div>
                            <div class="news-block-body">
                                <p><?php echo htmlspecialchars($news['body']); ?></p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>

                <div class="col-lg-4 col-12 mx-auto">
                    <?php include 'includes/sidebar.php'; ?>
                </div>
            </div>
        </div>
    </section>


    <!-- TESTIMONIAL SECTION -->
    <section class="testimonial-section section-padding section-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12 mx-auto">
                    <h2 class="mb-lg-3">Cerita Sobat Literasi</h2>

                    <div id="testimonial-carousel" class="carousel carousel-fade slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <?php foreach ($testimonials as $i => $t): ?>
                            <div class="carousel-item <?php echo $i === 0 ? 'active' : ''; ?>">
                                <div class="carousel-caption">
                                    <h4 class="carousel-title"><?php echo htmlspecialchars($t['quote']); ?></h4>
                                    <small class="carousel-name">
                                        <span class="carousel-name-title"><?php echo $t['name']; ?></span>,
                                        <?php echo $t['role']; ?>
                                    </small>
                                </div>
                            </div>
                            <?php endforeach; ?>

                            <ol class="carousel-indicators">
                                <?php foreach ($testimonials as $i => $t): ?>
                                <li data-bs-target="#testimonial-carousel"
                                    data-bs-slide-to="<?php echo $i; ?>"
                                    class="<?php echo $i === 0 ? 'active' : ''; ?>">
                                    <img src="<?php echo $t['avatar']; ?>"
                                        class="img-fluid rounded-circle avatar-image" alt="avatar">
                                </li>
                                <?php endforeach; ?>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- CONTACT SECTION -->
    <section class="contact-section section-padding" id="section_6">
        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-12 ms-auto mb-5 mb-lg-0">
                    <div class="contact-info-wrap">
                        <h2>Hubungi Kami</h2>
                        <div class="contact-image-wrap d-flex flex-wrap">
                            <img src="images/avatar/pretty-blonde-woman-wearing-white-t-shirt.jpg"
                                class="img-fluid avatar-image" alt="">
                            <div class="d-flex flex-column justify-content-center ms-3">
                                <p class="mb-0">Faizan</p>
                                <p class="mb-0"><strong>Tim Hubungan Masyarakat</strong></p>
                            </div>
                        </div>
                        <div class="contact-info">
                            <h5 class="mb-3">Informasi Kontak</h5>
                            <p class="d-flex mb-2">
                                <i class="bi-geo-alt me-2"></i>Jalan Simpang Lima, Semarang, Jawa Tengah
                            </p>
                            <p class="d-flex mb-2">
                                <i class="bi-telephone me-2"></i>
                                <a href="tel:3052409671">305-240-9671</a>
                            </p>
                            <p class="d-flex">
                                <i class="bi-envelope me-2"></i>
                                <a href="mailto:donate@charity.org">admin@solit.org</a>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 col-12 mx-auto">
                    <?php if ($contactSuccess): ?>
                    <div class="alert alert-success">
                        <strong>Pesan terkirim!</strong> Terima kasih, kami akan segera menghubungi Anda.
                    </div>
                    <?php endif; ?>

                    <form class="custom-form contact-form" action="index.php#section_6" method="post" role="form">
                        <h2>Formulir Kontak</h2>
                        <p class="mb-4">Atau, Anda dapat mengirim email ke: <a href="mailto:info@solit.org">info@solit.org</a></p>

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <input type="text" name="first-name" id="first-name"
                                    class="form-control <?php echo isset($contactErrors['first_name']) ? 'is-invalid' : ''; ?>"
                                    placeholder="Jack" required
                                    value="<?php echo $contactData['first_name']; ?>">
                                <?php if (isset($contactErrors['first_name'])): ?>
                                <div class="invalid-feedback"><?php echo $contactErrors['first_name']; ?></div>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <input type="text" name="last-name" id="last-name"
                                    class="form-control <?php echo isset($contactErrors['last_name']) ? 'is-invalid' : ''; ?>"
                                    placeholder="Doe" required
                                    value="<?php echo $contactData['last_name']; ?>">
                                <?php if (isset($contactErrors['last_name'])): ?>
                                <div class="invalid-feedback"><?php echo $contactErrors['last_name']; ?></div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*"
                            class="form-control <?php echo isset($contactErrors['email']) ? 'is-invalid' : ''; ?>"
                            placeholder="Jackdoe@gmail.com" required
                            value="<?php echo $contactData['email']; ?>">
                        <?php if (isset($contactErrors['email'])): ?>
                        <div class="invalid-feedback"><?php echo $contactErrors['email']; ?></div>
                        <?php endif; ?>

                        <textarea name="message" rows="5"
                            class="form-control <?php echo isset($contactErrors['message']) ? 'is-invalid' : ''; ?>"
                            id="message" placeholder="Tulis pesan atau pertanyaan Anda di sini..."><?php echo $contactData['message']; ?></textarea>
                        <?php if (isset($contactErrors['message'])): ?>
                        <div class="invalid-feedback"><?php echo $contactErrors['message']; ?></div>
                        <?php endif; ?>

                        <button type="submit" class="form-control">Kirim Pesan</button>
                    </form>
                </div>

            </div>
        </div>
    </section>

</main>

<?php include 'includes/footer.php'; ?>
