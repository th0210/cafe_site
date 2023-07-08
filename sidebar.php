<aside class="sidebar">
    <div class="side-container">
        <div class="side-content">
            <h2 class="side-title">最新の記事</h2>
            <ul>
            <?php query_posts('posts_per_page=5'); ?>  
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <li class="side-item">
                            <article class="side-article">
                                <a href="<?php the_permalink(); ?>" class="side-article-link">
                                    <div class="side-article-img">
                                        <?php if(has_post_thumbnail()): ?>
                                            <?php the_post_thumbnail(); ?>
                                        <?php else: ?>
                                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/noimg.jpg" alt="">
                                        <?php endif; ?>
                                    </div>
                                    <div class="side-article-textarea">
                                        <h3 class="side-article-title">
                                            <?php the_title(); ?>
                                        </h3>
                                        <time class="side-article-date" datetime="<?php the_time('c'); ?>"><?php the_time('Y/n/j'); ?></time>
                                    </div>
                                </a>
                            </article>
                        </li>
                    <?php endwhile; ?>
                <?php endif; ?> 
            </ul>
        </div>
    </div>
    <div class="category-area">
        <div class="category-content">
            <h2 class="category-title">カテゴリー</h2>
            <ul>
            <?php $categories = get_categories();  ?>
            <?php foreach($categories as $category) : ?>
                <li class="category-item">
                    <a href="<?php echo esc_url(get_category_link($category->term_id));?>" class="category-item-link"><i class="fa-solid fa-angle-right"></i><?php echo esc_html($category->name); ?></a>
                </li>
            <?php endforeach; ?>
            </ul>
        </div>
    </div>
</aside>