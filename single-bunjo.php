<?php
/**
 * single-bunjo.php
 * hublog6
 * 20230202
 */

get_header();
$post_id = get_the_ID();

?>
<nav id="bunjo_content-nav">
  <ul class="flexbox">
    <li> <a href="#bunjo_role-1"> <span>CONCEPT</span><span class="small">コンセプト</span> </a> </li>
    <?php
    $arg = array(
      'post_type' => 'bunjo', //カスタム投稿名
      'post_parent' => $post_id,
      'posts_per_page' => 5 //表示件数（-1で全ての記事を表示）
    );
    $posts = get_posts( $arg );
    if ( $posts ): ?>
    <?php
    $i = 2; //ループ回数習得
    foreach ( $posts as $post ): setup_postdata( $post );
    ?>
    <li>
      <?php if ( is_object_in_term($post->ID,'bunjo_role','bunjo-gallery') ): ?>
      <a href="#bunjo_role-<?php  echo $i; ?>"> <span>GALLERY</span><span class="small">フォトギャラリー</span> </a>
      <?php elseif ( is_object_in_term($post->ID,'bunjo_role','bunjo-performance') ): ?>
      <a href="#bunjo_role-<?php  echo $i; ?>"> <span>PERFORMANCE</span><span class="small">素材・性能</span> </a>
      <?php elseif ( is_object_in_term($post->ID,'bunjo_role','bunjo-equipment') ): ?>
      <a href="#bunjo_role-<?php  echo $i; ?>"> <span>EQUIPMENT</span><span class="small">物件概要・設備・特徴</span> </a>
      <?php elseif ( is_object_in_term($post->ID,'bunjo_role','bunjo-location') ): ?>
      <a href="#bunjo_role-<?php  echo $i; ?>"> <span>LOCATION</span><span class="small">周辺環境</span> </a>
      <?php endif ;?>
    </li>
    <?php $i++;endforeach; ?>
    <li><a href="#popup_gallery"><span>OTHER WORKS</span><span class="small">施工事例</span></a></li>
  </ul>
  <?php endif;  wp_reset_postdata();?>
</nav>


<?php if ( is_object_in_term($post->ID,'bunjo_role','bunjo-gallery') || is_object_in_term($post->ID,'bunjo_role','bunjo-performance') || is_object_in_term($post->ID,'bunjo_role','bunjo-equipment') || is_object_in_term($post->ID,'bunjo_role','bunjo-location') ): ?>
<div class="text-center"> <a href="/bunjo/<?php echo $parent_id = $post->post_parent;?>.html">親ページへ移動</a> </div>
<?php endif;?>
<?php //the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('hentry'); ?>>
<header class="entry-header wrapper">
  <h1 class="entry-title">
    <?php the_title(); ?>
  </h1>
</header>
<section id="bunjo_role-1" class="bunjo_role role-concept clearfix anchor">
  <div class="entry-content">
    <header class="bunjo_role-header">
      <h2 class="entry-title"> <span>CONCEPT</span><span class="small">コンセプト</span> </h2>
    </header>
    <div class="the_content">
      <?php the_content(); ?>
    </div>
    <p class="to_form btn"><a href="#form">資料請求はこちら</a></p>
    <?php edit_post_link(__('Edit'), ''); ?>
  </div>
  <!-- .entry-content --> 
</section>
<?php wp_reset_query(); ?>
<?php
$arg = array(
  'post_type' => 'bunjo', //カスタム投稿名
  'post_parent' => $post_id,
  'posts_per_page' => 5 //表示件数（-1で全ての記事を表示）
);
$posts = get_posts( $arg );
if ( $posts ): ?>
<?php
$i = 2; //ループ回数習得
foreach ( $posts as $post ): setup_postdata( $post );
?>
<section id="bunjo_role-<?php  echo $i; ?>" class="bunjo_role role-<?php $terms = get_the_terms($post->ID,'bunjo_role');foreach( $terms as $term ) {echo $term->slug;}?> clearfix anchor">
<div class="entry-content">
<header class="bunjo_role-header">
  <h2>
    <?php if ( is_object_in_term($post->ID,'bunjo_role','bunjo-gallery') ): ?>
    <span>GALLERY</span><span class="small">フォトギャラリー</span>
    <?php elseif ( is_object_in_term($post->ID,'bunjo_role','bunjo-performance') ): ?>
    <span>PERFORMANCE</span><span class="small">素材・性能</span>
    <?php elseif ( is_object_in_term($post->ID,'bunjo_role','bunjo-equipment') ): ?>
    <span>EQUIPMENT</span><span class="small">物件概要・設備・特徴</span>
    <?php elseif ( is_object_in_term($post->ID,'bunjo_role','bunjo-location') ): ?>
    <span>LOCATION</span><span class="small">周辺環境</span>
    <?php endif ;?>
  </h2>
