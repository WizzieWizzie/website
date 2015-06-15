<!-- Volunteer Quote -->

<?php

    $args = array(
        'post_type'      => 'quote',
        'posts_per_page' => 1,
        'orderby'        => 'rand',
    );

    $query = new WP_QUERY($args);

    foreach ($query->posts as $post) {
        setup_postdata($post); ?>

        <section class="volunteer gradient" data-pattern="plus">
            <div class="g-row">
                <div class="cta-wrap cf">
                <blockquote class="g-col-2">
                    <?php the_field('quote'); ?>
                    <span class="quote-name"><?php the_field('name'); ?></span>
                </blockquote>
                <div class="g-col-3 cta">
                    <h3><a href="<?php echo get_option('home'); ?>/volunteer">Volunteer @ Wizzie Wizzie</a></h3>
                    <p>
                        If you’re interested in working with us to share your coding 
                        skills and teach young people to program, please check our volunteer page.
                    </p>
                </div>
                </div>
            </div>
            <div class="bobble-bob up howdy"></div>
        </section>

    <?php }

?>