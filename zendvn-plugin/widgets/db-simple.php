<?php 
class Zend_Widget_DB_Simple {
    
    public function __construct() {
        add_action( 'wp_dashboard_setup', array($this, 'zend_widget_db') );
    }

    public function zend_widget_db() {
        wp_add_dashboard_widget( 'zend_widget_db_simple', 'My Plugin Infor', array($this, 'zend_widget_db_simple_display') );
    }

    public function zend_widget_db_simple_display() {
        $arrQuery = array(
            'author' => 1,
            'cat' => 23
        );
        $query1 = new WP_Query( $arrQuery );
        $query1->init();
        echo "<br>".'==================';

        echo "<pre>";
        print_r($query1);
        echo "</pre>";


        echo "<br>".'==================';

       

        // echo "<ul>";
        // if ( count($query1->posts) > 0 ) {
        //    foreach( $query1->posts as $post ) {
        //         $idPost = $post->ID;
        //         $linkPost = admin_url( 'post.php?post='. $idPost.'&action=edit');
        //         echo '<li> <a href="'.$linkPost.'">' . $post->post_title . '</a> </li>';
            
        //     }
        // }
       
        // echo "</ul>";   
        // wp_reset_postdata();

    }
}