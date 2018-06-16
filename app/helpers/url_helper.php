<?php
    // Page redirect function.
    function redirect($location) {
        header('location: ' . URL_ROOT . '/' . $location);
    }
?>