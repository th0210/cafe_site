<?php get_header(); ?>

<body>
    <?php get_template_part('parts/subpage-drawer'); ?>

    <main>
        <div class="gift-first-view">
            <div class="first-view-container">
                <h1 class="subpage-section-title">SHOP
                    <span class="subpage-section-subtitle">
                        ギフト・贈り物
                    </span>
                </h1>
            </div>
        </div>

        <?php get_template_part('parts/breadcrumb'); ?>

        <div class="gift-block">
            <div class="container-middle">
                <div class="gift-wrapper">
                    <ul class="gift-main-list">
                        <li class="gift-main-item">
                            <div class="gift-top-content">
                                <?php
                                $first_args = [
                                    'post_type' => 'products',
                                    'posts_per_page' => 1,
                                ];
                                $first_query = new WP_Query($first_args);
                                ?>
                                <?php if ($first_query->have_posts()) : ?>
                                    <?php while ($first_query->have_posts()) : $first_query->the_post(); ?>
                                        <div class="gift-top-large-item">
                                            <?php if (has_post_thumbnail()) : ?>
                                                <?php the_post_thumbnail(); ?>
                                            <?php else : ?>
                                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/noimg.jpg" alt="">
                                            <?php endif; ?>
                                            <h3 class="gift-top-large-title"><?php the_title(); ?></h3>
                                            <p class="gift-top-large-price">
                                                <?php if (get_field('price')) : ?>
                                                    <?php the_field('price'); ?>
                                                <?php endif; ?>
                                            </p>
                                            <div class="gift-btn">
                                                <a href="">ショップで確認する</a>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                <?php endif;
                                wp_reset_postdata(); ?>

                                <div class="gift-top-item">
                                    <ul class="gift-top-inside-list">
                                        <?php
                                        $args = [
                                            'post_type' => 'products',
                                            'posts_per_page' => 4,
                                            'offset' => 1,
                                        ];
                                        $products_query = new WP_Query($args);
                                        ?>
                                        <?php if ($products_query->have_posts()) : ?>
                                            <?php while ($products_query->have_posts()) : $products_query->the_post(); ?>
                                                <li class="gift-top-inside-item">
                                                    <article>
                                                        <?php if (has_post_thumbnail()) : ?>
                                                            <?php the_post_thumbnail(); ?>
                                                        <?php else : ?>
                                                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/noimg.jpg" alt="">
                                                        <?php endif; ?>
                                                        <h3 class="gift-top-inside-title"><?php the_title(); ?></h3>
                                                        <p class="gift-top-inside-price">
                                                            <?php if (get_field('price')) : ?>
                                                                <?php the_field('price'); ?>
                                                            <?php endif; ?>
                                                        </p>
                                                        <div class="gift-btn"><a href="">ショップで確認する</a></div>
                                                    </article>
                                                </li>
                                            <?php endwhile; ?>
                                        <?php endif;
                                        wp_reset_postdata(); ?>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="gift-main-item">
                            <div class="gift-under-content">
                                <ul class="gift-under-list">
                                    <?php
                                    $args2 = [
                                        'post_type' => 'products',
                                        'posts_per_page' => 4,
                                        'offset' => 5,
                                    ];
                                    $products2_query = new WP_Query($args2);
                                    ?>
                                    <?php if ($products2_query->have_posts()) : ?>
                                        <?php while ($products2_query->have_posts()) : $products2_query->the_post(); ?>
                                            <li class="gift-under-item">
                                                <article>
                                                    <?php if (has_post_thumbnail()) : ?>
                                                        <?php the_post_thumbnail(); ?>
                                                    <?php else : ?>
                                                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/noimg.jpg" alt="">
                                                    <?php endif; ?>
                                                    <h3 class="gift-under-title"><?php the_title(); ?></h3>
                                                    <p class="gift-under-price">
                                                        <?php if (get_field('price')) : ?>
                                                            <?php the_field('price'); ?>
                                                        <?php endif; ?>
                                                    </p>
                                                    <div class="gift-btn"><a href="">ショップで確認する</a></div>
                                                </article>
                                            </li>
                                        <?php endwhile; ?>
                                    <?php endif;
                                    wp_reset_postdata(); ?>
                                </ul>
                            </div>
                        </li>
                    </ul>
                    <div class="gift-message">
                        <div class="gift-message-info">
                            <h2 class="gift-message-title">
                                ラッピングは無料でお付けいたします。
                                <br>お気軽にご相談ください。
                            </h2>
                            <p class="gift-message-text">
                                テキストがはいります。テキストがはいります。テキストがはいります。テキストがはいります。テキストがはいります。テキストがはいります。テキストがはいります。テキストがはいります。テキストがはいります。
                            </p>
                        </div>
                        <div class="gift-message-img">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/img_wrapping.jpg" alt="">
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