<?php get_header(); ?>
<body>	
    <header class="home-header">
        <div class="header-container">
            <h1 class="header-logo"><a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/logo_light.png" alt="Open Cafe - dish & coffee -"></a></h1>
            <div class="header-wrapper">
                <nav>
                    <?php
                    wp_nav_menu([
                        'menu_class' => 'header-nav',
                        'container' => false,
                        'depth' => 1,
                        'theme_location' => 'drawer',
                    ]);
                    ?>
                </nav>
            </div>
            <div class="header-sns-link">
                <div class="header-sns-link-item"><a href=""><i class="fa-brands fa-twitter"></i></a></div>
                <div class="header-sns-link-item"><a href=""><i class="fa-brands fa-instagram"></i></a></div>
                <div class="header-sns-link-item"><a href=""><i class="fa-brands fa-youtube"></i></a></div>
            </div>
        </div>
    </header>

    <span class="header-bg"></span>

    <div class="menu-button">
        <div class="menu-button-wrapper">
            <span class="menu-button-bar1"></span>
            <span class="menu-button-bar2"></span>
            <span class="menu-button-bar3"></span>
        </div>
    </div>

    <main>
        <div class="mv">
            <h1 class="sp-logo"><a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/logo_light.png" alt="Open Cafe - dish & coffee -"></a></h1>
            <div class="mv-content"> 
                <div class="mv-list">
                    <h1 class="logo"><a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/logo_dark.png" alt="Open Cafe - dish & coffee -"></a>
                    </h1>
                    <nav>
                        <?php
                        wp_nav_menu([
                            'menu_class' => 'top-menu',
                            'container' => false,
                            'depth' => 1,
                            'theme_location' => 'mv',
                        ]);
                        ?>
                    </nav>
                    <div class="sns-link">
                        <div class="sns-link-item"><a href=""><i class="fa-brands fa-twitter"></i></a></div>
                        <div class="sns-link-item"><a href=""><i class="fa-brands fa-instagram"></i></a></div>
                        <div class="sns-link-item"><a href=""><i class="fa-brands fa-youtube"></i></a></div>
                    </div>
                </div>
                <div class="mv-swiper">
                    <div class="swiper-box">
                        <div class="swiper">
                            <div class="swiper-wrapper">
                                <!-- Slides -->
                                <div class="swiper-slide">
                                    <div class="swiper-item">
                                        <picture class="slide-img">
                                            <source media="(min-width: 767px)" srcset="<?php echo esc_url(get_template_directory_uri()); ?>/img/img_mainvisual1.jpg">
                                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/img_mainvisual1_sp.jpg" alt="カフェで食べる朝食">
                                        </picture>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="swiper-item">
                                        <picture class="slide-img">
                                            <source media="(min-width: 767px)" srcset="<?php echo esc_url(get_template_directory_uri()); ?>/img/img_mainvisual2.jpg">
                                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/img_mainvisual2_sp.jpg" alt="明るい雰囲気の店内">
                                        </picture>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="swiper-item">
                                        <picture class="slide-img">
                                            <source media="(min-width: 767px)" srcset="<?php echo esc_url(get_template_directory_uri()); ?>/img/img_mainvisual3.jpg">
                                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/img_mainvisual3_sp.jpg" alt="コーヒーと読書も楽しめる空間">
                                        </picture>
                                    </div>
                                </div>
                            </div><!-- swiper-wrapper -->

                        </div><!-- swiper -->
                        <div class="swiper-pagination"></div>
                    </div>
                    <p class="mv-text">
                        パスタとコーヒーが<br class="sp-space">とってもおいしい、
                        <br>ほっと落ち着くのんびり空間。
                    </p>
                </div>
                <div class="pickup">
                    <div class="pickup-container">
                        <?php
                        $args = [
                            'posts_per_page' => 1,
                            'post_type' => 'post',
                            'tag' => 'pickup',
                        ];
                        $pickup_query = new WP_Query($args);
                        ?>
                        <?php if ($pickup_query->have_posts()) : ?>
                            <?php while ($pickup_query->have_posts()) : $pickup_query->the_post(); ?>
                                <article class="pickup-content">
                                    <div class="pickup-ribbon">
                                        <span class="ribbon-piece">
                                            <?php
                                            $category = get_the_category();

                                            if ($category[0]) {
                                                echo $category[0]->cat_name;
                                            }
                                            ?>
                                        </span>
                                    </div>
                                    <a href="<?php the_permalink(); ?>" class="pickup-link">
                                        <div class="pickup-link-item">
                                            <div class="pickup-img">
                                                <?php if (has_post_thumbnail()) : ?>
                                                    <?php the_post_thumbnail(); ?>
                                                <?php else : ?>
                                                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/noimg.jpg" alt="">
                                                <?php endif; ?>
                                            </div>
                                            <div class="pickup-info">
                                                <p class="pickup-date"><time datetime="<?php the_time('c'); ?>"><?php the_time('Y/j/n'); ?></time></p>
                                                <p class="pickup-text">
                                                    <?php the_title(); ?>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </article>
                            <?php endwhile; ?>
                        <?php endif;
                        wp_reset_postdata(); ?>
                    </div>
                    <div class="pickup-news">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/img_balloon-pickup.png" alt="">
                    </div>
                </div>
            </div>
        </div>

        <section class="concept">
            <div class="concept-container">
                <div class="concept-img">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/img_concept.jpg" alt="">
                </div>
                <div class="concept-content">
                    <h2 class="section-title">concept<span class="section-subtitle">当店のこだわり</span></h2>
                    <h3 class="concept-subtitle">
                        最高のコーヒーと、
                        <br>時の流れを味わうことができる
                        <br>手作りカフェ
                    </h3>
                    <p class="concept-text">
                        ダミー_国内外から賞賛を
                        <br>受けた選りすぐりのデザイナーが集結し、ガーデニングの設計・建築から料理まで、あらゆる空間が誕生。
                        <br>ダミー_国内外から賞賛を受けた選りすぐりのデザイナーが集結し、ガーデニングの設計・建築から料理まで、あらゆる空間が誕生。
                        <br><br>ダミー_国内外から賞賛を受けた選りすぐりのデザイナーが集結し、ガーデニングの設計・建築から料理まで、あらゆる空間が誕生。
                    </p>
                    <div class="btn-box">
                        <a href="
                        <?php
                        $page_obj = get_page_by_path('concept');
                        $page_id = $page_obj->ID;
                        echo esc_url(get_page_link($page_id));
                        ?>   
                        " class="btn">詳しくはコチラ<i class="fa-solid fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
        </section>

        <section class="lunch">
            <div class="container">
                <div class="lunch-wrapper">
                    <h2 class="section-title text-align-center">special lunch set<span class="section-subtitle text-align-center">今月のスペシャルランチセット</span></h2>
                    <div class="lunch-content">
                        <div class="lunch-label">
                            <div class="lunch-label-container">
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/グループ 424.png" alt="">
                                <span>お好きなパスタをお選びください</span>
                            </div>
                        </div>
                        <div class="lunch-message">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/img_balloon-special-lunch-set.png" alt="">
                        </div>
                        <div class="lunch-list">
                            <?php
                            $args = [
                                'post_type' => 'lunch',
                                'posts_per_page' => 4,
                                'orderby' => 'modified',
                            ];
                            $lunch_query = new WP_Query($args);
                            ?>
                            <?php if ($lunch_query->have_posts()) :
                                $count = 65;
                            ?>
                                <?php while ($lunch_query->have_posts()) : $lunch_query->the_post(); ?>
                                    <div class="lunch-item">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <?php the_post_thumbnail(); ?>
                                        <?php else : ?>
                                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/noimg.jpg" alt="">
                                        <?php endif; ?>
                                        <div class="lunch-item-info">
                                            <div class="lunch-number">
                                                <span>
                                                    <?php echo chr($count); ?>
                                                </span>
                                            </div>
                                            <p class="lunch-text"><?php the_title(); ?></p>
                                        </div>
                                    </div>
                                    <?php $count++; ?>
                                <?php endwhile; ?>
                            <?php endif;
                            wp_reset_postdata(); ?>
                        </div>
                        <div class="lunchset">
                            <div class="lunchset-img">
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/img_lunch-detail.png" alt="">
                            </div>
                            <div class="lunchset-info">
                                <p class="lunchset-title">スペシャルランチセット<span>【選べる3品】</span></p>
                                <span class="lunchset-price">1,280 yen</span>
                                <p class="lunchset-time">(11:00 AM〜14:00 PMまで)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="menu">
            <div class="menu-bg">
                <div class="container">
                    <h2 class="section-title text-align-center">grand menu<span class="section-subtitle text-align-center">グランドメニュー</span>
                    </h2>
                    <div class="menu-wrapper">
                        <div class="menu-content">
                            <div class="menu-column">
                                <h3 class="menu-title">パスタ</h3>
                                <div class="menu-row">
                                    <div class="menu-row-item">
                                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/img_pasta1.jpg" alt="">
                                        <div class="menu-info">
                                            <p class="menu-text">
                                                テキストテキストテキストの○○○○風パスタ
                                            </p>
                                            <span class="menu-price">780 yen</span>
                                        </div>
                                    </div>
                                    <div class="menu-row-item">
                                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/img_pasta2.jpg" alt="">
                                        <div class="menu-info">
                                            <p class="menu-text">
                                                テキストテキストテキストの○○○○風パスタ
                                            </p>
                                            <span class="menu-price">780 yen</span>
                                        </div>
                                    </div>
                                    <div class="menu-row-item">
                                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/img_pasta3.jpg" alt="">
                                        <div class="menu-info">
                                            <p class="menu-text">
                                                テキストテキストテキストの○○○○風パスタ
                                            </p>
                                            <span class="menu-price">780 yen</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="menu-column">
                                <h3 class="menu-title">サラダ</h3>
                                <div class="menu-row">
                                    <div class="menu-row-item">
                                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/img_salad1.jpg" alt="">
                                        <div class="menu-info">
                                            <p class="menu-text">
                                                ○○○○風サラダ
                                            </p>
                                            <span class="menu-price">780 yen</span>
                                        </div>
                                    </div>
                                    <div class="menu-row-item">
                                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/img_salad2.jpg" alt="">
                                        <div class="menu-info">
                                            <p class="menu-text">
                                                ○○○○風サラダ
                                            </p>
                                            <span class="menu-price">780 yen</span>
                                        </div>
                                    </div>
                                    <div class="menu-row-item">
                                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/img_salad3.jpg" alt="">
                                        <div class="menu-info">
                                            <p class="menu-text">
                                                ○○○○風サラダ
                                            </p>
                                            <span class="menu-price">780 yen</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="menu-column">
                                <h3 class="menu-title">パン＆スイーツ</h3>
                                <div class="menu-sweets-row">
                                    <div class="menu-sweets-item">
                                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/img_sweets1.jpg" alt="">
                                        <div class="menu-info">
                                            <p class="menu-text">
                                                ○○○○サンド
                                            </p>
                                            <span class="menu-price">780 yen</span>
                                        </div>
                                    </div>
                                    <div class="menu-sweets-item">
                                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/img_sweets2.jpg" alt="">
                                        <div class="menu-info">
                                            <p class="menu-text">
                                                ○○○○サンド
                                            </p>
                                            <span class="menu-price">780 yen</span>
                                        </div>
                                    </div>
                                    <div class="menu-sweets-item">
                                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/img_sweets3.jpg" alt="">
                                        <div class="menu-info">
                                            <p class="menu-text">
                                                ○○○○サンド
                                            </p>
                                            <span class="menu-price">780 yen</span>
                                        </div>
                                    </div>

                                    <div class="menu-sweets-item">
                                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/img_sweets4.jpg" alt="">
                                        <div class="menu-info">
                                            <p class="menu-text">
                                                ○○○○サンド
                                            </p>
                                            <span class="menu-price">780 yen</span>
                                        </div>
                                    </div>

                                    <div class="menu-sweets-item">
                                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/img_sweets5.jpg" alt="">
                                        <div class="menu-info">
                                            <p class="menu-text">
                                                ○○○○サンド
                                            </p>
                                            <span class="menu-price">780 yen</span>
                                        </div>
                                    </div>

                                    <div class="menu-sweets-item">
                                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/img_drink.jpg" alt="">
                                        <div class="menu-info">
                                            <p class="menu-text">
                                                ○○○○サンド
                                            </p>
                                            <span class="menu-price">780 yen</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="menu-column">
                                <h3 class="menu-title">ドリンク</h3>
                                <div class="menu-drink-row">
                                    <div class="menu-drink-img">
                                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/img_drink1.jpg" alt="">
                                    </div>
                                    <ul class="menu-drink-table">
                                        <li class="menu-drink-item">
                                            <h4 class="drink-name">コーヒー</h4>
                                            <ul class="drink-item-ul">
                                                <li class="drink-item-list">
                                                    <p class="drink-type">ブレンド</p>
                                                    <p class="drink-price">500 yen</p>
                                                </li>
                                                <li class="drink-item-list">
                                                    <p class="drink-type">カフェラテ</p>
                                                    <p class="drink-price">500 yen</p>
                                                </li>
                                                <li class="drink-item-list">
                                                    <p class="drink-type">豆乳ラテ</p>
                                                    <p class="drink-price">500 yen</p>
                                                </li>
                                                <li class="drink-item-list">
                                                    <p class="drink-type">カフェモカ</p>
                                                    <p class="drink-price">500 yen</p>
                                                </li>
                                                <li class="drink-item-list">
                                                    <p class="drink-type">キャラメルラテ</p>
                                                    <p class="drink-price">500 yen</p>
                                                </li>
                                                <li class="drink-item-list">
                                                    <p class="drink-type">バニララテ</p>
                                                    <p class="drink-price">500 yen</p>
                                                </li>
                                            </ul>
                                        </li>

                                        <li class="menu-drink-item">
                                            <h4 class="drink-name">紅茶</h4>
                                            <ul class="drink-item-ul">
                                                <li class="drink-item-list">
                                                    <p class="drink-type">ストレート</p>
                                                    <p class="drink-price">500 yen</p>
                                                </li>
                                                <li class="drink-item-list">
                                                    <p class="drink-type">ミルク</p>
                                                    <p class="drink-price">500 yen</p>
                                                </li>
                                                <li class="drink-item-list">
                                                    <p class="drink-type">アップル</p>
                                                    <p class="drink-price">500 yen</p>
                                                </li>
                                            </ul>
                                        </li>

                                        <li class="menu-drink-item">
                                            <h4 class="drink-name">ソフトドリンク</h4>
                                            <ul class="drink-item-ul">
                                                <li class="drink-item-list">
                                                    <p class="drink-type">バナナ</p>
                                                    <p class="drink-price">500 yen</p>
                                                </li>
                                                <li class="drink-item-list">
                                                    <p class="drink-type">オレンジ</p>
                                                    <p class="drink-price">500 yen</p>
                                                </li>
                                                <li class="drink-item-list">
                                                    <p class="drink-type">アップル</p>
                                                    <p class="drink-price">500 yen</p>
                                                </li>
                                                <li class="drink-item-list">
                                                    <p class="drink-type">マンゴー</p>
                                                    <p class="drink-price">500 yen</p>
                                                </li>
                                                <li class="drink-item-list">
                                                    <p class="drink-type">ミックス</p>
                                                    <p class="drink-price">500 yen</p>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>

                                <div class="btn-box">
                                    <a href="<?php echo esc_html(get_post_type_archive_link('menu')); ?>" class="btn margin-0-auto">その他のメニュー<i class="fa-solid fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>

        <section class="gallery">
            <div class="gallery-container">
                <h2 class="section-title text-align-center">gallery<span class="section-subtitle text-align-center">ギャラリー</span>
                </h2>
                <div class="gallery-content">
                    <ul class="gallery-row">
                        <li class="gallery-list">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/img_gallery1.jpg" alt="">
                        </li>
                        <li class="gallery-list">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/img_gallery2.jpg" alt="">
                        </li>
                        <li class="gallery-list">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/img_gallery3.jpg" alt="">
                        </li>
                        <li class="gallery-list">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/img_gallery4.jpg" alt="">
                        </li>
                    </ul>
                </div>
                <div class="btn-box">
                    <a href="" class="btn margin-0-auto">インスタグラムを見る<i class="fa-solid fa-angle-right"></i></a>
                </div>
            </div>
        </section>

        <section class="news">
            <div class="news-container">
                <h2 class="section-title text-align-center">news<span class="section-subtitle text-align-center">お知らせ</span>
                </h2>
                <div class="news-wrapper">
                    <div class="news-card-large">
                        <?php
                        $first_args = [
                            'posts_per_page' => 1,
                        ];
                        $first_query = new WP_Query($first_args);
                        ?>
                        <?php if ($first_query->have_posts()) : ?>
                            <?php while ($first_query->have_posts()) : ?>
                                <?php $first_query->the_post(); ?>
                                <article class="news-article-large">
                                    <div class="news-article-large-ribbon">
                                        <span class="ribbon-piece-large">
                                            <?php
                                            $category = get_the_category();

                                            if ($category[0]) {
                                                echo $category[0]->cat_name;
                                            }
                                            ?>
                                        </span>
                                    </div>
                                    <a href="<?php the_permalink(); ?>" class="news-large-link">
                                        <div class="news-large-img-box">
                                            <?php if (has_post_thumbnail()) : ?>
                                                <?php the_post_thumbnail(); ?>
                                            <?php else : ?>
                                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/noimg.jpg" alt="">
                                            <?php endif; ?>
                                        </div>
                                        <h3 class="news-large-title">
                                            <?php the_title(); ?>
                                        </h3>
                                        <p class="news-large-text">
                                            <?php the_excerpt(); ?>
                                        </p>
                                        <time class="news-large-date" datetime="<?php the_time('c'); ?>"><?php the_time('Y/n/j'); ?></time>
                                    </a>
                                </article>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                    <div class="news-card-group">
                        <?php
                        $args = [
                            'post_type' => 'post',
                            'posts_per_page' => 4,
                            'post__not_in' => array($post__not_in),
                            'offset' => 1,
                        ];

                        $post_query = new WP_Query($args);
                        ?>
                        <?php if ($post_query->have_posts()) : ?>
                            <?php while ($post_query->have_posts()) : ?>
                                <?php $post_query->the_post(); ?>
                                <div class="news-card-small">
                                    <article class="news-article-small">
                                        <div class="news-article-small-ribbon">
                                            <span class="ribbon-piece">
                                                <?php
                                                $category = get_the_category();

                                                if ($category[0]) {
                                                    echo $category[0]->cat_name;
                                                }
                                                ?>
                                            </span>
                                        </div>
                                        <a href="<?php the_permalink(); ?>" class="news-small-link">
                                            <div class="news-small-img-box">
                                                <?php if (has_post_thumbnail()) : ?>
                                                    <?php the_post_thumbnail(); ?>
                                                <?php else : ?>
                                                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/noimg.jpg" alt="">
                                                <?php endif; ?>
                                            </div>
                                            <h3 class="news-small-title">
                                                <?php the_title(); ?>
                                            </h3>
                                            <time class="news-small-date" datetime="<?php the_time('c'); ?>"><?php the_time('Y/n/j'); ?></time>
                                        </a>
                                    </article>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="btn-box">
                    <a href="
                    <?php
                    $page_obj = get_page_by_path('news');
                    $page_id = $page_obj->ID;
                    echo esc_url(get_page_link($page_id));
                    ?> 
                    " class="btn margin-0-auto">過去のお知らせ<i class="fa-solid fa-angle-right"></i></a>
                </div>
            </div>
        </section>

        <section class="access">
            <?php get_template_part('parts/access'); ?>
        </section>
    </main>
    <?php get_footer(); ?>