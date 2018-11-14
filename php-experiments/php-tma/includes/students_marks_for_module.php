<?php

require 'files_processor.php';


function clean_trailing_whitespaces_in_array_data($data_array) {
    for ($index = 0; $index < count($array); $index++) {
        $data_array[$index] = trim($data_array[$index]);
    };
    return $data_array;
};


function get_module_header($module_header) {
    // The module headers follow this structure and order:
    //
    // File name: <file_name>
    // Module code: <module_code>
    // Module title: <module_title>
    // Tutor: <tutor>
    // Marked date: <dd/mm/yyyy>

    function validate_date($marked_date) {
        $error = $marked_date . ":ERROR";

        $date = explode("/", $marked_date);
        $date = str_replace("/", "", $date);

        $day = (int)$date[:2];
        $month = (int)$date[2:4];
        $year = (int)$date[4:8];

        if (strlen($date) != 8) {
            $marked_date = $error;
        } elseif ($day < 0 or $day > 31 or $month < 0 or $month > 12 or $year < 0) {
            $marked_date = $error;
        };
        return $marked_date;
    }

    function validate_module_title($module_title, $module_code) {
        if (MODULE_CODES[$module_code][:2] != $module_title or $module_code[:-6] == ":ERROR") {
            $module_title = $module_title . ":ERROR";
            return $module_title;
        };
    };

    function validate_module_code($module_code) {
        $module_code = strtoupper($module_code);
        $error = $module_code . ":ERROR";
        if (strlen($module_code) != 8) {
            // The module code does not have the expected size
            $module_code = $error;
        } elseif (!array_key_exists($module_code[:2], MODULE_CODES)) {
            // The module code is not registered
            $module_code = $error;
        } elseif (!ctype_digit($module_code[2:7])) {
            // The 4 middle digits are not a year
            $module_code = $error;
        } elseif (!in_array($module_code[:-2], TERM_TYPES)) {
            // The last two digitis are not term types
            $module_code = $error;
        };
        return $module_code;
    };

    MODULE_CODES = array(
        'PP' => 'Problem Solving for Programming',
        'P1' => 'Web Programming using PHP',
        'DT' => 'Introduction to Database Technology',
    );
    TERM_TYPES = array('T1', 'T2', 'T3');

    $headers = explode(",", $module_header);
    $headers = clean_trailing_whitespaces_in_array_data($headers);

    $file_name = $headers[0];
    $module_code = validate_module_code($headers[1]);
    $module_title = validate_module_title($headers[2], $module_code);
    $tutor = validate_module_tutot($headers[3]);
    $marked_date = validate_marked_date($headers[4]);

    $validated_module_header = array(
        'File name' => $file_name,
        'Module code' => $module_code,
        'Module title' => $module_title,
        'Tutor' => $tutor,
        'Marked date' => $marked_date,
    );
    return $validated_module_header;
};


function get_student_marks($file_body) {
    // Returns an array with the data retrieved, where the keys represent
    // the student IDs and the values indicate their marks.
    $student_marks = array();
    foreach ($file_body as $line) {
        $student_info = explode(",", $line);
        $student_id = $student_info[0];
        $mark = $student_info[1];
        $student_marks[$student_id] = $mark;
    }
    return $student_marks;
};


function

?>
