<?php get_header(); ?>

<body>
    <?php get_template_part('parts/subpage-drawer'); ?>

    <main>
        <div class="menu2-first-view">
            <div class="first-view-container">
                <h1 class="subpage-section-title">MENU
                    <span class="subpage-section-subtitle">メニュー
                    </span>
                </h1>
            </div>
        </div>

        <?php get_template_part('parts/breadcrumb'); ?>

        <div class="menu2-block">
            <div class="container-middle">
                <div class="menu2-btns">
                    <?php $genre_terms = get_terms('genre', ['hide_empty' => false]); ?>
                    <?php foreach ($genre_terms as $genre_term) : ?>
                        <div class="menu2-btn">
                            <a href="<?php echo esc_url(get_term_link($genre_term, 'genre')); ?>" class="menu2-btn-link
                            <?php
                            $cat = get_queried_object();
                            $cat_name = $cat->name;
                            ?>
                            <?php if ($cat_name == esc_html($genre_term->name)) {
                                echo 'is-active';
                            }
                            ?>"><?php echo esc_html($genre_term->name); ?></a>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="menu2-wrapper">
                    <?php
                    $args = [
                        'posts_per_page' => 16,
                        'post_type' => 'menu',
                        'paged' => 'paged',
                        'tax_query' => [
                            [
                                'taxonomy' => 'genre',
                                'field' => 'slug',
                                'terms' => 'breadsweets',
                            ]
                        ],
                    ];
                    $menu_query = new WP_Query($args);
                    ?>
                    <ul class="menu2-list">
                        <?php if ($menu_query->have_posts()) : ?>
                            <?php while ($menu_query->have_posts()) : $menu_query->the_post(); ?>
                                <li class="menu2-item">
                                    <article class="menu2-article">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <?php the_post_thumbnail(); ?>
                                        <?php else : ?>
                                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/noimg.jpg" alt="">
                                        <?php endif; ?>
                                        <h3 class="menu2-name"><?php the_title(); ?></h3>
                                        <p class="menu2-price">
                                            <?php if (get_field('price')) : ?>
                                                <?php the_field('price'); ?>
                                            <?php endif; ?>
                                        </p>
                                    </article>
                                </li>
                            <?php endwhile; ?>
                        <?php endif;
                        wp_reset_postdata(); ?>
                    </ul>

                </div>
            </div>
        </div>

        <div class="access">
            <?php get_template_part('parts/access'); ?>
        </div>
    </main>

    <?php get_footer(); ?>