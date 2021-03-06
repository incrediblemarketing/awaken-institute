<?php
/**
 * About Block
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
	$front_image = get_sub_field( 'front_image' );
	$back_image  = get_sub_field( 'background_image' );

?>
<?php if ( ! empty( $back_image ) ) : ?>
	<div class="image--background">
		<img src="<?php echo esc_url( $back_image['url'] ); ?>" alt="<?php echo esc_attr( $back_image['alt'] ); ?>" class="image--back" />
	</div>
<?php endif; ?>

<div class="container-fluid">
	<div class="row padding--section justify-content-center">
		<div class="col-xxl-4 col-xl-5 col-lg-6">
			<div class="image__holder">
				<?php if ( ! empty( $front_image ) ) : ?>
					<img src="<?php echo esc_url( $front_image['url'] ); ?>" alt="<?php echo esc_attr( $front_image['alt'] ); ?>" class="image--front" />
				<?php endif; ?>
			</div>
		</div>
		<div class="col-xxl-5 offset-xxl-1 col-lg-6 offset-xl-1 content--area">
			<?php echo $content; ?>
		</div>
	</div>
</div>
