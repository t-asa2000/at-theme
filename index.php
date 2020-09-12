<?php get_header(); ?>
		<div class="title-box" style="margin-bottom:-50px; text-align:center;">
            <h1><?php bloginfo( 'description' ); ?></h1>
        </div>
        <div class="content">
            <div class="main">
                <?php
                    // 現在のページ番号を取得
                    $current_pgae = get_query_var( 'paged' ); 
                    $current_pgae = $current_pgae == 0 ? '1' : $current_pgae;
                    // 全ページ数を取得
                    $max_pages = $wp_query->max_num_pages ;
                    if(($current_pgae == 1)&&is_active_sidebar( 'top-1' )){
                        dynamic_sidebar( 'top-1' );
                    }
                ?>
                <article>
                    <p style="margin-right:10px;text-align: right;">
						<label class="button" style="--btn-color:var(--color-rss);margin:0 5px;line-height: 30px;padding: 0 10px;">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>/feed/">RSS</a>
						</label>
						<a href="https://feedly.com/i/subscription/feed%2F<?php echo urlencode(esc_url( home_url( '/' ) )); ?>%2Ffeed%2F" target="blank">
							<img id="feedlyFollow" src="http://s3.feedly.com/img/follows/feedly-follow-rectangle-flat-medium_2x.png" alt="follow us in feedly" style="max-height:34px;vertical-align: bottom;" class="banner">
						</a>
					</p>
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
                            echo '<label class="meta"><a href="';
                            echo esc_url(home_url('/'));
                            echo 'page/' .$i. '">' .$i. '</a></label>';
                        }
                    }
                ?>
                </p>
            </div>
            <?php get_sidebar(); ?>
<?php get_footer(); ?>