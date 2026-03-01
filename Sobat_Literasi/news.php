<?php
$pageTitle  = 'Kind Heart Charity - News Listing';
$activePage = 'news';

// Data berita
$newsList = [
    [
        'img'        => 'images/news/medium-shot-volunteers-with-clothing-donations.jpg',
        'categories' => ['Lifestyle', 'Clothing Donation'],
        'date'       => 'October 18, 2036',
        'author'     => 'Admin',
        'comments'   => 32,
        'title'      => 'Clothing donation to urban area',
        'body'       => 'This is a Bootstrap 5.2.2 CSS template for charity organization websites. You can feel free to use it. Please tell your friends about TemplateMo website. Thank you.',
    ],
    [
        'img'        => 'images/news/medium-shot-people-collecting-foodstuff.jpg',
        'categories' => ['Food', 'Donation', 'Caring'],
        'date'       => 'October 12, 2036',
        'author'     => 'Admin',
        'comments'   => 35,
        'title'      => 'Food donation area',
        'body'       => 'You are not allowed to redistribute this template ZIP file on any other template collection website.',
    ],
];

// Filter berdasarkan search, category, tag
$filterQuery    = isset($_GET['q'])        ? htmlspecialchars(trim($_GET['q']))        : '';
$filterCategory = isset($_GET['category']) ? htmlspecialchars(trim($_GET['category'])) : '';
$filterTag      = isset($_GET['tag'])      ? htmlspecialchars(trim($_GET['tag']))      : '';

if ($filterQuery) {
    $newsList = array_filter($newsList, fn($n) =>
        stripos($n['title'], $filterQuery) !== false || stripos($n['body'], $filterQuery) !== false
    );
}
if ($filterCategory) {
    $newsList = array_filter($newsList, fn($n) =>
        in_array($filterCategory, $n['categories'])
    );
}

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
                    <h1 class="text-white">News Listing</h1>
                    <?php if ($filterQuery || $filterCategory || $filterTag): ?>
                    <p class="text-white mt-2">
                        Filter aktif:
                        <?php if ($filterQuery):    ?>Pencarian: <strong><?php echo $filterQuery; ?></strong><?php endif; ?>
                        <?php if ($filterCategory): ?>Kategori: <strong><?php echo $filterCategory; ?></strong><?php endif; ?>
                        <?php if ($filterTag):      ?>Tag: <strong><?php echo $filterTag; ?></strong><?php endif; ?>
                        &nbsp;<a href="news.php" class="text-white text-decoration-underline">Reset</a>
                    </p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="news-section section-padding">
        <div class="container">
            <div class="row">

                <div class="col-lg-7 col-12">
                    <?php if (empty($newsList)): ?>
                    <div class="alert alert-info">Tidak ada berita yang ditemukan.</div>
                    <?php endif; ?>

                    <?php foreach ($newsList as $i => $news): ?>
                    <div class="news-block <?php echo $i > 0 ? 'mt-3' : ''; ?>">
                        <div class="news-block-top">
                            <a href="news-detail.php">
                                <img src="<?php echo $news['img']; ?>" class="news-image img-fluid" alt="">
                            </a>
                            <div class="news-category-block">
                                <?php foreach ($news['categories'] as $j => $cat): ?>
                                <a href="news.php?category=<?php echo urlencode($cat); ?>" class="category-block-link">
                                    <?php echo htmlspecialchars($cat); ?><?php echo $j < count($news['categories'])-1 ? ',' : ''; ?>
                                </a>
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

                <div class="col-lg-4 col-12 mx-auto mt-4 mt-lg-0">
                    <?php
                    $searchAction = 'news.php';
                    include 'includes/sidebar.php';
                    ?>
                </div>

            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>
