<?php

/**
 * Plugin Name: Elementor Addon Coffee
 * Description: Simple Addon for coffeePunch Section site.
 * Version:     1.0.0
 * Author:      Gustavo Henz
 * Author URI:  https://developers.elementor.com/
 * Text Domain: elementor-addon-coffee
 *
 * Important rules:
 * Requires Plugins: elementor
 * Elementor tested up to: 3.21.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

use Elementor\Widgets_Manager;

/**
 * Class Elementor_Coffee_Widget_Manager
 *
 * Manages the registration of the Coffee Widget for Elementor.
 */
class Elementor_Coffee_Widget_Manager {

    /**
     * Elementor_Coffee_Widget_Manager constructor.
     *
     * Initializes the widget registration process by adding the action hook.
     */
    public function __construct() {
        add_action('elementor/widgets/register', [$this, 'register_coffee_widget']);
        add_action('wp_enqueue_scripts', [$this, 'enqueue_coffee_widget_styles']);
    }

    /**
     * Registers the Coffee Widget with Elementor.
     *
     * Includes the widget file and registers the widget with the Elementor widgets manager.
     *
     * @param Widgets_Manager $widgets_manager The Elementor widgets manager.
     * @return void
     */
    public function register_coffee_widget(Widgets_Manager $widgets_manager): void {
        require_once(__DIR__ . '/widgets/section-widget-coffee.php');

        // Check if the class exists before registering
        if (class_exists('\Section_Widget_Coffee')) {
            $widgets_manager->register(new \Section_Widget_Coffee());
        }
    }

    /**
     * Enqueue the style.css file for the Coffee Widget.
     *
     * Registers and enqueues the style.css file located in the assets directory.
     *
     * @return void
     */
    public function enqueue_coffee_widget_styles(): void {
        wp_enqueue_style(
            'coffee-widget-styles', // Handle for the stylesheet
            plugin_dir_url(__FILE__) . 'assets/style.css', // URL to the stylesheet
            array(), // Dependencies
            '1.0.0' // Version
        );
    }
}

// Instantiate the class to register the widget
new Elementor_Coffee_Widget_Manager();