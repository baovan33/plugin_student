<?php
class Zend_SC_Main {
    private $_shortcode_name = 'zend_sc_options';

    private $_shortcode_option = array();

    public function __construct() {
        $defaultOption = array(
            'zend_sc_date' => false,
            'zend_sc_title' => true
        );
        $this->_shortcode_option = get_option($this->_shortcode_name, $defaultOption);
        $this->date();
        $this->title();
    }

    public function date() {
        if(  $this->_shortcode_option['zend_sc_date'] == true ) {
            require_once ZEND_MP_SHORTCODES_DIR . '/date.php';
            new Zend_SC_Date();
        } else {
            add_shortcode( 'zend_sc_date', '__return_false');
        }
    }

    public function title() {
        if(  $this->_shortcode_option['zend_sc_title'] == true ) {
            require_once ZEND_MP_SHORTCODES_DIR . '/title.php';
            new Zend_SC_Title();
        } else {
            add_shortcode( 'zend_sc_title', '__return_false');
        }
    }

}