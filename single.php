<?php get_header(); ?>
            <?php if(have_posts()): while(have_posts()):the_post(); ?>
            <div class="title-box">
                <h1><?php the_title(); ?></h1>
                <div class="detail">
                    <label class="meta"><a href="<?php echo esc_url( home_url( '/' ) ); ?>date/<?php echo get_the_date('Y/n'); ?>"><?php echo get_the_date('Y年n月j日'); ?></a></label><label class="meta"><?php the_category("</label><label class=\"meta\">"); ?></label><?php the_tags( '<label class="meta">', '</label><label class="meta">', '</label>' ); ?><label class="meta"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">投稿者: <?php echo get_the_author(); ?></a></label>
                </div>
            </div>
        	<div class="content">
            <div class="main">
                <article class="wp-article">
                    <?php the_content(); ?>
                </article>
                <?php endwhile; endif; ?>
            </div>
            <?php get_sidebar(); ?>
<?php get_footer(); ?>