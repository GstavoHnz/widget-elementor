<?php
/**
 * Class Section_Widget_Coffee
 * 
 * This class defines a custom Elementor widget called "Widget Coffee" for adding a coffee section in Elementor.
 * 
 * @package Elementor_Addon
 */
class Section_Widget_Coffee extends \Elementor\Widget_Base {

    /**
     * Get the name of the widget.
     * 
     * @return string Widget name.
     */
    public function get_name() {
        return 'section_widget_coffee';
    }

    /**
     * Get the title of the widget.
     * 
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__( 'Widget Coffee', 'elementor-addon' );
    }

    /**
     * Get the icon for the widget.
     * 
     * @throws Exception If the icon value is invalid.
     * @return string Widget icon.
     */
    public function get_icon() {
        $icon = 'eicon-code';

        // Check if the icon is a valid string that starts with 'eicon-'
        if (is_string($icon) && strpos($icon, 'eicon-') === 0) {
            return $icon;
        }

        throw new Exception('Invalid icon value');
    }

    /**
     * Get the categories for the widget.
     * 
     * @return array Widget categories.
     */
    public function get_categories() {
        return [ 'basic' ];
    }

    /**
     * Get the keywords for the widget.
     * 
     * @return array Widget keywords.
     */
    public function get_keywords() {
        return [ 'section', 'coffee', 'widget' ];
    }

    /**
     * Render the widget.
     */
    protected function render() {
        $this->load_template();
    }

    /**
     * Load the HTML template for the widget.
     */
    protected function load_template() {
        include plugin_dir_path( __FILE__ ) . '../templates/widget-coffee-template.php';
    }

    /**
     * Sanitize the output data to ensure it is safe for output.
     * 
     * @param string $data Data to be sanitized.
     * @return string Sanitized data.
     */
    protected function sanitize_output( $data ) {
        return esc_html( $data );
    }
}