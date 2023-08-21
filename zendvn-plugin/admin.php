<?php 

class ZendMpAdmin {
    public function __construct() {
        $this->ajaxPage();
    }

    public function ajaxPage() {
        require_once ZEND_MP_SETTINGS_DIR .'/ajax.php';
        new ZendVn_Setting_Ajax();
    }
}