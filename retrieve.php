<?php
require 'creds.php';
require 'vendor/autoload.php';

/**
 * The code to parse the namespaces was derived from http://blog.sherifmansour.com/?p=302
 */
$rssFeed = 'http://austintx.swagit.com/videos.xml';
$rssString = file_get_contents($rssFeed);

$xml = simplexml_load_string($rssString);
$namespaces = $xml->getNamespaces(true);

$itemArray = $xml->channel->item;
foreach ($itemArray as $item) {
    $name = $item->title;

    $media = $item->children($namespaces['media']);
    $attributes = $media->content->attributes();
    $mediaUrl = $attributes['url'][0];

    if (strlen($mediaUrl)) {

        $op3nvoice = new OP3Nvoice\Bundle($apikey);
        $result = $op3nvoice->create($mediaUrl, $name);

        if ($result) {
            echo "loaded: " . $mediaUrl . "\n";
        }
    }
}