<?php

add_action('wp_ajax_parent_signup', 'parent_signup_callback');
add_action('wp_ajax_nopriv_parent_signup', 'parent_signup_callback');

add_action('wp_ajax_volunteer_signup', 'volunteer_signup_callback');
add_action('wp_ajax_nopriv_volunteer_signup', 'volunteer_signup_callback');

/**
 * Saves the parent signup form submission to the Google sheet backend
 */
function parent_signup_callback() {

    /* Decode submitted data */
    $fields = array(); parse_str($_POST['data'], $fields);

    try {


        $location = get_page_by_title($fields['student_location'], ARRAY_A, 'location');
        $locationDetails = get_fields($location['ID']);

        $success = google_sheet_add_worksheet_row(
            GOOGLE_SHEET_PARENTS_SPREADSHEET_NAME,
            GOOGLE_SHEET_PARENTS_WORKSHEET_NAME,
            array(
                'timestamp' => date('m/d/Y H:i:s'),
                'clublocation' => $fields['student_location'],
                'studentsname' => $fields['student_name'],
                'studentsage' => $fields['student_age'],
                'parentsname' => $fields['parents_name'],
                'parentsemail' => $fields['parents_email'],
                'parentsprimaryphonenumber' => $fields['parents_phone_primary'],
                'parentssecondaryphonenumber' => $fields['parents_phone_secondary'],
                'emergencycontactname' => $fields['emergency_name'],
                'emergencycontactemail' => $fields['emergency_email'],
                'emergencycontactphonenumber' => $fields['emergency_number'],
                'medical-allergies' => '',
                'medical-other' => '',
                'generalnotes' => $fields['additional_notes'],
            )
        );

        wizzie_email_send(
            'W2C3 - Welcome', 
            $fields['parents_email'], 
            'parent-signup.twig',
            array_merge(
                $fields,
                array('location' => $locationDetails)
            )
        );

        wp_die('Many thanks for signing up, we will be in touch soon.');

    } catch (\Exception $e) {

        wizzie_email_send(
            'W2C3 - Error on Parent Signup',
            'sutherland.dave@gmail.com',
            'error.twig', 
            array(
                'errorMessage' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'data' => var_export($fields, true)
            )
        );

        wp_die('There was an error, please try again');
    }
    
}

/**
 * Saves the volunteer signup form submission to the Google sheet backend
 */
function volunteer_signup_callback() {

    /* Decode submitted data */
    $fields = array(); parse_str($_POST['data'], $fields);

    try {

        $success = google_sheet_add_worksheet_row(
            GOOGLE_SHEET_VOLUNTEERS_SPREADSHEET_NAME,
            GOOGLE_SHEET_VOLUNTEERS_WORKSHEET_NAME,
            array(
                'timestamp' => date('m/d/Y H:i:s'),
                'name' => $fields['volunteer_name'], 
                'emailaddress' => $fields['volunteer_email'], 
                'whichlocationwouldyouprefer' => $fields['student_location'],
                'notes' => $fields['additional_notes']
            )
        );

        wizzie_email_send(
            'W2C3 - Volunteering Welcome', 
            $fields['volunteer_email'], 
            'volunteer-signup.twig',
            $fields
        );

        wp_die('Many thanks for signing up, we will be in touch soon.');

    } catch (\Exception $e) {

        wizzie_email_send(
            'W2C3 - Error on Volunteer Signup',
            'sutherland.dave@gmail.com',
            'error.twig', 
            array(
                'errorMessage' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'data' => var_export($fields, true)
            )
        );

        wp_die('There was an error, please try again');
    }


}


