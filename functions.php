<?php
function my_setup()
{
  add_theme_support('post-thumbnails');
  add_theme_support('automatic-feed-links');
  add_theme_support('title-tag');
  add_theme_support(
    'html5',
    [
      'comment-list',
      'comment-form',
      'search-form',
      'gallery',
      'caption',
      'style',
      'script'
    ]
  );
}
add_action('after_setup_theme', 'my_setup');

function my_menu_init()
{
  register_nav_menus([
    'mv' => 'メインメニュー',
    'drawer' => 'ドロワーメニュー',
  ]);
}
add_action('init', 'my_menu_init');

/*メニューのタイトル属性をふりがなとして表示 */
function attribute_add_nav_menu($item_output, $item)
{
  return preg_replace('/(<a.*?>[^<]*?)</', '$1' . "<br><span>{$item->attr_title}</span><", $item_output);
}
add_filter('walker_nav_menu_start_el', 'attribute_add_nav_menu', 10, 4);

function my_script_init()
{
  wp_enqueue_style("reset-css", 'https://unpkg.com/ress/dist/ress.min.css');
  wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js');  
  wp_enqueue_style('swiper', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css');
  wp_enqueue_script('swiper', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js');
  wp_enqueue_style("font-awesome", "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css", array(), "6.2.1", "all");
  wp_enqueue_style('fonts-amatic', 'https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&display=swap');
  wp_enqueue_style('fonts-damion', 'https://fonts.googleapis.com/css2?family=Damion:wght@400;500;700&display=swap');
  wp_enqueue_style('fonts-patua', 'https://fonts.googleapis.com/css2?family=Patua+One&display=swap');
  wp_enqueue_style('fonts-noto-jp', 'https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@400;500;700&display=swap');
  wp_enqueue_style("my", get_template_directory_uri() . "/css/style.css", array(), filemtime(get_theme_file_path('css/style.css')), "all");
  wp_enqueue_script("my", get_template_directory_uri() . "/js/script.js", array("jquery"), filemtime(get_theme_file_path('js/script.js')), true);
}
add_action("wp_enqueue_scripts", "my_script_init");

/*アーカイブタイトル書き換え*/
function my_archive_title($title)
{

  if (is_category()) { // カテゴリーアーカイブの場合
    $title = single_cat_title('', false);
  } elseif (is_tag()) { // タグアーカイブの場合
    $title = single_tag_title('', false);
  } elseif (is_post_type_archive()) { // 投稿タイプのアーカイブの場合
    $title = post_type_archive_title('', false);
  } elseif (is_tax()) { // タームアーカイブの場合
    $title = single_term_title('', false);
  } elseif (is_author()) { // 作者アーカイブの場合
    $title = get_the_author();
  } elseif (is_date()) { // 日付アーカイブの場合
    $title = '';
    if (get_query_var('year')) {
      $title .= get_query_var('year') . '年';
    }
    if (get_query_var('monthnum')) {
      $title .= get_query_var('monthnum') . '月';
    }
    if (get_query_var('day')) {
      $title .= get_query_var('day') . '日';
    }
  }
  return $title;
};
add_filter('get_the_archive_title', 'my_archive_title');

/*数字をアルファベットに置き換える*/
function changeNumberToAlphabet(int $number)
{
  return chr($number);
}

// Contact Form 7の自動pタグ無効
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false() {
  return false;
}  
