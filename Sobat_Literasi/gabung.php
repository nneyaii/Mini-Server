
<?php
$conn = mysqli_connect("localhost", "root", "", "sobat_literasi");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$pageTitle  = 'Sobat Literasi';
$activePage = 'gabung';

$gabungSuccess = false;
$gabungErrors  = [];
$gabungData    = ['nama' => '', 'email' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $gabungData['nama']  = htmlspecialchars(trim($_POST['nama'] ?? ''));
    $gabungData['email'] = htmlspecialchars(trim($_POST['email'] ?? ''));

    $pernah = $_POST['pengalaman_relawan'] ?? '';
    $alasan = htmlspecialchars(trim($_POST['alasan_relawan'] ?? ''));
    $status = $_POST['status'] ?? '';
    $setuju = isset($_POST['persetujuan_relawan']) ? 1 : 0;

    // validasi ringan (biar UI tetap clean)
    if (empty($gabungData['nama'])) {
        $gabungErrors['nama'] = true;
    }

    if (empty($gabungData['email']) || !filter_var($gabungData['email'], FILTER_VALIDATE_EMAIL)) {
        $gabungErrors['email'] = true;
    }

    // simpan
    if (empty($gabungErrors)) {

        if ($conn) {
            mysqli_query($conn, "INSERT INTO gabung 
            (nama, email, pernah_relawan, alasan, kategori, persetujuan) 
            VALUES 
            ('{$gabungData['nama']}', '{$gabungData['email']}', '$pernah', '$alasan', '$status', '$setuju')");
        }

        $gabungSuccess = true;
    }
}
include 'includes/head.php';
?>

<?php include 'includes/topbar.php'; ?>
<?php include 'includes/navbar.php'; ?>

<main>
    <section class="gabung-section">
        <div class="section-overlay1"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12 mx-auto">
                <?php
                $gabungSuccess = false;

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // simpan data
                    $gabungSuccess = true;
                }
                ?>

            <?php if ($gabungSuccess): ?>
            <div class="alert alert-success text-center p-4">
                <h4>🎉 Terima kasih atas ketersediaan Anda!</h4>
                <p>Respon Anda sangat berarti bagi kami. Kami akan segera memproses permintaan Anda.</p>
                <a href="index.php" class="custom-btn btn">Kembali ke Beranda</a>
            </div>
            <?php else: ?>

                    <form class="custom-form gabung-form" action="gabung.php" method="post" role="form">
                        <h3 class="mb-4">Pendaftaran Relawan</h3>

                        <div class="row">
                    <!-- Personal Info -->
                            <div class="col-lg-12 col-12">
                                <h5 class="mt-1">Data Diri</h5>
                            </div>
                            <div class="col-lg-6 col-12 mt-2">
                                <input type="text" name="nama" id="nama"
                                    class="form-control <?php echo isset($gabungErrors['nama']) ? 'is-invalid' : ''; ?>"
                                    placeholder="Jack Doe" required
                                    value="<?php echo $gabungData['nama']; ?>">
                                <?php if (isset($gabungErrors['nama'])): ?>
                                <div class="invalid-feedback"><?php echo $gabungErrors['nama']; ?></div>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-6 col-12 mt-2">
                                <input type="email" name="email" id="email"
                                    pattern="[^ @]*@[^ @]*"
                                    class="form-control <?php echo isset($gabungErrors['email']) ? 'is-invalid' : ''; ?>"
                                    placeholder="Jackdoe@gmail.com" required
                                    value="<?php echo $gabungData['email']; ?>">
                                <?php if (isset($gabungErrors['email'])): ?>
                                <div class="invalid-feedback"><?php echo $gabungErrors['email']; ?></div>
                                <?php endif; ?>
                            </div>


                            <!-- Pernah Jadi Relawan -->
                            <div class="col-lg-12 col-12">
                                <h5 class="mt-1">Pernah Jadi Relawan?</h5>
                            </div>

                            <div class="col-lg-6 col-6 form-check-group">
                                <input type="radio" class="btn-check" name="pengalaman_relawan" id="relawanYa" value="ya" autocomplete="off">
                                <label class="custom-btn w-100 text-center" for="relawanYa">Ya</label>
                            </div>

                            <div class="col-lg-6 col-6 form-check-group">
                                <input type="radio" class="btn-check" name="pengalaman_relawan" id="relawanTidak" value="tidak" autocomplete="off">
                                <label class="custom-btn w-100 text-center" for="relawanTidak">Tidak</label>
                            </div>

                            <!-- Alasan Menjadi Relawan -->
                            <div class="col-lg-12 col-12">
                                <h5 class="mt-1">Alasan Ingin Menjadi Relawan</h5>
                            </div>

                            <div class="col-lg-12 col-12 mt-1">
                                <textarea 
                                    class="form-control" 
                                    name="alasan_relawan" 
                                    rows="4" 
                                    placeholder="Tuliskan alasan Anda ingin bergabung sebagai relawan..."
                                    required></textarea>
                            </div>

                            <!-- Status -->
                            <div class="col-lg-12 col-12">
                                <h5 class="mt-1 pt-1">Pilih Status </h5>
                                <?php if (isset($gabungErrors['payment'])): ?>
                                <div class="text-danger small mb-2"><?php echo $gabungErrors['payment']; ?></div>
                                <?php endif; ?>
                            </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="pelajar" value="pelajar">
                                    <label class="form-check-label" for="pelajar">
                                    <i class="bi bi-mortarboard custom-icon ms-1"> </i>Pelajar
                                    </label>
                                    </div>

                                    <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="guru" value="guru">
                                    <label class="form-check-label" for="guru">
                                    <i class="bi bi-easel custom-icon ms-1"> </i>Guru
                                    </label>
                                    </div>

                                    <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="umum" value="umum">
                                    <label class="form-check-label" for="umum">
                                    <i class="bi bi-people custom-icon ms-1"> </i>Umum
                                    </label>
                                    </div>

                                <!-- Persetujuan -->
                                <div class="col-lg-12 col-12">
                                    <div class="form-check mt-4">
                                        <input 
                                            class="form-check-input" 
                                            type="checkbox" 
                                            id="persetujuanRelawan" 
                                            name="persetujuan_relawan" 
                                            required>
                                            
                                        <label class="form-check-label" for="persetujuanRelawan">
                                            Saya bersedia berpartisipasi dalam kegiatan relawan dan mengikuti aturan yang berlaku.
                                        </label>
                                    </div>
                                </div>
                                <button type="submit" class="form-control mt-4">Kirim Pendaftaran</button>
                            </div>
                        </div>
                    </form>

                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</main>