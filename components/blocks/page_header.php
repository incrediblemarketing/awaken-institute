<?php
/**
 * Display Page Header Block
 *
 * @category   Components
 * @package    WordPress
 * @subpackage Incredible Theme
 * @author     Nick Gonzales
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://www.incrediblemarketing.com/
 * @since      1.0.0
 */

$image        = get_sub_field( 'background_image' );
$contact_form = get_sub_field( 'add_contact_form' );
if ( $contact_form ) :
	$address      = get_field( 'business_street_address', 'option' );
	$address2     = get_field( 'business_city_state_zip', 'option' );
	$address_link = get_field( 'business_address_link', 'option' );
	$phone        = get_field( 'business_phone_display', 'option' );
	$phone_url    = get_field( 'business_phone_url', 'option' );
	$hours        = get_field( 'business_hours', 'option' );
endif;

if ( is_post_type_archive( 'gallery' ) ) :
	$image = get_field( 'gallery_header_image', 'option' );
endif;

if ( is_page( array( 228, 230 ) ) ) :
	$cols = 'offset-xl-7 col-xl-4 offset-lg-7 col-lg-5 col-11';
else :
	$cols = 'col-xl-6 col-md-8 col-11';
endif;

?>

<?php if ( ! empty( $image ) ) : ?>
	<div class="image__holder">
		<img src="<?php echo esc_url( $image['sizes']['hero_thumb'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
	</div>
	<?php else : ?>
		<div class="image__holder">
			<?php echo im_the_placeholder_image( 'hero_thumb' ); ?>
		</div>
<?php endif; ?>

<div class="container-fluid">
	<div class="row">
		<div class="<?php echo $cols; ?>">
			<?php if ( is_post_type_archive( 'gallery' ) ) : ?>
				<h1>Before & After Gallery</h1>
			<?php else : ?>
				<h1><?php echo get_the_title(); ?></h1>
			<?php endif; ?>
		</div>
	</div>
</div>
<?php if ( $contact_form ) : ?>
</div>
	<?php if ( is_page( 230 ) ) : ?>
		<div class="form--area">
			<div class="grid--contact--page">
				<div class="contact--info">
					<?php if ( $hours ) : ?>
						<div class="item">
							<p><strong>Hours of Operation</strong></p>
							<p><?php echo $hours; ?></p>
						</div>
					<?php endif; ?>
					<?php if ( $address ) : ?>
						<div class="item">
							<p><strong>Office Address</strong></p>
							<p><?php echo esc_attr( $address ); ?><br/><?php echo esc_attr( $address2 ); ?></p>
						</div>
					<?php endif; ?>
					<?php if ( $phone ) : ?>
						<div class="item">
							<p><strong>Phone Number</strong></p>
							<p><?php echo esc_attr( $phone ); ?></p>
						</div>
					<?php endif; ?>
				</div>
				<div class="form--area">
					<?php echo do_shortcode( '[gravityforms id="2" title="false" ajax="true" description="false"]' ); ?>
				</div>
			</div>
		</div>
	<?php elseif ( is_page( 228 ) ) : ?>
		<div class="grid--contact--page grid--contact-single">
				<div class="form--area">
					<?php echo do_shortcode( '[gravityforms id="1" title="false" ajax="true" description="false"]' ); ?>
				</div>
		</div>
	<?php endif; ?>
<?php endif; ?>
