<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       sopro.io
 * @since      1.0.0
 *
 * @package    Sopro_Plugin
 * @subpackage Sopro_Plugin/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Sopro_Plugin
 * @subpackage Sopro_Plugin/public
 * @author     Vladimir Cvetkoski <vladimir@sopro.io>
 */
class Sopro_Plugin_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Sopro_Plugin_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Sopro_Plugin_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/sopro-plugin-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Sopro_Plugin_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Sopro_Plugin_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/sopro-plugin-public.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Display the Sopro Plugin code.
	 *
	 * @since    1.0.0
	 */
	public function sopro_tracking_code( $content ) {
		// Get our options
		$options = get_option( $this->plugin_name . '-settings' );
		if ( ! empty( $options['sopro-tracking'] ) ) {
			$the_sopro_tracking_id = $options['sopro-tracking'];
		}
		// Options conditions are ok
		if (  ! empty( $the_sopro_tracking_id )  ) {

		// load the script
			$custom_content = '';
			ob_start(); ?>

<script>
	(function (o, u, t, b, a, s, e) {
		window[b] = window[b] || {}; (e = e || [])['key'] = o; e['__obr'] = u.location.href; a = [];
		u.location.search.replace('?', '').split('&').forEach(function (q) { if (q.startsWith(b) || q.startsWith('_obid')) e[q.split('=')[0]] = q.split('=')[1]; });
		e['_obid'] = e['_obid'] || (u.cookie.match(/(^|;)\s*_obid\s*=\s*([^;]+)/) || []).pop() || 0;
		for (k in e) { if (e.hasOwnProperty(k)) a.push(encodeURIComponent(k) + '=' + encodeURIComponent(e[k])); }
		s = u.createElement('script'); s.src = t + '?' + a.join('&'); u.body.appendChild(s);
	})('<?php echo $the_sopro_tracking_id; ?>', document, 'https://plugin.sopro.io/hq.js', 'outbase')
</script>

			<?php $custom_content .= ob_get_clean();
			$content = $custom_content;

		}
		echo $content;

	}

}
