<?php
class zend_mb_simple{

    private $_meta_box_id = 'zend-mb-simple';

    private $_prefix_id   = 'zend-mb-simple-';

    private $_prefix_key  = '_zend_mb_simple_';

    public function __construct() {
        add_action('add_meta_boxes', array($this, 'create'));
        add_action('save_post', array($this, 'save'));
     
    }

    public function create() {
        add_meta_box( $this->_meta_box_id, 'Custom Meta Box', array($this, 'display'), 'post' );
        add_action( 'admin_enqueue_scripts', array($this, 'add_file_css') );

    }

    private function create_key($val) {
        return $this->_prefix_key . $val;
    }
    
    private function create_id($val) {
        return $this->_prefix_id . $val;
    }

    public function display($post) {
       
        echo "<div class='mb-wrap'>";
        echo "<p><b><i> Welcome to 2222 </i></b></p>";
     
        $htmlObj    = new ZendvnHtml();
        wp_nonce_field( $this->_meta_box_id, $this->_meta_box_id . '-nonce' );
        //price
        $inputId    = $this->create_id('price');
        $inputName  = $this->create_id('price');
        $inputValue = get_post_meta( $post->ID, $this->create_key('price'), true );
        $attr = array(
            'id'    => $inputId ,
            'size'  => '25',
            'style' => 'margin-left:13px;'

        );
        $html_price = $htmlObj->label(translate('Title'),
                                    array('for' => $inputId)).
                                    $htmlObj->textbox($inputName, $inputValue , $attr);
        echo $htmlObj->pTag($html_price);
      
        //author
        $inputId    = $this->create_id('author');
        $inputName  = $this->create_id('author');
        $inputValue = get_post_meta( $post->ID, $this->create_key('author'), true );
        $attr = array(
            'id'    => $inputId ,
            'size'  => '25',
            'style' => 'margin-left:15px;'
        );
        $html_author = $htmlObj->label(translate('Author'),
        array('for' => $inputId)).$htmlObj->textbox($inputName, $inputValue , $attr);
        echo $htmlObj->pTag($html_author);

        //level book
        $inputId    = $this->create_id('level');
        $inputName  = $this->create_id('level');
        $inputValue =  get_post_meta( $post->ID, $this->create_key('level'), true );
        $attr = array(
            'id'    => $inputId ,
            'style' => 'width: 210px; margin-left:5px;'
        );
        $options['data'] = array(
            'eazy'       => translate('Eazy'),
            'medium'     => translate('Medium'),
            'difficulty' => translate('Difficulty'),

        );
        $html_level = $htmlObj->label(translate('Trình độ'),
        array('for' => $inputId)).$htmlObj->selectbox($inputName, $inputValue , $attr, $options);
        echo $htmlObj->pTag($html_level);

        echo "</div>";
    }

    public function add_file_css() {
        wp_register_style( 'zend_mb_simple', ZEND_MP_CSS_DIR.'/mb-simple.css', array(), '1.0' );
        wp_enqueue_style( 'zend_mb_simple' );
    }

    public function save($post_id) {
        
        if( !isset( $_POST[ $this->_meta_box_id.'-nonce' ]) ) return $post_id;

        if( !wp_verify_nonce( $_POST[ $this->_meta_box_id.'-nonce' ],  $this->_meta_box_id )) return $post_id;

        if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;

        if( !current_user_can( 'edit_post', $post_id )) return $post_id;

        $data       = array ( 'price', 'author', 'level' );
        foreach( $data as $item ) {
            update_post_meta( $post_id, $this->create_key($item),
                             sanitize_text_field($_POST[$this->create_id($item)]
                            ));
        }

    }

}