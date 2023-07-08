<?php get_header(); ?>

<body>
    <header>
        <div class="header-container">
            <h1 class="header-logo"><a href="index.html"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/logo_light.png" alt="Open Cafe - dish & coffee -"></a></h1>
            <div class="header-wrapper">
                <nav>
                    <ul class="header-nav">
                        <li class="header-nav-list"><a href="index.html" class="header-nav-link">top<span>／ トップ</span></a></li>
                        <li class="header-nav-list"><a href="concept.html" class="header-nav-link">concept<span>／ コンセプト</span></a>
                        </li>
                        <li class="header-nav-list"><a href="menu.html" class="header-nav-link">menu<span>／ メニュー</span></a></li>
                        <li class="header-nav-list"><a href="news.html" class="header-nav-link">news<span>／ お知らせ</span></a></li>
                        <li class="header-nav-list"><a href="shop.html" class="header-nav-link">shop<span>／ 店舗情報</span></a></li>
                        <li class="header-nav-list"><a href="gift.html" class="header-nav-link">gift<span>／ ギフト・贈り物</span></a>
                        </li>
                        <li class="header-nav-list"><a href="contact.html" class="header-nav-link">contact<span>／ お問い合わせ</span></a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="header-sns-link">
                <div class="header-sns-link-item"><a href="#"><i class="fa-brands fa-twitter"></i></a></div>
                <div class="header-sns-link-item"><a href="#"><i class="fa-brands fa-instagram"></i></a></div>
                <div class="header-sns-link-item"><a href="#"><i class="fa-brands fa-youtube"></i></a></div>
            </div>
        </div>
    </header>

    <span class="header-bg"></span>

    <div class="menu-subpage-button">
        <div class="menu-button-wrapper">
            <span class="menu-button-bar1"></span>
            <span class="menu-button-bar2"></span>
            <span class="menu-button-bar3"></span>
        </div>
    </div>

    <main>
        <div class="news-first-view">
            <div class="first-view-container">
                <h1 class="subpage-section-title">news
                    <span class="subpage-section-subtitle">ニュース</span>
                </h1>
            </div>
        </div>

        <div class="breadcrumbs">
            <div class="breadcrumbs-container">
                <?php
                if (function_exists('bcn_display')) {
                    bcn_display();
                }
                ?>
            </div>
        </div>

        <div class="news2-block">
            <div class="container-middle">
                <h2 class="news2-category-name">
                    <?php the_archive_title(false, false); ?>
                </h2>
                <div class="news2-wrapper">
                    <div class="news2-content">
                        <ul class="news2-content-list">
                            <?php
                            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                            $args = [
                                'post_status' => 'publish',
                                'posts_per_page' => 10, 
                                'paged' => $paged, 
                                ''
                            ];
                            $category_query = new WP_Query($args); ?>
                            <?php if ($category_query->have_posts()) : ?>
                                <?php while ($category_query->have_posts()) : $category_query->the_post(); ?>
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
                        <div class="news2-pagination">
                            <?php if($category_query->max_num_pages > 1) : ?>
                            <?php
                            $args = [
                                'base' => get_pagenum_link(1) . '%_%',
                                'format' => 'page/%#%/',
                                'current' => max(1, $paged),
                                'end_size' => 1,
                                'mid_size' => 3,
                                'prev_next' => true,
                                'prev_text' => '<i class="fa-solid fa-angle-left"></i>',
                                'next_text' => '<i class="fa-solid fa-angle-right"></i>',
                                'total' => $category_query->max_num_pages,
                            ];
                            echo paginate_links($args);
                            ?>
                            <?php endif;
                            wp_reset_postdata(); ?>   
                        </div>
                    </div>
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>

        <div class="access">
            <div class="access-container">
                <h2 class="section-title text-align-center">access<span class="section-subtitle text-align-center">アクセス</span>
                </h2>
                <div class="googlemap">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1619.9688946900105!2d139.57756636910653!3d35.703148479206135!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6018ee47f6226cc3%3A0x34e6b69989d52a4e!2z5ZCJ56Wl5a-66aeF!5e0!3m2!1sja!2sjp!4v1673012416331!5m2!1sja!2sjp" width="668" height="367" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="access-info">
                    <dl class="access-info-detail">
                        <div class="access-info-item">
                            <dt class="access-info-title">住所</dt>
                            <dd class="access-info-content">
                                〒000-0000
                                <br>東京都武蔵野市吉祥寺南町一丁目
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
        </div>
    </main>

    <?php get_footer(); ?>