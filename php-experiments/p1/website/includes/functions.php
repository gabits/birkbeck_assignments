<?php
    function multiply ($number_1, $number_2) {
        $calculation = $number_1 * $number_2;
        return $calculation;
    }

    function create_heading($string, $heading_level) {
        $string = trim($string);
        if ($heading_level == 1 or $heading_level == 2) {
            $string = ucwords(strtolower($string));
        }
        else {
            $string = ucfirst(strtolower($string));
        }
        $string = htmlentities($string);
        return "<h$heading_level>$string</h$heading_level>";
    }
?>
