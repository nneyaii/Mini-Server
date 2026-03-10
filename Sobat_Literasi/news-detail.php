<?php
$pageTitle  = 'Sobat Literasi - Detail Artikel';
$activePage = 'news-detail';

// Handle komentar
$commentSuccess = false;
$commentError   = '';
$commentText    = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['comment-message'])) {
    $commentText = htmlspecialchars(trim($_POST['comment-message']));
    if (empty($commentText)) {
        $commentError = 'Komentar tidak boleh kosong.';
    } else {
        // Proses simpan komentar ke database di sini
        $commentSuccess = true;
        $commentText    = '';
    }
}

// Data komentar
$comments = [
    ['name' => 'Budi',   'avatar' => 'images/avatar/studio-portrait-emotional-happy-funny.jpg',         'text' => 'Artikel ini membuka wawasan saya tentang pentingnya membangun budaya membaca sejak usia dini. Terima kasih sudah berbagi informasi yang bermanfaat.', 'indent' => false],
    ['name' => 'Ami',  'avatar' => 'images/avatar/pretty-blonde-woman-wearing-white-t-shirt.jpg',    'text' => 'Program seperti ini sangat dibutuhkan, terutama di daerah yang akses bukunya masih terbatas. Semoga kegiatannya terus berkembang.', 'indent' => true],
    ['name' => 'Adi', 'avatar' => 'images/avatar/portrait-young-redhead-bearded-male.jpg',          'text' => 'Terima kasih atas artikelnya. Sangat menginspirasi untuk ikut mendukung kegiatan pendidikan di masyarakat.', 'indent'=> false],
];

// Data berita terkait
$relatedNews = [
    [
        'img'        => 'images/news/13.png',
        'categories' => ['Ilmu', 'Media'],
        'date'       => 'October 11, 2026',
        'author'     => 'Admin',
        'comments'   => 24,
        'title'      => 'Scroll Terus Tapi Nggak Nambah Ilmu?',
        'body'       => 'Sering scrolling lama di internet tapi terasa nggak dapat apa-apa? Artikel ini bahas cara memanfaatkan internet biar tetap seru tapi juga nambah pengetahuan.',
    ],
    [
        'img'        => 'images/news/14.png',
        'categories' => ['Digital', 'Pelajar'],
        'date'       => 'October 25, 2026',
        'author'     => 'Admin',
        'comments'   => 36,
        'title'      => 'Jadi Pelajar Zaman Now Harus Melek Digital',
        'body'       => 'Literasi digital penting agar pelajar bisa memahami informasi, berpikir kritis, dan tidak mudah terpengaruh oleh konten negatif di internet.',
    ],
];

include 'includes/head.php';
?>

<?php include 'includes/topbar.php'; ?>
<?php include 'includes/navbar.php'; ?>

