 <?php
 /**
 * Adds Facebook_Like widget.
 */
class Facebook_Like_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'FacebookLike_widget', // Base ID
			esc_html__( 'Facebook Like', 'FBL_domain' ), // Name
			array( 'description' => esc_html__( 'Widget to display Facebook Like', 'FBL_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];  //Whatever you want to display befor the widget(<div>, etc)

		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}

		//widget content output
		echo '<div id="fb-root"></div><script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.3"></script><div class="fb-like" data-href="'.$instance['url'].'" data-width="'.$instance['width'].'" data-layout="'.$instance['layout'].'"></div>';

		echo $args['after_widget'];  //Whatever you want to display after the widget(<div>, etc) 
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Facebook Like', 'FBL_domain' );

		$url = !  empty( $instance['url'] ) ? $instance['url'] : esc_html__( 'https://www.facebook.com/gardenwalk.hyd/', 'FBL_domain' );

		$width = !  empty( $instance['width'] ) ? $instance['width'] : esc_html__( '10', 'FBL_domain' );

		$layout = !  empty( $instance['layout'] ) ? $instance['layout'] : esc_html__( 'standard', 'FBL_domain' );


		?>



        <!--TITLE -->
		<p>
		  <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
		   <?php esc_attr_e( 'Title:', 'FBL_domain' ); ?>
		  </label> 
		  <input 
		   class="widefat"
		   id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
		   name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
		   type="text"
		   value="<?php echo esc_attr( $title ); ?>">
		</p>

		<!--URL -->
		<p>
		  <label for="<?php echo esc_attr( $this->get_field_id( 'url' ) ); ?>">
		   <?php esc_attr_e( 'url:', 'FBL_domain' ); ?>
		  </label> 
		  <input 
		   class="widefat"
		   id="<?php echo esc_attr( $this->get_field_id( 'url' ) ); ?>"
		   name="<?php echo esc_attr( $this->get_field_name( 'url' ) ); ?>"
		   type="text"
		   value="<?php echo esc_attr( $url ); ?>">
		</p>

		<!--Width -->
		<p>
		  <label for="<?php echo esc_attr( $this->get_field_id( 'width' ) ); ?>">
		   <?php esc_attr_e( 'width:', 'FBL_domain' ); ?>
		  </label> 
		  <input 
		   class="widefat"
		   id="<?php echo esc_attr( $this->get_field_id( 'width' ) ); ?>"
		   name="<?php echo esc_attr( $this->get_field_name( 'width' ) ); ?>"
		   type="text"
		   value="<?php echo esc_attr( $width ); ?>">
		</p>

		<!--LaYOUT -->
		<p>
		  <label for="<?php echo esc_attr( $this->get_field_id( 'layout' ) ); ?>">
		   <?php esc_attr_e( 'layout:', 'FBL_domain' ); ?>
		  </label> 
		  <select id="<?php echo esc_attr( $this->get_field_id( 'layout' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'layout' ) ); ?>">
		  	<option value="standard" <?php echo esc_attr( $layout == 'standard' ) ? 'selected' : ''; ?>>Standard</option>
		  	<option value="box_count" <?php echo esc_attr( $layout == 'box_count' ) ? 'selected' : ''; ?>>Box Count</option>
		  	<option value="button_count" <?php echo esc_attr( $layout == 'button_count' ) ? 'selected' : ''; ?>>Button Count</option>
		  	<option value="button" <?php echo esc_attr( $layout == 'button' ) ? 'selected' : ''; ?>>Button</option>

		  </select>
		  
		</p>


		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();

		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';

		$instance['url'] = ( ! empty( $new_instance['url'] ) ) ? sanitize_text_field( $new_instance['url'] ) : '';

		$instance['width'] = ( ! empty( $new_instance['width'] ) ) ? sanitize_text_field( $new_instance['width'] ) : '';

		$instance['layout'] = ( ! empty( $new_instance['layout'] ) ) ? sanitize_text_field( $new_instance['layout'] ) : '';





		return $instance;
	}

}	// class Foo_Widget
?>
