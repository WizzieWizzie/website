<?php

require_once WP_CONTENT_DIR . '/../vendor/autoload.php';

if (!defined('SHEET_ACCOUNT_EMAIL')) define('SHEET_ACCOUNT_EMAIL', '***REMOVED***');
if (!defined('SHEET_ACCOUNT_KEYFILE')) define('SHEET_ACCOUNT_KEYFILE', WP_CONTENT_DIR . '***REMOVED***');
if (!defined('SHEET_ACCOUNT_SCOPE')) define('SHEET_ACCOUNT_SCOPE', 'https://spreadsheets.google.com/feeds');

if (!defined('SHEET_SPREADSHEET_NAME')) define('SHEET_SPREADSHEET_NAME', '***REMOVED***');
if (!defined('SHEET_WORKSHEET_NAME')) define('SHEET_WORKSHEET_NAME', '***REMOVED***');

use Google\Spreadsheet\DefaultServiceRequest;
use Google\Spreadsheet\ServiceRequestFactory;

add_action('wp_ajax_parent_signup', 'parent_signup_callback');
add_action('wp_ajax_nopriv_parent_signup', 'parent_signup_callback');

/**
 * Saves the parent signup form submission to the Google sheet backend
 */
function parent_signup_callback() {

    /* Decode submitted data */
    $fields = array(); parse_str($_POST['data'], $fields);

    /* Retrieve the Access Token using the Service Access Credentials */
    $client = new Google_Client();
    $client->setApplicationName('Wizzie Wizzie Site');
    $service = new Google_Service_Drive($client);

    $cred = new Google_Auth_AssertionCredentials(
        SHEET_ACCOUNT_EMAIL,
        array(SHEET_ACCOUNT_SCOPE),
        file_get_contents(SHEET_ACCOUNT_KEYFILE)
    );

    $client->setAssertionCredentials($cred);
    if ($client->getAuth()->isAccessTokenExpired()) {
        $client->getAuth()->refreshTokenWithAssertion($cred);
    }

    /* Intialise the Spreadsheet service using the access token */
    $serviceToken = json_decode($client->getAccessToken());
    $serviceRequest = new DefaultServiceRequest($serviceToken->access_token);
    ServiceRequestFactory::setInstance($serviceRequest);

    /* get the sheet */
    $spreadsheetService = new Google\Spreadsheet\SpreadsheetService();
    $spreadsheetFeed = $spreadsheetService->getSpreadsheets();
    $spreadsheet = $spreadsheetFeed->getByTitle(SHEET_SPREADSHEET_NAME);

    /* get the worksheet and handle to add rows */
    $worksheetFeed = $spreadsheet->getWorksheets();
    $worksheet = $worksheetFeed->getByTitle(SHEET_WORKSHEET_NAME);
    $listFeed = $worksheet->getListFeed();

    /* add the row */
    $listFeed->insert(array(
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
    ));

    echo('Many thanks for signing up, we will be in touch soon.');
    wp_die();
}