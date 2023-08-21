<?php

class ZendMpAdmin {

    private $menuSlug = 'setting_plugin';

    private $settingOptions;

    public function __construct() {
        // $htmlObj = new ZendvnHtml();
        // $inputId = 'sass';
        // $inputName = 'ssssaaqss';
        // $inputValue = "";
        // $attr = array(
        //     'id'    => $inputId ,
        //     'class' => 'widefat',
        // );
    

        // echo '<p> <label for="'. $inputId.'"">'._e('Title').'</label>'
        //     .$htmlObj->textbox($inputName, $inputValue , $attr)
        //     .'</p>';
        $this->settingOptions = get_option( 'zend_options_name', array() );

        add_action( 'admin_menu', array( $this, 'settingMenu'));

        add_action( 'admin_init',array( $this, 'register_setting_and_fields' ));
    }

    public function register_setting_and_fields() {

        $mainSection = 'zend_section';

        register_setting(
                    'zend_options', 'zend_options_name', 
                    array($this, 'validate_setting')
                    );

        add_settings_section( 
                    $mainSection, 
                    'Main setting', 
                    array( $this, 'main_section_view'),
                    $this->menuSlug
                    );

        add_settings_field( 
                    'zend_new_title',
                    'Site title:', 
                    array($this, 'new_title_input'), 
                    $this->menuSlug, 
                    $mainSection
                    );

        add_settings_field( 
                    'zend_logo',
                    'Logo:', 
                    array($this, 'logo_input'), 
                    $this->menuSlug, 
                    $mainSection
                    );
    }
    public function new_title_input() {
        echo '<input type="text" name="zend_options_name[zend_new_title]" 
        value="'.$this->settingOptions['zend_new_title'].'">';
    }

    public function logo_input() {
        echo '<input type="file" name="zend_options_name[zend_logo]">';
    }
    public function main_section_view() {

    }
    public function validate_setting($data_input) {
        die();
        echo "<pre>";
        print_r($data_input);
        echo "</pre>";
      
//    return $data_input;

    }
    public function settingMenu() {
        // add_menu_page(
        //         'Setting title', 
        //         'Setting',
        //         'manage_options', 
        //         $this->menuSlug, 
        //         array($this, 'settingPage')
        //     );

        add_options_page(
            'Setting title', 
            'Setting',
            'manage_options', 
            $this->menuSlug, 
            array($this, 'settingPage')
        );
    }

    public function settingPage() {
        require_once ZEND_MP_VIEWS_DIR.'/setting-page.php';
    }
}