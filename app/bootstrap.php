<?php
    // Loading config.
    require_once('config/config.php');

    // Autoloading core libraries.
    spl_autoload_register(function($className){
        require_once('libraries/'. $className .'.php');
    });
?>