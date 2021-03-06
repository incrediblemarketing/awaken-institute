<?php
/**
 * Site Nav
 *
 * @category   Components
 * @package    WordPress
 * @subpackage Incredible Theme
 * @author     Nick Gonzales
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://www.incrediblemarketing.com/
 * @since      1.0.0
 */

?>

<nav class="site-nav">
	<a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
		<?php get_template_part( 'components/svg/logo' ); ?>
	</a>
	
	<?php get_template_part( 'components/call' ); ?>
	<a href="/request-an-appointment/" class="btn btn-primary">Schedule Consultation</a>
	<button data-toggle="menu">
		<div class="span__holder">
			<span></span>
			<span></span>
			<span></span>
		</div>
	</button>
</nav>
