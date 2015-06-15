<?php /* Template Name: Volunteer */ ?>

<?php get_header(); ?>

<!-- Intro -->
<section class="intro gradient" data-pattern="divide">

    <div class="g-row">
        <h1>
            <span class="red">We're always looking for Volunteers.</span><br />
            <span class="yellow">Come help us teach children!</span>
        </h1>
    </div>

</section>

<!-- Temporary using the news-single css classes -->
<section class="news-single">
    <div class="post-text">
        <?php 
            if (have_posts()) {
                while (have_posts()) {
                    the_post(); 
                    the_content();
                }
            }
        ?>
    </div>
</section>

<section class="breakup gradient" data-pattern="multiply"></section>
<?php get_template_part('content-sponsors'); ?>

<?php get_footer(); ?>