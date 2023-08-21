<?php

class Zend_Metabox_Main {

    private $_metabox_name = 'zend_mb_options';

    private $_metabox_option = array();

    public function __construct() {

        $defaultOption = array(
            'zend_mb_simple' => true,
        );

        $this->_metabox_option = get_option($this->_metabox_name, $defaultOption);
        $this->simple();
   
    }

    public function simple() {
        if (  $this->_metabox_option['zend_mb_simple'] == true ) {

            require_once ZEND_MP_METABOX_DIR.'/simple.php'; 
            new zend_mb_simple();

        }
    }
}