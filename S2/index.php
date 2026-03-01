<?php
$pageTitle = 'Topic Listing Bootstrap 5 Template';
$pageDescription = 'Platform for creatives around the world';
$activePage = 'home';

// Handle search form
$keyword = '';
if (isset($_GET['keyword'])) {
    $keyword = htmlspecialchars(trim($_GET['keyword']));
}

include 'includes/head.php';
?>

<main>

    <?php include 'includes/navbar.php'; ?>

    <section class="hero-section d-flex justify-content-center align-items-center" id="section_1">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12 mx-auto">
                    <h1 class="text-white text-center">Discover. Learn. Enjoy</h1>
                    <h6 class="text-center">platform for creatives around the world</h6>

                    <form method="get" action="index.php" class="custom-form mt-4 pt-2 mb-lg-0 mb-5" role="search">
                        <div class="input-group input-group-lg">
                            <span class="input-group-text bi-search" id="basic-addon1"></span>
                            <input name="keyword" type="search" class="form-control" id="keyword"
                                placeholder="Design, Code, Marketing, Finance ..."
                                aria-label="Search"
                                value="<?php echo $keyword; ?>">
                            <button type="submit" class="form-control">Search</button>
                        </div>
                    </form>

                    <?php if ($keyword): ?>
                    <div class="text-center mt-3">
                        <p class="text-white">Showing results for: <strong><?php echo $keyword; ?></strong></p>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>


    <section class="featured-section">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-lg-4 col-12 mb-4 mb-lg-0">
                    <div class="custom-block bg-white shadow-lg">
                        <a href="topics-detail.php">
                            <div class="d-flex">
                                <div>
                                    <h5 class="mb-2">Web Design</h5>
                                    <p class="mb-0">When you search for free CSS templates, you will notice that TemplateMo is one of the best websites.</p>
                                </div>
                                <span class="badge bg-design rounded-pill ms-auto">14</span>
                            </div>
                            <img src="images/topics/undraw_Remote_design_team_re_urdx.png" class="custom-block-image img-fluid" alt="">
                        </a>
                    </div>
                </div>

                <div class="col-lg-6 col-12">
                    <div class="custom-block custom-block-overlay">
                        <div class="d-flex flex-column h-100">
                            <img src="images/businesswoman-using-tablet-analysis.jpg" class="custom-block-image img-fluid" alt="">
                            <div class="custom-block-overlay-text d-flex">
                                <div>
                                    <h5 class="text-white mb-2">Finance</h5>
                                    <p class="text-white">Topic Listing Template includes homepage, listing page, detail page, and contact page. You can feel free to edit and adapt for your CMS requirements.</p>
                                    <a href="topics-detail.php" class="btn custom-btn mt-2 mt-lg-3">Learn More</a>
                                </div>
                                <span class="badge bg-finance rounded-pill ms-auto">25</span>
                            </div>
                            <div class="social-share d-flex">
                                <p class="text-white me-4">Share:</p>
                                <ul class="social-icon">
                                    <li class="social-icon-item">
                                        <a href="#" class="social-icon-link bi-twitter"></a>
                                    </li>
                                    <li class="social-icon-item">
                                        <a href="#" class="social-icon-link bi-facebook"></a>
                                    </li>
                                    <li class="social-icon-item">
                                        <a href="#" class="social-icon-link bi-pinterest"></a>
                                    </li>
                                </ul>
                                <a href="#" class="custom-icon bi-bookmark ms-auto"></a>
                            </div>
                            <div class="section-overlay"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <section class="explore-section section-padding" id="section_2">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="mb-4">Browse Topics</h2>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <?php
                    $tabs = [
                        ['id' => 'design',    'label' => 'Design'],
                        ['id' => 'marketing', 'label' => 'Marketing'],
                        ['id' => 'finance',   'label' => 'Finance'],
                        ['id' => 'music',     'label' => 'Music'],
                        ['id' => 'education', 'label' => 'Education'],
                    ];
                    foreach ($tabs as $i => $tab):
                    ?>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link <?php echo $i === 0 ? 'active' : ''; ?>"
                            id="<?php echo $tab['id']; ?>-tab"
                            data-bs-toggle="tab"
                            data-bs-target="#<?php echo $tab['id']; ?>-tab-pane"
                            type="button" role="tab"
                            aria-controls="<?php echo $tab['id']; ?>-tab-pane"
                            aria-selected="<?php echo $i === 0 ? 'true' : 'false'; ?>">
                            <?php echo $tab['label']; ?>
                        </button>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="tab-content" id="myTabContent">

                        <!-- Design Tab -->
                        <div class="tab-pane fade show active" id="design-tab-pane" role="tabpanel" aria-labelledby="design-tab" tabindex="0">
                            <div class="row">
                                <?php
                                $designTopics = [
                                    ['title' => 'Web Design',   'desc' => 'Topic Listing Template based on Bootstrap 5', 'badge' => 14,  'img' => 'undraw_Remote_design_team_re_urdx.png'],
                                    ['title' => 'Graphic',      'desc' => 'Lorem Ipsum dolor sit amet consectetur',      'badge' => 75,  'img' => 'undraw_Redesign_feedback_re_jvm0.png'],
                                    ['title' => 'Logo Design',  'desc' => 'Lorem Ipsum dolor sit amet consectetur',      'badge' => 100, 'img' => 'colleagues-working-cozy-office-medium-shot.png'],
                                ];
                                foreach ($designTopics as $topic):
                                ?>
                                <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                                    <div class="custom-block bg-white shadow-lg">
                                        <a href="topics-detail.php">
                                            <div class="d-flex">
                                                <div>
                                                    <h5 class="mb-2"><?php echo htmlspecialchars($topic['title']); ?></h5>
                                                    <p class="mb-0"><?php echo htmlspecialchars($topic['desc']); ?></p>
                                                </div>
                                                <span class="badge bg-design rounded-pill ms-auto"><?php echo $topic['badge']; ?></span>
                                            </div>
                                            <img src="images/topics/<?php echo $topic['img']; ?>" class="custom-block-image img-fluid" alt="">
                                        </a>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <!-- Marketing Tab -->
                        <div class="tab-pane fade" id="marketing-tab-pane" role="tabpanel" aria-labelledby="marketing-tab" tabindex="0">
                            <div class="row">
                                <?php
                                $marketingTopics = [
                                    ['title' => 'Advertising',    'desc' => 'Lorem Ipsum dolor sit amet consectetur', 'badge' => 30, 'img' => 'undraw_online_ad_re_ol62.png'],
                                    ['title' => 'Video Content',  'desc' => 'Lorem Ipsum dolor sit amet consectetur', 'badge' => 65, 'img' => 'undraw_Group_video_re_btu7.png'],
                                    ['title' => 'Viral Tweet',    'desc' => 'Lorem Ipsum dolor sit amet consectetur', 'badge' => 50, 'img' => 'undraw_viral_tweet_gndb.png'],
                                ];
                                foreach ($marketingTopics as $topic):
                                ?>
                                <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-3">
                                    <div class="custom-block bg-white shadow-lg">
                                        <a href="topics-detail.php">
                                            <div class="d-flex">
                                                <div>
                                                    <h5 class="mb-2"><?php echo htmlspecialchars($topic['title']); ?></h5>
                                                    <p class="mb-0"><?php echo htmlspecialchars($topic['desc']); ?></p>
                                                </div>
                                                <span class="badge bg-advertising rounded-pill ms-auto"><?php echo $topic['badge']; ?></span>
                                            </div>
                                            <img src="images/topics/<?php echo $topic['img']; ?>" class="custom-block-image img-fluid" alt="">
                                        </a>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <!-- Finance Tab -->
                        <div class="tab-pane fade" id="finance-tab-pane" role="tabpanel" aria-labelledby="finance-tab" tabindex="0">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12 mb-4 mb-lg-0">
                                    <div class="custom-block bg-white shadow-lg">
                                        <a href="topics-detail.php">
                                            <div class="d-flex">
                                                <div>
                                                    <h5 class="mb-2">Investment</h5>
                                                    <p class="mb-0">Lorem Ipsum dolor sit amet consectetur</p>
                                                </div>
                                                <span class="badge bg-finance rounded-pill ms-auto">30</span>
                                            </div>
                                            <img src="images/topics/undraw_Finance_re_gnv2.png" class="custom-block-image img-fluid" alt="">
                                        </a>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="custom-block custom-block-overlay">
                                        <div class="d-flex flex-column h-100">
                                            <img src="images/businesswoman-using-tablet-analysis.jpg" class="custom-block-image img-fluid" alt="">
                                            <div class="custom-block-overlay-text d-flex">
                                                <div>
                                                    <h5 class="text-white mb-2">Finance</h5>
                                                    <p class="text-white">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sint animi necessitatibus aperiam repudiandae nam omnis</p>
                                                    <a href="topics-detail.php" class="btn custom-btn mt-2 mt-lg-3">Learn More</a>
                                                </div>
                                                <span class="badge bg-finance rounded-pill ms-auto">25</span>
                                            </div>
                                            <div class="social-share d-flex">
                                                <p class="text-white me-4">Share:</p>
                                                <ul class="social-icon">
                                                    <li class="social-icon-item"><a href="#" class="social-icon-link bi-twitter"></a></li>
                                                    <li class="social-icon-item"><a href="#" class="social-icon-link bi-facebook"></a></li>
                                                    <li class="social-icon-item"><a href="#" class="social-icon-link bi-pinterest"></a></li>
                                                </ul>
                                                <a href="#" class="custom-icon bi-bookmark ms-auto"></a>
                                            </div>
                                            <div class="section-overlay"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Music Tab -->
                        <div class="tab-pane fade" id="music-tab-pane" role="tabpanel" aria-labelledby="music-tab" tabindex="0">
                            <div class="row">
                                <?php
                                $musicTopics = [
                                    ['title' => 'Composing Song', 'desc' => 'Lorem Ipsum dolor sit amet consectetur', 'badge' => 45, 'img' => 'undraw_Compose_music_re_wpiw.png'],
                                    ['title' => 'Online Music',   'desc' => 'Lorem Ipsum dolor sit amet consectetur', 'badge' => 45, 'img' => 'undraw_happy_music_g6wc.png'],
                                    ['title' => 'Podcast',        'desc' => 'Lorem Ipsum dolor sit amet consectetur', 'badge' => 20, 'img' => 'undraw_Podcast_audience_re_4i5q.png'],
                                ];
                                foreach ($musicTopics as $topic):
                                ?>
                                <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-3">
                                    <div class="custom-block bg-white shadow-lg">
                                        <a href="topics-detail.php">
                                            <div class="d-flex">
                                                <div>
                                                    <h5 class="mb-2"><?php echo htmlspecialchars($topic['title']); ?></h5>
                                                    <p class="mb-0"><?php echo htmlspecialchars($topic['desc']); ?></p>
                                                </div>
                                                <span class="badge bg-music rounded-pill ms-auto"><?php echo $topic['badge']; ?></span>
                                            </div>
                                            <img src="images/topics/<?php echo $topic['img']; ?>" class="custom-block-image img-fluid" alt="">
                                        </a>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <!-- Education Tab -->
                        <div class="tab-pane fade" id="education-tab-pane" role="tabpanel" aria-labelledby="education-tab" tabindex="0">
                            <div class="row">
                                <?php
                                $educationTopics = [
                                    ['title' => 'Graduation', 'desc' => 'Lorem Ipsum dolor sit amet consectetur', 'badge' => 80, 'img' => 'undraw_Graduation_re_gthn.png'],
                                    ['title' => 'Educator',   'desc' => 'Lorem Ipsum dolor sit amet consectetur', 'badge' => 75, 'img' => 'undraw_Educator_re_ju47.png'],
                                ];
                                foreach ($educationTopics as $topic):
                                ?>
                                <div class="col-lg-6 col-md-6 col-12 mb-4 mb-lg-3">
                                    <div class="custom-block bg-white shadow-lg">
                                        <a href="topics-detail.php">
                                            <div class="d-flex">
                                                <div>
                                                    <h5 class="mb-2"><?php echo htmlspecialchars($topic['title']); ?></h5>
                                                    <p class="mb-0"><?php echo htmlspecialchars($topic['desc']); ?></p>
                                                </div>
                                                <span class="badge bg-education rounded-pill ms-auto"><?php echo $topic['badge']; ?></span>
                                            </div>
                                            <img src="images/topics/<?php echo $topic['img']; ?>" class="custom-block-image img-fluid" alt="">
                                        </a>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="timeline-section section-padding" id="section_3">
        <div class="section-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="text-white mb-4">How does it work?</h2>
                </div>

                <div class="col-lg-10 col-12 mx-auto">
                    <div class="timeline-container">
                        <ul class="vertical-scrollable-timeline" id="vertical-scrollable-timeline">
                            <div class="list-progress">
                                <div class="inner"></div>
                            </div>

                            <?php
                            $steps = [
                                ['icon' => 'bi-search',   'title' => 'Search your favourite topic',       'desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis, cumque magnam? Sequi, cupiditate quibusdam alias illum sed esse ad dignissimos libero sunt, quisquam numquam aliquam? Voluptas, accusamus omnis?'],
                                ['icon' => 'bi-bookmark', 'title' => 'Bookmark &amp; Keep it for yourself', 'desc' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sint animi necessitatibus aperiam repudiandae nam omnis est vel quo, nihil repellat quia velit error modi earum similique odit labore. Doloremque, repudiandae?'],
                                ['icon' => 'bi-book',     'title' => 'Read &amp; Enjoy',                    'desc' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Animi vero quisquam, rem assumenda similique voluptas distinctio, iste est hic eveniet debitis ut ducimus beatae id? Quam culpa deleniti officiis autem?'],
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


    <section class="contact-section section-padding section-bg" id="section_5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12 text-center">
                    <h2 class="mb-5">Get in touch</h2>
                </div>

                <div class="col-lg-5 col-12 mb-4 mb-lg-0">
                    <iframe class="google-map"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2595.065641062665!2d-122.4230416990949!3d37.80335401520422!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80858127459fabad%3A0x808ba520e5e9edb7!2sFrancisco%20Park!5e1!3m2!1sen!2sth!4v1684340239744!5m2!1sen!2sth"
                        width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

                <div class="col-lg-3 col-md-6 col-12 mb-3 ms-auto">
                    <h4 class="mb-3">Head office</h4>
                    <p>Bay St &amp;, Larkin St, San Francisco, CA 94109, United States</p>
                    <hr>
                    <p class="d-flex align-items-center mb-1">
                        <span class="me-2">Phone</span>
                        <a href="tel:3052409671" class="site-footer-link">305-240-9671</a>
                    </p>
                    <p class="d-flex align-items-center">
                        <span class="me-2">Email</span>
                        <a href="mailto:info@company.com" class="site-footer-link">info@company.com</a>
                    </p>
                </div>

                <div class="col-lg-3 col-md-6 col-12 mx-auto">
                    <h4 class="mb-3">Dubai office</h4>
                    <p>Burj Park, Downtown Dubai, United Arab Emirates</p>
                    <hr>
                    <p class="d-flex align-items-center mb-1">
                        <span class="me-2">Phone</span>
                        <a href="tel:11022034000" class="site-footer-link">110-220-3400</a>
                    </p>
                    <p class="d-flex align-items-center">
                        <span class="me-2">Email</span>
                        <a href="mailto:info@company.com" class="site-footer-link">info@company.com</a>
                    </p>
                </div>

            </div>
        </div>
    </section>

</main>

<?php include 'includes/footer.php'; ?>
