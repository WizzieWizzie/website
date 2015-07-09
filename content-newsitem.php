<div class="news-item">
    <article>
        <time datetime="<?php echo get_the_date('Y-m-d'); ?>">
            <?php echo get_the_date('d F Y'); ?>
        </time>
        <h3><?php the_title(); ?></h3>
        <?php the_excerpt(); ?>
        <a href="<?php the_permalink(); ?>" class="readMore">Read more&hellip;</a>
    </article>
</div>