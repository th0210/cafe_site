//--- swiper ---//
const swiper = new Swiper(".swiper", {
    // ページネーションが必要なら追加
 pagination: {
   el: ".swiper-pagination",
   clickable: true
 }, 
 loop: true,
 effect: 'fade',
 autoplay: {
  delay: 6000,
  disableOnInteraction: false, 
},
speed: 2000,
}); 

//--- クリックするとスクロールしてそこまで移動 ---//
jQuery('a[href^="#"]').on('click', function() {
  //クリックしたもののid="#〇〇"を取得 
    var id = jQuery(this).attr('href');
  //ページの一番上からの距離をpositionとして0としておく
    var position = 0;
  //id="#〇〇"が#だけじゃない時はその距離を取得、#だけの時は元々0なので0扱いになる
    if (id != '#') {
        position = jQuery(id).offset().top;
    };

    jQuery('html, body').animate ({
        scrollTop: position
    }, 300);

});

//--- スクロールするとメニューボタン表示・非表示 ---//
jQuery(window).on("scroll", function() {
  // トップから100px以上スクロールしたら
  if (720 < jQuery(this).scrollTop()) {
    // is-showクラスをつける
 jQuery('.menu-button').addClass( 'is-show' );
  } else {
    // 100pxを下回ったらis-showクラスを削除
  jQuery('.menu-button').removeClass( 'is-show' );
  }
});

//--- PC画面時のみスクロールするとメニュー表示・非表示 ---//
jQuery(window).on("scroll", function() {
  // トップから720px以上スクロールしたら
  if (720 > jQuery(this).scrollTop()) {
    jQuery('.home-header').addClass( 'is-close' );
  } else {
    jQuery('.home-header').removeClass( 'is-close' );   
  } 
});

//--- TB/SP画面時はスクロールに関係なくメニュー表示 ---//
  var mq = window.matchMedia('(max-width: 1101px)');

  // スクロールしたときに関数を呼び出す
  window.addEventListener('scroll', function() {
    function mqCheck(mq) {
      // ビューポートの幅が 指定ピクセル以上の場合に実行する
      if (mq.matches) {
        jQuery('.home-header').removeClass('is-close'); 
      }
    }
    mqCheck(mq);
  });


//スマホ・タブレット表示の時メニューボタンを常時表示 ---//
jQuery(window).resize(function() {
  var windowSize = jQuery(window).width();
  var sptb = 1101;

  if(windowSize < sptb) {
    jQuery('.menu-button').addClass('sptb-menu-button');   
    jQuery('.menu-button').removeClass('menu-button');    
  }
});

jQuery(window).resize(function() {
  var windowSize = jQuery(window).width();
  var sptb = 1101;

  if(windowSize > sptb) {
    jQuery('.sptb-menu-button').addClass('menu-button'); 
    jQuery('.sptb-menu-button').removeClass('sptb-menu-button');          
  }
});

//--- スクロールするとトップへ戻るボタン表示・非表示 ---//
jQuery(window).on("scroll", function() {
  // トップから100px以上スクロールしたら
  if (170 < jQuery(this).scrollTop()) {
    // is-showクラスをつける
 jQuery('.to-top').addClass( 'is-show' );
  } else {
    // 100pxを下回ったらis-showクラスを削除
  jQuery('.to-top').removeClass( 'is-show' );
  }
});

//---ヘッダーメニューボタンをオスとヘッダーメニューを表示---//
jQuery('.menu-button, .menu-subpage-button').on('click', function() {
  jQuery('.menu-button-wrapper').toggleClass('open'); 
  jQuery('.menu-button-bar1, .menu-button-bar2, .menu-button-bar3').toggleClass('open'); 
  jQuery('.home-header, .header').toggleClass('open'); 
  jQuery('.header-bg').toggleClass('open');

  var windowSize = jQuery(window).width();
  var sptb = 1101;
  if(windowSize < sptb) {
    jQuery('body').toggleClass('no-scroll');
  }
});

//---黒い背景をクリックしてもヘッダーメニューを非表示---//
jQuery('.header-bg').on('click', function() {
  jQuery('.menu-button-wrapper').removeClass('open'); 
  jQuery('.menu-button-bar1, .menu-button-bar2, .menu-button-bar3').removeClass('open'); 
  jQuery('.home-header, .header').removeClass('open'); 
  jQuery('.header-bg').removeClass('open'); 
});

//--- ドロワーメニューのtitle属性を削除 ---//
jQuery('.header-nav-list a').removeAttr('title'); 

//--- トップページメニューのtitle属性を削除 ---//
jQuery('.menu-list a').removeAttr('title');    

