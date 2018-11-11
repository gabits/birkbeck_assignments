<?php
    require_once 'includes/functions.php';

    include 'includes/header.php';
    include 'includes/menu.php';

    $title = "Weather";
    $title = create_heading($title, 2);
    echo $title;

    $directory = opendir('data');
    while (false !== ($file = readdir($directory))) {
        if (is_file($file)) {
            echo "<p>$file</p>";
        };
    };
    closedir($directory);



    include 'includes/footer.php'
?>
