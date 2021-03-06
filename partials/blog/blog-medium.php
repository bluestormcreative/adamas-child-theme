<?php
/**
 * Template: Blog Medium
 *
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'wpus-grid-item wow fadeIn' ); ?>>
	<div class="row">

		<div class="col-md-5">
		    <?php
				// Post media
		    	if ( adamas_get_meta_data( 'blog_featured_image' ) ) {
					AdamasBlog::thumbnail( 'adamas-image-horizontal' );
				}
			?>
		</div><!-- .col-md-5 -->

		<div class="col-md-7">

			<?php
				// Post Title
				the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
			?>


			<div class="entry-meta">
				<?php esc_html_e( 'By', 'adamas' ); ?> <?php the_author_posts_link(); ?> <?php esc_html_e( 'on', 'adamas' ); ?> <a href="<?php esc_url( the_permalink() ) ?>"><?php the_time( get_option( 'date_format' ) ); ?></a> <?php esc_html_e( 'in', 'adamas' ) ?> <?php the_category( ', ' ) ?>
			</div><!-- .entry-meta -->

			<div class="entry-excerpt">
			    <?php
			    	// Post excerpt
			    	if ( 'full' === adamas_get_data( 'blog_content_type' ) ) {
			        	the_content( '', true, '' );
			    	} else {
			        	the_excerpt();
			    	}
			    ?>
			</div><!-- .entry-excerpt -->

			<a href="<?php esc_url( the_permalink() ); ?>" class="read-more">
				<?php echo esc_html_e( 'Continue Reading', 'adamas' ); ?>
				<span>&rarr;</span>
			</a><!-- .read-more -->

		</div><!-- .col-md-7 -->

	</div><!-- .row -->
</article>
