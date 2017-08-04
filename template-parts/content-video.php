<?php
/**
 * The template used for displaying page content in db video entries
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
		<?php the_field('embed_code'); ?>

		<?php if( get_field('pull_quote')): ?>
			<p>
				<?php the_field('pull_quote'); ?>
			</p>
		<?php endif; ?>
		<?php if( get_field('display_text')): ?>
			<p>
				<?php the_field('pull_quote'); ?>
			</p>
		<?php endif; ?>
		<?php if( get_field('copyright_statement')): ?>
			<p style="text-align:right">
				<?php the_field('copyright_statement'); ?>
			</p>
		<?php endif; ?>

		<p><?php the_tags(""); ?></p>




	<?php edit_post_link( esc_html__( 'Edit', 'activello' ), '<footer class="entry-footer"><i class="fa fa-pencil-square-o"></i><span class="edit-link">', '</span></footer>' ); ?>
</article><!-- #post-## -->
</div>
