<?php
$pageTitle = 'Halaman Materi';
$pageDescription = 'Materi Pembelajaran';
$activePage = '';

include 'includes/head.php';

/* ================= KONEKSI DATABASE ================= */
$conn = mysqli_connect("localhost","root","","sobat_literasi");

if(!$conn){
    die("Koneksi gagal: " . mysqli_connect_error());
}

/* ================= AMBIL DATA ================= */
$materi = [
    'kelas10' => [],
    'kelas11' => [],
    'kelas12' => []
];

$query = mysqli_query($conn, "SELECT * FROM materi");

while($row = mysqli_fetch_assoc($query)){
    $materi[$row['kelas']][] = $row;
}
?>

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
                    <img src="images/slide/1.jpeg" class="img-fluid">
                </div>
            </div>

        </div>
    </div>
</header>

<!-- PENGANTAR -->
<section class="section-padding">
<div class="container">
<div class="row">
<div class="col-lg-8 m-auto">
<h3 class="mb-4">Pengantar</h3>

<p> Materi pembelajaran pada website <strong>Sobat Literasi</strong> disusun untuk membantu siswa SMA memahami berbagai konsep pelajaran secara lebih mudah, sistematis, dan terstruktur. Setiap materi dirancang agar dapat dipelajari secara mandiri maupun sebagai pendukung pembelajaran di sekolah. </p> 
<p> Materi yang tersedia mencakup berbagai mata pelajaran untuk kelas 10, 11, dan 12, yang disusun berdasarkan kurikulum yang berlaku. Setiap topik dilengkapi dengan penjelasan konsep, contoh soal, serta rangkuman untuk mempermudah pemahaman siswa. </p> 
<p> Dengan adanya materi ini, diharapkan siswa dapat meningkatkan kemampuan berpikir kritis, memahami konsep secara mendalam, serta lebih siap dalam menghadapi ujian sekolah maupun ujian akhir. </p> 
<p> <strong>Sobat Literasi</strong> juga menjadi wadah bagi para relawan pendidikan untuk berbagi ilmu dan pengalaman, sehingga materi yang tersedia dapat terus berkembang dan memberikan manfaat bagi lebih banyak pelajar di Indonesia. </p>

</div>
</div>
</div>
</section>

<!-- MATERI -->
<section class="section-padding">
<div class="container">

<h2 class="text-center mb-4">Materi Pembelajaran</h2>

<ul class="nav nav-tabs mb-4 justify-content-center">
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

<?php foreach ($materi as $kelas => $list): ?>
<div class="tab-pane fade <?php echo $kelas=='kelas10' ? 'show active':''; ?>" id="<?php echo $kelas; ?>">
<div class="row">

<?php if(empty($list)): ?>
<p class="text-center">Belum ada materi</p>
<?php endif; ?>

<?php foreach ($list as $m): ?>
    <div class="col-lg-4 col-md-6 mb-4 d-flex">
        <div class="custom-card w-100 d-flex flex-column">
            <img src="<?php echo !empty($m['img']) ? $m['img'] : 'images/default.png'; ?>" class="card-img">
            <div class="card-body text-center d-flex flex-column">
                <h5><?php echo $m['nama']; ?></h5>
                <button class="lihat-btn mt-auto"
                    data-file="<?php echo $m['file']; ?>"
                    data-nama="<?php echo $m['nama']; ?>">
                    Lihat Materi
                </button>
            </div>
        </div>  
    </div>
<?php endforeach; ?>

</div>
</div>
<?php endforeach; ?>

</div>
</div>
</section>

<!-- PREVIEW -->
<section class="section-padding">
<div class="container">

<div id="preview-box">
<h3 id="judul-materi"></h3>

<iframe id="pdf-frame"></iframe>

<a id="download-btn" class="btn btn-primary mt-3" download>
Download PDF
</a>

</div>

</div>
</section>

<?php include 'includes/footer.php'; ?>

<!-- CSS -->
<style>
.custom-card {
border-radius: 20px;
overflow: hidden;
background: #f8fbff;
transition: 0.3s;
}

.custom-card:hover {
transform: translateY(-6px);
box-shadow: 0 15px 30px rgba(0,0,0,0.15);
}

.card-img {
width: 100%;
height: 200px;
object-fit: cover;
}

.card-body {
padding: 20px;
display: flex;
flex-direction: column;
}

.lihat-btn {
margin-top: auto;
padding: 12px;
border-radius: 12px;
border: none;
background: #5c6f7c;
color: white;
}

#preview-box {
    display: none;
    margin-top: 30px;
    background: #fff;
    padding: 20px;
    border-radius: 15px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
}

#pdf-frame {
width: 100%;
height: 600px;
border-radius: 10px;
border: 1px solid #ddd;
}
</style>

<!-- JS -->
<script>
document.querySelectorAll('.lihat-btn').forEach(btn => {
btn.addEventListener('click', function(){

let file = this.dataset.file;
let nama = this.dataset.nama;

document.getElementById('pdf-frame').src = file;
document.getElementById('download-btn').href = file;
document.getElementById('judul-materi').innerText = nama;

let preview = document.getElementById('preview-box');
preview.style.display = 'block';

preview.scrollIntoView({behavior:'smooth'});

});
});
</script>

</main>