<?php
$pageTitle  = 'Sobat Literasi';
$activePage = 'gabung';

// Handle form donasi
$donateSuccess = false;
$donateErrors  = [];
$donateData    = ['name' => '', 'email' => '', 'frequency' => 'one-time', 'amount' => '', 'custom_amount' => '', 'payment' => ''];

// Handle volunteer form
$volunteerSuccess = false;
$volunteerErrors  = [];
$volunteerData    = ['name' => '', 'email' => '', 'subject' => '', 'message' => ''];

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
    <section class="donate-section">
        <div class="section-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12 mx-auto">

                    <?php if ($donateSuccess): ?>
                    <div class="alert alert-success text-center p-4">
                        <h4>🎉 Terima kasih atas donasi Anda!</h4>
                        <p>Donasi Anda sangat berarti bagi kami. Kami akan segera memproses pembayaran Anda.</p>
                        <a href="index.php" class="custom-btn btn">Kembali ke Beranda</a>
                    </div>
                    <?php else: ?>

                    <form class="custom-form donate-form" action="donate.php" method="post" role="form">
                        <h3 class="mb-4">Make a donation</h3>

                        <div class="row">
                            <!-- Donation Frequency -->
                            <div class="col-lg-12 col-12">
                                <h5 class="mb-3">Donation Frequency</h5>
                            </div>
                            <div class="col-lg-6 col-6 form-check-group form-check-group-donation-frequency">
                                <div class="form-check form-check-radio">
                                    <input class="form-check-input" type="radio" name="DonationFrequency"
                                        id="DonationFrequencyOne" value="one-time"
                                        <?php echo ($donateData['frequency'] !== 'monthly') ? 'checked' : ''; ?>>
                                    <label class="form-check-label" for="DonationFrequencyOne">One Time</label>
                                </div>
                            </div>
                            <div class="col-lg-6 col-6 form-check-group form-check-group-donation-frequency">
                                <div class="form-check form-check-radio">
                                    <input class="form-check-input" type="radio" name="DonationFrequency"
                                        id="DonationFrequencyMonthly" value="monthly"
                                        <?php echo ($donateData['frequency'] === 'monthly') ? 'checked' : ''; ?>>
                                    <label class="form-check-label" for="DonationFrequencyMonthly">Monthly</label>
                                </div>
                            </div>

                            <!-- Select Amount -->
                            <div class="col-lg-12 col-12">
                                <h5 class="mt-2 mb-3">Select an amount</h5>
                                <?php if (isset($donateErrors['amount'])): ?>
                                <div class="text-danger small mb-2"><?php echo $donateErrors['amount']; ?></div>
                                <?php endif; ?>
                            </div>

                            <?php
                            $amounts = [10, 15, 20, 30, 45, 50];
                            foreach ($amounts as $i => $amount):
                                $radioId = 'flexRadioDefault' . ($i + 1);
                            ?>
                            <div class="col-lg-3 col-md-6 col-6 form-check-group">
                                <div class="form-check form-check-radio">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="<?php echo $radioId; ?>" value="<?php echo $amount; ?>"
                                        <?php echo ($donateData['amount'] == $amount) ? 'checked' : ''; ?>>
                                    <label class="form-check-label" for="<?php echo $radioId; ?>">
                                        $<?php echo $amount; ?>
                                    </label>
                                </div>
                            </div>
                            <?php endforeach; ?>

                            <div class="col-lg-6 col-12 form-check-group">
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">$</span>
                                    <input type="text" name="custom-amount" class="form-control"
                                        placeholder="Custom amount"
                                        value="<?php echo $donateData['custom_amount']; ?>"
                                        aria-describedby="basic-addon1">
                                </div>
                            </div>

                            <!-- Personal Info -->
                            <div class="col-lg-12 col-12">
                                <h5 class="mt-1">Personal Info</h5>
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

                            <!-- Payment -->
                            <div class="col-lg-12 col-12">
                                <h5 class="mt-4 pt-1">Choose Payment</h5>
                                <?php if (isset($donateErrors['payment'])): ?>
                                <div class="text-danger small mb-2"><?php echo $donateErrors['payment']; ?></div>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-12 col-12 mt-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="DonationPayment"
                                        id="flexRadioDefault9" value="card"
                                        <?php echo ($donateData['payment'] === 'card') ? 'checked' : ''; ?>>
                                    <label class="form-check-label" for="flexRadioDefault9">
                                        <i class="bi-credit-card custom-icon ms-1"></i> Debit or Credit card
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="DonationPayment"
                                        id="flexRadioDefault10" value="paypal"
                                        <?php echo ($donateData['payment'] === 'paypal') ? 'checked' : ''; ?>>
                                    <label class="form-check-label" for="flexRadioDefault10">
                                        <i class="bi-paypal custom-icon ms-1"></i> Paypal
                                    </label>
                                </div>

                                <button type="submit" class="form-control mt-4">Submit Donation</button>
                            </div>
                        </div>
                    </form>

                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- VOLUNTEER SECTION -->
    <section class="volunteer-section section-padding" id="section_4">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <h2 class="text-white mb-4">Volunteer</h2>

                    <?php if ($volunteerSuccess): ?>
                    <div class="alert alert-success">
                        Terima kasih! Pendaftaran volunteer Anda telah diterima.
                    </div>
                    <?php endif; ?>

                    <form class="custom-form volunteer-form mb-5 mb-lg-0"
                          action="index.php#section_4" method="post" role="form"
                          enctype="multipart/form-data">
                        <h3 class="mb-4">Become a volunteer today</h3>
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <input type="text" name="volunteer-name" id="volunteer-name"
                                    class="form-control <?php echo isset($volunteerErrors['name']) ? 'is-invalid' : ''; ?>"
                                    placeholder="Jack Doe" required
                                    value="<?php echo $volunteerData['name']; ?>">
                                <?php if (isset($volunteerErrors['name'])): ?>
                                <div class="invalid-feedback"><?php echo $volunteerErrors['name']; ?></div>
                                <?php endif; ?>
                            </div>

                            <div class="col-lg-6 col-12">
                                <input type="email" name="volunteer-email" id="volunteer-email"
                                    pattern="[^ @]*@[^ @]*"
                                    class="form-control <?php echo isset($volunteerErrors['email']) ? 'is-invalid' : ''; ?>"
                                    placeholder="Jackdoe@gmail.com" required
                                    value="<?php echo $volunteerData['email']; ?>">
                                <?php if (isset($volunteerErrors['email'])): ?>
                                <div class="invalid-feedback"><?php echo $volunteerErrors['email']; ?></div>
                                <?php endif; ?>
                            </div>

                            <div class="col-lg-6 col-12">
                                <input type="text" name="volunteer-subject" id="volunteer-subject"
                                    class="form-control <?php echo isset($volunteerErrors['subject']) ? 'is-invalid' : ''; ?>"
                                    placeholder="Subject" required
                                    value="<?php echo $volunteerData['subject']; ?>">
                                <?php if (isset($volunteerErrors['subject'])): ?>
                                <div class="invalid-feedback"><?php echo $volunteerErrors['subject']; ?></div>
                                <?php endif; ?>
                            </div>

                            <div class="col-lg-6 col-12">
                                <div class="input-group input-group-file">
                                    <input type="file" class="form-control" id="inputGroupFile02" name="cv">
                                    <label class="input-group-text" for="inputGroupFile02">Upload your CV</label>
                                    <i class="bi-cloud-arrow-up ms-auto"></i>
                                </div>
                            </div>
                        </div>

                        <textarea name="volunteer-message" rows="3" class="form-control" id="volunteer-message"
                            placeholder="Comment (Optional)"><?php echo $volunteerData['message']; ?></textarea>

                        <button type="submit" class="form-control">Submit</button>
                    </form>
                </div>

                <div class="col-lg-6 col-12">
                    <img src="images/smiling-casual-woman-dressed-volunteer-t-shirt-with-badge.jpg"
                        class="volunteer-image img-fluid" alt="">
                    <div class="custom-block-body text-center">
                        <h4 class="text-white mt-lg-3 mb-lg-3">About Relawan</h4>
                        <p class="text-white">Lorem Ipsum dolor sit amet, consectetur adipsicing kengan omeg kohm
                            tokito Professional charity theme based</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php include 'includes/footer.php'; ?>
