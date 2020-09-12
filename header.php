<!DOCTYPE html>
<html lang="ja">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        
        <!--キャッシュクリア-->
        <meta http-equiv="Pragma" content="no-store">
        <meta http-equiv="Cache-Control" content="no-store">
        <meta http-equiv="Expires" content="0">

        <title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo('name'); ?></title>
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/core.css?<?php echo date("YmdHis"); ?>">
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/style.css?<?php echo date("YmdHis"); ?>">
        <?php wp_enqueue_script('jquery'); ?>
        <?php wp_head(); ?>
    </head>

    <body>
        <header>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <?php if(get_site_icon_url()):?>
            <img class="siteicon compact" src="<?php echo esc_url(get_site_icon_url());?>">
            <?php endif;?></a>
            <input type="checkbox" id="sitemenu-openclose" />
            <label for="sitemenu-openclose" class="sitemenu-button open">≡</label>
        	<label for="sitemenu-openclose" class="sitemenu-button close">×</label>
            <?php 
            wp_nav_menu(array(
'theme_location' => 'header_menu',
'container' => 'ul',
'menu_class' => 'sitemenu'
            ));
    		<div class="sitemenu-background"></div>
            ?>
        </header>