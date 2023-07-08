<?php get_header(); ?>

<body>
    <?php get_template_part('parts/subpage-drawer'); ?>

    <main>
        <div class="news-first-view">
            <div class="first-view-container">
                <h1 class="subpage-section-title">news
                    <span class="subpage-section-subtitle">ニュース</span>
                </h1>
            </div>
        </div>

        <?php get_template_part('parts/breadcrumb'); ?>

        <div class="news2-block">
            <div class="container-middle">
                <h2 class="news2-category-name">
                    <?php the_archive_title(false, false); ?>
                </h2>
                <div class="news2-wrapper">
                    <div class="news2-content">
                        <ul class="news2-content-list">
                            <?php if (have_posts()) : ?>
                                <?php while (have_posts()) : the_post(); ?>
                                    <li class="news2-content-item">
                                        <article class="news2-article">
                                            <div class="news2-article-ribbon">
                                                <span class="news2-ribbon-piece">
                                                    <?php
                                                    $category = get_the_category();

                                                    if ($category[0]) {
                                                        echo $category[0]->cat_name;
                                                    }
                                                    ?>
                                                </span>
                                            </div>
                                            <a href="<?php the_permalink(); ?>" class="news2-content-link">
                                                <div class="news2-img-box">
                                                    <?php if (has_post_thumbnail()) : ?>
                                                        <?php the_post_thumbnail(); ?>
                                                    <?php else : ?>
                                                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/noimg.jpg" alt="">
                                                    <?php endif; ?>
                                                </div>
                                                <h3 class="news2-content-title">
                                                    <?php the_title(); ?>
                                                </h3>
                                                <time class="news-content-date" datetime="<?php the_time('c') ?>"><?php the_time('Y/n/j'); ?></time>
                                            </a>
                                        </article>
                                    </li>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </ul>
                        <?php if (paginate_links()) : ?>
                            <div class="news2-pagination">
                                <?php echo paginate_links([
                                    'end_size' => 1,
                                    'mid_size' => 3,
                                    'prev_next' => true,
                                    'prev_text' => '<i class="fa-solid fa-angle-left"></i>',
                                    'next_text' => '<i class="fa-solid fa-angle-right"></i>',
                                ]);
                                ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
        <div class="access">
            <?php get_template_part('parts/access'); ?>
        </div>
    </main>

    <?php get_footer(); ?>