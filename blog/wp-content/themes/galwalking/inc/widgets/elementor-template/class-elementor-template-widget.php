<?php
/*
Widget Name: Galwalking Elementor Template
Description: This widget is used to display a Elementor Template in your sidebar.
Settings:
 Title - Widget's text title
 Select template - Select elementor template
*/

/**
 * Galwalking Elementor Template widget.
 *
 * @package Galwalking
 */

if ( ! class_exists( 'Galwalking_Elementor_Template_Widget' ) ) {

	/**
	 * Class Galwalking_Cta_Widget.
	 */
	class Galwalking_Elementor_Template_Widget extends Cherry_Abstract_Widget {

		/**
		 * Constructor
		 *
		 * @since  1.0.0
		 */
		public function __construct() {
			$this->widget_name        = esc_html__( 'Elementor Template', 'galwalking' );
			$this->widget_description = esc_html__( 'Display your Elementor Template.', 'galwalking' );
			$this->widget_id          = 'galwalking-elementor-template-widget';
			$this->widget_cssclass    = 'elementor-template-widget';
			$this->settings           = array(
				'title' => array(
					'type'  => 'text',
					'value' => '',
					'label' => esc_html__( 'Title', 'galwalking' ),
				),
				'template_id' => array(
					'type'             => 'select',
					'size'             => 1,
					'value'            => '',
					'options_callback' => array( $this, 'get_template_list' ),
					'options'          => false,
					'label'            => esc_html__( 'Select template', 'galwalking' ),
					'multiple'         => false,
					'placeholder'      => esc_html__( 'Select template', 'galwalking' ),
				),
			);

			parent::__construct();
		}

		/**
		 * Get elementor template list.
		 *
		 * @return array
		 */
		public function get_template_list() {
			$result_list = array(
				'' => esc_html__( '-- Select template --', 'galwalking' ),
			);

			$templates = Elementor\Plugin::$instance->templates_manager->get_source( 'local' )->get_items();

			if ( $templates ) {
				foreach ( $templates as $template ) {
					$result_list[ $template['template_id'] ] = $template['title'];
				}
			}

			return $result_list;
		}

		/**
		 * Widget function.
		 *
		 * @see WP_Widget
		 *
		 * @since  1.0.0
		 * @param array $args
		 * @param array $instance
		 */
		public function widget( $args, $instance ) {

			$this->setup_widget_data( $args, $instance );
			$this->widget_start( $args, $instance );

			if ( ! $instance['template_id'] ) {
				return;
			}

			$content = Elementor\Plugin::$instance->frontend->get_builder_content_for_display( $instance['template_id'] );

			echo $content;

			$this->widget_end( $args );
			$this->reset_widget_data();
		}
	}

	add_action( 'widgets_init', 'galwalking_register_elementor_template_widget' );

	/**
	 * Register elementor template widget.
	 */
	function galwalking_register_elementor_template_widget() {
		register_widget( 'Galwalking_Elementor_Template_Widget' );
	}
}
