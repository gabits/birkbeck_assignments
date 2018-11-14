<!-- Include this for every file -->
    <section>

    <?php

    // The amount of valid marks we have stored in the array will indicate
    // how many students have been included in the mark calculations.
    $number_of_students = count($valid_student_marks);

    echo "<section>";

    echo "<h2>Module Header Data...</h2>";
    display_data_from_array($module_header);

    echo "<h2>Student ID and Mark data read from file... </h2>";
    display_data_from_array($raw_student_marks);

    echo "<h2>ID's and module marks to be included...</h2>";
    display_data_from_array($valid_student_marks);

    echo "<h2>Statistical Analysis of module marks...</h2>";
    display_data_from_array($statistical_analysis);

    echo "<p># of students: $number_of_students </p>";
    echo "<h2>Grade Distribution of module marks... </h2>";
    display_data_from_array($grade_distribution);

    echo "</section>";

    function separate_file_display() {
        echo "<span>---------------------------------------------</span>"
    }
    ?>






    <?php

    $final_html_data = array(
        'File name' => file_name,
        'Code' => module_code,
        ' Module Title' => module_title,
        'Tutor' => tutor,
        'Marked date' => 08/04/2016,
    );

    ?>
