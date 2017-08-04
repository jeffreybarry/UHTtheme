<?php
/**
 * category template
 *
 * 
 *
 */
get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content archive" role="main">
			<header class="archive-header">
				<h1 class="archive-title"><?php printf( __('%s', 'portfolio'), '<strong>' . single_cat_title('', false) . '</strong>'); ?></h1>

				<?php if (category_description()) : ?>
				<div class="archive-meta"><?php echo category_description(); ?></div>
				<?php endif; ?>
			</header><!-- .archive-header -->
			<?php 
				$categories = get_categories( array(
					'parent' => 16,
					'order' => 'rand',
				) );

				 
				foreach( $categories as $category ) :
				    	 $cat_id = $category->term_id;
        				 $args = array(
                            'offset'           => 0,
                            'category'         => $cat_id,
                            'category_name'    => '',
                            'orderby'          => 'ASC',
                            'order'            => 'DESC',
                            'include'          => '',
                            'exclude'          => '',
                            'meta_key'         => '',
                            'meta_value'       => '',
                            'post_type'        => 'post',
                            'post_mime_type'   => '',
                            'post_parent'      => '',
                            'post_status'      => 'publish',
                            'suppress_filters' => true 
                        );
                    $posts_array = get_posts( $args );
                    $oldest = get_permalink($posts_array[0]->ID); // First posts;
					$category_link = sprintf( 
						'<a href="' . $oldest . '" alt="%2$s">%3$s</a>',
						esc_url( get_category_link( $category->term_id ) ),
						esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ),
						esc_html( $category->name )
					);
					
					?>
					<article class="post type-post format-standard hentry">
						<div class="article-helper notloaded article-hover animated">
							<div class="post-preview transition animation animation-slide-up">
							    <header class="entry-header full-width-image">
							        <h2 class="entry-title">
							            <?php echo sprintf( esc_html__( '%s', 'textdomain' ), $category_link ); ?>
							        </h2>
							    </header>
							</div>
						</div>
					</article>
				<?php endforeach; ?>


		</div><!-- #content -->

	</div><!-- #primary -->

<?php get_footer(); ?>