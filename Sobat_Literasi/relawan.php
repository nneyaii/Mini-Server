<?php
$pageTitle = 'Relawan';
$pageDescription = 'Halaman untuk relawan';
$activePage = 'relawan';

// Handle search form
$keyword = '';
if (isset($_GET['keyword'])) {
    $keyword = htmlspecialchars(trim($_GET['keyword']));
}

include 'includes/head.php';
?>

<main>
    <?php include 'includes/topbar.php'; ?>
    <?php include 'includes/navbar.php'; ?>

</main>

<?php include 'includes/footer.php'; ?>
