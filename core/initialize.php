<?php
    defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
    defined('SITE_ROOT') ? null : define('SITE_ROOT', DS.'home'.DS.'u454525515'.DS.'domains'.DS.'teammaverickskit.tech'.DS.'public_html'.DS.'restapi');
    defined('INC__PATH') ? null : define('INC_PATH', SITE_ROOT.DS.'includes');
    defined('CORE_PATH') ? null : define('CORE_PATH', SITE_ROOT.DS.'core');

    require_once(INC_PATH.DS.'config.php');
   require_once(SITE_ROOT.DS.'services'.DS.'users.php');
require_once(SITE_ROOT.DS.'services'.DS.'logins.php');
require_once(SITE_ROOT.DS.'services'.DS.'meetings.php');
require_once(SITE_ROOT.DS.'services'.DS.'events.php');
require_once(SITE_ROOT.DS.'services'.DS.'subevents.php');
require_once(SITE_ROOT.DS.'services'.DS.'registrations.php');
require_once(SITE_ROOT.DS.'services'.DS.'attendanceinfo.php');
?>
