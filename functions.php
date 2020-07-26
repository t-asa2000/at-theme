<?php
function at_setup() {
    register_nav_menus( array(
        'header_menu' => 'ヘッダーメニュー'
    ) );
    register_sidebar( array(
        'name' => 'sidebar1',
        'id'            => 'sidebar-1',
        'before_widget' => '<div class="wp-widget">',
        'after_widget' => '</div>',
        'before_title'  => '<h1>',
        'after_title'  => '</h1>',
        )
      );
      register_sidebar( array(
        'name' => 'toppage',
        'id'            => 'top-1',
        'before_widget' => '<div class="wp-widget">',
        'after_widget' => '</div>',
        'before_title'  => '<h1>',
        'after_title'  => '</h1>',
        )
      );
    add_theme_support( 'widgets' );
    // 記事の自動整形を無効化
    remove_filter('the_content', 'wpautop');
    remove_filter( 'the_content', 'wptexturize' );
    // 抜粋の自動整形を無効化
    remove_filter('the_excerpt', 'wpautop');
    remove_filter( 'the_excerpt', 'wptexturize' );
}

function override_mce_options( $init_array ) {
    global $allowedposttags;

    $init_array['valid_elements']          = '*[*]';
    $init_array['extended_valid_elements'] = '*[*]';
    $init_array['valid_children']          = '+a[' . implode( '|', array_keys( $allowedposttags ) ) . ']';
    $init_array['indent']                  = true;
    $init_array['wpautop']                 = false;
    $init_array['force_p_newlines']        = false;

    return $init_array;
}
add_filter( 'tiny_mce_before_init', 'override_mce_options' );
add_action( 'after_setup_theme', 'at_setup' );
?>