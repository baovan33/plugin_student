<?php 
class Zend_SC_Title {
    public function __construct() {
        add_shortcode( 'zend_sc_title', array( $this, 'show'));
    }

    public function show($arg) {

        if ( is_single() ) {
            //     echo "<pre>";
            // print_r($arg);
            // echo "</pre>";

            extract($arg);
           $ids = explode(',', $ids);
              $list = '';
            if( count($ids) > 0 ) {
                $args = array(
                    'post_type' => 'post',
                    'post__in' => $ids,
                    'post_status' => 'public'
                );
            $WP_Query = new WP_Query($args);
             
            if ( $WP_Query->have_posts() ) {

                $list .= "<ul>";
                while( $WP_Query->have_posts() ){
                    $WP_Query->the_post();
                   
                    $list .= '<li>' .get_the_title().'</li>';
                }
                $list .= "</ul>";
            }
            wp_reset_postdata();
            }
        }
        return "<div> <b> {$title} </b> {$list}</div";

        
    }


}