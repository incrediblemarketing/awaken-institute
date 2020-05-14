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

	$content = get_sub_field( 'content' );
	$image   = get_sub_field( 'background_image' );

?>
<?php if ( ! empty( $image ) ) : ?>
	<div class="image--holder">
		<img src="<?php echo esc_url( $image['sizes']['hero_thumb'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
	</div>
<?php endif; ?>
<div class="container-fluid">
	<div class="row align-items-end">
		<div class="col-xl-5 offset-xl-1 hero-content">
			<?php echo $content; ?>
			<a href="/contact/" class="btn btn-primary">Schedule Consultation</a>
		</div>
	</div>
	<?php get_template_part( 'components/social-icons' ); ?>
</div>
