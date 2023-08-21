<?php

class ZendMp {

    public function __construct() {
        add_filter( 'the_title', array($this , 'theTitle'), 10, 2 );
    }

    public function theTitle($title, $id){
       
        if ( $id == 218 ) {
            $title = 'test title';
        }

        return $title;
    }
  

}