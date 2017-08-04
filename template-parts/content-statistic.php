<?php
/**
 * The template used for displaying page content in db link entries
 *
 * @package gk-portfolio
 */
?>

<?php
	$thumbnail_args = array(
		'class' => 'single-featured',
	);
	the_post_thumbnail( 'activello-featured', $thumbnail_args );
?>

<div class="post-inner-content">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header page-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php if( get_field('pull_quote')): ?>
			<p>
				<?php the_field('pull_quote'); ?>
			</p>
		<?php endif; ?>
		<?php if( get_field('statistic_text')): ?>
			<p>
				<?php the_field('statistic_text'); ?>
			</p>
		<?php endif; ?>
		<?php if( get_field('statistic_source') && get_field('statistic_source_url')): ?>
			<p>
				- <a href=" <?php the_field('statistic_source_url');?>" target="_blank"><?php the_field('statistic_source'); ?></a>
			</p>
		<?php elseif( get_field('statistic_source')): ?>
			<p>
				- <?php the_field('statistic_source'); ?>
			</p>
		<?php endif; ?>

		<?php

		$image = get_field('chart_or_diagram');

		if( !empty($image) ):

			// vars
			$url = $image['url'];
			$title = $image['title'];
			$alt = $image['alt'];
			$caption = $image['caption'];

			// thumbnail
			$size = 'thumbnail';
			$thumb = $image['sizes'][ $size ];
			$width = $image['sizes'][ $size . '-width' ];
			$height = $image['sizes'][ $size . '-height' ];?>


				<img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>" class="size-large" />

			<?php if( $caption ): ?>

					<p class="wp-caption-text"><?php echo $caption; ?></p>

			<?php endif; ?>

		<?php endif; ?>

		<?php if( get_field('chart_creator') && get_field('chart_source') && get_field('chart_source_url')): ?>
			<p>
				- <?php the_field('chart_creator'); ?>, <a href="<?php the_field('chart_source_url'); ?>" target="_blank"><?php the_field('chart_source'); ?></a>
			</p>
		<?php elseif( get_field('chart_source') && get_field('chart_source_url')): ?>
			<p>
				- <a href="<?php the_field('chart_source_url'); ?>" target="_blank"><?php the_field('chart_source'); ?></a>
			</p>
		<?php elseif( get_field('chart_creator') && get_field('chart_source')): ?>
			<p>
				- <?php the_field('chart_creator'); ?>, <?php the_field('chart_source'); ?>
			</p>
		<?php elseif( get_field('chart_creator')): ?>
			<p>
				- <?php the_field('chart_creator'); ?>
			</p>
		<?php endif; ?>

		<p><?php the_tags(""); ?></p>

		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'activello' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->
	<?php edit_post_link( esc_html__( 'Edit', 'activello' ), '<footer class="entry-footer"><i class="fa fa-pencil-square-o"></i><span class="edit-link">', '</span></footer>' ); ?>
</article><!-- #post-## -->
</div>
