<?php

    DATA_DIRECTORY = 'data';


    function get_data_files($data_dir) {

        // Check if we can get files from the given directory name
        if (is_dir(DATA_DIRECTORY)) {
            $data_dir = opendir(DATA_DIRECTORY);
        } else {
            echo "<p>Name provided does not refer to a directory.<p>";
            return;
        };

        // Then, check if directory is empty
        if (readdir($data_dir) === false) {
            echo "<p>No data files found in directory " . DATA_DIRECTORY . "</p>";
        };

        $dir_files = array()
        // If not empty, get all .txt files
        while(false !== ($file_name = readdir($data_dir))){
            $file_extension = explode(".", $file_name)[1];
            if ($file_extension == '.txt') {
                $dir_files[] = $file_name;
            };
        };
        closedir($data_dir);

        return $dir_files;
    };


    function get_file_contents($data_file) {
        // Get an array of each line of the file.
        $file_contents = array();
        if (is_file($data_file) && is_writable($data_file)) {
            $file = fopen('people.txt', 'r');
            if ($file !== false) {
                // Get each line of the file and store on an array
                while (!feof($file)) {
                $line = fgets($file);
                $file_contents[] = $line;
            } else {
                echo "<p>File $file could not be opened.</p>";
            };
            fclose($file);
        };
        return $file_contents;
    };


    function build_and_display_html_from_file($data_file) {
        // Reads the file, validates the data and places it in the
        // HTML so we can display it to the user.

        function display_data_from_array() {
            echo "<p>";
            foreach ($array_data as $key => $value) {
                echo "<b>$key</b>: $value";
            }
            echo "</p>";
        };

        $file_contents = get_file_contents($data_file);
        $html_data = get_data_for_html($file_contents);

        // The amount of valid marks we have stored in the array will indicate
        // how many students have been included in the mark calculations.
        $number_of_students = count($valid_student_marks);

        echo "<section>";

        echo "<h2>Module Header Data...</h2>";
        display_data_from_array($html_data["module_header"]);

        echo "<h2>Student ID and Mark data read from file... </h2>";
        display_data_from_array($html_data["raw_student_marks"]);

        echo "<h2>ID's and module marks to be included...</h2>";
        display_data_from_array($html_data["valid_student_marks"]);

        echo "<h2>Statistical Analysis of module marks...</h2>";
        display_data_from_array($html_data["statistical_analysis"]);

        echo "<p># of students: $number_of_students </p>";
        echo "<h2>Grade Distribution of module marks... </h2>";
        display_data_from_array($html_data["grade_distribution"]);

        echo "</section>";

        echo "<span>---------------------------------------------</span>";
    };


    function clean_trailing_whitespaces_in_array_data($data_array) {
        for ($index = 0; $index < count($array); $index++) {
            $data_array[$index] = trim($data_array[$index]);
        };
        return $data_array;
    };


    // TODO: If == ERROR, remove from valid array
    function validate_module_header($module_header) {
        // The module headers follow this structure and order:
        //
        // File name: <file_name>
        // Module code: <module_code>
        // Module title: <module_title>
        // Tutor: <tutor>
        // Marked date: <dd/mm/yyyy>

        function validate_date($marked_date) {
            $date = explode("/", $marked_date);
            $date = str_replace("/", "", $date);

            $day = $date[:2];
            $month = $date[2:4];
            $year = $date[4:8];

            if ($day < 0 or $day > 31 or $month < 0 or $month > 12 or $year < 0) {
                $marked_date = $marked_date . ":ERROR";
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

        $module_header = 
    };


    function validate_module_body($file_body) {

    };


    function process_file_data($file_contents) {
        // Given an array $file_contents, process the data to get all
        // information that will be exposed on the template.

        // The first line from the file contents should be the header information
        $file_header = $file_contents[0];
        $module_header = get_module_header($file_header);

        // And all other lines should involve student IDs and grades
        $file_body = $file_contents[1];

        $valid_data = validate_file_content($file_contents);
    };

    $data_files = get_data_files(DATA_DIRECTORY);
    foreach ($data_files as $data_file) {
        build_and_display_html_from_file($data_file);
    };

?>
