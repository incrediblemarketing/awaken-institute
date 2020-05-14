<?php
/**
 * Services Block
 *
 * @category   Components
 * @package    WordPress
 * @subpackage Incredible Theme
 * @author     Nick Gonzales
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://www.incrediblemarketing.com/
 * @since      1.0.0
 */

	$top_title    = get_sub_field( 'top_title' );
	$header_title = get_sub_field( 'large_title' );
	$services     = get_sub_field( 'services' );

?>

<div class="container-fluid">
	<div class="row padding--section">
		<div class="col-xl-12">
		<h5><?php echo esc_attr( $top_title ); ?></h5>
		<h2><?php echo esc_attr( $header_title ); ?></h2>
		<?php if ( $services ) : ?>
			<div class="swiper-container slider--services">
				<div class="swiper-wrapper">
			<?php foreach ( $services as $post ) : ?>
				<?php setup_postdata( $post ); ?>
				<div class="swiper-slide">
					<a href="<?php the_permalink(); ?>">
					<div class="image__holder">
						<?php echo get_the_post_thumbnail( $post->ID, 'featured_thumb' ); ?>
					</div>
					<h6><?php echo esc_attr( the_title() ); ?></h6>
					<h5><?php echo get_field( 'procedure_slider_text' ); ?></h5>
					</a>
				</div>
			<?php endforeach; ?>
			</div>
			<?php get_template_part( 'components/swiper-nav' ); ?>
			</div>
			<?php wp_reset_postdata(); ?>
		<?php endif; ?>
		</div>
	</div>
</div>
