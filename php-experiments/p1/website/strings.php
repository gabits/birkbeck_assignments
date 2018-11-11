<?php
    require_once 'includes/functions.php';

    include 'includes/header.php';
    include 'includes/menu.php';

    $title = 'tHe Last & fiNal crusade';
    $id = 'AN-454453';

    $title = create_heading($title, 2);
    echo $title;

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
