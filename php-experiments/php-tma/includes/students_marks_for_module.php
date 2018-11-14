<?php

require 'files_processor.php';
include 'functions.php'


function clean_trailing_whitespaces_in_data_array($data_array) {
    //
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
    $headers = clean_trailing_whitespaces_in_data_array($headers);

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
        // Split the line by comma and store each value as an element of an array
        $student_info = explode(",", $line);
        // Clean the data stored in this array to make sure whitespaces will not
        // affect further calculations
        $student_info = clean_trailing_whitespaces_in_data_array($student_info);
        $student_id = $student_info[0];
        $mark = $student_info[1];
        $student_marks[$student_id] = $mark;
    }
    return $student_marks;
};


function validate_student_marks($raw_student_marks) {
    foreach ($raw_student_marks as $student_id => $mark) {
        // Copy the data to a new array
        $valid_student_marks = array();
        if (strlen($student_id) != 8 or !ctype_digit($student_id)){
            // If the student ID is not composed of 8 digits or if they are not all numeric
            $raw_student_marks[$student_id] => $mark . "Incorrect student ID: not included";
        } elseif ((int)$mark < 0 or (int)$mark > 100 or !ctype_digit($mark)) {
            // If the mark is not between 0 and 100 or if it is not entirely numeric
            $raw_student_marks[$student_id] => $mark . "Incorrect mark: not included";
        } else {
            // The student id and mark is correct so we can copy it to the array for valid data
            $valid_student_marks[$student_id] => $mark;
        }
    return $valid_student_marks;
    };
};


function analyse_student_marks($valid_student_marks) {
    $mean = mmmr($valid_student_marks, $output='mean');
    $mode = mmmr($valid_student_marks, $output='mode');
    $range = mmmr($valid_student_marks, $output='range');

    // The amount of valid marks we have stored in the array will indicate
    // how many students have been included in the mark calculations.
    $number_of_students = count($valid_student_marks);

    $statistical_analysis = array(
        'Mean' => $mean,
        'Mode' => $mode,
        'Range' => $range,
        '# of students' => $number_of_students,
    )
    return $statistical_analysis
};


function calculate_grade_distribution($valid_student_marks) {
    $distinction = 0;
    $merit = 0;
    $pass = 0;
    $fail = 0;

    foreach ($valid_student_marks as $mark) {
        if $mark >= 70 {
            $distinction++;
        } elseif $mark >= 60 {
            $merit++;
        } elseif $mark >= 40 {
            $pass++;
        } else {
            $fail++;
        };
    };

    $grade_distribution = array(
        'Dist' => $distinction,
        'Merit' => $merit,
        'Pass' => $pass,
        'Fail' => $fail,
    );

    return $grade_distribution;
}

?>
