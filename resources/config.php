<?php

$config = array(
    "db" => array(
        "mysql" => array(
            "dbname" => "data",
            "username" => "root",
            "password" => "",
            "host" => "localhost"
        )
    )
);

defined("LIBRARY_PATH") or define("LIBRARY_PATH", realpath(dirname(__FILE__) . '/library'));
defined("TEMPLATES_PATH") or define("TEMPLATES_PATH", realpath(dirname(__FILE__) . '/templates'));
defined("SCRIPTS_PATH") or define("SCRIPTS_PATH", realpath(dirname(__FILE__) . '/scripts'));

ini_set("error_reporting", "true");
error_reporting(E_ALL|E_STRCT);

?>