<main>
    <section class="news-detail-header-section text-center">
        <div class="section-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12">
                    <h1 class="text-white">Detail Artikel</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="news-section section-padding">
        <div class="container">
            <div class="row">

                <!-- Konten Berita -->
                <div class="col-lg-7 col-12">
                    <div class="news-block">
                        <div class="news-block-top">
                            <img src="images/news/1.png"
                                class="news-image img-fluid" alt="">
                            <div class="news-category-block">
                                <a href="#" class="category-block-link">Tips Belajar Siswa,</a>
                                <a href="#" class="category-block-link">Strategi Lulus Ujian</a>
                            </div>
                        </div>

                        <div class="news-block-info">
                            <div class="d-flex mt-2">
                                <div class="news-block-date">
                                    <p><i class="bi-calendar4 custom-icon me-1"></i>3 Mei, 2026</p>
                                </div>
                                <div class="news-block-author mx-5">
                                    <p><i class="bi-person custom-icon me-1"></i>By Admin</p>
                                </div>
                                <div class="news-block-comment">
                                    <p><i class="bi-chat-left custom-icon me-1"></i>32 Comments</p>
                                </div>
                            </div>

                            <div class="news-block-title mb-2">
                                <h4>Pentingnya Literasi Digital untuk Pelajar SMA</h4>
                            </div>

                            <div class="news-block-body">
                                <p>Perkembangan teknologi digital telah membawa perubahan besar dalam cara siswa memperoleh informasi dan pengetahuan. Jika dahulu kegiatan membaca lebih sering dilakukan melalui buku cetak, kini siswa dapat membaca melalui berbagai perangkat digital seperti ponsel, tablet, dan komputer. Hal ini membuat literasi digital menjadi kemampuan yang penting bagi siswa SMA agar mereka dapat memanfaatkan teknologi untuk mencari dan mengakses berbagai sumber bacaan seperti artikel, e-book, jurnal, maupun berita yang dapat menambah wawasan dan pengetahuan.</p>
                                <p>Melalui literasi digital, siswa tidak hanya belajar menggunakan teknologi, tetapi juga belajar memahami dan menilai informasi secara bijak. Budaya membaca yang didukung oleh teknologi dapat membantu siswa meningkatkan kemampuan berpikir kritis serta memperluas pengetahuan mereka. Namun, siswa juga perlu selektif dalam memilih sumber bacaan yang terpercaya karena tidak semua informasi di internet dapat dijadikan sumber yang valid. Dengan memanfaatkan literasi digital secara positif, siswa SMA dapat mengembangkan kebiasaan membaca yang lebih baik serta menjadikan teknologi sebagai sarana belajar yang bermanfaat.</p>
                                <blockquote>Scrolling boleh, tapi jangan lupa reading juga.</blockquote>
                            </div>

                            <div class="row mt-5 mb-4">
                                <div class="col-lg-6 col-12 mb-4 mb-lg-0">
                                    <img src="images/news/africa-humanitarian-aid-doctor.jpg"
                                        class="news-detail-image img-fluid" alt="">
                                </div>
                                <div class="col-lg-6 col-12">
                                    <img src="images/news/close-up-happy-people-working-together.jpg"
                                        class="news-detail-image img-fluid" alt="">
                                </div>
                            </div>

                            <!-- Social Share & Tags -->
                            <div class="social-share border-top mt-5 py-4 d-flex flex-wrap align-items-center">
                                <div class="tags-block me-auto">
                                    <a href="#" class="tags-block-link">Literasi</a>
                                    <a href="#" class="tags-block-link">Pendidikan</a>
                                    <a href="#" class="tags-block-link">Digital</a>
                                </div>
                                <div class="d-flex">
                                    <a href="#" class="social-icon-link bi-facebook"></a>
                                    <a href="#" class="social-icon-link bi-twitter"></a>
                                    <a href="#" class="social-icon-link bi-printer"></a>
                                    <a href="#" class="social-icon-link bi-envelope"></a>
                                </div>
                            </div>

                            <!-- Komentar -->
                            <?php foreach ($comments as $comment): ?>
                            <div class="author-comment d-flex <?php echo $comment['indent'] ? 'ms-5 ps-3' : 'mt-3 mb-4'; ?>">
                                <img src="<?php echo $comment['avatar']; ?>" class="img-fluid avatar-image" alt="">
                                <div class="author-comment-info ms-3">
                                    <h6 class="mb-1"><?php echo htmlspecialchars($comment['name']); ?></h6>
                                    <p class="mb-0"><?php echo htmlspecialchars($comment['text']); ?></p>
                                    <div class="d-flex mt-2">
                                        <a href="#" class="author-comment-link me-3">Like</a>
                                        <a href="#" class="author-comment-link">Reply</a>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>

                            <!-- Form Komentar -->
                            <?php if ($commentSuccess): ?>
                            <div class="alert alert-success mt-3">Komentar berhasil dikirim!</div>
                            <?php endif; ?>

                            <form class="custom-form comment-form mt-4" action="news-detail.php" method="post" role="form">
                                <h6 class="mb-3">Tulis Komentar</h6>
                                <?php if ($commentError): ?>
                                <div class="alert alert-danger"><?php echo htmlspecialchars($commentError); ?></div>
                                <?php endif; ?>
                                <textarea name="comment-message" rows="4" class="form-control" id="comment-message"
                                    placeholder="Tulis di sini!"><?php echo $commentText; ?></textarea>
                                <div class="col-lg-3 col-md-4 col-6 ms-auto">
                                    <button type="submit" class="form-control">Kirim</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4 col-12 mx-auto mt-4 mt-lg-0">
                    <?php
                    $searchAction = 'news.php';
                    include 'includes/sidebar.php';
                    ?>
                </div>

            </div>
        </div>
    </section>

    <!-- Related News -->
    <section class="news-section section-padding section-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12 mb-4">
                    <h2>Artikel Terkait</h2>
                </div>

                <?php foreach ($relatedNews as $news): ?>
                <div class="col-lg-6 col-12">
                    <div class="news-block">
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
                </div>
                <?php endforeach; ?>

            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>
