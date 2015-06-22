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
            <h3>Information for volunteers</h3>
            <p>
                If you’re a coder and want to share your knowledge with the young developers of the future, get involved, and join us at the Wizzie Wizzie Computer Coding Club – our weekly club for young people.
            </p>

            <p>
                We’re looking for enthusiastic individuals who are confident coders to share their skills and learning with young people. We currently teach HTML, Scratch and Ruby.
            </p>

            <p>
                You’ll get the opportunity to help young people develop their skills but will also be able to network with like-minded volunteers and potentially develop skills in new areas yourself which could help with your career, too!
            </p>

        </div>

        <div class="g-col-3">

            <h4 class="form">Additional Information</h4>

                <em>Types of activity:</em>
                <ul>
                    <li>Teaching young people different types of computer languages</li>
                    <li>Teaching problem solving skills</li>
                    <li>Supporting young people with developing their ideas</li>
                    <li>Contributing to planning of coding sessions</li>
                    <li>Training other volunteers on different learning tools and programming languages</li>
                    <li>Networking with volunteers from a range of technical backgrounds</li>
                </ul>
          

            <p>
                <em>When required:</em>
                Saturday mornings – 11.00 to 13:15 (the club runs between 11:30 and 13:00).
            </p>

            <p>
                <em>Skills and Qualifications:</em>
                You should be confident with one or more of these coding languages/tools: HTML; Scratch; Ruby.
            </p>

            <p>
                <em>Expenses:</em>
                This is a volunteer project; refreshments provided.
            </p>

            <p>
                <em>Training:</em>
                We provide core training on the different tools used.
            </p>

        </div>

        <div class="g-col-3">

            <h3>Sign Up</h3>

            <!-- <p>
                The best place to get in touch with us is by using this form:
            </p> -->

            <form id="volunteerForm" data-parsley-validate>

                <p class="row">
                    <label for="volunteer_name">
                        <span class="required">Name: </span>
                        <input type="text" id="volunteer_name" name="volunteer_name" placeholder="Simon Garfunkel" required />
                    </label>
                </p>

                <p class="row">
                    <label for="volunteer_email">
                        <span class="required">Email: </span>
                        <input type="email" id="volunteer_email" name="volunteer_email" placeholder="dannysmum@phagedesign.co.uk" required />
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