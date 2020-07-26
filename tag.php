<?php get_header(); ?>
            <div class="main">
                <article>
                    <h1><?php single_cat_title(); ?>関連の記事</h1>
                    <ul class="article-list">
                    <?php if(have_posts()): while(have_posts()):the_post(); ?>
                        <li><label><a href="<?php echo esc_url( home_url( '/' ) ); ?>date/<?php echo get_the_date('Y/n'); ?>"><?php echo get_the_date('Y年n月j日'); ?></a></label><h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                        <label class="meta"><?php the_category("</label><label class=\"meta\">"); ?></label><?php the_tags( '<label class="meta">', '</label><label class="meta">', '</label>' ); ?></li>
                    <?php endwhile; endif; ?>
                    </ul>
                </article>
                <p>
                <?php 
                    // 現在のページ番号を取得
                    $current_pgae = get_query_var( 'paged' ); 
                    $current_pgae = $current_pgae == 0 ? '1' : $current_pgae;
                    // 全ページ数を取得
                    $max_pages = $wp_query->max_num_pages ;
                    
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