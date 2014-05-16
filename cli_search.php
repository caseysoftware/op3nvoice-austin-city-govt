<?php
require 'creds.php';
require 'vendor/autoload.php';

$terms = $argv[1];
$terms = preg_replace("/[^A-Za-z0-9|]/", "", $terms);

$bundle = new OP3Nvoice\Bundle($apikey);
$results = $bundle->search($terms);

$search_terms = $results['search_terms'];
$item_results = $results['item_results'];
$items = $results['_links']['items'];

foreach($items as $key => $item)
{
    // displays the bundle id
    echo $item['href'] . "\n";

    // displays the time offsets for each of the search hits
    $hits = $item_results[0]['term_results'][0]['matches'][0]['hits'];
    foreach ($hits as $ahit)
    {
        echo $ahit['start'] . ' -- ' . $ahit['end'] . "\n";
    }
}