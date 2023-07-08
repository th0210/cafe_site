<?php get_header(); ?>

<body>
    <?php get_template_part('parts/subpage-drawer'); ?>

    <main>
        <div class="shop-first-view">
            <div class="first-view-container">
                <h1 class="subpage-section-title">SHOP
                    <span class="subpage-section-subtitle">店舗一覧</span>
                </h1>
            </div>
        </div>

        <div class="breadcrumbs">
            <div class="breadcrumbs-container">
                <span class="breadcrumbs-item"><a href="index.html">HOME</a></span>
                <span>></span>
                <span class="breadcrumbs-item">店舗一覧</span>
            </div>
        </div>

        <div class="shop-block">
            <div class="container-small">
                <?php
                $args = [
                    'post_type' => 'shop',
                    'posts_per_page' => 3, 
                    'order' => 'ASC', 
                ];
                $shop_query = new WP_Query($args); 
                ?>
                <?php if($shop_query->have_posts()) : ?> 
                    <?php while($shop_query->have_posts()) : $shop_query->the_post(); ?>
                <div class="shop-place-wrapper">
                    <h2 class="shop-access-title">
                        <?php if (get_field('name')) : ?> 
                            <?php the_field('name'); ?>
                        <?php endif; ?> 
                    </h2> 
                    <div class="shop-googlemap"> 
                        <?php if (get_field('map')) : ?> 
                            <?php the_field('map'); ?>
                        <?php endif; ?> 
                    </div>
                    <div class="shop-access-info">
                        <dl class="access-info-detail">
                            <?php if (get_field('address')) : ?>
                                <div class="access-info-item">
                                    <dt class="access-info-title">住所</dt>
                                    <dd class="access-info-content">
                                        <?php echo nl2br(get_post_meta($post->ID, 'address', true)); ?>
                                    </dd>
                                </div>
                            <?php endif; ?>

                            <?php if (get_field('time')) : ?>
                                <div class="access-info-item">
                                    <dt class="access-info-title">営業時間</dt>
                                    <dd class="access-info-content">
                                        <?php echo nl2br(get_post_meta($post->ID, 'time', true)); ?>
                                    </dd>
                                </div>
                            <?php endif; ?>

                            <?php if (get_field('tel')) : ?>
                                <div class="access-info-item">
                                    <dt class="access-info-title">TEL</dt>
                                    <dd class="access-info-content"><?php the_field('tel'); ?></dd>
                                </div>
                            <?php endif; ?>

                            <?php if (get_field('holiday')) : ?>
                                <div class="access-info-item">
                                    <dt class="access-info-title">定休日</dt>
                                    <dd class="access-info-content"><?php the_field('holiday'); ?></dd>
                                </div>
                            <?php endif; ?>

                            <?php if (get_field('email')) : ?>
                                <div class="access-info-item">
                                    <dt class="access-info-title">Mail</dt>
                                    <dd class="access-info-content"><?php the_field('email'); ?></dd>
                                </div>
                            <?php endif; ?>

                            <?php if (get_field('seat')) : ?>
                                <div class="access-info-item">
                                    <dt class="access-info-title">座席</dt>
                                    <dd class="access-info-content"><?php the_field('seat'); ?></dd>
                                </div>
                            <?php endif; ?>
                        </dl>
                    </div>
                </div>
                <?php endwhile; ?>
                <?php endif; 
                wp_reset_postdata(); ?> 


                <!--<div class="shop-place-wrapper">
                    <h2 class="shop-access-title">OPEN CAFE 阿佐ヶ谷店</h2>
                    <div class="shop-googlemap">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3239.865606084966!2d139.63393441562852!3d35.704924680188775!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6018f2767eb9e92b%3A0xc2d0573363890acc!2z6Zi_5L2Q44O26LC36aeF!5e0!3m2!1sja!2sjp!4v1673423384284!5m2!1sja!2sjp" width="668" height="367" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                    <div class="shop-access-info">
                        <dl class="access-info-detail">
                            <div class="access-info-item">
                                <dt class="access-info-title">住所</dt>
                                <dd class="access-info-content">
                                    〒000-0000
                                    <br>東京都杉並区阿佐ヶ谷0-0-0
                                </dd>
                            </div>

                            <div class="access-info-item">
                                <dt class="access-info-title">営業時間</dt>
                                <dd class="access-info-content">
                                    7:00〜21:00
                                    <br>※ラストオーダー 20:30
                                </dd>
                            </div>

                            <div class="access-info-item">
                                <dt class="access-info-title">TEL</dt>
                                <dd class="access-info-content">0123-456-789</dd>
                            </div>

                            <div class="access-info-item">
                                <dt class="access-info-title">定休日</dt>
                                <dd class="access-info-content">水曜日</dd>
                            </div>

                            <div class="access-info-item">
                                <dt class="access-info-title">Mail</dt>
                                <dd class="access-info-content">example@mail.com</dd>
                            </div>

                            <div class="access-info-item">
                                <dt class="access-info-title">座席</dt>
                                <dd class="access-info-content">テーブル20席 ／ カウンター席6席</dd>
                            </div>
                        </dl>
                    </div>
                </div>

                <div class="shop-place-wrapper">
                    <h2 class="shop-access-title">OPEN CAFE 中野店</h2>
                    <div class="shop-googlemap">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25918.55545308045!2d139.64175236830124!3d35.70606084615328!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6018f296b32f3571%3A0x568104f2ac34074e!2z5Lit6YeO6aeF!5e0!3m2!1sja!2sjp!4v1673423931726!5m2!1sja!2sjp" width="668" height="367" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                    <div class="shop-access-info">
                        <dl class="access-info-detail">
                            <div class="access-info-item">
                                <dt class="access-info-title">住所</dt>
                                <dd class="access-info-content">
                                    〒000-0000
                                    <br>東京都中野区中野0-0-0
                                </dd>
                            </div>

                            <div class="access-info-item">
                                <dt class="access-info-title">営業時間</dt>
                                <dd class="access-info-content">
                                    7:00〜21:00
                                    <br>※ラストオーダー 20:30
                                </dd>
                            </div>

                            <div class="access-info-item">
                                <dt class="access-info-title">TEL</dt>
                                <dd class="access-info-content">0123-456-789</dd>
                            </div>

                            <div class="access-info-item">
                                <dt class="access-info-title">定休日</dt>
                                <dd class="access-info-content">水曜日</dd>
                            </div>

                            <div class="access-info-item">
                                <dt class="access-info-title">Mail</dt>
                                <dd class="access-info-content">example@mail.com</dd>
                            </div>

                            <div class="access-info-item">
                                <dt class="access-info-title">座席</dt>
                                <dd class="access-info-content">テーブル20席 ／ カウンター席6席</dd>
                            </div>
                        </dl>
                    </div>
                </div>-->
            </div>
        </div>

        <div class="access">
            <?php get_template_part('parts/access'); ?>
        </div>
    </main>
    <?php get_footer(); ?>