</header>
<div class="the_content">
<?php if ( is_object_in_term($post->ID,'bunjo_role','bunjo-performance') ): ?>
<div class="inbox">
  <div class="bunjo-performance00">
    <?php the_content(); ?>
  </div>
  <!--bunjo-performance01-->
  <div class="tabset reach">
    <?php if (post_custom('performance-01-ttl') || post_custom('performance-02-ttl') || post_custom('performance-03-ttl')) ://?>
    <?php if (post_custom('performance-01')) ://?>
    <div class="tabContents active anchor" id="bunjo-performance01">
      <p class="tab_ttl"><span><?php echo (post_custom('performance-01-ttl')); ?></span></p>
      <?php echo wpautop(post_custom('performance-01')); ?> </div>
    <!--bunjo-performance02-->
    <?php endif ;//?>
    <?php if (post_custom('performance-02')) ://?>
    <div class="tabContents anchor" id="bunjo-performance02">
      <p class="tab_ttl"><span><?php echo (post_custom('performance-02-ttl')); ?></span></p>
      <?php echo wpautop(post_custom('performance-02')); ?> </div>
    <!--bunjo-performance02-->
    <?php endif ;//?>
    <?php if (post_custom('performance-03')) ://?>
    <div class="tabContents anchor" id="bunjo-performance03">
      <p class="tab_ttl"><span><?php echo (post_custom('performance-03-ttl')); ?></span></p>
      <?php echo wpautop(post_custom('performance-03')); ?> </div>
    <!--bunjo-performance03-->
    <?php endif ;//?>
  </div>
  <!--tabset reach--> 
</div>
<!--inbox of bunjo-performance-->
<?php if (post_custom('performance-01-ttl') && post_custom('performance-02-ttl') && post_custom('performance-03-ttl')) ://?>
<ul class="flexbox tab tab-col3">
<?php elseif (post_custom('performance-01-ttl') && post_custom('performance-02-ttl')) ://?>
<ul class="flexbox tab tab-col2">
<?php elseif (post_custom('performance-02-ttl') && post_custom('performance-03-ttl')) ://?>
<ul class="flexbox tab tab-col2">
<?php elseif (post_custom('performance-01-ttl') && post_custom('performance-03-ttl')) ://?>
<ul class="flexbox tab tab-col2">
<?php else :?>
<ul class="flexbox tab tab-col3">
  <?php endif;?>
  <?php if (post_custom('performance-01-ttl')) ://?>
  <li class="bunjo-performance01 active "> <a href="#bunjo-performance01"> <?php echo (post_custom('performance-01-ttl')); ?> </a> </li>
  <?php endif ;//?>
  <?php if (post_custom('performance-02-ttl')) ://?>
  <li class="bunjo-performance02"> <a href="#bunjo-performance02"> <?php echo (post_custom('performance-02-ttl')); ?> </a> </li>
  <?php endif ;//?>
  <?php if (post_custom('performance-03-ttl')) ://?>
  <li class="bunjo-performance03"> <a href="#bunjo-performance03"> <?php echo (post_custom('performance-03-ttl')); ?> </a> </li>
  <?php endif ;//?>
