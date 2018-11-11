<?php
    include 'includes/header.php';
    include 'includes/menu.php';

    $title = 'tHe Last & fiNal crusade';
    $id = 'AN-454453';

    function clean_and_display_title($title) {
        $title = trim($title);
        $title = ucwords(strtolower($title));
        $title = htmlentities($title);
        echo "<p>$title</p>";
    }
    clean_and_display_title($title);

    function check_if_id_is_valid ($id) {
        $irregular_separators = array('.', '/');
        $id = str_replace($irregular_separators, '-', $id);

        $prefix_and_suffix = explode('-', $id);
        $prefix = $prefix_and_suffix[0];
        $suffix = $prefix_and_suffix[1];

        if (ctype_alpha($prefix) && ctype_digit($suffix)) {
            $valid_or_not = 'VALID';
        } else {
            $valid_or_not = 'INVALID';
        };

        echo "<p>\$id = $id; $valid_or_not</p>";
    };

    check_if_id_is_valid($id);

    include 'includes/footer.php';
?>
