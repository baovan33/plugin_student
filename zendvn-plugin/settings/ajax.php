<?php

class ZendVn_Setting_Ajax {

    private $_menu_slug = 'zend_st_ajax';

    private $_option_name = 'zend_st_ajax';
    
    private $_setting_options;

    public function __construct() {

        $this->settingOptions = get_option( $this->_option_name, array() );

        add_action( 'admin_menu', array( $this, 'settingMenu'));

        add_action( 'admin_init',array( $this, 'register_setting_and_fields' ));   

        

     }

     public function register_setting_and_fields() {

        add_action('admin_enqueue_scripts', array($this, 'add_file_js'));

        add_action( 'wp_ajax_zend_check_form', array($this, 'zend_check_form') );

        register_setting(
                    $this->_menu_slug, $this->_option_name, 
                    array($this, 'validate_setting')
                    );

         $mainSection = 'zend_section';

        add_settings_section( 
                    $mainSection, 
                    'Main setting', 
                    array( $this, 'main_section_view'),
                    $this->_menu_slug
                    );

        add_settings_field( 
                    $this->create_id('title'),
                    'Site title:', 
                    array($this, 'create_form'), 
                    $this->_menu_slug, 
                    $mainSection, array('name' => 'title')
                    );

       
    }

    public function zend_check_form() {
        echo "2222";
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
        die();
    }
    private function create_id($val) {
        return $this->_option_name . '_'. $val;
    }

    private function create_name($val) {
        return $this->_option_name . '['.$val.']';
    }

    public function create_form($args) {

        $htmlObj    = new ZendvnHtml();

        if($args['name'] == 'title') {

            $inputId    = $this->create_id('title');
            $inputName  = $this->create_name('title');
            $inputValue = @$this->_setting_options['title'];
            $attr = array(
                'id'    => $inputId ,
                'size'  => '25',
    
            );
            $html= $htmlObj->textbox($inputName, $inputValue , $attr)
                    .$htmlObj->pTag('2');
            echo $html;
        }
    }

     public function settingMenu() {

        add_menu_page(
                'Setting title', 
                'Setting',
                'manage_options', 
                $this->_menu_slug, 
                array($this, 'display')
            );
    }

    public function display() {
        require_once ZEND_MP_VIEWS_DIR.'/setting-page.php';
    }

    public function main_section_view() {

    }

    public function validate_setting($data_input) {
        $errors = array();
        add_settings_error( $this->_menu_slug, 'setting', 'Cap nhap thanh cong', 'update' );
        return $data_input;
    }

    public function add_file_js() {
        wp_register_script( $this->_menu_slug, ZEND_MP_JS_DIR.'/ajax.js', array('jquery'), '1.0' );
        wp_enqueue_script($this->_menu_slug);
    }
}