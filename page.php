<?php get_header(); ?>
            <div class="main">
                <?php if(have_posts()): while(have_posts()):the_post(); ?><?php if(is_front_page() == false):;?>
                <div class="title-box">
                    <h1><?php the_title(); ?></h1>
                </div><?php endif; ?>
                <article class="wp-article">
                    <?php the_content(); ?>
                </article>
                <?php endwhile; endif; ?>
            </div>
            <?php get_sidebar(); ?>
<?php get_footer(); ?>