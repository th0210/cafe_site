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

        <div class="contact-contact-block">
            <div class="container-small">
                <p class="contact-contact-text">送信が完了しました</p>
               <p class="contact-contact-message">
                お問い合わせありがとうございました。
                <br>3営業日以内に返信いたしますので、しばらくお待ちいただけますと幸いです。
               </p>
            </div>
        </div>

        <div class="access">
            <?php get_template_part('parts/access'); ?>
        </div>
    </main>

<?php get_footer(); ?>