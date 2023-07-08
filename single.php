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

        <?php if (have_posts()) : ?>
            <div class="news-news-block">
                <?php while (have_posts()) : the_post(); ?>
                    <div class="container-small">
                        <div class="news-news-thumbnail">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail(); ?>
                            <?php else : ?>
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/noimg.jpg" alt="">
                            <?php endif; ?>
                        </div>
                        <h2 class="news-news-title">
                            <?php the_title(); ?>
                        </h2>
                        <div class="news-news-info">
                            <time class="news-news-date" datetime="<?php the_time('c'); ?>"><?php the_time('Y/n/j'); ?></time>
                            <span></span>
                            <div class="news-news-category">
                                <?php
                                $category = get_the_category();

                                if ($category[0]) {
                                    echo $category[0]->cat_name;
                                }
                                ?>
                            </div>
                        </div>
                        <div class="get-news-content">
                            <?php the_content(); ?>
                        </div>
                        <div class="news-news-pagination">
                            <?php if (get_previous_post()) : ?>
                                <div class="news-news-prev"><?php previous_post_link('%link', '<i class="fa-solid fa-angle-left"></i>前の記事'); ?></div>
                            <?php endif; ?>
                            <!--<div class="news-news-prev"><a href=""><i class="fa-solid fa-angle-left"></i>前の記事</a></div>-->
                            <div class="news-news-article-all"><a href="
                            <?php 
                            $page_id = get_page_by_path('news');
                                the_permalink($page_id->ID);
                            ?> 
                            ">記事一覧</a></div>  
                            <!--<div class="news-news-next"><a href="#">次の記事<i class="fa-solid fa-angle-right"></i></a></div>-->
                            <?php if (get_next_post()) : ?>
                                <div class="news-news-next"><?php next_post_link('%link', '次の記事<i class="fa-solid fa-angle-right"></i>'); ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="news-news-relation">
                            <h2 class="news-news-relation-title">関連記事</h2>
                            <div class="news-news-relation-content">
                                <ul class="news-news-relation-list">
                                    <?php if (has_category()) : ?>
                                        <?php
                                        $cats = get_the_category();
                                        $cat_ids = [];
                                        foreach ($cats as $cat) {
                                            $cat_ids[] = $cat->term_id;
                                        };
                                        ?>
                                    <?php endif; ?>
                                    <?php
                                    $args = [
                                        'post_type' => 'post',
                                        'posts_per_page' => '6',
                                        'post__not_in' => array($post->ID),
                                        'category__in' => $cat_ids,
                                        'orderby' => 'rand'
                                    ];
                                    $cat_query = new WP_Query($args);
                                    ?>

                                    <?php if ($cat_query->have_posts()) : ?>
                                        <?php while ($cat_query->have_posts()) : $cat_query->the_post(); ?>
                                            <li class="news-news-relation-item">
                                                <article class="news-news-relation-article">
                                                    <div class="news-news-article-ribbon">
                                                        <span class="ribbon-piece">
                                                            <?php
                                                            $category = get_the_category();
                                                            if ($category[0]) {
                                                                echo $category[0]->cat_name;
                                                            }
                                                            ?>
                                                        </span>
                                                    </div>
                                                    <a href="<?php the_permalink(); ?>" class="news-news-relation-link">
                                                        <div class="news-news-relation-img-box">
                                                            <?php if (has_post_thumbnail()) : ?>
                                                                <?php the_post_thumbnail(); ?>
                                                            <?php else : ?>
                                                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/noimg.jpg" class="news-news-relation-img" alt="">
                                                            <?php endif; ?>
                                                        </div>
                                                        <h3 class="news-news-relation-link-title">
                                                            <?php the_title(); ?>
                                                        </h3>
                                                        <time class="news-news-relation-link-date" datetime="<?php the_time('c'); ?>"><?php the_time('Y/n/j'); ?></time>
                                                    </a>
                                                </article>
                                            </li>
                                        <?php endwhile; ?>
                                    <?php endif;
                                    wp_reset_postdata(); ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>

        <div class="access">
            <?php get_template_part('parts/access'); ?>
        </div>
    </main>

    <?php get_footer(); ?>