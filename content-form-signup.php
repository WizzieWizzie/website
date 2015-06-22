<section class="form-generic signUpForm">

    <div class="g-row">

        <div class="g-col-3">
            <h3><?php the_field('headline'); ?></h3>
            <?php the_field('intro'); ?>
        </div>

        <form id="signUpForm" data-parsley-validate>

            <div class="g-col-3">

                <h4 class="form">1. Student Details</h4>

                <!-- student_location
                     student_name
                     student_age -->

                <p class="row">
                    <label for="student_location">
                        <span class="required">Club Location: </span>
                        <select id="student_location" name="student_location" required>
                            <option value="">Please select a location</option>
                            <?php
                                echo form_get_location_options();
                            ?>
                        </select>
                    </label>
                </p>

                <p class="row">
                    <label for="student_name">
                        <span class="required">Students Name: </span>
                        <input type="text" id="student_name" name="student_name" placeholder="Simon" required />
                    </label>
                </p>

                <p class="row">
                    <label for="student_age">
                        <span class="required">Students Age: </span>
                        <select id="student_age" name="student_age" required>
                            <option value="">Please select an age</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                        </select>
                    </label>
                </p>

                <h4 class="form">2. Parent Details</h4>

                <!-- parents_name
                     parents_email
                     parents_phone_primary
                     parents_phone_secondary -->

                <p class="row">
                    <label for="parents_name">
                        <span class="required">Parent's Name: </span>
                        <input type="text" id="parents_name" name="parents_name" placeholder="Betty" required />
                    </label>
                </p>

                <p class="row">
                    <label for="parents_email">
                        <span class="required">Parent's Email: </span>
                        <input type="email" id="parents_email" name="parents_email" placeholder="dannysmum@phagedesign.co.uk" required />
                    </label>
                </p>

                <p class="row">
                    <label for="parents_phone_primary">
                        <span class="required">Parent's Phone No &mdash; Primary: </span>
                        <input type="text" id="parents_phone_primary" name="parents_phone_primary" placeholder="Please include country-code" required />
                    </label>
                </p>

                <p class="row">
                    <label for="parents_phone_secondary">
                        <span class="required">Parent's Phone No &mdash; Secondary: </span>
                        <input type="text" id="parents_phone_secondary" name="parents_phone_secondary" placeholder="Please include country-code" required />
                    </label>
                </p>

            </div>

            <div class="g-col-3">

                <h4 class="form">3. Emergency Contact</h4>

                <!-- emergency_name
                     emergency_email
                     emergency_number -->

                <p class="row">
                    <label for="emergency_name">
                        <span class="required">Emergency Contact Name: </span>
                        <input type="text" id="emergency_name" name="emergency_name" placeholder="Betty" required />
                    </label>
                </p>

                <p class="row">
                    <label for="emergency_email">
                        <span class="required">Emergency Contact Email: </span>
                        <input type="email" id="emergency_email" name="emergency_email" placeholder="dannysdad@phagedesign.co.uk" required />
                    </label>
                </p>

                <p class="row">
                    <label for="emergency_number">
                        <span class="required">Emergency Contact Number: </span>
                        <input type="text" id="emergency_number" name="emergency_number" placeholder="+44 XXX" required />
                    </label>
                </p>

                <h4 class="form">4. additional notes</h4>

                <!--
                    additional_notes 
                -->

                <p class="row">
                    <label for="additional_notes">
                        <span class="required">Medical - Allergies or Other: </span>
                        <textarea rows="4" cols="50" id="additional_notes" name="additional_notes" placeholder="Please outline here"></textarea>
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

            </div>

        </form>

    </div>

</div>