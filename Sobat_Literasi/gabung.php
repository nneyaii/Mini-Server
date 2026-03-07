<?php
$pageTitle  = 'Sobat Literasi';
$activePage = 'gabung';

// Handle form relawan
$donateSuccess = false;
$donateErrors  = [];
$donateData    = ['name' => '', 'email' => '', 'frequency' => 'one-time', 'amount' => '', 'custom_amount' => '', 'payment' => ''];


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['volunteer-name'])) {
    $volunteerData['name']    = htmlspecialchars(trim($_POST['volunteer-name'] ?? ''));
    $volunteerData['email']   = htmlspecialchars(trim($_POST['volunteer-email'] ?? ''));
    $volunteerData['subject'] = htmlspecialchars(trim($_POST['volunteer-subject'] ?? ''));
    $volunteerData['message'] = htmlspecialchars(trim($_POST['volunteer-message'] ?? ''));

    if (empty($volunteerData['name']))    $volunteerErrors['name']    = 'Nama wajib diisi.';
    if (empty($volunteerData['email']) || !filter_var($_POST['volunteer-email'], FILTER_VALIDATE_EMAIL))
                                    $volunteerErrors['email']   = 'Email tidak valid.';
    if (empty($volunteerData['subject'])) $volunteerErrors['subject'] = 'Subject wajib diisi.';

    if (empty($volunteerErrors)) {
        // Proses simpan/kirim email di sini
        $volunteerSuccess = true;
        $volunteerData    = ['name' => '', 'email' => '', 'subject' => '', 'message' => ''];
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $donateData['name']          = htmlspecialchars(trim($_POST['donation-name'] ?? ''));
    $donateData['email']         = htmlspecialchars(trim($_POST['donation-email'] ?? ''));
    $donateData['frequency']     = htmlspecialchars($_POST['DonationFrequency'] ?? '');
    $donateData['amount']        = htmlspecialchars($_POST['flexRadioDefault'] ?? '');
    $donateData['custom_amount'] = htmlspecialchars(trim($_POST['custom-amount'] ?? ''));
    $donateData['payment']       = htmlspecialchars($_POST['DonationPayment'] ?? '');

    if (empty($donateData['name']))  $donateErrors['name']  = 'Nama wajib diisi.';
    if (empty($donateData['email']) || !filter_var($_POST['donation-email'], FILTER_VALIDATE_EMAIL))
                                     $donateErrors['email'] = 'Email tidak valid.';
    if (empty($donateData['amount']) && empty($donateData['custom_amount']))
                                     $donateErrors['amount'] = 'Pilih atau masukkan nominal donasi.';
    if (empty($donateData['payment'])) $donateErrors['payment'] = 'Pilih metode pembayaran.';

    if (empty($donateErrors)) {
        // Proses donasi di sini (integrasi payment gateway, dll)
        $donateSuccess = true;
    }
}

include 'includes/head.php';
?>

<?php include 'includes/topbar.php'; ?>
<?php include 'includes/navbar.php'; ?>

<main>
    <section class="gabung-section">
        <div class="section-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12 mx-auto">
                <?php
                $donateSuccess = false;

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // simpan data
                    $donateSuccess = true;
                }
                ?>

                <?php if ($donateSuccess): ?>
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
                                <input type="text" name="donation-name" id="donation-name"
                                    class="form-control <?php echo isset($donateErrors['name']) ? 'is-invalid' : ''; ?>"
                                    placeholder="Jack Doe" required
                                    value="<?php echo $donateData['name']; ?>">
                                <?php if (isset($donateErrors['name'])): ?>
                                <div class="invalid-feedback"><?php echo $donateErrors['name']; ?></div>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-6 col-12 mt-2">
                                <input type="email" name="donation-email" id="donation-email"
                                    pattern="[^ @]*@[^ @]*"
                                    class="form-control <?php echo isset($donateErrors['email']) ? 'is-invalid' : ''; ?>"
                                    placeholder="Jackdoe@gmail.com" required
                                    value="<?php echo $donateData['email']; ?>">
                                <?php if (isset($donateErrors['email'])): ?>
                                <div class="invalid-feedback"><?php echo $donateErrors['email']; ?></div>
                                <?php endif; ?>
                            </div>


                            <!-- Pernah Jadi Relawan -->
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
                                <?php if (isset($donateErrors['payment'])): ?>
                                <div class="text-danger small mb-2"><?php echo $donateErrors['payment']; ?></div>
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