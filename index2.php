<?php
error_reporting(-1); ini_set('display_errors', '1');
// connect
$m = new MongoClient();

// select a database
$db = $m->comedy;

// select a collection (analogous to a relational database's table)
$collection = $db->cartoons;

// add a record
$document = array( "title" => "Calvin and Hobbes", "author" => "Bill Watterson" );
$collection->insert($document);

// add another record, with a different "shape"
$document = array( "title" => "XKCD", "online" => true );
$collection->insert($document);

// find everything in the collection
$sweetQuery = array('Details.Taste' => 'Sweet');
$cursor = $collection->find($user);

// iterate through the results
foreach ($cursor as $document) {
    echo $document["title"] . "\n";
}
?>
