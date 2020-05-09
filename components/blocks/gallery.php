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

	$block_title = get_sub_field( 'block_title' );
	$back_image  = get_sub_field( 'background_image' );
	$right_image = get_sub_field( 'right_image' );

?>

<div class="container-fluid">
	<div class="row block--gallery-top">
		<div class="col-xxl-10 col-lg-11 col-12">
			<?php if ( ! empty( $back_image ) ) : ?>
				<div class="image--background">
					<img src="<?php echo esc_url( $back_image['url'] ); ?>" alt="<?php echo esc_attr( $back_image['alt'] ); ?>" class="image--back" />
				</div>
			<?php endif; ?>
			<div class="row padding--section">
				<div class="col-xl-6 offset-xl-6 col-lg-7 offset-lg-5 col-md-6 offset-md-6 content--area">
					<h5>Gallery</h5>
					<h2><?php echo esc_attr( $block_title ); ?></h2>
					<div class="line">
						<a href="/gallery/" class="btn btn-primary">Browse Gallery</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row block--gallery-quote">
		<div class="col-xl-4 offset-xl-1 col-lg-5 col-sm-8 col-12">
		<?php
		$testimonial = get_sub_field( 'testimonial' );
		if ( $testimonial ) :
			$post = $testimonial;
			setup_postdata( $post );
			?>
					<div class="block--quote">
						<?php get_template_part( 'components/svg/quote-left' ); ?>
						<h3><?php the_title(); ?></h3>
						<?php the_content(); ?>
					</div>
				<?php wp_reset_postdata(); ?>
			<?php endif; ?>
		</div>
		<div class="col-xl-6 offset-xl-1 col-lg-7 offset-lg-0 col-sm-10 offset-sm-2 col-12">
			<?php if ( ! empty( $right_image ) ) : ?>
				<div class="image--holder">
					<img src="<?php echo esc_url( $right_image['url'] ); ?>" alt="<?php echo esc_attr( $right_image['alt'] ); ?>" class="image--back" />
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>
