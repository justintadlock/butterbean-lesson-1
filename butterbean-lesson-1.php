<?php
/**
 * Plugin Name: ButterBean Lesson #1
 * Plugin URI:  https://github.com/justintadlock/butterbean
 * Description: ButterBean Lesson #1 example plugin.
 * Version:     1.0.0
 * Author:      Justin Tadlock
 * Author URI:  http://themehybrid.com
 *
 * @author     Justin Tadlock <justin@justintadlock.com>
 * @copyright  Copyright (c) 2016, Justin Tadlock
 * @link       https://github.com/justintadlock/butterbean
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

if ( ! class_exists( 'ButterBean_Lesson_1' ) ) {

	/**
	 * Main ButterBean class.  Runs the show.
	 *
	 * @since  1.0.0
	 * @access public
	 */
	final class ButterBean_Lesson_1 {

		/**
		 * Sets up initial actions.
		 *
		 * @since  1.0.0
		 * @access private
		 * @return void
		 */
		private function setup_actions() {

			// Register managers, sections, settings, and controls.
			add_action( 'butterbean_register', array( $this, 'register' ), 10, 2 );
		}

		/**
		 * Registers managers, sections, controls, and settings.
		 *
		 * @since  1.0.0
		 * @access public
		 * @param  object  $butterbean  Instance of the `ButterBean` object.
		 * @param  string  $post_type
		 * @return void
		 */
		public function register( $butterbean, $post_type ) {

			// Only run this on the `page` post type.
			if ( 'page' !== $post_type )
				return;

			// Register our custom manager.
			$butterbean->register_manager(
				'lesson_1',
				array(
					'label'     => 'ButterBean Lesson #1',
					'post_type' => 'page'
				)
			);

			// Get our custom manager object.
			$manager = $butterbean->get_manager( 'lesson_1' );

			// Register a section.
			$manager->register_section(
				'lesson_1_section_a',
				array(
					'label'    => 'Section A',
					'dashicon' => 'dashicons-admin-generic'
				)
			);

			// Register a control.
			$manager->register_control(
				'lesson_1_meta_a',
				array(
					'type'    => 'text',
					'section' => 'lesson_1_section_a',
					'label'   => 'Example Text Input',
				)
			);

			// Register a setting.
			$manager->register_setting(
				'lesson_1_meta_a',
				array(
					'default'           => 'Hello, world!',
					'sanitize_callback' => 'sanitize_text_field'
				)
			);
		}

		/**
		 * Returns the instance.
		 *
		 * @since  1.0.0
		 * @access public
		 * @return object
		 */
		public static function get_instance() {

			static $instance = null;

			if ( is_null( $instance ) ) {
				$instance = new self;
				$instance->setup_actions();
			}

			return $instance;
		}

		/**
		 * Constructor method.
		 *
		 * @since  1.0.0
		 * @access private
		 * @return void
		 */
		private function __construct() {}
	}

	ButterBean_Lesson_1::get_instance();
}
