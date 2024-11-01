<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       sopro.io
 * @since      1.0.0
 *
 * @package    Sopro_Plugin
 * @subpackage Sopro_Plugin/admin/partials
 */
?>

<div id="wrap">
	<div class="sopro-tracking">
		<img src="<?php echo plugin_dir_url( __DIR__ ) . 'assets/sopro_symbol_header.svg'; ?>" />
	</div>
	<form method="post" action="options.php">
		<?php
			settings_fields( 'sopro-settings' );
			do_settings_sections( 'sopro-settings' );
			submit_button();
		?>
	</form>
	<div>
	<a href="https://portal.sopro.io/websiteplugin#wordpress-plugin">Where do I find my Sopro Plugin ID?</a></div>
</div>