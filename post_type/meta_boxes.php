<?php


function price_product_meta_box()
{
    add_meta_box( 'gia-san-pham', 'Giá bán', 'price_product' , 'product' );
}
add_action('add_meta_boxes', 'price_product_meta_box');

function price_product( $post ) {
    $price_product = get_post_meta( $post->ID, '_price_product', true );

    echo '<label for="price_product">Giá bán:</label>';
    echo '<input type="text" id="price_product" name="price_product" value="' . esc_attr(  $price_product ) . '">';

	
}

function save_price_product( $post_id ) {

    $price_product = sanitize_text_field( $_POST['price_product'] );
    update_post_meta( $post_id, '_price_product' , $price_product);

}

add_action( 'save_post', 'save_price_product');



function quantity_product_meta_box()
{
    add_meta_box( 'so-luong-san-pham', 'Số lượng sản phẩm', 'quantity_product' , 'product' );
}
add_action('add_meta_boxes', 'quantity_product_meta_box');

function quantity_product( $post) {
    $quantity_product = get_post_meta( $post->ID, '_quantity_product', true );

    echo '<label for="quantity_product">Số lượng sản phẩm:</label>';
    echo '<input type="text" id="quantity_product" name="quantity_product" value="' . esc_attr( $quantity_product ) . '">';

	
}

function save_quantity_product( $post_id ) {

    $quantity_product = sanitize_text_field( $_POST['quantity_product'] );
    update_post_meta( $post_id, '_quantity_product' , $quantity_product);

}

add_action( 'save_post', 'save_quantity_product');


