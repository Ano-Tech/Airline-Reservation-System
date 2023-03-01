<?php

// Connect to the database
$db = new mysqli('localhost', 'root', '', 'airline_reservation');

// Check for errors
if ($db->connect_error) {
    die('Connect Error (' . $db->connect_errno . ') ' . $db->connect_error);
}

// Create the query
$query = 'SELECT * FROM jet_details WHERE active = "Yes" OR active = "No"';

// Execute the query
$result = $db->query($query);

// Check for errors
if (!$result) {
    die('Query Error (' . $db->errno . ') ' . $db->error);
}

// Print the results
while ($row = $result->fetch_assoc()) {
    echo $row['jet_type'] . ': ' . $row['active'] . "\n";
}

// Close the connection
$db->close();

