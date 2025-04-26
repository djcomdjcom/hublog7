<?php
/**
template name: ★スタッフ紹介
 */
get_header();

?>
<div id="staff_header" class="position-relative">
  <?php the_post(); ?>
  <div id="staff_header__bgimg"></div>
  <div id="staff_header__inner" class="wrapper container">
    <div class="inbox">
      <div class="staff_header_message"> <?php echo wpautop(get_the_author_meta('message')); ?> </div>
      <header class="user_name mb-4">
        <div class="user_post"> <span>
          <?php the_author_meta('post'); ?>
          </span> <span>
          <?php the_author_meta('division'); ?>
          </span> </div>
        <div class="inbox">
          <h1 class=" d-inline-block mr-4">
            <?php the_author_meta('last_name'); ?>
            <?php the_author_meta('first_name'); ?>
          </h1>
          <span class="d-inline-block">
          <?php the_author_meta('kana'); ?>
        </div>
      </header>
      <ul class="user_skill_credential">
		  
		  
		  <?php if(get_the_author_meta('skills') != ""): ?>
		  
		  
        <?php
        $skills = explode( "\n", get_the_author_meta( 'skills', '' ) );
        foreach ( $skills as $skill ) {
          echo "<li class=\"skills\">" . $skill . "</li>\n";
        }
        ?>
		  <?php endif;?>
		  
		  <?php if(get_the_author_meta('credentials') != ""): ?>
		  
        <?php
        $credentials = explode( "\n", get_the_author_meta( 'credentials', '' ) );
        foreach ( $credentials as $credential ) {
          echo "<li class=\"credentials\">" . $credential . "</li>\n";
        }
        ?>
		  
		  <?php endif;?>
		  
      </ul>
    </div>
  </div>
</div>
<div id="container" class="page widecolumn htmlpage">
  <div id="content" role="main">
    <article id="post-<?php the_ID(); ?>" <?php post_class('hentry'); ?>>
      <article class="entry-content">
        <?php the_content(); ?>
        <?php if ( current_user_can( 'administrator' ) ) :?>
        <p class="edit_theme"><a target="_blank" href="/wp-admin/theme-editor.php?file=html%2F<?php echo $slug_name = $post->post_name; ?>.php&theme=<?php echo get_stylesheet('name'); ?>" title="/wp-admin/theme-editor.php?file=html%2F<?php echo $slug_name = $post->post_name; ?>.php&theme=<?php echo get_stylesheet('name'); ?>"> このincludeテーマを編集 </a></p>
        <?php endif;?>
        <?php //インクルードセクション
        $the_page = get_page( get_the_ID() );
        $include_html_dir = STYLESHEETPATH . '/html/';
        $include_html_file = $include_html_dir . $the_page->post_name;
        if ( file_exists( $include_html_file . '.php' ) ) {
          include $include_html_file . '.php';
        } elseif ( file_exists( $include_html_file . '.html' ) ) {
          include $include_html_file . '.html';
        }
        ?>
        <?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
      </article>
      <!-- .entry-content -->
      
      <?php /** ページタブリンク **/ ?>
      <?php $parent_page_id = (int)post_custom('parent_page_id'); ?>
      <?php if ( $parent_page_id > 0 ) : ?>
      <ul id="pagetab-<?php echo $parent_page_id; ?>" class="pagetab clearfix cleartype">
        <?php wp_list_pages('depth=1&hide_empty=0&title_li=&include='  . $parent_page_id); ?>
        <?php wp_list_pages('depth=1&hide_empty=0&title_li=&child_of=' . $parent_page_id); ?>
      </ul>
      <?php endif; ?>
      <?php get_template_part('releated-posts');// posts_in_page ?>
      
      <!--商品ページ共通-->
      <?php
      $gettemplate01 = ( post_custom( 'gettempale01' ) );
      ?>
      <?php get_template_part($gettemplate01); ?>
      <?php get_template_part('hublog-inquiry',''); //問い合わせフック ?>
      <footer class="entry-utility page wrapper">
        <div class="entry-meta updated author"> <span class="date updated">
          <?php the_time('Y/n/j') ?>
          </span> <span class="author vcard">投稿者：<span class="fn">
          <?php the_author(); ?>
          </span></span> </div>
        <!--entry-meta-->
        <?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
      </footer>
      <!-- .entry-utility --> 
    </article>
    <!--.hentry--> 
  </div>
  <!-- #content --> 
  
</div>
<!-- #container -->

<style>
	
	#staff_header__bgimg{
		
		
		background: url(<?php the_post_thumbnail_url( '' );?>);
	}
	
	
	header.user_name{
	}
	header.user_name .inbox > *{
		display: inline-block;
		vertical-align: baseline;
	}
	
	.user_post{
	font-size: .875rem;
letter-spacing: .05em;
line-height: 1.71429;
margin-bottom: 1rem;
	}
	.user_post > span{
		display: inline-block;

	}
	
	.staff_header_message{
  font-size: 1.75rem;
  font-weight: 700;
  letter-spacing: .05em;
  line-height: 1.5;
  margin-top: 0;
  margin-bottom: 3rem;
  position: relative;
}		
	
	.staff_header_message:before{
	content: '';
display: block;
width: 1000px;
height: 1px;
background-color: #2a51bc;
position: absolute;
left: -40px;
top: 20px;
transform: translateX(-100%);
	}
	
	
	.user_skill_credential li{
		display: inline-block;
		border: 1px solid #ccc;
		padding: .25em .5em;
		margin-bottom: 0.4em;
		font-size: 0.8em;
		background: rgba(255,255,255,0.50); 
	}
	
	
	.user_skill_credential li.credentials{
		border: 1px solid #83B744;
	}
	.user_skill_credential li.skills{
		border: 1px solid #209AA0;
	}
	
	
	
	#staff_header__bgimg::before {
  content: '';
  display: block;
  width: 50%;
  height: 100%;
  background-image: linear-gradient(to right,#fff 0%,#fff 50%,transparent 100%);
  position: absolute;
  left: 0;
		top: 0;
	}
	#staff_header__bgimg{
  width: 100%;
  height: 40vw;
  min-height: 35rem;
  background-repeat: no-repeat;
  background-position: center center;
  background-size: cover;
  position: relative;
	}

	#breadcrumb{
		position: absolute;
		top: 80px;
		z-index: 99;
		width: 100%;
 	}
	#breadcrumb .wrapper{
		max-width: 1380px;
		width: 100%;
		left: auto;
		right: auto;
	}
#staff_header__inner {
width: 100%;
  max-width: 71.25rem;
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translateY(-50%) translateX(-50%);
			
}
#staff_header__inner > .inbox{
	  width: 100%;
  max-width: 30.625rem;
}
	
	.entry-content h2{
  font-size: 1.5rem;
  font-weight: 700;
  letter-spacing: .05em;
  line-height: 1.5;
  padding-bottom: 1.5rem;
  margin-bottom: 2rem;
  border-bottom: 2px solid #d5d5d5;
  position: relative;
		background: none;
		padding-left: 0;
}

.entry-content h2:before{
content: '';
display: block;
width: 6.125rem;
height: 2px;
background-color: #2a51bc;
position: absolute;
left: 0;
bottom: -2px;
z-index: 1;
	}
</style>
<?php get_footer(); ?>
