<?php
/*
 * Plugin Name:       MetaBox
 * Plugin URI:        #
 * Description:       Handle the basics with this plugin.
 */

// đăng ký Custom Post Type cho Sự kiện
function custom_event_post_type() {
    $labels = array(
        'name'               => 'Sự kiện',
        'singular_name'      => 'Sự kiện',
        'menu_name'          => 'Sự kiện',
        'add_new'            => 'Thêm sự kiện',
        'add_new_item'       => 'Thêm sự kiện mới',
        'edit_item'          => 'Chỉnh sửa sự kiện',
        'new_item'           => 'Sự kiện mới',
        'view_item'          => 'Xem sự kiện',
        'search_items'       => 'Tìm kiếm sự kiện',
        'not_found'          => 'Không tìm thấy sự kiện',
        'not_found_in_trash' => 'Không tìm thấy sự kiện trong thùng rác',
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'has_archive'         => true,
        'publicly_queryable'  => true,
        'query_var'           => true,
        'rewrite'             => array( 'slug' => 'event' ), // Slug của trang sự kiện
        'capability_type'     => 'post',
        'menu_icon'           => 'dashicons-calendar-alt', // Biểu tượng sự kiện
        'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
    );

    register_post_type( 'event', $args );
}
add_action( 'init', 'custom_event_post_type' );


// Meta Box Thời gian bắt đầu

function time_start_meta_box()
{
    add_meta_box( 'thoi-gian-bat-dau', 'Thời gian bắt đầu', 'time_event_start' , 'event' );
}
add_action('add_meta_boxes', 'time_start_meta_box');

function time_event_start( $post ) {
    $event_start_time = get_post_meta( $post->ID, '_event_start_time', true );

    echo '<label for="event-start-time">Thời gian bắt đầu:</label>';
    echo '<input type="text" id="event-start-time" name="event_start_time" value="' . esc_attr( $event_start_time ) . '">';

	
}

function save_time_event_start( $post_id ) {

    $event_start_time = sanitize_text_field( $_POST['event_start_time'] );
    update_post_meta( $post_id, '_event_start_time' , $event_start_time);

}

add_action( 'save_post', 'save_time_event_start');


// Meta Box Thời gian kết thúc

function time_end_meta_box()
{
    add_meta_box( 'thoi-gian-ket-thuc', 'Thời gian kết thúc', 'time_event_end' , 'event' );
}
add_action('add_meta_boxes', 'time_end_meta_box');

function time_event_end( $post) {
    $event_end_time = get_post_meta( $post->ID, '_event_end_time', true );

    echo '<label for="event-end-time">Thời gian kết thúc:</label>';
    echo '<input type="text" id="event-end-time" name="event_end_time" value="' . esc_attr( $event_end_time ) . '">';

	
}

function save_time_event_end( $post_id ) {

    $event_end_time = sanitize_text_field( $_POST['event_end_time'] );
    update_post_meta( $post_id, '_event_end_time' , $event_end_time);

}

add_action( 'save_post', 'save_time_event_end');


// Meta Box số lượng tham gia

function quantity_event_meta_box()
{
    add_meta_box( 'so-luong-tham-gia', 'Số lượng tham gia', 'quantity_event' , 'event' );
}
add_action('add_meta_boxes', 'quantity_event_meta_box');

function quantity_event( $post) {
    $quantity_event = get_post_meta( $post->ID, '_quantity_event', true );

    echo '<label for="event-end-time">Số lượng người tham gia:</label>';
    echo '<input type="text" id="event-end-time" name="quantity_event" value="' . esc_attr( $quantity_event ) . '">';

	
}

function save_quantity_event( $post_id ) {

    $quantity_event = sanitize_text_field( $_POST['quantity_event'] );
    update_post_meta( $post_id, '_quantity_event' , $quantity_event);

}

add_action( 'save_post', 'save_quantity_event');


// Meta Box địa điểm

function location_event_meta_box()
{
    add_meta_box( 'dia-diem-to-chuc', 'Địa điểm tổ chức', 'location_event' , 'event' );
}
add_action('add_meta_boxes', 'location_event_meta_box');

function location_event( $post) {
    $location_event = get_post_meta( $post->ID, '_location_event', true );

    echo '<label for="event-end-time">Địa điểm tổ chức:</label>';
    echo '<input type="text" id="event-end-time" name="location_event" value="' . esc_attr( $location_event ) . '">';

	
}

function save_location_event( $post_id ) {

    $location_event = sanitize_text_field( $_POST['location_event'] );
    update_post_meta( $post_id, '_location_event' , $location_event);

}

add_action( 'save_post', 'save_location_event');