op3nvoice-austin-city-govt
==========================

This is a project to retrieve and parse the video feed for the Austin City Govt using the OP3Nvoice API which provides video and audio search.

## Using this script

While this only works with the City of Austin video feed, building a similar thing for other cities/feeds should be pretty trivial.

1. Within the root folder of the project run:
 ```bash
 composer install
 ```
1. Run the retrieve.php via a web browser or the command line. That should load all of the media files directly into OP3Nvoice.
 ```bash
 php retrieve.php
 ```
1. Confirm that the files were loaded by running list.php
 ```bash
 php list.php
 ```


## Todo

*  ~~parse video feed to get the mp4~~
*  ~~load each mp4 into OP3Nvoice~~
*  build a search form
*  display search results
*  embed the video player

## Notes

*  One gotcha to be aware of is related to XML namespaces. Dig into retrieve.php to see the approach I took.