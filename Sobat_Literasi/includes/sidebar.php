<?php
// Sidebar berita: search, recent news, categories, tags, newsletter
// $searchAction: URL action form search (default news.php)
$searchAction = isset($searchAction) ? $searchAction : 'news.php';

// Handle newsletter subscribe
$sidebarSubscribeSuccess = false;
$sidebarSubscribeError   = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['subscribe-email'])) {
    $subEmail = filter_var(trim($_POST['subscribe-email']), FILTER_VALIDATE_EMAIL);
    if ($subEmail) {
        $sidebarSubscribeSuccess = true;
    } else {
        $sidebarSubscribeError = 'Email tidak valid.';
    }
}

$categories = [
    ['label' => 'Drinking water',      'count' => 20],
    ['label' => 'Food Donation',        'count' => 30],
    ['label' => 'Children Education',   'count' => 10],
    ['label' => 'Poverty Development',  'count' => 15],
    ['label' => 'Clothing Donation',    'count' => 20],
];

$tags = ['Donation','Clothing','Food','Children','Education','Poverty','Clean Water'];

$recentNews = [
    ['title' => 'Food donation area',   'date' => 'October 16, 2036', 'img' => 'images/news/africa-humanitarian-aid-doctor.jpg'],
    ['title' => 'Volunteering Clean',   'date' => 'October 24, 2036', 'img' => 'images/news/close-up-happy-people-working-together.jpg'],
];
?>

<!-- Search -->
<form class="custom-form search-form" action="<?php echo htmlspecialchars($searchAction); ?>" method="get" role="form">
    <input class="form-control" type="search" name="q" placeholder="Search"
        value="<?php echo isset($_GET['q']) ? htmlspecialchars($_GET['q']) : ''; ?>" aria-label="Search">
    <button type="submit" class="form-control">
        <i class="bi-search"></i>
    </button>
</form>

<!-- Recent News -->
<h5 class="mt-5 mb-3">Recent news</h5>
<?php foreach ($recentNews as $rn): ?>
<div class="news-block news-block-two-col d-flex mt-4">
    <div class="news-block-two-col-image-wrap">
        <a href="news-detail.php">
            <img src="<?php echo $rn['img']; ?>" class="news-image img-fluid" alt="">
        </a>
    </div>
    <div class="news-block-two-col-info">
        <div class="news-block-title mb-2">
            <h6><a href="news-detail.php" class="news-block-title-link"><?php echo htmlspecialchars($rn['title']); ?></a></h6>
        </div>
        <div class="news-block-date">
            <p><i class="bi-calendar4 custom-icon me-1"></i><?php echo $rn['date']; ?></p>
        </div>
    </div>
</div>
<?php endforeach; ?>

<!-- Categories -->
<div class="category-block d-flex flex-column">
    <h5 class="mb-3">Categories</h5>
    <?php foreach ($categories as $cat): ?>
    <a href="news.php?category=<?php echo urlencode($cat['label']); ?>" class="category-block-link">
        <?php echo htmlspecialchars($cat['label']); ?>
        <span class="badge"><?php echo $cat['count']; ?></span>
    </a>
    <?php endforeach; ?>
</div>

<!-- Tags -->
<div class="tags-block">
    <h5 class="mb-3">Tags</h5>
    <?php foreach ($tags as $tag): ?>
    <a href="news.php?tag=<?php echo urlencode($tag); ?>" class="tags-block-link">
        <?php echo htmlspecialchars($tag); ?>
    </a>
    <?php endforeach; ?>
</div>

<!-- Newsletter -->
<?php if ($sidebarSubscribeSuccess): ?>
<div class="alert alert-success mt-3">Terima kasih sudah subscribe!</div>
<?php else: ?>
<form class="custom-form subscribe-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" role="form">
    <h5 class="mb-4">Newsletter Form</h5>
    <?php if ($sidebarSubscribeError): ?>
    <div class="alert alert-danger"><?php echo htmlspecialchars($sidebarSubscribeError); ?></div>
    <?php endif; ?>
    <input type="email" name="subscribe-email" id="subscribe-email" pattern="[^ @]*@[^ @]*"
        class="form-control" placeholder="Email Address" required>
    <div class="col-lg-12 col-12">
        <button type="submit" class="form-control">Subscribe</button>
    </div>
</form>
<?php endif; ?>
