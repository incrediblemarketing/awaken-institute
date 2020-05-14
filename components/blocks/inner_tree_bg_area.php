<?php
	/**
	 * Inner Tree Background Block
	 *
	 * @category   Components
	 * @package    WordPress
	 * @subpackage Incredible Theme
	 * @author     Nick Gonzales
	 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
	 * @link       https://www.incrediblemarketing.com/
	 * @since      1.0.0
	 */

	$large_content        = get_sub_field( 'large_content' );
	$full_service_content = get_sub_field( 'full_service_content' );
	$benefits_content     = get_sub_field( 'benefits_content' );
	$toggle_large_content = get_sub_field( 'toggle_large_content' );

if ( ! $toggle_large_content ) :
	$reverse = 'flex-row-reverse';
	endif;
?>

<div class="container-fluid">
  <div class="row justify-content-center <?php echo $reverse; ?>">
		<div class="col-xxl-4 col-lg-5 content--area">
			<?php echo $large_content; ?>
		</div>
		<div class="col-xxl-6 col-lg-7 flex--boxes">
			<?php if ( $full_service_content ) : ?>
				<div class="box--area">
					<?php echo $full_service_content; ?>
				</div>
			<?php endif; ?>
			<?php if ( $benefits_content ) : ?>
				<div class="box--area">
					<?php echo $benefits_content; ?>
				</div>
			<?php endif; ?>
		</div>
		<div class="col-12 button--mobile">
			<a href="/request-an-appointment/" class="btn btn-primary">Schedule Consultation</a>
		</div>
  </div>
</div>
