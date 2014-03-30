WashDOT
=======

A library for fetching Washington State Department of Transportation data, written in PHP.

This library is based on the information provided on [Washington State DOT - Traveler Information API](http://www.wsdot.wa.gov/traffic/api/). All available documentation is located there, and this is where you can request an API key (it's at the very bottom of the page).

Documentation:
==============

Border Crossings
----------------

Commercial Vehicle Restrictions
-------------------------------

Highway Alerts
--------------

Highway Cameras
---------------

Mountain Pass conditions
------------------------

Traffic Flow
------------

Travel Times
------------

Ferry Fares
-----------

Ferry Schedule
--------------

```php
<?php

// Config:
define('API_ACCESS_CODE', 'TEST-CODE');
define('API_NAMESPACE', 'http://www.wsdot.wa.gov/ferries/schedule/');
define('API_WSDL', 'http://b2b.wsdot.wa.gov/ferries/schedule/Default.asmx?WSDL');

$headerAccessCode = array('APIAccessCode' => API_ACCESS_CODE);
$headerAccessCode = new \SoapHeader(API_NAMESPACE, 'APIAccessHeader', $headerAccessCode);

$client = new \SoapClient(API_WSDL, array(
  'trace' => true,
));
$client->__setSoapHeaders(array(
  $headerAccessCode
));
 
// Successful Responses:
$client->GetActiveScheduledSeasons();
$client->GetAllAlerts();
$client->GetAllTimeAdj();
$client->GetCacheFlushDate();
$client->GetValidDateRange();

// Failing Responses:
$client->GetAllRouteDetails();
$client->GetAllRoutes();
$client->GetAllRoutesHavingServiceDisruptions();
$client->GetAllSchedRoutes();
$client->GetAllTerminals();
$client->GetAllTerminalsAndMates();
$client->GetRouteDetail();
$client->GetRouteDetailsByTerminalCombo();
$client->GetRoutesByTerminalCombo();
$client->GetSchedRoutesByScheduledSeason();
$client->GetSchedSailingsBySchedRoute();
$client->GetScheduleByRoute();
$client->GetScheduleByTerminalCombo();
$client->GetTerminalMates();
$client->GetTimeAdjByRoute();
$client->GetTimeAdjBySchedRoute();
$client->GetTodaysScheduleByRoute();
$client->GetTodaysScheduleByTerminalCombo();
```

Ferry Terminals
---------------
