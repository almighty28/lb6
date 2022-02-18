<?php
    require_once __DIR__ . '/vendor/autoload.php';
    $collection_client=(new MongoDB\Client)->dbforlab->client;
    $collection_seanse=(new MongoDB\Client)->dbforlab->seanse;

?>