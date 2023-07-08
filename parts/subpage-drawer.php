<header class="header">
        <div class="header-container">
            <h1 class="header-logo"><a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/logo_light.png" alt="Open Cafe - dish & coffee -"></a></h1>
            <div class="header-wrapper">
                <nav>
                    <ul class="header-nav">
                        <li class="header-nav-list"><a href="<?php echo esc_url(home_url('/')); ?>" class="header-nav-link">top<span>／ トップ</span></a></li>
                        <li class="header-nav-list"><a href="
                        <?php 
                            $page_obj = get_page_by_path('concept');
                            $page_id = $page_obj->ID;
                            echo esc_url(get_page_link($page_id)); 
                        ?> 
                        " class="header-nav-link">concept<span>／ コンセプト</span></a> 
                        </li>
                        <li class="header-nav-list"><a href="<?php echo esc_html(get_post_type_archive_link('menu')); ?>" class="header-nav-link">menu<span>／ メニュー</span></a></li>
                        <li class="header-nav-list"><a href="
                        <?php 
                            $page_obj = get_page_by_path('news');
                            $page_id = $page_obj->ID;
                            echo esc_url(get_page_link($page_id)); 
                        ?> 
                        " class="header-nav-link">news<span>／ お知らせ</span></a></li>
                        <li class="header-nav-list"><a href="<?php echo esc_html(get_post_type_archive_link('shop')); ?>" class="header-nav-link">shop<span>／ 店舗情報</span></a></li>
                        <li class="header-nav-list"><a href="<?php echo esc_html(get_post_type_archive_link('products')); ?>" class="header-nav-link">gift<span>／ ギフト・贈り物</span></a>
                        </li>
                        <li class="header-nav-list"><a href="
                        <?php 
                            $page_obj = get_page_by_path('contact');
                            $page_id = $page_obj->ID;
                            echo esc_url(get_page_link($page_id)); 
                        ?>  
                        " class="header-nav-link">contact<span>／ お問い合わせ</span></a>
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