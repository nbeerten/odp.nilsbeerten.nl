<?php
    //* Get url query: example.com?[$id]
    echo parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
    echo $_SERVER['REQUEST_URI'];
?>