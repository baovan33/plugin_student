<?php 
class Zend_Widget_Last_Post extends WP_Widget {

    public function __construct() {

        $id_base = 'zend-widget-last_post';
        $name = 'AA Widget Last Post';
        $widget_optons = array(
            'classname'     => 'zend-widget-css-last-post',
            'descripton'    => 'Hien thi bai viet moi nhat'
        );
        $control_options = array('width' => '250px');
        parent::__construct(
            $id_base,
            $name,
            $widget_optons,
            $control_options
        );

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

            //Tao phan tu title
            $inputId = $this->get_field_id('title');
            $inputName = $this->get_field_name('title');
            $inputValue = @$instance['title'];
            $attr = array(
                'id'    => $inputId ,
                'class' => 'widefat',
            );
            
            echo '<p> <label for="'. $inputId.'">'.translate('Title').'</label>'
                .$htmlObj->textbox($inputName, $inputValue , $attr)
                .'</p>';

           //Tao phan tu format
            $tmp = array(
                'aside' => 'Aside',
                'gallery' => 'Gallery'
            );
     
            $inputId = $this->get_field_id('format');
            $inputName = $this->get_field_name('format');
            $inputValue = @$instance['format'];
            $attr = array(
                'id'    => $inputId ,
                'class' => 'widefat',
            );
            $options['data'] = array(
                'standard' => 'Standard',
            );
          
        
            $options['data'] = array_merge($options['data'], $tmp);
        
            echo '<p> <label for="'. $inputId.'">'.translate('Format').'</label>'
            .$htmlObj->selectbox($inputName, $inputValue , $attr, $options)
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
