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
<section class="form-generic volunteerForm">

    <div class="g-row">

        <div class="g-col-3">
            <?php the_field('column_1'); ?>
        </div>

        <div class="g-col-3">
            <?php the_field('column_2'); ?>
        </div>

        <div class="g-col-3">

            <h3 class="form">Sign Up</h3>

            <!-- <p>
                The best place to get in touch with us is by using this form:
            </p> -->

            <form id="volunteerForm" data-parsley-validate data-ajax-action="volunteer_signup">

                <p class="row">
                    <label for="volunteer_name">
                        <span class="required">Name: </span>
                        <input type="text" id="volunteer_name" name="volunteer_name" placeholder="Waldo" required />
                    </label>
                </p>

                <p class="row">
                    <label for="volunteer_email">
                        <span class="required">Email: </span>
                        <input type="email" id="volunteer_email" name="volunteer_email" placeholder="waldo@waldo.net" required />
                    </label>
                </p>

                <p class="row">
                    <label for="student_location">
                        <span class="required">Which Location do you prefer: </span>
                        <select id="student_location" name="student_location" required>
                            <option value="">Please select a location</option>
                            <?php
                                echo form_get_location_options();
                            ?>
                        </select>
                    </label>
                </p>

                <p class="row">
                    <label for="additional_notes">
                        <span>Anything you'd like to add...</span>
                        <textarea rows="4" cols="50" id="additional_notes" name="additional_notes" placeholder="please let us know..."></textarea>
                    </label>
                </p>

                <p class="row">
                    <div class="validOrNot">
                        <h4 class="bs-callout bs-callout-warning">This form seems far to be invalid :(</h4>
                        <h4 class="bs-callout bs-callout-info hidden">Everything seems to be ok :)</h4>
                    </div>
                    <label for="submit">
                        <input type="submit" value="Submit" id="submit" name="submit" />
                    </label>
                </p>

            </form>

        </div>


    </div>


</section>

<section class="breakup gradient" data-pattern="multiply"></section>
<?php get_template_part('content-sponsors'); ?>

<?php get_footer(); ?>