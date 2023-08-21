<?php
/*
 * Plugin Name:       Widget Show Post
 * Plugin URI:        #
 * Description:       Handle the basics with this plugin.
 */


add_action('widgets_init', 'create_widget_showpost');

function create_widget_showpost() {
    register_widget( 'widget_show_post' );
}

class widget_show_post extends WP_Widget {

    function __construct() {
        parent::__construct( 
            'show_post',
            'Show Post',
            array(
                'description' => 'show post'
            ),
        );
    }

    function form ( $instance ) {
        $default = array(
            'title' => 'Show Post',
            'number_post' => '1',
            'order_by' => '',
            'order' => ''
        );
        $instance = wp_parse_args( $instance, $default );
        ?>

        <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'number_post' ); ?>">Number of Posts:</label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'number_post' ); ?>" name="<?php echo $this->get_field_name( 'number_post' ); ?>" type="number" min="1" value="<?php echo esc_attr( $instance['number_post'] ); ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'order_by' ); ?>">Order By:</label>
            <select class="widefat" id="<?php echo $this->get_field_id( 'order_by' ); ?>" name="<?php echo $this->get_field_name( 'order_by' ); ?>">
                <option value="date" <?php selected( $instance['order_by'], 'date' ); ?>>Date</option>
                <option value="title" <?php selected( $instance['order_by'], 'title' ); ?>>Title</option>
            </select>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'order' ); ?>">Order:</label>
            <select class="widefat" id="<?php echo $this->get_field_id( 'order' ); ?>" name="<?php echo $this->get_field_name( 'order' ); ?>">
                <option value="DESC" <?php selected( $instance['order'], 'DESC' ); ?>>DESC</option>
                <option value="ASC" <?php selected( $instance['order'], 'ASC' ); ?>>ASC</option>
            </select>
        </p>

    <?php
    }

    function update( $new_instance, $old_instance) {
       
        return $new_instance;

    }

    function widget( $args, $instance ) {
        extract($args);
        $title = apply_filters( 'widget_title', $instance['title'] );

        echo $before_widget;
        echo $before_title.$title.$after_title;
        echo "Number post:" .$instance['number_post'];
        echo "<br>";
        echo " Order by:" .$instance['order_by'];
        echo "<br>";
        echo "Order:" .$instance['order'];
        echo "<br>";

        echo $after_widget;
    }
}