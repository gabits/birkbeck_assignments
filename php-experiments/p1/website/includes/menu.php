<?php
    $menu = array(
        'index.php' => 'Home',
        'people.php' => 'People',
        'weather.php' => 'Weather',
    );
    echo '<ul>';
    foreach($menu as $file => $title) {
        echo "<li><a href=$file>$title</a></li>";
    }
    echo '</ul>';
?>
