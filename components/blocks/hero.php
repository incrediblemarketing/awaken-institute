<?php
/**
 * Hero Block
 *
 * @category   Components
 * @package    WordPress
 * @subpackage Incredible Theme
 * @author     Nick Gonzales
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://www.incrediblemarketing.com/
 * @since      1.0.0
 */

	$content     = get_sub_field( 'content' );
	$front_image = get_sub_field( 'right_front_image' );
	$back_image  = get_sub_field( 'right_background_image' );

?>

<div class="container">
	<div class="row align-items-end ">
		<div class="col-xl-7 pr-0 hero-content">
			<?php echo $content; ?>
			<a href="/contact/" class="btn btn-primary">Schedule Consultation</a>
			<a href="#block-5e603523d1836" class="js-scroll-to">
				<div class="more">
					<div class="line"></div>
					<p>Explore More</p>
				</div>
			</a>
		</div>
		<div class="col-xl-5 hero-image pl-0">
			<div class="image__holder">
				<?php if ( ! empty( $back_image ) ) : ?>
					<div class="image__crop">
						<img src="<?php echo esc_url( $back_image['url'] ); ?>" alt="<?php echo esc_attr( $back_image['alt'] ); ?>" class="image--back" />
					</div>
				<?php endif; ?>
				<?php if ( ! empty( $front_image ) ) : ?>
					<img src="<?php echo esc_url( $front_image['url'] ); ?>" alt="<?php echo esc_attr( $front_image['alt'] ); ?>" class="image--front" />
				<?php endif; ?>
			</div>
		</div>
	</div>
	<?php get_template_part( 'components/social-icons' ); ?>
</div>
