<?php
    require_once 'includes/functions.php';

    include 'includes/header.php';
    include 'includes/menu.php';

    $title = "People";
    $title = create_heading($title, 2);
    echo $title;


    $people = array();
    $list_of_people = fopen('people.txt', 'r');
    while (!feof($list_of_people)) {
        $person_data = fgets($list_of_people);
        $person_details = explode(':', $person_data);
        // Append the details array to the main people array
        $people[] = $person_details;
    }
    fclose($list_of_people);

    foreach ($people as $person) {
        echo "<p>$person[0] is $person[1], ";
        echo "is $person[2] years old and is currently $person[3].</p>";
    };

include 'includes/footer.php' ?>
