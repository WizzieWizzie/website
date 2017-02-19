<!-- News -->

<section class="news shad-in" data-pattern="multiply">

    <!-- <div class="bobble-bob facedown" data-os-animation-delay="0.3"></div> -->

    <div class="g-row cf">

        <?php

            global $wp_query;

            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

            $args = array(
                'posts_per_page' => 6,
                'paged' => $paged
            );

            $merged_args = array_merge( $wp_query->query, $args );
            query_posts( $merged_args );

            if (have_posts()) {
                while (have_posts()) {
                    the_post();
                    get_template_part('content-newsitem');
                }
            }

            news_pagingation();

        ?>

    </div>

    <div class="bobble-bob faceup" data-os-animation-delay="0.5"></div>

</section>

<section class="breakup gradient" data-pattern="plus"></section>

<?php get_template_part('content-sponsors'); ?>