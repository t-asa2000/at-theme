<?php get_header(); ?>
            <div class="main">
                <?php if(have_posts()): while(have_posts()):the_post(); ?>
                <div class="title-box">
                    <h1><?php the_title(); ?></h1>
                    <div class="detail">
                        <label class="meta"><a href="<?php echo esc_url( home_url( '/' ) ); ?>date/<?php echo get_the_date('Y/n'); ?>"><?php echo get_the_date('Y年n月j日'); ?></a></label><label class="meta"><?php the_category("</label><label class=\"meta\">"); ?></label><?php the_tags( '<label class="meta">', '</label><label class="meta">', '</label>' ); ?>
                    </div>
                </div>
                <article class="wp-article">
                    <?php the_content(); ?>
                    <h1>この記事を書いた人</h1>
                    <div class="name-box" style="margin-top:30px;"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
                    <img class="icon" src="<?php echo esc_url(get_template_directory_uri()); ?>/no_icon_people.png"></a>
                    <h1><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_the_author(); ?></a></h1>
                    </div>
                    <?php echo wpautop(get_the_author_meta('user_description')); ?>
                </article>
                <?php endwhile; endif; ?>
            </div>
            <?php get_sidebar(); ?>
<?php get_footer(); ?>