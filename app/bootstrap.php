<?php
    // Loading config.
    require_once('config/config.php');

    //Loading helpers.
    require_once('helpers/url_helper.php');
    require_once('helpers/session_helper.php');

    // Autoloading core libraries.
    spl_autoload_register(function($className){
        require_once('libraries/'. $className .'.php');
    });
?>