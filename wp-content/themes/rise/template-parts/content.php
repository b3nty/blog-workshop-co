<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package rise
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 
	<header class="entry-header">
        <?php if ( has_post_thumbnail() ) : ?>
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
            	<?php the_post_thumbnail('full', array('class' => 'rise-blog-archive')); ?>
            </a>
        <?php endif; ?>
    
		<?php
			if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php rise_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			if ( 'option2' == rise_sanitize_index_content( get_theme_mod( 'rise_post_content' ) ) ) :
			the_content( sprintf(
			/* translators: %s: Name of current post. */
			wp_kses( esc_html__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'rise' ), array( 'span' => array( 'class' => array() ) ) ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
			else :
			the_excerpt(); 
			endif;

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'rise' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php rise_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
