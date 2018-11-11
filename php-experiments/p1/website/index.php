<?php
    require_once 'includes/functions.php';

    include 'includes/header.php';
    include 'includes/menu.php';

    $title = "Welcome";
    $title = create_heading($title, 2);
    echo $title;

    $calculation = multiply(34, 89);
    echo "<p>$calculation<p>";
    $calculation = multiply(57, 13);
    echo "<p>$calculation<p>";
?>

<?php include 'includes/footer.php' ?>