</ul>
<?php endif ;//?>
<script>
jQuery(function() {
  jQuery(".tab a").click(function() {
    jQuery(this).parent().addClass("active").siblings(".active").removeClass("active");
    var tabContents = jQuery(this).attr("href");
    jQuery(tabContents).addClass("active").siblings(".active").removeClass("active");
    return false;
  });
});	
</script>
<?php elseif ( is_object_in_term($post->ID,'bunjo_role','bunjo-gallery') ): ?>
<div id="galleryslider" class="sliderArea rel_lb">
  <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/js/slick/slick.css" media="screen" />
  <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/js/slick/slick-theme.css" media="screen" />
  <script src="<?php bloginfo('stylesheet_directory'); ?>/js/slick/slick.min.js"></script> 
  <script>
//タグにclass追加
jQuery(function(){
jQuery('#galleryslider .gallery-size-large').addClass('slider_thumb slider'); 
});
jQuery(function(){
jQuery('#galleryslider .gallery-size-thumbnail').addClass('thumb'); 
});
		
		
//slick設定
jQuery(document).ready(function () {
	jQuery('.slider_thumb').slick({
//      arrows:true,
//	  dots: false,
      asNavFor:'.thumb',
  })

});

		
//サムネイル表示の調整	
	
var windowWidth = jQuery(window).width();
var windowSm = 768;
if (windowWidth <= windowSm) {
jQuery(function () {
let slidesToShowNum = 6; //slidesToShowに設定したい値を挿入
 /* slidesToShowより投稿が少ない場合の処理▽ */
let item = jQuery('#galleryslider .thumb dl').length; //dlの個数を取得
if (item <= slidesToShowNum) {
for ( i = 0 ; i <= slidesToShowNum + 1 - item ; i++) { //足りていない要素数分、後ろに複製
jQuery('#galleryslider .thumbl dl:nth-child(' + i + ')').clone().appendTo('#galleryslider .thumb');
  }
 } /* slidesToShowより投稿が少ない場合の処理△ */

 jQuery('#galleryslider .thumb').slick({
  slidesToShow: slidesToShowNum, //slidesToShowNumに設定した値が入る
 });
});
	
} else {
//横幅768px以上（PC、タブレット）に適用させるJavaScriptを記述
jQuery(function () {
let slidesToShowNum = 12; //slidesToShowに設定したい値を挿入
 /* slidesToShowより投稿が少ない場合の処理▽ */
let item = jQuery('#galleryslider .thumb dl').length; //liの個数を取得
if (item <= slidesToShowNum) {
for ( i = 0 ; i <= slidesToShowNum + 1 - item ; i++) { //足りていない要素数分、後ろに複製
jQuery('#galleryslider .thumb dl:nth-child(' + i + ')').clone().appendTo('#galleryslider .thumb');
  }
 }
 /* slidesToShowより投稿が少ない場合の処理△ */
 jQuery('#galleryslider .thumb').slick({
  slidesToShow: slidesToShowNum, //slidesToShowNumに設定した値が入る
 });
});}			
</script>
  <?php
  $id = $post->ID;
  if ( empty( $exclude ) ) {
    $eximages = get_children( array( 'post_parent' => $id, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'numberposts' => -1 ) );
    foreach ( $eximages as $eximage ) {
      $post_custom = get_post_custom( $eximage->ID );
      if ( isset( $post_custom[ 'exclude' ] ) ) {
        $excludes[] = $eximage->ID;
      }
    }
    if ( isset( $excludes ) && !empty( $excludes ) ) {
      $exclude = ( is_array( $excludes ) ) ? join( ',', $excludes ) : '';
    }
  };
  ?>
  <?php echo (do_shortcode('[gallery columns="0" link="file" title="true" caption="true" description="true" size="large" exclude='.$exclude.']')); ?> <?php echo (do_shortcode('[gallery columns="0" link="file" title="false" caption="false" description="false" size="thumbnail"  exclude='.$exclude.']')); ?> </div>

<!--　-->

<?php elseif ( is_object_in_term($post->ID,'bunjo_role','bunjo-location') ): ?>
<div id="" class="clearfix rel_lb"> <?php echo (do_shortcode('[gallery link="file" title="false" caption="true" description="true" size="medium" ]')); ?> </div>
<!--　-->

<?php else :?>
<?php the_content(); ?>
<?php endif; ?>
<?php edit_post_link(__('Edit'), ''); ?>
</div>
</div>

<!-- .entry-content -->

