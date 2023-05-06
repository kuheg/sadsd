<?php
 
/**
 * Template Name: 说说模版
 */
 
get_header();
?>
 
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
        <?php
        $args = array(
        'post_type' => 'shuoshuo',
        'post_status' => 'publish',
        'posts_per_page' => -1
         );
        $shuoshuo_query = new WP_Query($args);
        ?>
        <div class="cbp_shuoshuo">
            <?php if ($shuoshuo_query->have_posts()) : ?>
            <ul class="cbp_tmtimeline">
            <?php while ($shuoshuo_query->have_posts()) : $shuoshuo_query->the_post(); ?>
                <li>
                 <a href="<?php the_permalink(); ?>">
                     <span class="shuoshuo_author_img"><img src="<?php echo get_avatar_profile_url(get_the_author_meta('ID')); ?>" class="avatar avatar-48" width="48" height="48"></span>
                     <div class="cbp_tmlabel">
                         <p><?php the_content(); ?></p>
                         <p class="shuoshuo_time"><i class="fa-regular fa-clock"></i> <?php the_time('Y/n/j G:i'); ?></p>
                     </div>
                  </a>
                </li>
            <?php endwhile; ?>
            </ul>
        <?php else : ?>
        <h3 style="text-align: center;"><?php _e('You have not posted a comment yet', 'sakurairo') ?></h3>
        <p style="text-align: center;"><?php _e('Go and post your first comment now', 'sakurairo') ?></p>
        <?php endif; ?>
        </div>
        <?php wp_reset_postdata(); ?>
        </main><!-- #main -->
    </div><!-- #primary -->
    <script type="text/javascript">
    document.addEventListener('DOMContentLoaded', () => {
    const timelines = document.querySelectorAll('.cbp_tmtimeline');
    timelines.forEach(timeline => {
        timeline.addEventListener('mouseover', event => {
            if (event.target.matches('.cbp_tmtimeline li .shuoshuo_author_img img')) {
                event.target.classList.add('zhuan');
            }
        });
        timeline.addEventListener('mouseout', event => {
            if (event.target.matches('.cbp_tmtimeline li .shuoshuo_author_img img')) {
                event.target.classList.remove('zhuan');
            }
        });
    });
});
    </script>
<?php
get_footer();
?>
