<?php
/**
 * Plugin Name: My Elementor Widget
 * Plugin URI: https://example.com
 * Description: A custom elementor widget
 * Version: 1.0.0
 * Author: SRS
 * Author URI: https://johndoe.me
 * Text Domain: my-elementor-widget
 */

 if( ! defined( 'ABSPATH' ) ) exit();

 /**
 * Elementor Extension main CLass
 * @since 1.0.0
 */
final class MY_Elementor_Widget {

    // Plugin version
    const VERSION = '1.0.0';

    // Minimum Elementor Version
    const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

    // Minimum PHP Version
    const MINIMUM_PHP_VERSION = '7.0';

    // Instance
    private static $_instance = null;

    /**
    * SIngletone Instance Method
    * @since 1.0.0
    */
    public static function instance() {
        if( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
    * Construct Method
    * @since 1.0.0
    */
    public function __construct() {
        // Call Constants Method
        $this->define_constants();
        add_action( 'wp_enqueue_scripts', [ $this, 'scripts_styles' ] );
        add_action( 'init', [ $this, 'i18n' ] );
        add_action( 'plugins_loaded', [ $this, 'init' ] );
    }

    /**
    * Define Plugin Constants
    * @since 1.0.0
    */
    public function define_constants() {
        define( 'MYEW_PLUGIN_URL', trailingslashit( plugins_url( '/', __FILE__ ) ) );
        define( 'MYEW_PLUGIN_PATH', trailingslashit( plugin_dir_path( __FILE__ ) ) );
    }

    /**
    * Load Scripts & Styles
    * @since 1.0.0
    */
    public function scripts_styles() {
        // new file    
        wp_register_style( 'googleapis', MYEW_PLUGIN_URL . 'https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900', [], rand(), 'all' );
        wp_register_style( 'font-awesome', MYEW_PLUGIN_URL . 'assets/dist/css/font-awesome.min.css', [], rand(), 'all' );
        wp_register_style( 'bootstrap', MYEW_PLUGIN_URL . 'assets/dist/css/bootstrap.min.css', [], rand(), 'all' );
        wp_register_style( 'jquery-ui', MYEW_PLUGIN_URL . 'assets/dist/css/jquery-ui-custom.min.css', [], rand(), 'all' );
        wp_register_style( 'owl-carousel', MYEW_PLUGIN_URL . 'assets/dist/css/owl.carousel.min.css', [], rand(), 'all' );
        wp_register_style( 'bxslider', MYEW_PLUGIN_URL . 'assets/dist/css/jquery.bxslider.min.css', [], rand(), 'all' );
        wp_register_style( 'styles', MYEW_PLUGIN_URL . 'assets/dist/css/style.css', [], rand(), 'all' );
        wp_register_style( 'responsive', MYEW_PLUGIN_URL . 'assets/dist/css/responsive-style.css', [], rand(), 'all' );
        wp_register_style( 'main-color', MYEW_PLUGIN_URL . 'assets/dist/css/main-color-1.css', [], rand(), 'all' );

        // new enque
        wp_register_script( 'jquerys', MYEW_PLUGIN_URL . 'assets/dist/js/jquery-2.2.2.min.js', [ 'jquery' ], rand(), true );
        wp_register_script( 'bootstrap', MYEW_PLUGIN_URL . 'assets/dist/js/bootstrap.min.js', [ 'jquery' ], rand(), true );
        wp_register_script( 'custom-color', MYEW_PLUGIN_URL . 'assets/dist/js/custom-color-switcher.js', [ 'jquery' ], rand(), true );
        wp_register_script( 'flexibility', MYEW_PLUGIN_URL . 'assets/dist/js/flexibility.js', [ 'jquery' ], rand(), true );
        wp_register_script( 'jquery-ui-custom', MYEW_PLUGIN_URL . 'assets/dist/js/jquery-ui-custom.min.js', [ 'jquery' ], rand(), true );
        wp_register_script( 'touch-punch', MYEW_PLUGIN_URL . 'assets/dist/js/jquery.ui.touch-punch.min.js', [ 'jquery' ], rand(), true );
        wp_register_script( 'validate', MYEW_PLUGIN_URL . 'assets/dist/js/jquery.validate.min.js', [ 'jquery' ], rand(), true );
        wp_register_script( 'carousel', MYEW_PLUGIN_URL . 'assets/dist/js/owl.carousel.min.js', [ 'jquery' ], rand(), true );
        wp_register_script( 'bxslider', MYEW_PLUGIN_URL . 'assets/dist/js/jquery.bxslider.min.js', [ 'jquery' ], rand(), true );
        wp_register_script( 'waypoints', MYEW_PLUGIN_URL . 'assets/dist/js/jquery.waypoints.min.js', [ 'jquery' ], rand(), true );
        wp_register_script( 'counterup', MYEW_PLUGIN_URL . 'assets/dist/js/jquery.counterup.min.js', [ 'jquery' ], rand(), true );
        wp_register_script( 'isotope', MYEW_PLUGIN_URL . 'assets/dist/js/isotope.min.js', [ 'jquery' ], rand(), true );
        wp_register_script( 'retina', MYEW_PLUGIN_URL . 'assets/dist/js/retina.min.js', [ 'jquery' ], rand(), true );
        wp_register_script( 'mainjs', MYEW_PLUGIN_URL . 'assets/dist/js/main.js', [ 'jquery' ], rand(), true );

        // new enque
        wp_enqueue_style( 'googleapis' );
        wp_enqueue_style( 'font-awesome' );
        wp_enqueue_style( 'bootstrap' );
        wp_enqueue_style( 'owl-carousel' );
        wp_enqueue_style( 'bxslider' );
        wp_enqueue_style( 'styles' );
        wp_enqueue_style( 'responsive' );
        wp_enqueue_style( 'main-color' );
        wp_enqueue_style( 'jquery-ui' );

        wp_enqueue_script( 'jquerys' );
        wp_enqueue_script( 'bootstrap' );
        wp_enqueue_script( 'custom-color' );
        wp_enqueue_script( 'flexibility' );
        wp_enqueue_script( 'jquery-ui-custom' );
        wp_enqueue_script( 'touch-punch' );
        wp_enqueue_script( 'validate' );
        wp_enqueue_script( 'carousel' );
        wp_enqueue_script( 'bxslider' );
        wp_enqueue_script( 'waypoints' );
        wp_enqueue_script( 'counterup' );
        wp_enqueue_script( 'isotope' );
        wp_enqueue_script( 'retina' );
        wp_enqueue_script( 'mainjs' );
    }

    /**
    * Load Text Domain
    * @since 1.0.0
    */
    public function i18n() {
       load_plugin_textdomain( 'my-elementor-widget', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
    }

    /**
    * Initialize the plugin
    * @since 1.0.0
    */
    public function init() {
        // Check if the ELementor installed and activated
        if( ! did_action( 'elementor/loaded' ) ) {
            add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
            return;
        }

        if( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
            add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
            return;
        }

        if( ! version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '>=' ) ) {
            add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
            return;
        }

        add_action( 'elementor/init', [ $this, 'init_category' ] );
        add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );
    }

    /**
    * Init Widgets
    * @since 1.0.0
    */
    public function init_widgets() {
        require_once MYEW_PLUGIN_PATH . '/widgets/template-widget.php';
    }

    /**
    * Init Category Section
    * @since 1.0.0
    */
    public function init_category() {
        Elementor\Plugin::instance()->elements_manager->add_category(
            'myew-for-elementor',
            [
                'title' => 'My Elementor Widgets'
            ],
            1
        );
    }

    /**
    * Admin Notice
    * Warning when the site doesn't have Elementor installed or activated
    * @since 1.0.0
    */
    public function admin_notice_missing_main_plugin() {
        if( isset( $_GET[ 'activate' ] ) ) unset( $_GET[ 'activate' ] );
        $message = sprintf(
            esc_html__( '"%1$s" requires "%2$s" to be installed and activated', 'my-elementor-widget' ),
            '<strong>'.esc_html__( 'My Elementor Widget', 'my-elementor-widget' ).'</strong>',
            '<strong>'.esc_html__( 'Elementor', 'my-elementor-widget' ).'</strong>'
        );

        printf( '<div class="notice notice-warning is-dimissible"><p>%1$s</p></div>', $message );
    }

    /**
    * Admin Notice
    * Warning when the site doesn't have a minimum required Elementor version.
    * @since 1.0.0
    */
    public function admin_notice_minimum_elementor_version() {
        if( isset( $_GET[ 'activate' ] ) ) unset( $_GET[ 'activate' ] );
        $message = sprintf(
            esc_html__( '"%1$s" requires "%2$s" version %3$s or greater', 'my-elementor-widget' ),
            '<strong>'.esc_html__( 'My Elementor Widget', 'my-elementor-widget' ).'</strong>',
            '<strong>'.esc_html__( 'Elementor', 'my-elementor-widget' ).'</strong>',
            self::MINIMUM_ELEMENTOR_VERSION
        );

        printf( '<div class="notice notice-warning is-dimissible"><p>%1$s</p></div>', $message );
    }

    /**
    * Admin Notice
    * Warning when the site doesn't have a minimum required PHP version.
    * @since 1.0.0
    */
    public function admin_notice_minimum_php_version() {
        if( isset( $_GET[ 'activate' ] ) ) unset( $_GET[ 'activate' ] );
        $message = sprintf(
            esc_html__( '"%1$s" requires "%2$s" version %3$s or greater', 'my-elementor-widget' ),
            '<strong>'.esc_html__( 'My Elementor Widget', 'my-elementor-widget' ).'</strong>',
            '<strong>'.esc_html__( 'PHP', 'my-elementor-widget' ).'</strong>',
            self::MINIMUM_PHP_VERSION
        );

        printf( '<div class="notice notice-warning is-dimissible"><p>%1$s</p></div>', $message );
    }

}

MY_Elementor_Widget::instance();