<?php
/**
 * Footer
 *
 * Main footer file for the theme.
 *
 * @category   Components
 * @package    WordPress
 * @subpackage Incredible Theme
 * @author     Nick Gonzales
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://www.incrediblemarketing.com/
 * @since      1.0.0
 */

	$copyright    = get_field( 'copyright', 'option' );
	$address      = get_field( 'business_street_address', 'option' );
	$address2     = get_field( 'business_city_state_zip', 'option' );
	$address_link = get_field( 'business_address_link', 'option' );
	$phone        = get_field( 'business_phone_display', 'option' );
	$phone_url    = get_field( 'business_phone_url', 'option' );
	$hours        = get_field( 'business_hours', 'option' );
	$map_image    = get_field( 'map_image', 'option' );
	$popup        = get_field( 'popup_info', 'option' );
?>

<footer class="footer block--footer">
	<?php get_template_part( 'components/svg/brush-1' ); ?>
	<?php get_template_part( 'components/svg/brush-2' ); ?>
	<?php if ( ! empty( $map_image ) ) : ?>
		<div class="image--background">
			<img src="<?php echo esc_url( $map_image['url'] ); ?>" alt="<?php echo esc_attr( $map_image['alt'] ); ?>" class="image--back" />
		</div>
	<?php endif; ?>
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-xl-10">
				<h3>Get In Touch</h3>
				<div class="grid--contact">
					<div class="form--area">
						<?php echo do_shortcode( '[gravityforms id="2" title="false" ajax="true" description="false"]' ); ?>
					</div>
					<div class="contact--info">
						<?php if ( $hours ) : ?>
							<div class="item">
								<i class="fal fa-clock"></i>
								<p><strong>Hours of Operation</strong></p>
								<p><?php echo $hours; ?></p>
							</div>
						<?php endif; ?>
						<?php if ( $address ) : ?>
							<div class="item">
								<i class="fal fa-map-marker-alt"></i>
								<p><strong>Office Address</strong></p>
								<p><?php echo esc_attr( $address ); ?><br/><?php echo esc_attr( $address2 ); ?></p>
							</div>
						<?php endif; ?>
						<?php if ( $phone ) : ?>
							<div class="item">
								<i class="fal fa-phone"></i>
								<p><strong>Phone Number</strong></p>
								<p><?php echo esc_attr( $phone ); ?></p>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="col-12 copyright">
				<?php get_template_part( 'components/svg/logo' ); ?>
				<p>&copy; <?php echo esc_attr( gmdate( 'Y' ) ); ?> <?php echo esc_attr( $copyright ) ?: esc_attr( get_bloginfo() ); ?>. <a href="/privacy-policy/">Privacy Policy</a> <span>|</span> <a href="/terms-of-use/">Terms of Use</a> <span>|</span> Designed By <a href="https://www.incrediblemarketing.com/" target="_blank"><?php get_template_part( 'components/svg/incredible-marketing' ); ?>Incredible Marketing</a></p>
			</div>
		</div>
	</div>
</footer>

</div><!-- end of .site-wrap -->
<?php if ( $popup ) : ?>
	<div id="popup" class="mfp-hide">
		<?php echo $popup; ?>
	</div>
<?php endif; ?>
<?php wp_footer(); ?>
</body>

</html>
