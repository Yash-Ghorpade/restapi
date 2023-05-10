<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


use userControl\userController;
use loginControl\loginController;
use meetingControl\meetingController;
use eventControl\eventController;
use subeventControl\subeventController;
use registrationControl\registrationController;
use attendanceinfoControl\attendanceinfoController;

include_once('../restapi/core/initialize.php');

require_once(SITE_ROOT.DS.'services'.DS.'users.php');
require_once(SITE_ROOT.DS.'services'.DS.'logins.php');
require_once(SITE_ROOT.DS.'services'.DS.'meetings.php');
require_once(SITE_ROOT.DS.'services'.DS.'events.php');
require_once(SITE_ROOT.DS.'services'.DS.'subevents.php');
require_once(SITE_ROOT.DS.'services'.DS.'registrations.php');
require_once(SITE_ROOT.DS.'services'.DS.'attendanceinfo.php');

require_once(SITE_ROOT.DS.'controllers'.DS.'userController.php');
require_once(SITE_ROOT.DS.'controllers'.DS.'loginController.php');
require_once(SITE_ROOT.DS.'controllers'.DS.'meetingController.php');
require_once(SITE_ROOT.DS.'controllers'.DS.'eventController.php');
require_once(SITE_ROOT.DS.'controllers'.DS.'subeventController.php');
require_once(SITE_ROOT.DS.'controllers'.DS.'registrationController.php');
require_once(SITE_ROOT.DS.'controllers'.DS.'attendanceinfoController.php');


    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $uri = explode( '/', $uri );

    switch($uri[3])
    {
        case 'users': 
            $user_srno = null;
            if(isset($uri[4]))
            {
                $user_srno = (int) $uri[4];
            }
            $requestMethod = $_SERVER['REQUEST_METHOD'];
            $controller = new userController($db, $requestMethod, $user_srno);
            $result = $controller->processRequestForUsers();
            echo $result;
            break;
            
        case 'logins':
            $login_srno = null;
            if(isset($uri[4]))
            {
                $login_srno = (int) $uri[4];
            }
            $requestMethod = $_SERVER['REQUEST_METHOD'];
            $controller = new loginController($db, $requestMethod, $login_srno);
            $result = $controller->processRequestForLogins();
            echo $result;
            break;

        case 'meetings':
            $meeting_srno = null;
            if(isset($uri[4]))
            {
                $meeting_srno = (int) $uri[4];
            }
            $requestMethod = $_SERVER['REQUEST_METHOD'];
            $controller = new meetingController($db, $requestMethod, $meeting_srno);
            $result = $controller->processRequestForMeetings();
            echo $result;
            break;
            
        case 'events':
            $event_srno = null;
            if(isset($uri[4]))
            {
                $event_srno = (int) $uri[4];
            }
            $requestMethod = $_SERVER['REQUEST_METHOD'];
            $controller = new eventController($db, $requestMethod, $event_srno);
            $result = $controller->processRequestForEvents();
            echo $result;
            break;

        case 'subevents':
            $subevent_srno = null;
            if(isset($uri[4]))
            {
                $subevent_srno = (int) $uri[4];
            }
            $requestMethod = $_SERVER['REQUEST_METHOD'];
            $controller = new subeventController($db, $requestMethod, $subevent_srno);
            $result = $controller->processRequestForSubevents();
            echo $result;
            break;

        case 'registrations':
            $registration_srno = null;
            if(isset($uri[4]))
            {
                $registration_srno = (int) $uri[4];
            }
            $requestMethod = $_SERVER['REQUEST_METHOD'];
            $controller = new registrationController($db, $requestMethod, $registration_srno);
            $result = $controller->processRequestForRegistrations();
            echo $result;
            break;
            
        case 'attendanceinfo':
            $info_srno = null;
            if(isset($uri[4]))
            {
                $info_srno = (int) $uri[4];
            }
            $requestMethod = $_SERVER['REQUEST_METHOD'];
            $controller = new attendanceinfoController($db, $requestMethod, $info_srno);
            $result = $controller->processRequestForAttendanceinfo();
            echo $result;
            break;

        default:
            header("HTTP/1.1 404 Not Found");
            exit();
    }
?>