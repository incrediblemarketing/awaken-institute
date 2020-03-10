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

?>

<div class="container">
	<?php if ( ! empty( $back_image ) ) : ?>
		<div class="image--background">
			<img src="<?php echo esc_url( $back_image['url'] ); ?>" alt="<?php echo esc_attr( $back_image['alt'] ); ?>" class="image--back" />
		</div>
	<?php endif; ?>
	<div class="row padding--section">
		<div class="col-xl-6 col-12">
			<h2><?php echo esc_attr( $block_title ); ?></h2>
			<a href="/gallery/" class="btn btn-secondary">Enter Gallery</a>
		</div>
	</div>
</div>