<p class="to_form btn reach_off"><a href="#form">資料請求はこちら</a></p>
</section>
<!--0000-->

<?php $i++;endforeach; ?>
<?php endif;  wp_reset_postdata();?>
<?php //get_template_part('include', 'example');//選ばれる理由 ?>
<?php
query_posts( array(
  'post_type' => 'example', //カスタム投稿名
  'orderby' => 'order',
  'posts_per_page' => 5 //表示件数（ -1 = 全件 ）
) );
?>
<div id="popup_gallery" class="bunjo_role role-bunjo-example clearfix anchor">
  <section class="inbox posts posts-popup_gallery clearfix rel_lb">
    <header class="content-header">
      <h2 class="bold">OTHER WORKS</h2>
      <span class="subttl"><?php echo get_option('profile_shop_name');//屋号 ?>の施工事例</span> </header>
    <?php if(have_posts()): while(have_posts()):the_post(); ?>
    <article id="post-<?php the_ID(); ?>" class="post clearfix style-popup_gallery parent-container"> <?php echo (do_shortcode('[gallery size="medium" columns="0" link="file"]')); ?> <span class="title ">
      <?php the_title(); ?>
      </span>
      <?php edit_post_link(__('Edit'), ''); ?>
    </article>
    <!--post-->
    <?php endwhile; endif; ?>
  </section>
</div>
<?php wp_reset_query(); ?>
<!--フォーム	-->
<section id="form" class="clearfix anchor maxw-1200 mx-auto">
  <header class="text-center mt-5 py-4">
    <h2>資料請求のお申し込み</h2>
  </header>
  <?php echo apply_filters('the_content', get_post_meta($post_id, 'unique-form-ttl', true)); ;?> </section>
<!--form--> 
<script>
	
	
jQuery(function() {
//var set = 300;//ウインドウ上部からどれぐらいの位置で変化させるか
	// ナビゲーションのリンクを指定
   var navLink = jQuery('#bunjo_content-nav li a'); 
    // 各コンテンツのページ上部からの開始位置と終了位置を配列に格納しておく
   var contentsArr = new Array();
  for (var i = 0; i < navLink.length; i++) {
       // コンテンツのIDを取得
      var targetContents = navLink.eq(i).attr('href');
      // ページ内リンクでないナビゲーションが含まれている場合は除外する
      if(targetContents.charAt(0) == '#') {
         // ページ上部からコンテンツの開始位置までの距離を取得
            var targetContentsTop = jQuery(targetContents).offset().top;
         // ページ上部からコンテンツの終了位置までの距離を取得
            var targetContentsBottom = targetContentsTop + jQuery(targetContents).outerHeight(true) - 1;
         // 配列に格納
            contentsArr[i] = [targetContentsTop, targetContentsBottom]
      }
   };
 
  // 現在地をチェックする
   function currentCheck() {
       // 現在のスクロール位置を取得
        var windowScrolltop = jQuery(window).scrollTop();
        for (var i = 0; i < contentsArr.length; i++) {
           // 現在のスクロール位置が、配列に格納した開始位置と終了位置の間にあるものを調べる
          if(contentsArr[i][0] <= windowScrolltop && contentsArr[i][1] >= windowScrolltop) {
                // 開始位置と終了位置の間にある場合、ナビゲーションにclass="current"をつける
               navLink.removeClass('current');
               navLink.eq(i).addClass('current');
                i == contentsArr.length;
            }
       };
  }
 
   // ページ読み込み時とスクロール時に、現在地をチェックする
  jQuery(window).on('load scroll', function() {
      currentCheck();
 });
 
 // ナビゲーションをクリックした時のスムーズスクロール
    navLink.click(function() {
      jQuery('html,body').animate({
          scrollTop: jQuery(jQuery(this).attr('href')).offset().top
       }, 300);
        return false;
   })
});	
</script>
<footer>
  <div class="entry-utility wrapper">
    <?php edit_post_link( __( 'Edit', 'hublog' ), '<span class="edit-link">', '</span>' ); ?>
    <?php
    wp_link_pages( array(
      'before' => '<div class="page-link">' . __( 'Pages:' ),
      'after' => '</div>',
      'link_before' => '<span>',
      'link_after' => '</span>',
    ) );
    ?>
    <div class="entry-meta">
      <?php
      printf(
        $posted_in,
        get_the_category_list( ', ' ),
        $tag_list,
        get_permalink(),
        the_title_attribute( 'echo=0' )
      );
      ?>
    </div>
    <!-- .entry-meta -->
    
    <div class="entry-meta updated author"> <span class="date updated">
      <?php the_time('Y/n/j') ?>
      </span> <span class="author vcard">投稿者：<span class="fn">
      <?php the_author(); ?>
      </span></span> </div>
    <!-- .entry-meta --> 
    
  </div>
  <!-- .entry-utility --> 
  
