<?php
$pageTitle = 'Topic Listing Contact Page';
$pageDescription = 'Contact us';
$activePage = 'contact';
$bodyClass = 'topics-listing-page';

// Handle form submission
$formSuccess = false;
$formErrors = [];
$formData = ['name' => '', 'email' => '', 'subject' => '', 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize inputs
    $formData['name']    = htmlspecialchars(trim($_POST['name'] ?? ''));
    $formData['email']   = htmlspecialchars(trim($_POST['email'] ?? ''));
    $formData['subject'] = htmlspecialchars(trim($_POST['subject'] ?? ''));
    $formData['message'] = htmlspecialchars(trim($_POST['message'] ?? ''));

    // Validation
    if (empty($formData['name'])) {
        $formErrors['name'] = 'Name is required.';
    }
    if (empty($formData['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $formErrors['email'] = 'A valid email address is required.';
    }
    if (empty($formData['subject'])) {
        $formErrors['subject'] = 'Subject is required.';
    }
    if (empty($formData['message'])) {
        $formErrors['message'] = 'Message is required.';
    }

    if (empty($formErrors)) {
        // Proses pengiriman email di sini, contoh:
        // mail($formData['email'], $formData['subject'], $formData['message']);
        $formSuccess = true;
        $formData = ['name' => '', 'email' => '', 'subject' => '', 'message' => ''];
    }
}

include 'includes/head.php';
?>

<main>

    <?php include 'includes/navbar.php'; ?>

    <header class="site-header d-flex flex-column justify-content-center align-items-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Homepage</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Contact Form</li>
                        </ol>
                    </nav>
                    <h2 class="text-white">Contact Form</h2>
                </div>
            </div>
        </div>
    </header>


    <section class="section-padding section-bg">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-12">
                    <h3 class="mb-4 pb-2">We'd love to hear from you</h3>
                </div>

                <div class="col-lg-6 col-12">

                    <?php if ($formSuccess): ?>
                    <div class="alert alert-success" role="alert">
                        <strong>Message sent!</strong> Thank you for reaching out. We'll get back to you soon.
                    </div>
                    <?php endif; ?>

                    <form action="contact.php" method="post" class="custom-form contact-form" role="form">
                        <div class="row">

                            <!-- Name -->
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-floating">
                                    <input type="text" name="name" id="name"
                                        class="form-control <?php echo isset($formErrors['name']) ? 'is-invalid' : ''; ?>"
                                        placeholder="Name" required
                                        value="<?php echo $formData['name']; ?>">
                                    <label for="name">Name</label>
                                    <?php if (isset($formErrors['name'])): ?>
                                    <div class="invalid-feedback"><?php echo $formErrors['name']; ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-floating">
                                    <input type="email" name="email" id="email"
                                        class="form-control <?php echo isset($formErrors['email']) ? 'is-invalid' : ''; ?>"
                                        placeholder="Email address" required
                                        value="<?php echo $formData['email']; ?>">
                                    <label for="email">Email address</label>
                                    <?php if (isset($formErrors['email'])): ?>
                                    <div class="invalid-feedback"><?php echo $formErrors['email']; ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- Subject -->
                            <div class="col-lg-12 col-12">
                                <div class="form-floating">
                                    <input type="text" name="subject" id="subject"
                                        class="form-control <?php echo isset($formErrors['subject']) ? 'is-invalid' : ''; ?>"
                                        placeholder="Subject" required
                                        value="<?php echo $formData['subject']; ?>">
                                    <label for="subject">Subject</label>
                                    <?php if (isset($formErrors['subject'])): ?>
                                    <div class="invalid-feedback"><?php echo $formErrors['subject']; ?></div>
                                    <?php endif; ?>
                                </div>

                                <!-- Message -->
                                <div class="form-floating">
                                    <textarea class="form-control <?php echo isset($formErrors['message']) ? 'is-invalid' : ''; ?>"
                                        id="message" name="message"
                                        placeholder="Tell me about the project"><?php echo $formData['message']; ?></textarea>
                                    <label for="message">Tell me about the project</label>
                                    <?php if (isset($formErrors['message'])): ?>
                                    <div class="invalid-feedback"><?php echo $formErrors['message']; ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="col-lg-4 col-12 ms-auto">
                                <button type="submit" class="form-control">Submit</button>
                            </div>

                        </div>
                    </form>
                </div>

                <div class="col-lg-5 col-12 mx-auto mt-5 mt-lg-0">
                    <iframe class="google-map"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2595.065641062665!2d-122.4230416990949!3d37.80335401520422!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80858127459fabad%3A0x808ba520e5e9edb7!2sFrancisco%20Park!5e1!3m2!1sen!2sth!4v1684340239744!5m2!1sen!2sth"
                        width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>

                    <h5 class="mt-4 mb-2">Topic Listing Center</h5>
                    <p>Bay St &amp;, Larkin St, San Francisco, CA 94109, United States</p>
                </div>

            </div>
        </div>
    </section>

</main>

<?php include 'includes/footer.php'; ?>
