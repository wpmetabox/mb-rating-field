<?php
if ( class_exists( 'RWMB_Field' ) ) {
	class RWMB_Rating_Field extends RWMB_Field {
		public static function admin_enqueue_scripts() {
			wp_enqueue_style( 'rwmb-rating', plugin_dir_url( __FILE__ ) . 'css/admin.css', array(), '' );
			wp_enqueue_script( 'font-awesome', 'https://kit.fontawesome.com/9f613a715c.js');
			wp_enqueue_style('test-css', plugin_dir_url(__FILE__).'/css/font-awesome.css');
		}

		public static function html( $meta, $field ) {
			return sprintf(
				'<fieldset class="rwmb-rating" id="%1$s">
				<input type="radio"' . checked( $meta, 5, false ) . 'id="%1$s_star5" name="%2$s" value="5" /><label class="full" for="%1$s_star5" title="5 stars"></label>
				<input type="radio"' . checked( $meta, 4.5, false ) . 'id="%1$s_star4half" name="%2$s" value="4.5" /><label class="half" for="%1$s_star4half" title="4.5 stars"></label>
				<input type="radio"' . checked( $meta, 4, false ) . 'id="%1$s_star4" name="%2$s" value="4" /><label class="full" for="%1$s_star4" title="4 stars"></label>
				<input type="radio"' . checked( $meta, 3.5, false ) . 'id="%1$s_star3half" name="%2$s" value="3.5" /><label class="half" for="%1$s_star3half" title="3.5 stars"></label>
				<input type="radio"' . checked( $meta, 3, false ) . 'id="%1$s_star3" name="%2$s" value="3" /><label class="full" for="%1$s_star3" title="3 stars"></label>
				<input type="radio"' . checked( $meta, 2.5, false ) . 'id="%1$s_star2half" name="%2$s" value="2.5" /><label class="half" for="%1$s_star2half" title="2.5 stars"></label>
				<input type="radio"' . checked( $meta, 2, false ) . 'id="%1$s_star2" name="%2$s" value="2" /><label class="full" for="%1$s_star2" title="2 stars"></label>
				<input type="radio"' . checked( $meta, 1.5, false ) . 'id="%1$s_star1half" name="%2$s" value="1.5" /><label class="half" for="%1$s_star1half" title="1.5 stars"></label>
				<input type="radio"' . checked( $meta, 1, false ) . 'id="%1$s_star1" name="%2$s" value="1" /><label class="full" for="%1$s_star1" title="1 star"></label>
				<input type="radio"' . checked( $meta, 0.5, false ) . 'id="%1$s_starhalf" name="%2$s" value="0.5" /><label class="half" for="%1$s_starhalf" title="0.5 stars"></label>
				</fieldset>',
				$field['field_name'],
				$field['id'],
				$meta
			);
		}

		public static function format_single_value( $field, $value, $args, $post_id ) {
			require_once( ABSPATH . 'wp-admin/includes/template.php' );
			wp_enqueue_style( 'dashicons' );
			wp_enqueue_style( 'frontend', plugin_dir_url(__FILE__) . '/css/frontend.css' );
			$starrating = rwmb_get_value( $field['id'] );
			$args = array(
				'rating' => $starrating,
				'type' => 'rating',
			);
			wp_star_rating( $args );
		}

	}
}
