<?php

define('TERM_TYPES', array('T1', 'T2', 'T3'));
define('ERROR_PATTERN', ' :ERROR');
define(
    'MODULE_CODES',
    array(
        'PP' => 'Problem Solving for Programming',
        'P1' => 'Web Programming using PHP',
        'DT' => 'Introduction to Database Technology',
    )
);


function clean_trailing_whitespaces_in_data_array($data_array) {
    for ($index = 0; $index < count($data_array); $index++) {
        $data_array[$index] = trim($data_array[$index]);
    };
    return $data_array;
};


function display_data_from_array($array_data) {
    echo "<div>";
    foreach ($array_data as $key => $value) {
        echo "<p><b>$key</b>: $value</p>";
    };
    echo "</div>";
};


function validate_marked_date($marked_date) {
    $error = $marked_date . ERROR_PATTERN;

    if ($marked_date == '') {
        $marked_date = $error;
    } elseif (!strpbrk($marked_date, "/")) {
        // There is no slash on the marked date
        $marked_date = $error;
    } else {
        $date = explode("/", $marked_date);

        $day = (int)$date[0];
        $month = (int)$date[1];
        $year = (int)$date[2];

        if ($day < 0 or $day > 31 or $month < 0 or $month > 12 or $year < 0) {
            $marked_date = $error;
        };
    };
    return $marked_date;
};


function validate_module_title($module_title, $module_code) {
    $is_registered = false;

    $code_ending_str = substr($module_code, -1, -8);
    if ($code_ending_str == ERROR_PATTERN) {
        $is_registered = false;
    } else {
        foreach (MODULE_CODES as $registered_code => $registered_title) {
            if (MODULE_CODES[$registered_code] == $module_title) {
                $is_registered = true;
            };
        };
    };

    if (!$is_registered) {
        $module_title = $module_title . ERROR_PATTERN;
    };
    return $module_title;
};


function validate_module_code($module_code) {
    $error = $module_code . ERROR_PATTERN;

    if (strlen($module_code) != 8) {
        // The module code does not have the expected size
        $module_code = $error;
    };

    $module_code = strtoupper($module_code);
    $starting_module_code = substr($module_code, 0, 2);
    $term_type = substr($module_code, 6, 2);
    $module_year = substr($module_code, 2, 4);

    if (!array_key_exists($starting_module_code, MODULE_CODES)) {
        // The module code is not registered
        $module_code = $error;
    } elseif (!ctype_digit($module_year)) {
        // The 4 middle digits are not a year
        $module_code = $error;
    } elseif (!in_array($term_type, TERM_TYPES)) {
        // The last two digitis are not term types
        $module_code = $error;
    };
    return $module_code;
};


function validate_module_tutor($module_tutor) {
    if ($module_tutor == '') {
        $module_tutor = $module_tutor . ERROR_PATTERN;
    };
    return $module_tutor;
};


function get_module_header($file_name, $module_header) {
    // The module headers follow this structure and order:
    //
    // File name: <file_name>
    // Module code: <module_code>
    // Module title: <module_title>
    // Tutor: <tutor>
    // Marked date: <dd/mm/yyyy>

    $headers = explode(",", $module_header);
    $headers = clean_trailing_whitespaces_in_data_array($headers);

    $module_code = validate_module_code($headers[0]);
    $module_title = validate_module_title($headers[1], $module_code);
    $tutor = validate_module_tutor($headers[2]);
    $marked_date = validate_marked_date($headers[3]);

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
        // Split the line by comma and store each value as an element of an array
        $student_info = explode(",", $line);
        // Clean the data stored in this array to make sure whitespaces will not
        // affect further calculations
        $student_info = clean_trailing_whitespaces_in_data_array($student_info);
        $student_id = $student_info[0];
        $mark = $student_info[1];
        $student_marks[$student_id] = $mark;
    };
    return $student_marks;
};


function validate_student_marks($raw_student_marks) {
    // Copy the data to a new array

    $valid_student_marks = array();
    foreach ($raw_student_marks as $student_id => $mark) {
        if (strlen($student_id) != 8 or !ctype_digit($student_id)) {
            // If the student ID is not composed of 8 digits or if they are not all numeric
            $raw_student_marks[$student_id] = $mark . "Incorrect student ID: not included";
        } elseif ((int)$mark < 0 or (int)$mark > 100 or !ctype_digit($mark)) {
            // If the mark is not between 0 and 100 or if it is not entirely numeric
            $raw_student_marks[$student_id] = $mark . "Incorrect mark: not included";
        } else {
            // The student id and mark is correct so we can copy it to the array for valid data
            $valid_student_marks[$student_id] = $mark;
        };
    };
    return $valid_student_marks;
};

?>
