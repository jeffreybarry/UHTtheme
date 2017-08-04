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
		<p>
			<?php the_field('annotation');?>
		</p>
		<?php if( get_field('source_author')): ?>
			<p>
				- <a href=" <?php the_field('url');?>" target="_blank"><?php the_field('source_author'); ?>, <?php the_field('source_title'); ?>, <?php the_field('source_publication'); ?> </a>
			</p>
			<?php else: ?>
			<p>
				- <a href=" <?php the_field('url');?>" target="_blank"><?php the_field('source_title'); ?>, <?php the_field('source_publication'); ?> </a>
			</p>
			<?php endif; ?>
			<p>
				<?php the_field('citation'); ?>
			</p>

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