</footer>
</article>
<!-- #post-## -->

<?php
/**
 */

get_footer();

?>
<style>
@media screen and (max-width:575.98px) {
}
#jp-relatedposts{
display: none !important;
}
#globalheader{
visibility: hidden;
height: 30px;
overflow: hidden;
}
#headnav{
display: none;
}
.anchor{
margin-top: -6.5em;
padding-top: 6.0em;
}

#bunjo_content-nav{
position: fixed;
box-sizing: border-box;
left: 0;
top: 0;
right: 0;
width: 100%;
padding-right: 60px;
background: #5F401D;
z-index: 399;
}

#bunjo_content-nav ul{
font-size: 0;
letter-spacing: 0;
padding: 0;
margin: 0;
color: #fff;

margin: 0 auto;

}
#bunjo_content-nav li{
padding: 0;
margin: 0;
width:calc( (100% - 60px) / 6 );
text-align: center;
}
#bunjo_content-nav li *{
font-size: 1.5vw;
}
#bunjo_content-nav li a{
color: #fff;
display: block;
padding: 0.75rem 1vw;
transition: .15s;
z-index: 999999;
position: relative;
text-decoration: none;
}
#bunjo_content-nav li a.current{
text-decoration: none;
background: #C9A063;
}

	
@media screen and (min-width:992px) {
#bunjo_content-nav li a:hover{
text-decoration: none;
background: #C9A063;
	}
	}
#bunjo_content-nav li a > span{
display: block;
padding: 0 0.5em;
white-space: nowrap;
}
#bunjo_content-nav li a > span.small{
font-size: 0.8vw;
}


#wrapper .btn-gnavi span{
background:rgba(255,255,255,.7);
}

.btn-gnavi-menu{
color:rgba(255,255,255,.7);
}



@media screen and (min-width:1260px) {
#bunjo_content-nav li *{
font-size: 1.2rem;
}
#bunjo_content-nav{
padding-right: 0;
}

#bunjo_content-nav li{
width:calc( 100% / 6 );
}
}

@media screen and (max-width:767.98px) {
#bunjo_content-nav{
width: 100%;
padding-right: 0;
padding-left: 50px;
}
#bunjo_content-nav li a {
padding: 0.4vw 0;
font-size: 2vw;
}

#bunjo_content-nav li{
width: 50%;
text-align: left;
font-size: 1.5rem;
}
#bunjo_content-nav li a span:before{
content: "\f054";
font-family: FontAwesome;
margin-right: 0.5em;
display: inline-block;
}
#bunjo_content-nav li a > span{
display: none;
}
#bunjo_content-nav li a > span.small{
display: block;
font-size: 3.0vw;
}	


}

@media screen and (max-width:575.98px) {
#bunjo_content-nav li a > span.small{
display: block;
font-size: 3.3vw;
}	
}

.entry-header .entry-title{
background: none;
font-size: 1rem;
text-align: center;
padding-top: 3em;
margin-bottom: -3em;
padding: 0;
margin-top: 3em;
margin-bottom: -3em;
}
.bunjo_role	.entry-content{
position: relative;
}
.bunjo_role	.entry-content .post-edit-link{
position: absolute;
right: 3px;
top: 5em;
display: inline-block;
padding: 0.2em 1em;
background: #fff;

}
.bunjo_role	.entry-content h1,
.bunjo_role	.entry-content h2,
.bunjo_role	.entry-content h3,
.bunjo_role	.entry-content h4,
.bunjo_role	.entry-content h5{
border: none;
padding-left: 0;
padding-right: 0;
background: none;
font-weight: bold;
}

