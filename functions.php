<?php 

function wpbootstrap_scripts_with_jquery()
{
	// Register the script like this for a theme:
	wp_register_script( 'custom-script', get_template_directory_uri() . '/bootstrap/js/bootstrap.js', array( 'jquery' ) );
	// For either a plugin or a theme, you can then enqueue the script:
	wp_enqueue_script( 'custom-script' );
}
add_action( 'wp_enqueue_scripts', 'wpbootstrap_scripts_with_jquery' );

if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
	// 添加特色图像功能
add_theme_support('post-thumbnails');
set_post_thumbnail_size(930, 800, true); // 图片宽度与高度
function paging_nav(){
	global $wp_query;
 
	$big = 999999999; // 需要一个不太可能的整数
 
	$pagination_links = paginate_links( array(
		'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format' => '?paged=%#%',
		'current' => max( 1, get_query_var('paged') ),
		'total' => $wp_query->max_num_pages,
		'prev_next'=> false,
		'mid_size'=> 5
	) );
 
echo $pagination_links;
//http://www.wpdaxue.com/paginate_links.html
}
function hide_admin_bar($flag) {
return false;
}
add_filter('show_admin_bar','hide_admin_bar');

function get_post_thumbnail() {
if (has_post_thumbnail()) {
     // 显示特色图像
     the_post_thumbnail();
} else if ( $values = get_post_custom_values("picture") ) { ?>
<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><img class="thumb" src="<?php $values = get_post_custom_values("picture"); echo $values[0]; ?>" alt="<?php the_title(); ?>" /></a>
<?php } /* else {
     // 设置特色图像
     $attachments = get_posts(array(
          'post_type' => 'attachment',
          'post_mime_type'=>'image',
          'posts_per_page' => 0,
          'post_parent' => $post->ID,
          'order'=>'ASC'
     ));
     if ($attachments) {
          foreach ($attachments as $attachment) {
               set_post_thumbnail($post->ID, $attachment->ID);
               break;
          }
          // 显示特色图像
          
     }
} */
}
// 页面导航

function get_pagenavi () {
	global $wp_query, $wp_rewrite;
	$wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

	$pagination = array(
		'base' => @add_query_arg('paged','%#%'),
		'format' => '',
		'total' => $wp_query->max_num_pages,
		'current' => $current,
		'show_all' => false,
		'type' => 'plain',
		'end_size'=>'0',
		'mid_size'=>'5',
		
	);

	if( $wp_rewrite->using_permalinks() )
		$pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg('s',get_pagenum_link(1) ) ) . 'page/%#%/', 'paged');

	if( !empty($wp_query->query_vars['s']) )
		$pagination['add_args'] = array('s'=>get_query_var('s'));

	echo paginate_links($pagination);
}

/*显示文章浏览次数*/
function getPostViews($postID){
$count_key = 'post_views_count';
$count = get_post_meta($postID, $count_key, true);
if($count==''){
delete_post_meta($postID, $count_key);
add_post_meta($postID, $count_key, '0');
return "0";
}
return $count.'';
}
function setPostViews($postID) {
$count_key = 'post_views_count';
$count = get_post_meta($postID, $count_key, true);
if($count==''){
$count = 0;
delete_post_meta($postID, $count_key);
add_post_meta($postID, $count_key, '0');
}else{
$count++;
update_post_meta($postID, $count_key, $count);
}
}
?>
<!--'prev_text' => __('上一页','dpt'),
		'next_text' => __('下一页','dpt')-->

