<?php get_header(); ?>
        <div class="content">
            <div class="main">
                <?php
                    // 現在のページ番号を取得
                    $current_pgae = get_query_var( 'paged' ); 
                    $current_pgae = $current_pgae == 0 ? '1' : $current_pgae;
                    // 全ページ数を取得
                    $max_pages = $wp_query->max_num_pages ;
                ?>
                <?php if($current_pgae == 1):?>
                <article>
                    <div class="name-box">
                    <img class="icon" src="<?php echo esc_url(get_template_directory_uri()); ?>/no_icon_people.png"></a>
                    <h1><?php echo get_the_author(); ?></h1>
                    </div>
                </article>
                <article>
                    <h1>プロフィール</h1>
                    <?php echo wpautop(get_the_author_meta('user_description')); ?>
                    <p>リンク : <a href="<?php the_author_meta(user_url); ?>"><?php the_author_meta(user_url);?></a></p>
                </article>
                <?php endif;?>
                <article>
                    <h1><?php echo get_the_author(); ?>の投稿</h1>
                    <ul class="article-list">
                    <?php if(have_posts()): while(have_posts()):the_post(); ?>
                        <li><label><a href="<?php echo esc_url( home_url( '/' ) ); ?>date/<?php echo get_the_date('Y/n'); ?>"><?php echo get_the_date('Y年n月j日'); ?></a></label><h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                        <label class="meta"><?php the_category("</label><label class=\"meta\">"); ?></label><?php the_tags( '<label class="meta">', '</label><label class="meta">', '</label>' ); ?></li>
                    <?php endwhile; endif; ?>
                    </ul>
                </article>
                <p>
                <?php 
                    for ($i = 1; $i <= $max_pages; $i++) {
                        if($i == $current_pgae){
                            echo '<label class="meta" style="background-color: var(--theme-color); color: #fff; font-weight:600;">' .$i. '</label>';
                        }else{
                            echo '<label class="meta"><a href="?paged=' .$i. '">' .$i. '</a></label>';
                        }
                    }
                ?>
                </p>
            </div>
            <?php get_sidebar(); ?>
<?php get_footer(); ?>