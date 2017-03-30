<?php
/**
 * configuration class
**/
class Config
{
    const DEBUG = false;

    const BASE_URL = "http://dev.journeesportive.ch/";

    const NO_VHOST = array(
        "activated" => false,
        "urlSub" => 1
    );

    const PDO_CONFIG = array(
        "host" => "localhost",
        "user" => "m151",
        "password" => "12345",
        "schema" => "journeesportive"
    );
}
?>
