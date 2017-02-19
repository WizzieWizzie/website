<!-- What we do -->

<?php if (have_rows('intro')) { ?>

    <div class="intro-wrap">

        <div class="g-row cf">

            <?php
                while (have_rows('intro')) {
                    the_row(); ?>
                        <div class="g-col-3 text">
                            <h3><?php the_sub_field('headline'); ?></h3>
                            <p><?php the_sub_field('copy'); ?></p>
                        </div>
                    <?php
                }
            ?>

        </div>

        <div class="bobble-bob faceup" data-os-animation-delay="0.2"></div>

    </div>

<?php } ?>