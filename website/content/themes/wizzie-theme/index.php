<?php /* Template Name: News */ ?>

<?php get_header(); ?>

<!-- Intro -->
<section class="intro gradient" data-pattern="slash">

    <div class="g-row">
        <h1>
            <span class="blue">Wizzie News</span><br />
            <span class="red">Stay up to date with club info</span><br />
        </h1>
    </div>

</section>

<?php get_template_part('content-news', 'newspage'); ?>

<?php get_footer(); ?>