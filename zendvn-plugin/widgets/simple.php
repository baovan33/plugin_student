<?php
class Zend_Widget_Simple extends WP_Widget {

    public function __construct() {

        $id_base = 'zend-widget-simple';
        $name = 'AA Widget Simple';
        $widget_optons = array(
            'classname'     => 'zend-widget-css-simple',
            'descripton'    => 'Widgetggg'
        );
        $control_options = array('width' => '250px');
        parent::__construct(
            $id_base,
            $name,
            $widget_optons,
            $control_options
        );

        add_action( 'wp_head', array( $this, 'add_css' ) );


    }

    public function add_css() {
       wp_register_style( 'wg-simple', ZEND_MP_CSS_DIR.'/wg-simple.css', array(), '1.0', 'all' );
       wp_enqueue_style( 'wg-simple' );

    }
    public function widget( $args, $instance ) {
        extract( $args );

        $title = apply_filters( 'widget_title', $instance['title'] );
        $title = ( empty ( $title ) ) ? 'AAA Simple' : $title;
        $music = ( empty ( $instance['music'] ) ) ? '&nbsp;' : $instance['music'];
        $css   = ( empty ( $instance['css'] ) ) ? '&nbsp;' : $instance['css'];

        $className = $this->widget_options['classname'];
        $before_widget = str_replace($className, $className.' '.$css, $before_widget );
        echo $before_widget;
        echo $before_title.$title.$after_title;

        echo "<ul>";
        echo "<li> Music: $music </li>";
        echo "</ul>";

        echo $after_widget;


    }

    public function form( $instance ) {
            $htmlObj = new ZendvnHtml();

            $inputId = $this->get_field_id('title');
            $inputName = $this->get_field_name('title');
            $inputValue = $instance['title'];
            $attr = array(
                'id'    => $inputId ,
                'class' => 'widefat',
            );
            echo '<p> <label for="'. $inputId.'">'.translate('Title').'</label>'
                .$htmlObj->textbox($inputName, $inputValue , $attr)
                .'</p>';

            $inputId = $this->get_field_id('music');
            $inputName = $this->get_field_name('music');
            $inputValue = $instance['music'];
            $attr = array(
                'id'    => $inputId ,
                'class' => 'widefat',
            );
            echo '<p> <label for="'. $inputId.'">'.translate('Music').'</label>'
                .$htmlObj->textbox($inputName, $inputValue , $attr)
                .'</p>';

            $inputId = $this->get_field_id('css');
            $inputName = $this->get_field_name('css');
            $inputValue = $instance['css'];
            $attr = array(
                'id'    => $inputId ,
                'class' => 'widefat',
            );
            echo '<p> <label for="'. $inputId.'">'.translate('Css').'</label>'
                .$htmlObj->textbox($inputName, $inputValue , $attr)
                .'</p>';

    }

    public function update( $new_instance, $old_instance ) {
        // echo "<pre>";
        // print_r($new_instance);
        // echo "</pre>";
        // die();
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['music'] = strip_tags($new_instance['music']);
        $instance['css'] = strip_tags($new_instance['css']);

        return $instance;
    }

}

