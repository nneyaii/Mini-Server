<?php
$pageTitle = 'Halaman Relawan';
$pageDescription = 'Pengenalan Relawan';
$activePage = '';

include 'includes/head.php';
?>

<main>

    <?php include 'includes/navbar.php'; ?>

    <header class="site-header d-flex flex-column justify-content-center align-items-center">
        <div class="container">
            <div class="row justify-content-center align-items-center">

                <div class="col-lg-5 col-12 mb-5">
                    <h2 class="text-white">Program Relawan <br> Sobat Literasi</h2>
                    <div class="d-flex align-items-center mt-5">
                        <a href="#topics-detail" class="btn custom-btn custom-border-btn smoothscroll me-4">Read More</a>
                        <a href="#top" class="custom-icon bi-bookmark smoothscroll"></a>
                    </div>
                </div>

                <div class="col-lg-5 col-12">
                    <div class="topics-detail-block bg-white shadow-lg">
                        <img src="images/topics/undraw_Remote_design_team_re_urdx.png"
                            class="topics-detail-block-image img-fluid">
                    </div>
                </div>

            </div>
        </div>
    </header>


    <section class="topics-detail-section section-padding" id="topics-detail">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12 m-auto">
                    <h3 class="mb-4">Apa Itu Relawan?</h3>

                    <p><strong>Relawan Sobat Literasi</strong> Relawan Sobat Literasi adalah individu yang secara sukarela berbagi ilmu dan pengetahuan kepada orang lain melalui materi pembelajaran. Relawan dapat berkontribusi dengan membuat dan membagikan materi seperti artikel, rangkuman belajar, modul, maupun file PDF yang bermanfaat bagi pembaca.</p>

                    <p><strong>Melalui program ini,</strong> setiap relawan dapat membantu menyebarkan ilmu dan mendukung kegiatan literasi agar lebih banyak orang mendapatkan akses belajar yang mudah dan bermanfaat.</p>

                    <blockquote>
                        Ilmu akan lebih bermakna ketika dibagikan kepada orang lain.
                    </blockquote>

                    <div class="row my-4">
                        <div class="col-lg-6 col-md-6 col-12">
                            <img src="images/businesswoman-using-tablet-analysis.jpg"
                                class="topics-detail-block-image img-fluid">
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 mt-4 mt-lg-0 mt-md-0">
                            <img src="images/colleagues-working-cozy-office-medium-shot.jpg"
                                class="topics-detail-block-image img-fluid">
                        </div>
                    </div>

                                    <h3>Penjelasan Peran Relawan</h3>
                    <p>
                        Relawan Sobat Literasi berperan sebagai kontributor ilmu yang membantu 
                        menyediakan materi pembelajaran untuk dibagikan kepada masyarakat.
                    </p>

                    <ul>
                        <li>Membuat materi pembelajaran yang informatif.</li>
                        <li>Berbagi pengetahuan melalui artikel atau rangkuman.</li>
                        <li>Mengirimkan materi dalam bentuk PDF atau dokumen.</li>
                        <li>Membantu meningkatkan akses belajar melalui konten edukatif.</li>
                    </ul>

                    <h3>Syarat Menjadi Relawan</h3>
                    <ul>
                        <li>Memiliki minat untuk berbagi ilmu dan pengetahuan.</li>
                        <li>Bersedia berkontribusi secara sukarela.</li>
                        <li>Mampu membuat atau menyusun materi pembelajaran.</li>
                        <li>Materi yang dibuat merupakan karya sendiri atau mencantumkan sumber.</li>
                        <li>Bersedia mengikuti aturan yang berlaku di website Sobat Literasi.</li>
                        <li>Mengisi formulir pendaftaran relawan.</li>
                    </ul>

                    <h3>Ketentuan Materi</h3>
                    Materi yang dikirimkan oleh relawan harus memenuhi beberapa ketentuan berikut:
                    <ul>
                        <li>Materi bersifat edukatif dan bermanfaat bagi pembaca.</li>
                        <li>Menggunakan bahasa yang jelas dan mudah dipahami.</li>
                        <li>Tidak mengandung unsur SARA, kekerasan, atau konten yang tidak pantas.</li>
                        <li>Materi merupakan karya asli atau mencantumkan sumber referensi yang digunakan.</li>
                        <li>Materi dapat berupa artikel, rangkuman pelajaran, modul pembelajaran, atau file PDF.</li>
                       
                    </ul>
                     Tim Sobat Literasi berhak melakukan penyuntingan sebelum materi dipublikasikan.
                </div>
            </div>
        </div>
    </section>

    <section class="timeline-section section-padding">
    <div class="section-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="text-white mb-4">Alur Pengiriman Materi</h2>
                </div>

                <div class="col-lg-10 col-12 mx-auto">
                    <div class="timeline-container">
                        <ul class="vertical-scrollable-timeline" id="vertical-scrollable-timeline">
                            <div class="list-progress">
                                <div class="inner"></div>
                            </div>

                            <?php
                            $steps = [
                                ['icon' => 'bi-bookmark',   'title' => 'Menyiapkan Materi',      'desc' => 'Relawan menyiapkan materi pembelajaran yang ingin dibagikan, seperti artikel, rangkuman, modul, atau file PDF yang bersifat edukatif.'],
                                ['icon' => 'bi-send', 'title' => 'Mengirimkan Materi', 'desc' => 'Materi yang telah dibuat kemudian dikirimkan melalui formulir pengiriman atau email yang tersedia di website Sobat Literasi.'],
                                ['icon' => 'bi-search',     'title' => 'Proses Peninjauan dan Publikasi',                    'desc' => 'Tim Sobat Literasi akan meninjau materi yang dikirimkan. Jika materi sesuai dengan ketentuan yang berlaku, maka materi akan dipublikasikan di website agar dapat diakses oleh pembaca.'],
                            ];
                            foreach ($steps as $step):
                            ?>
                            <li>
                                <h4 class="text-white mb-3"><?php echo $step['title']; ?></h4>
                                <p class="text-white"><?php echo $step['desc']; ?></p>
                                <div class="icon-holder">
                                    <i class="<?php echo $step['icon']; ?>"></i>
                                </div>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>

                <div class="col-12 text-center mt-5">
                    <p class="text-white">
                        Want to learn more?
                        <a href="#" class="btn custom-btn custom-border-btn ms-3">Check out Youtube</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="faq-section section-padding" id="section_4">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <h2 class="mb-4">Frequently Asked Questions</h2>
                </div>

                <div class="clearfix"></div>

                <div class="col-lg-5 col-12">
                    <img src="images/faq_graphic.jpg" class="img-fluid" alt="FAQs">
                </div>

                <div class="col-lg-6 col-12 m-auto">
                    <div class="accordion" id="accordionExample">
                        <?php
                        $faqs = [
                            ['id' => 'One',   'question' => 'What is Topic Listing?',  'answer' => 'Topic Listing is free Bootstrap 5 CSS template. <strong>You are not allowed to redistribute this template</strong> on any other template collection website without our permission. Please contact TemplateMo for more detail. Thank you.', 'open' => true],
                            ['id' => 'Two',   'question' => 'How to find a topic?',    'answer' => 'You can search on Google with <strong>keywords</strong> such as templatemo portfolio, templatemo one-page layouts, photography, digital marketing, etc.', 'open' => false],
                            ['id' => 'Three', 'question' => 'Does it need to paid?',   'answer' => 'You can modify any of this with custom CSS or overriding our default variables. It\'s also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.', 'open' => false],
                        ];
                        foreach ($faqs as $faq):
                        ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading<?php echo $faq['id']; ?>">
                                <button class="accordion-button <?php echo !$faq['open'] ? 'collapsed' : ''; ?>"
                                    type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse<?php echo $faq['id']; ?>"
                                    aria-expanded="<?php echo $faq['open'] ? 'true' : 'false'; ?>"
                                    aria-controls="collapse<?php echo $faq['id']; ?>">
                                    <?php echo htmlspecialchars($faq['question']); ?>
                                </button>
                            </h2>
                            <div id="collapse<?php echo $faq['id']; ?>"
                                class="accordion-collapse collapse <?php echo $faq['open'] ? 'show' : ''; ?>"
                                aria-labelledby="heading<?php echo $faq['id']; ?>"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <?php echo $faq['answer']; ?>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>

            </div>
        </div>
    </section>

</main>

<?php include 'includes/footer.php'; ?>