.bunjo_role-header {
background: #5F401D;
}
.bunjo_role-header h2{
text-align: center;
color: #fff;
line-height: 1.6em;
margin-bottom: 0;
}
.bunjo_role-header h2 span{
display: block;
font-size: 1.8rem;
line-height: 1.7em;
}
.bunjo_role-header h2 span.small{
font-size: 0.8rem;
}

#bunjo_role-1{
background: url("<?php bloginfo('stylesheet_directory'); ?>/images/bg_check.png");
}

.bunjo_role	.the_content{
padding-top: 2em;
margin-top: 0;
}

/*concept*/	
.bunjo_role.role-bunjo-concept{
margin-bottom: 3em;
}
/*PERFORMANCE*/
.bunjo_role.role-bunjo-performance{}
.bunjo_role.role-bunjo-performance .the_content{
padding-top: 0;
}
.bunjo_role.role-bunjo-performance .the_content >  .inbox{
border-left:2px solid #5F401D;
border-right:2px solid #5F401D;


border-bottom:2px solid #5F401D;
padding: 3em 2em 2em ;
}

.bunjo_role.role-bunjo-performance .tab{
}	
.bunjo_role.role-bunjo-performance .tab,
.bunjo_role.role-bunjo-performance .tab > li{
padding: 0;
font-size: 0;
letter-spacing: 0;
}
.bunjo_role.role-bunjo-performance .tab > li{
display: block;
margin: 0;
}
.bunjo_role.role-bunjo-performance .tab.tab-col3 > li{
width: calc( 100% / 3);
}
.bunjo_role.role-bunjo-performance .tab.tab-col2 > li{
width: calc( 100% / 2);
}
.bunjo_role.role-bunjo-performance .tab > li a{
display: block;
text-align: center;
padding:0.8em  0 ;
background:  #fff;
color: #5F401D;
font-size: 1.2rem;
border-left: 1px solid #5F401D;
border-right: 1px solid #5F401D;
border-bottom: 2px solid #5F401D;
text-decoration: none;
}
.bunjo_role.role-bunjo-performance .tab > li a:after{
content: "\f054";
font-family: FontAwesome;
display: inline-block;
margin-left: 0.5em;
}

.bunjo_role.role-bunjo-performance .tab > li:first-child a{
border-left: 2px solid #5F401D;
}
.bunjo_role.role-bunjo-performance .tab > li:ladt-child a{
border-right: 2px solid #5F401D;
}
.bunjo_role.role-bunjo-performance .tab > li.active a{
background: #5F401D;
color: #fff;
}
.tab_ttl{
text-align: center;
margin-top: 1.5em;
}
.tab_ttl:before{
content: "";
display: block;
border-top: 1px solid #ccc;
position: relative;
text-align: center;
}
.tab_ttl span{
display: inline-block ;
padding: 0 1em; 
background: #fff;
position: relative;
top: -1em;
}
.tabContents {
display: none;
}
.tabContents.active {
display: block;
}

.role-bunjo-performance .tabContents.anchor{
padding-top: 8em;
}


/*EQUIPMENT*/
.bunjo_role.role-bunjo-equipment .the_content{
border:2px solid #5F401D;
padding: 2em;
margin-top: 0;

}

/*LOCATION*/
.bunjo_role.role-bunjo-location .gallery dl + br {
display: none;
}

.bunjo_role.role-bunjo-location .gallery {
width: 100%;
max-width: 1200px;
margin: auto;
padding-left: 0;
display: -webkit-box;
display: -moz-box;


display: -ms-box;
display: -webkit-flexbox;
display: -moz-flexbox;
display: -ms-flexbox;
display: -webkit-flex;
display: -moz-flex;
display: -ms-flex;
display: flex;
-webkit-box-lines: multiple;
-moz-box-lines: multiple;
-webkit-flex-wrap: wrap;
-moz-flex-wrap: wrap;
-ms-flex-wrap: wrap;
flex-wrap: wrap;
}
body.bunjo-template-default .bunjo_role.role-bunjo-location .gallery > * {
box-sizing: border-box;
width: 24% !important ;
margin:0.5%;
padding: 0;
vertical-align: top;
position: relative;
}	

