<?php
    $db_user = "u454525515_mark";
    $db_password = "Mark@restapi123";
    $host = 'localhost';
    $db_name = "u454525515_restapi";

    $db = new PDO('mysql:host='.$host.'; dbname='.$db_name.';charset=utf8', $db_user, $db_password);

    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    define('APP_NAME', 'API TESTING');
?>