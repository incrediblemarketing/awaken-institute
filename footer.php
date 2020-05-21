<?php
/**
 * Footer Inner Page
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

	$copyright = get_field( 'copyright', 'option' );
	$popup     = get_field( 'popup_info', 'option' );
?>

<footer class="footer block--footer-small">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<?php if ( ! is_page( array( 228, 230 ) ) ) : ?>
				<div class="col-lg-10">
					<h5>Let's Get Together</h5>
					<h3>Book An Appointment</h3>
					<p>Contact us today at <?php echo do_shortcode( '[call_number]' ); ?> to book your appointment or if you have any questions regarding Neurotoxin Injectables.</p>
					<a href="/contact-us/" class="btn btn-primary">Schedule Consultation</a>
				</div>
			<?php else : ?>
				<div class="spacer"></div>
			<?php endif; ?>
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
