<?php get_header(); ?>
<style>
img,a img{
border:0;
margin:0;
padding:0;
max-width:930px;
width: expression_r(this.width > 650 && this.width > this.height ? 650px : ‘auto’;);
max-height:800px;
height: expresion(this.height > 1650 ? 1650px : ‘auto’;);
} 
</style>

      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	  <div class="row">
		<div class="col-md-10 col-md-offset-1">
		<center>
		
		<a href="<?php the_permalink(); ?>"><h1><?php the_title(); ?></h1></a>				
			——·&nbsp;&nbsp;&nbsp;<?php the_time('Y年n月j日') ?> | <?php comments_popup_link('0 条评论', '1 条评论', '% 条评论', '', '评论已关闭'); ?>&nbsp;&nbsp;&nbsp;·——
			<br><br><?php get_post_thumbnail(); ?>
			</center>
			<hr>
			<psize><?php the_content(); ?></psize>
			<hr>
			<p class="clearfix">《 <?php next_post_link('%link ') ?></a>
			<span class="floatright"><?php previous_post_link('%link ') ?> 》</span></p>
			<hr>
			<style>
.random li{display:inline-block}
</style>
<center>
<div class='random'>
			<?php
$rand_posts = get_posts('numberposts=5&orderby=rand');
foreach( $rand_posts as $post ) :
?>
<li><a href=”<?php the_permalink(); ?>”>  <?php the_title(); ?>  </a></li>
<?php endforeach; ?>
</center>
			<hr>
			<?php comments_template(); ?>
		</div>
		<!-- 若要显示侧边栏请取消注释
		<div class="col-md-2">
			<?php get_sidebar(); ?>	
		</div>-->
	</div>

<?php endwhile; else: ?>
	<p><?php _e('(⊙o⊙)…没有文章喔……'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>