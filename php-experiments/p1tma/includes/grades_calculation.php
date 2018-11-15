<?php

require_once 'functions.php';


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
    );
    return $statistical_analysis;
};


function calculate_grade_distribution($valid_student_marks) {
    $distinction = 0;
    $merit = 0;
    $pass = 0;
    $fail = 0;

    foreach ($valid_student_marks as $mark) {
        if ($mark >= 70) {
            $distinction++;
        } elseif ($mark >= 60) {
            $merit++;
        } elseif ($mark >= 40) {
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
};

?>
