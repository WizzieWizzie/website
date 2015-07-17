<?php

/**
 * lib/google-sheet.php
 *
 * @package    madebydavid/wizzie-theme
 * @author     David Sutherland <sutherland.dave@gmail.com>
 * @link       https://bitbucket.org/madebydavid/wizziewizziewptheme
 */

if (!defined('GOOGLE_SHEET_ACCOUNT_EMAIL')) 
    define('GOOGLE_SHEET_ACCOUNT_EMAIL', '***REMOVED***');

if (!defined('GOOGLE_SHEET_ACCOUNT_KEYFILE')) 
    define('GOOGLE_SHEET_ACCOUNT_KEYFILE', WP_CONTENT_DIR . '***REMOVED***');

if (!defined('GOOGLE_SHEET_ACCOUNT_SCOPE')) 
    define('GOOGLE_SHEET_ACCOUNT_SCOPE', 'https://spreadsheets.google.com/feeds');

if (!defined('GOOGLE_SHEET_PARENTS_SPREADSHEET_NAME')) 
    define('GOOGLE_SHEET_PARENTS_SPREADSHEET_NAME', '***REMOVED***');

if (!defined('GOOGLE_SHEET_PARENTS_WORKSHEET_NAME')) 
    define('GOOGLE_SHEET_PARENTS_WORKSHEET_NAME', '***REMOVED***');

if (!defined('GOOGLE_SHEET_VOLUNTEERS_SPREADSHEET_NAME'))
    define('GOOGLE_SHEET_VOLUNTEERS_SPREADSHEET_NAME', '***REMOVED***');

if (!defined('GOOGLE_SHEET_VOLUNTEERS_WORKSHEET_NAME'))
    define('GOOGLE_SHEET_VOLUNTEERS_WORKSHEET_NAME', '***REMOVED***');

require_once WP_CONTENT_DIR . '/../vendor/autoload.php';

use Google\Spreadsheet\DefaultServiceRequest;
use Google\Spreadsheet\ServiceRequestFactory;

/**
 * Adds a row to a Google worksheet
 *
 * @param string    $sheetName      The name of the Sheet we are adding to
 * @param string    $worksheetName  The name of the Worksheet in the sheet
 * @param array     $data           The row to add - indexed by column name.
 *
 * @return boolean
 *
 */
function google_sheet_add_worksheet_row($sheetName, $worksheetName, array $data) {

    /* Retrieve the Access Token using the Service Access Credentials */
    $client = new Google_Client();
    $client->setApplicationName('Wizzie Wizzie Site');
    $service = new Google_Service_Drive($client);

    $cred = new Google_Auth_AssertionCredentials(
        GOOGLE_SHEET_ACCOUNT_EMAIL,
        array(GOOGLE_SHEET_ACCOUNT_SCOPE),
        file_get_contents(GOOGLE_SHEET_ACCOUNT_KEYFILE)
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
    $spreadsheet = $spreadsheetFeed->getByTitle($sheetName);

    /* get the worksheet and handle to add rows */
    $worksheetFeed = $spreadsheet->getWorksheets();
    $worksheet = $worksheetFeed->getByTitle($worksheetName);
    $listFeed = $worksheet->getListFeed();

    $listFeed->insert($data);
    
    return true;

}