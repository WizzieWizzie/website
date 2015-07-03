<!-- News -->

<section class="news shad-in" data-pattern="multiply">

    <!-- <div class="bobble-bob facedown" data-os-animation-delay="0.3"></div> -->

    <div class="g-row cf">

        <?php

            $args = array(
                'post_type'      => 'post',
                'posts_per_page' => 4,
                'orderby'        => 'date',
                'order'          => 'DESC'
            );

            $query = new WP_QUERY($args);

            foreach ($query->posts as $post) {
                setup_postdata($post);
                get_template_part('content-newsitem');
            }

        ?>

    </div>

    <div class="bobble-bob faceup" data-os-animation-delay="0.5"></div>

</section>