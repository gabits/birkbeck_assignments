<?php
    include 'includes/header.php';
    include 'includes/menu.php';

    function multiply ($number_1, $number_2) {
        $calculation = $number_1 * $number_2;
        return $calculation;
    }

    function create_heading($string, $heading_level) {
        return "<h$heading_level>$string</h$heading_level>";
    }

    $title = create_heading("Welcome", 2);
    echo $title;

    $calculation = multiply(34, 89);
    echo "<p>$calculation<p>";
    $calculation = multiply(57, 13);
    echo "<p>$calculation<p>";
?>

<?php include 'includes/footer.php' ?>
