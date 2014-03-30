<?php

date_default_timezone_set('America/Los_Angeles');

$loader = require "../vendor/autoload.php";

define('API_ACCESS_CODE', 'TEST-CODE');
define('API_NAMESPACE', 'http://www.wsdot.wa.gov/ferries/schedule/');
define('API_WSDL', 'http://b2b.wsdot.wa.gov/ferries/schedule/Default.asmx?WSDL');

$headerAccessCode = array('APIAccessCode' => API_ACCESS_CODE);
$headerAccessCode = new \SoapHeader(API_NAMESPACE, 'APIAccessHeader', $headerAccessCode);

$client = new \SoapClient(API_WSDL, array(
  'trace' => true,
));

try {
  $client->__setSoapHeaders(array(
    $headerAccessCode
  ));

  $data = $client->GetActiveScheduledSeasons();
  // $data = $client->GetAllAlerts();
  // $data = $client->GetAllTimeAdj();
  // $data = $client->GetCacheFlushDate();
  // $data = $client->GetValidDateRange();

  // $tripDate = array(
  //   'GetAllRouteDetails' => array(
  //     'TripDateMsg' => array(
  //       'TripDate' => date('c')
  //     )
  //   )
  // );
  // $data = $client->GetAllRouteDetails($tripDate); // ERROR, TripDateMsg, TripDate
  // $data = $client->GetAllRouteDetails(date('c')); // ERROR, TripDateMsg, TripDate

  // $data = $client->GetAllRoutes(); // ERROR
  // $data = $client->GetAllRoutesHavingServiceDisruptions(); // ERROR
  // $data = $client->GetAllSchedRoutes(); // ERROR
  // $data = $client->GetAllTerminals(); // ERROR
  // $data = $client->GetAllTerminalsAndMates(); // ERROR
  // $data = $client->GetRouteDetail(); // ERROR
  // $data = $client->GetRouteDetailsByTerminalCombo(); // ERROR
  // $data = $client->GetRoutesByTerminalCombo(); // ERROR
  // $data = $client->GetSchedRoutesByScheduledSeason(); // ERROR
  // $data = $client->GetSchedSailingsBySchedRoute(); // ERROR
  // $data = $client->GetScheduleByRoute(); // ERROR
  // $data = $client->GetScheduleByTerminalCombo(); // ERROR
  // $data = $client->GetTerminalMates(); // ERROR
  // $data = $client->GetTimeAdjByRoute(); // ERROR
  // $data = $client->GetTimeAdjBySchedRoute(); // ERROR
  // $data = $client->GetTodaysScheduleByRoute(); // ERROR
  // $data = $client->GetTodaysScheduleByTerminalCombo(); // ERROR
} catch (Exception $e) {
  $data = $e->getMessage();
}

header('Content-type: application/json');
print json_encode($data, JSON_PRETTY_PRINT);
