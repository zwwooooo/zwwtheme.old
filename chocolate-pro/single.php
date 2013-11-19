<?php get_header(); global $cp_options; ?>

<div id="content">

	<div id="path">
		<a rel="bookmark" href="<?php echo home_url(); ?>"><?php _e('Home','chocolate_pro'); ?></a>
		<?php the_post(); ?>
			&rsaquo; <?php if($category=get_the_category($post->ID)) echo (get_category_parents($category[0]->term_id, TRUE, ' &rsaquo; ')); ?> <?php the_title(); ?>
		<?php rewind_posts(); ?>
	</div>

	<?php if (have_posts()) : while (have_posts()) : the_post();?>
	<div class="post post_singular" id="post-<?php the_ID(); ?>">
		<h2 class="title"><?php the_title(); ?></h2>
		<div class="post_info">
			<span class="p_author"><?php the_author(); ?></span>
			<span class="p_date"><?php the_time('Y.m.d'); ?></span>
			<span class="p_catetory"><?php the_category(', '); ?></span>
			<?php if(function_exists('the_views')) { echo '<span class="p_postviews">'; the_views(); echo '</span>'; } ?>
			<?php edit_post_link(__('Edit','chocolate_pro'), '<span class="p_edit">[', ']</span>'); ?>
			<span class="p_comment p_comment_single"><a href="#comments" rel="bookmark"><?php _e('Leave a comment','chocolate_pro'); ?></a> <?php comments_number('(0)', '(1)', '(%)'); ?></span>
		</div>
		<div class="clear"></div>
		<div class="entry">
			<?php if ($cp_options['single_ad']!='') { ?>
			<div class="single_ad"><?php echo $cp_options['single_ad']; ?></div>
			<?php } ?>
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page_link"><strong>'.__('Pages:','chocolate_pro').'</strong>' , 'after' => '</div>' ) ); ?>
		</div>
	</div>
	<div class="post_info_b">
		<span class="p_tag"><?php the_tags('', ', ', ''); ?></span>
		<span class="p_navi"><?php previous_post_link('%link', __('&laquo; Previous','chocolate_pro')); ?><?php next_post_link(' | %link',__('Next &raquo;','chocolate_pro')); ?></span>
	</div>
	<?php if ( function_exists('chocolate_related_posts') ) : ?>
	<div class="related_posts">
		<h3><?php _e('Related Posts','chocolate_pro'); ?></h3>
		<ul><?php chocolate_related_posts(5); ?></ul>
	</div>
	<?php endif; ?>
	<?php comments_template( '', true ); ?>
	<?php endwhile; endif; ?>

</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>