<?php
/**
 * Homepage Video Block
 *
 * @category   Components
 * @package    WordPress
 * @subpackage Incredible Theme
 * @author     Nick Gonzales
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://www.incrediblemarketing.com/
 * @since      1.0.0
 */

	$youtube_id = get_sub_field( 'youtube_id' );
	$back_image = get_sub_field( 'background_image' );

?>

<?php if ( ! empty( $back_image ) ) : ?>
	<div class="image--background">
		<img src="<?php echo esc_url( $back_image['url'] ); ?>" alt="<?php echo esc_attr( $back_image['alt'] ); ?>" class="image--back" />
	</div>
<?php endif; ?>
<div class="container">
	<div class="row padding--section">
		<div class="col-xl-12">
				<div class="video__text">
					<div class="item">AWAKEN</div>
					<div class="item"><a href="http://www.youtube.com/watch?v=<?php echo esc_attr( $youtube_id ); ?>" class="popup-youtube btn-circle"><i class="fal fa-play"></i></a></div>
					<div class="item">INSTITUTE</div>
				</div>
		</div>
	</div>
</div>
