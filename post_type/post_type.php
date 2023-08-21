<?php 

function custom_product_post_type() {
    $labels = array(
        'name'               => 'Sản phẩm',
        'singular_name'      => 'Sản phẩm',
        'menu_name'          => 'Sản phẩm',
        'add_new'            => 'Thêm sản phẩm',
        'add_new_item'       => 'Thêm sản phẩm mới',
        'edit_item'          => 'Chỉnh sửa sản phẩm',
        'new_item'           => 'Sản phẩm mới',
        'view_item'          => 'Xem sản phẩm',
        'search_items'       => 'Tìm kiếm sản phẩm',
        'not_found'          => 'Không tìm thấy sản phẩm',
        'not_found_in_trash' => 'Không tìm thấy sản phẩm trong thùng rác',
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'has_archive'         => true,
        'publicly_queryable'  => true,
        'query_var'           => true,
        'rewrite'             => array( 'slug' => 'product' ), 
        'capability_type'     => 'post',
        'menu_icon'           => 'dashicons-products', 
        'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
    );

    register_post_type( 'product', $args );
}
add_action( 'init', 'custom_product_post_type' );