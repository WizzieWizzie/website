<!-- Volunteer Quote -->

<?php

    $args = array(
        'post_type'      => 'quote',
        'posts_per_page' => 1,
        'orderby'        => 'rand',
    );

    $query = new WP_QUERY($args);

    foreach ($query->posts as $post) {

        setup_postdata($post);

        $quote = get_field('quote');

        ?>

        <section class="module-quote gradient font-auto-adjust" data-pattern="plus">

            <div class="g-row">

                <div class="module-quote-wrap cf v-center bg-white">

                    <!-- QUOTE -->

                    <blockquote class="g-col-2 module-quote_blockquote v-centre-inner black" data-characters="<?php echo strlen($quote); ?>">

                        <?php echo $quote; ?>

                        <span class="module-quote_blockquoteauthor"><?php the_field('name'); ?></span>

                    </blockquote>

                    <!-- VOLUNTEER CTA -->

                    <div class="g-col-3 module-quote_cta v-centre-inner bg-yellow para-center">

                        <h3 class="font-bold module-quote_cta_h3">
                            <a href="<?php echo get_option('home'); ?>/volunteer" class="white">Volunteer @ Wizzie Wizzie</a>
                        </h3>

                        <p class="white module-quote_cta_p">
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