.bunjo_role.role-bunjo-location	#galleryslider{
padding: 0;
background:transparent;
}
.bunjo_role.role-bunjo-location .gallery dl{
padding:0 0 1em 0 !important;
}	
.bunjo_role.role-bunjo-location .gallery dl dd{
line-height: 1.5em;
}	

.bunjo_role.role-bunjo-location .gallery dl dt{
display: block;
position: relative;
overflow: hidden;
width: 100%;/*　トリミングしたい枠の幅　*/
padding-top: 65%;/*　トリミングしたい枠の高さ　*/

}

.bunjo_role.role-bunjo-location .gallery dl dt a img {
position: absolute;
top: 50%;
left: 50%;
-webkit-transform: translate(-50%, -50%);
-ms-transform: translate(-50%, -50%);
transform: translate(-50%, -50%);
display: block;
}


/*FORM*/	
.bunjo_role.role-bunjo-concept  .to_form.btn a{
margin-bottom: 0;
}

.bunjo_role .to_form.btn a{
padding: 0.7em;
font-size: 1.3rem;
border-radius: 0.5em;
background: #22AC38;
color: #fff;
max-width: 25em;
margin: 0 auto 4em;
display: block;
}
.bunjo_role .to_form.btn a:before{
content: "\f0e0";
font-family: FontAwesome;
margin-right: 1em;

}
.bunjo_role .to_form.btn a:after{
content: "\f0da";
font-family: FontAwesome;
margin-left: 1em;
}

#form header h2{
font-size: 1.5em;
}

/*POPUP GALLERY EXAMPEL*/

#popup_gallery{
color: #fff;
margin-bottom: 3em;
}
#popup_gallery header{
text-align: center;
}
#popup_gallery > .inbox{
background: #C9A063;
}
#popup_gallery .content-header{
color: #fff;
padding: 1em 0;
}
#popup_gallery.posts{
text-align: center;
}	
#popup_gallery dl.gallery-item,
#popup_gallery dl + br{
display: none;
}
#popup_gallery dl.gallery-item:first-child{
display: block;
float: none;
}

.posts .post.style-popup_gallery{
display: inline-block;
width: 17%;
margin: 0 1%;
vertical-align:top;
text-align: center;
}

@media screen and (max-width: 767.98px) {
.posts .post.style-popup_gallery{
width: 47%;
}
}
#popup_gallery dl{
background: transparent;
}
#popup_gallery dl dt a{
display: block;
background: rgba(0,0,0,0.1);
position: relative;
overflow: hidden;
width: 100%;/*　トリミングしたい枠の幅　*/
padding-top: 66%;/*　トリミングしたい枠の高さ　*/
border-radius: 7px;

}
#popup_gallery .gallery .gallery-icon{
padding-top: 0;
}


#popup_gallery dl dt a img{
display: block;
width: 100%;
height: auto;
position: absolute;
top: 50%;
left: 50%;
-webkit-transform: translate(-50%, -50%);
-ms-transform: translate(-50%, -50%);
transform: translate(-50%, -50%);
display: block;
}


.bunjo_role.role-bunjo-performance .tab li{
width: 100% !important;
}	
.bunjo_role.role-bunjo-performance .tab li a{
padding: 0.2em 0;
border-bottom: 2px solid #5F401D;
border-left: 2px solid #5F401D;
border-right: 2px solid #5F401D;
}
}

@media screen and (max-width: 767.98px) {
.bunjo_role.role-bunjo-location .gallery .title{
display: none;
}

.bunjo_role.role-bunjo-location .gallery dl{
padding-bottom: 0;
}

#popup_gallery .style-popup_gallery .title{
display: none;
}

.bunjo_role .to_form.btn a{
font-size: 1.1rem;
}

}

#galleryslider .slider_thumb .gallery-item:not(.slick-current){
height: 0;
overflow: hidden;
transition: .3s;
}
#galleryslider{
min-height: 80vh;
}
@media screen and (max-width:767.98px) {
#galleryslider{
min-height: 40vh;
}
	
</style>