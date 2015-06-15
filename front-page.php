<?php get_header(); ?>

<!-- Intro -->
<section class="intro gradient" data-pattern="plus">

    <div class="g-row">
        <h1>
            <span class="red">do you want to learn to code?</span><br />
            <span class="blue">make cool things!</span><br />
            <span class="yellow">every saturday morning... For free!</span>
        </h1>
    </div>

    <?php get_template_part('content-whatwedo'); ?>

</section>

<?php get_template_part('content-news', 'frontpage'); ?>
<?php get_template_part('content-quote'); ?>
<?php get_template_part('content-sponsors'); ?>

<?php get_footer(); ?>