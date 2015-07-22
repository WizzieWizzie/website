<section class="two-col-feature gradient padding-alt-box font-smoothe" data-pattern="slash">

    <div class="g-row">

        <div class="two-col-feature-wrap cf v-center bg-white">

            <div class="two-col-feature-col1 g-col-half bg-white v-centre-inner two-col-feature-arrow">
                <h3><?php the_field('headline'); ?></h3>
                <p class="marginless">
                    <?php the_field('copy'); ?>
                </p>
            </div>

            <div class="two-col-feature-col2 g-col-half v-centre-inner">
                <iframe width="560" height="315" src="<?php echo get_field('video_url'); ?>?showinfo=0" frameborder="0" allowfullscreen ></iframe>
            </div>

        </div>

    </div>

</section>