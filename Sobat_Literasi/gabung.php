<?php
$pageTitle  = 'Sobat Literasi';
$activePage = 'donate';

// Handle form donasi
$donateSuccess = false;
$donateErrors  = [];
$donateData    = ['name' => '', 'email' => '', 'frequency' => 'one-time', 'amount' => '', 'custom_amount' => '', 'payment' => ''];

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

<?php include 'includes/footer.php'; ?>
