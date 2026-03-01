<?php
$pageTitle  = 'Kind Heart Charity - News Detail';
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
    ['name' => 'Jack',   'avatar' => 'images/avatar/studio-portrait-emotional-happy-funny.jpg',         'text' => 'Kind Heart Charity is the most supportive organization. This is Bootstrap 5 HTML CSS template for everyone. Thank you.', 'indent' => false],
    ['name' => 'Daisy',  'avatar' => 'images/avatar/pretty-blonde-woman-wearing-white-t-shirt.jpg',    'text' => 'Sed leo nisl, posuere at molestie ac, suscipit auctor mauris. Etiam quis metus elementum, tempor risus vel, condimentum orci', 'indent' => true],
    ['name' => 'Wilson', 'avatar' => 'images/avatar/portrait-young-redhead-bearded-male.jpg',          'text' => 'Lorem Ipsum dolor sit amet, consectetur adipsicing kengan omeg kohm tokito Professional charity theme based on Bootstrap', 'indent' => false],
];

// Data berita terkait
$relatedNews = [
    [
        'img'        => 'images/news/medium-shot-volunteers-with-clothing-donations.jpg',
        'categories' => ['Lifestyle', 'Clothing Donation'],
        'date'       => 'October 16, 2036',
        'author'     => 'Admin',
        'comments'   => 24,
        'title'      => 'Clothing donation to urban area',
        'body'       => 'Lorem Ipsum dolor sit amet, consectetur adipsicing kengan omeg kohm tokito Professional charity theme based on Bootstrap',
    ],
    [
        'img'        => 'images/news/medium-shot-people-collecting-foodstuff.jpg',
        'categories' => ['Food', 'Donation', 'Caring'],
        'date'       => 'October 20, 2036',
        'author'     => 'Admin',
        'comments'   => 36,
        'title'      => 'Food donation area',
        'body'       => 'Sed leo nisl, posuere at molestie ac, suscipit auctor mauris. Etiam quis metus elementum, tempor risus vel, condimentum orci',
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
                    <h1 class="text-white">News Detail</h1>
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
                            <img src="images/news/medium-shot-volunteers-with-clothing-donations.jpg"
                                class="news-image img-fluid" alt="">
                            <div class="news-category-block">
                                <a href="#" class="category-block-link">Lifestyle,</a>
                                <a href="#" class="category-block-link">Clothing Donation</a>
                            </div>
                        </div>

                        <div class="news-block-info">
                            <div class="d-flex mt-2">
                                <div class="news-block-date">
                                    <p><i class="bi-calendar4 custom-icon me-1"></i>October 12, 2036</p>
                                </div>
                                <div class="news-block-author mx-5">
                                    <p><i class="bi-person custom-icon me-1"></i>By Admin</p>
                                </div>
                                <div class="news-block-comment">
                                    <p><i class="bi-chat-left custom-icon me-1"></i>48 Comments</p>
                                </div>
                            </div>

                            <div class="news-block-title mb-2">
                                <h4>Clothing donation to urban area</h4>
                            </div>

                            <div class="news-block-body">
                                <p><strong>Lorem Ipsum</strong> dolor sit amet, consectetur adipsicing kengan omeg kohm
                                    tokito Professional charity theme based on Bootstrap</p>
                                <p><strong>Sed leo</strong> nisl, This is a Bootstrap 5.2.2 CSS template for charity
                                    organization websites. You can feel free to use it. Please tell your friends about
                                    TemplateMo website. Thank you.</p>
                                <blockquote>Sed leo nisl, posuere at molestie ac, suscipit auctor mauris. Etiam quis
                                    metus elementum, tempor risus vel, condimentum orci.</blockquote>
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

                            <p>You are not allowed to redistribute this template ZIP file on any other template
                                collection website. Please <a href="https://templatemo.com/contact"
                                    target="_blank">contact TemplateMo</a> for more information.</p>

                            <!-- Social Share & Tags -->
                            <div class="social-share border-top mt-5 py-4 d-flex flex-wrap align-items-center">
                                <div class="tags-block me-auto">
                                    <a href="#" class="tags-block-link">Donation</a>
                                    <a href="#" class="tags-block-link">Clothing</a>
                                    <a href="#" class="tags-block-link">Food</a>
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
                                <h6 class="mb-3">Write a comment</h6>
                                <?php if ($commentError): ?>
                                <div class="alert alert-danger"><?php echo htmlspecialchars($commentError); ?></div>
                                <?php endif; ?>
                                <textarea name="comment-message" rows="4" class="form-control" id="comment-message"
                                    placeholder="Your comment here"><?php echo $commentText; ?></textarea>
                                <div class="col-lg-3 col-md-4 col-6 ms-auto">
                                    <button type="submit" class="form-control">Comment</button>
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
                    <h2>Related news</h2>
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
