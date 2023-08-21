<?php 
class Zend_SC_Date {
    public function __construct() {
        add_shortcode( 'zend_sc_date', array( $this, 'show'));
    }

    public function show() {

        if ( is_single() ) {
            $str = date('1 jS \of F Y h:i:s A');
        return $str;
        }
        
    }


}