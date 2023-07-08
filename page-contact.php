<?php get_header(); ?>
<body>
<?php get_template_part('parts/subpage-drawer'); ?>

    <main>
        <div class="contact2-first-view">
            <div class="first-view-container">
                <h1 class="subpage-section-title">CONTACT
                    <span class="subpage-section-subtitle">お問い合わせ
                    </span>
                </h1>
            </div>
        </div>

        <?php get_template_part('parts/breadcrumb'); ?>

        <div class="contact2-block">
            <div class="container-small">
                <div class="contact2-wrapper">
                    <h2 class="contact2-title">お問い合わせフォーム</h2>
                    <p class="contact2-subtitle">
                        お問い合わせ内容に応じて、項目をご選択のうえ、お気軽にお問い合わせください。
                    </p>
                    <div class="contact2-main-content">
                        <?php echo do_shortcode('[contact-form-7 id="249" title="お問い合わせ"]'); ?>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <div class="access">
            <?php get_template_part('parts/access'); ?>
        </div>
    </main>

<?php get_footer(); ?>