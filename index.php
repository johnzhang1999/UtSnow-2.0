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
			——·   <?php the_time('Y年n月j日') ?> | <?php comments_popup_link('0 条评论', '1 条评论', '% 条评论', '', '评论已关闭'); ?> | 热度<?php echo getPostViews(get_the_ID()); ?>+℃   ·——
			<br><br>
<?php get_post_thumbnail(); ?> 
			</center>
			<hr>
			<psize><?php the_content('阅读全文...'); ?></psize>
			<br><br><br>
		</div>
	</div>

<?php endwhile; else: ?>
	<p><?php _e('(⊙o⊙)…没有文章喔……'); ?></p>
<?php endif; ?>
<hr>
			<!--<p class="clearfix"><?php previous_posts_link('&lt;&lt; 查看新文章', 0); ?> -->
			<center><?php get_pagenavi(); ?></center>
			<!--<span class="floatright"><?php next_posts_link('查看旧文章 &gt;&gt;', 0); ?></span></p>-->
<hr>
			<?php get_footer(); ?>