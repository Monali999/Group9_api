<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
ini_set('error_reporting', 0);
error_reporting(E_ALL);
ini_set('memory_limit','50000M');
ini_set('max_execution_time', 5000000);
ini_set('upload_max_filesize', '500000M');
ini_set('post_max_size', '500000M');


date_default_timezone_set('Canada/Eastern');
$tz_object = new DateTimeZone('Canada/Eastern');
$datetime = new DateTime();
$datetime->setTimezone($tz_object);
setlocale(LC_MONETARY, 'en_US');
define("DATEX", $datetime->format('Y-m-d'));
define("COPYRIGHT", "&copy; iprofessor.ca ".$datetime->format('Y'));
define("DATE", $datetime->format('Y-m-d'));
define("TIME", $datetime->format('h:i:s'));
define("DATETIME", $datetime->format('Y-m-d h:i:s'));
define("DEBUG", 0);


?>