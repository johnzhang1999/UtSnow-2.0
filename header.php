<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <title><?php if ( is_home() ) {
        bloginfo('name'); echo " - "; bloginfo('description');
    } elseif ( is_category() ) {
        single_cat_title(); echo " - "; bloginfo('name');
    } elseif (is_single() || is_page() ) {
        single_post_title(); echo " - "; bloginfo('name');
    } elseif (is_search() ) {
        echo "搜索结果"; echo " - "; bloginfo('name');
    } elseif (is_404() ) {
        echo '页面未找到!';
    } else {
        wp_title('',true);
    } ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="John Zhang">

    <!-- Le styles -->
<link href="<?php bloginfo('template_url'); ?>/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet">
<!-- Le javascript -->
   <script src="http://libs.baidu.com/jquery/1.9.0/jquery.min.js"></script>
   <script src="http://libs.baidu.com/bootstrap/2.0.4/js/bootstrap.min.js"></script>
 <script src="http://johnzhang-files.qiniudn.com/bootswatch.js"></script>
 <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/instantclick.min.js" data-no-instant></script>
<script data-no-instant>InstantClick.init();</script>
 <!-- Pace -->
<script src="<?php echo get_template_directory_uri(); ?>/pace/pace.js"></script>   
  <link href="<?php echo get_template_directory_uri(); ?>/pace/themes/pace-theme-flash.css" rel="stylesheet" />  
 
 
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://apps.bdimg.com/libs/html5shiv/3.7/html5shiv.min.js"></script>
    <![endif]-->
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url')?>" />
<link rel="alternate" type="application/rdf+xml" title="RSS 1.0" href="<?php bloginfo('rss_url')?>" />
<link rel="alternate" type="application/atom+xml" title="ATOM 1.0" href="<?php bloginfo('atom_url')?>" />
  <?php wp_head(); ?>
  <?php if ( is_admin_bar_showing() ) {
	// 如果有 fiexd top 定位的元素，在这为 Admin Bar 增加 32px 顶边距
	echo '<style type="text/css" media="screen"> #float { top: 32px; } </style>' ;
} ?>
  </head>
<?php flush(); ?>
  <body>
<div id="jv-loadingbar"></div>
    <nav class="navbar navbar-default navbar-fixed-top transparent_class" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
			  <li <?php if (is_home()) { echo 'class="current"';} ?>><a title="<?php bloginfo('name'); ?>"  href="<?php echo get_option('home'); ?>/">主页</a></li></ul>
	  <?php if ( has_nav_menu( 'primary' ) ) {
                    wp_nav_menu( array('theme_location' => 'primary','container' => '','container_class' => '','container_id' => '','menu_class' => 'nav navbar-nav','items_wrap' => '<ul class="%2$s">%3$s</ul>','walker' => new Bootstrap_Walker )); //左侧主菜单
                    }else{
                    echo '<ul class="nav navbar-nav">';
                    wp_list_pages('sort_column=menu_order&title_li=');
                    echo '</ul>';
                } ?>
	<ul class="nav navbar-nav">
		<li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes">分类<span class="caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="themes">
                

<?php
$currentcategory = '';

// 以下这行代码用于在导航栏添加分类列表，
// 如果你不想添加分类到导航中，
// 请删除 6 - 14 行代码
if  (!is_page() && !is_home()) {
    $catsy = get_the_category();
    $myCat = $catsy[0]->cat_ID;
    $currentcategory = '&current_category='.$myCat;
}
wp_list_categories('depth=1&title_li=&show_count=0&hide_empty=0&child_of=0'.$currentcategory);
?>

              </ul>
            </li>
      </ul>
	<form class="navbar-form navbar-right" role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">   
		<input class="form-control" type="text" name="s" placeholder="你要找什么？" />    
		<input  class="btn btn-default" type="submit" value="搜索" />
	</form>
	  
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<br><br><br><br>
    <div class="container">