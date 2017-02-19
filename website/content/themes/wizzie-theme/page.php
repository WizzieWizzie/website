<?php get_header(); ?>

<section class="generic-page">

    <article>

       <header>
           <section class="intro gradient" data-pattern="plus">
                <div class="g-row">
                    <h1><span class="blue"><?php the_title(); ?></span><br /></h1>
                </div>
            </section>
        </header>

        <div class="post-text">
            <div class="g-row cf">
                <div class="g-col-2 text">
                <?php 
                    if (have_posts()) {
                        while (have_posts()) {
                            the_post(); 
                            the_content();
                        }
                    }
                ?>
                </div>
            </div>
        </div>

    </article>

</section>

<section class="breakup gradient" data-pattern="multiply"></section>

<?php get_footer(); ?>