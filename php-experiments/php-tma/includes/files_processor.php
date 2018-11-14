<?php

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

?>
