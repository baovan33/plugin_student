<?php
/*
 * Plugin Name:       Widget
 * Plugin URI:        #
 * Description:       Handle the basics with this plugin.
 */


 add_action('widgets_init', 'create_widget');

 function create_widget() {
     register_widget( 'test_widget' );
 }

 class test_widget extends WP_Widget {

    function __construct() {
        parent::__construct( 
            'test_widget',
            'Test Widget',
            array(
                'description' => 'test sdsfdsfdsf'
            ),
        );
    }

    function form ( $instance ) {
        $default = array(
            'title' => 'TP Widget',
            'content' => 'Ndung',
        );
        $instance = wp_parse_args( $instance, $default );

        echo('Title: <input type="text" class="widefat" name="'.$this->get_field_name('title').'" value="'.$instance['title'].'" />');
        echo('Content: <textarea  class="widefat" name="'.$this->get_field_name('content').'" >'.$instance['content'].' </textarea>');

    }

    function update( $new_instance, $old_instance) {
       

        return $new_instance;

    }

    function widget( $args, $instance ) {
        extract($args);
        $title = apply_filters( 'widget_title', $instance['title'] );
        $content = apply_filters( 'widget_content', $instance['content'] );

        echo $before_widget;
        echo $before_title.$title.$after_title;
        echo $content;

        echo $after_widget;
    }
 }