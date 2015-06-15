<section class="map">

    <div class="google-acfmap">

        <?php

            # Load Place and style Google Map Markers 
            # Users the ACF Google map
            # ---------------------------------------------------

            $args = array(
                'post_type'       => 'location',
                'posts_per_page'  => -1
            );

            $query = new WP_QUERY($args);

            while ($query->have_posts()) {
                $query->the_post();
                $location = get_field('location');
                ?>
                    <div class="marker hidden" data-icon="<?php echo get_template_directory_uri() ?>/images/maps/pin.png" data-triggerClass="loc<?php echo the_ID(); ?>" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
                        <h3><?php the_title(); ?></h3>
                        <p class="address"><?php the_field('address'); ?></p>
                    </div>
                <?php
            }

        ?>

    </div>

    <div class="g-row">

        <?php

            $args = array(
                'post_type'       => 'location',
                'posts_per_page'  => -1
            );

            $query = new WP_QUERY($args);

            if ($query->have_posts()) {

                echo "<ul>";

                while ($query->have_posts()) {

                    $query->the_post();
                    $location = get_field('location');

                    ?>

                    <li data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>" class="loc<?php echo the_ID(); ?>">
                        <h3><?php the_title(); ?></h3>
                        <p><?php the_field('address'); ?></p>
                        <p>
                            <strong>Club Times:</strong><br/>
                            <?php the_field('club_times'); ?>
                        </p>
                    </li>

                    <?php }

                echo "</ul>";

            }

        ?>

    </div>

</section>