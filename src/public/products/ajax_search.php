<?php
if(!is_ajax_request()) {
    exit;
}

$query = isset($_GET['q']) ? $_GET['q'] : '';
$choices= [scake,stckae,smcake];
//$choices = file('includes/us_passenger_trains.txt', FILE_IGNORE_NEW_LINES);
$matches = search($query, $choices);


// In real world, this would likely search a database, or use
// a search program like Solr, Elastic Search, Sphinx, etc.
function search($query, $choices) {
    $matches = [];

    $d_query = strtolower($query);

    foreach($choices as $choice) {
        // Downcase both strings for case-insensitive search
        $d_choice = strtolower($choice);
        if(str_starts_with($d_choice, $d_query)) {
            $matches[] = $choice;
        }
    }

    return $matches;
}
