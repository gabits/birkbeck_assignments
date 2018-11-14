<?php

require 'html_processor.php';


define('DATA_DIRECTORY', __DIR__ . '/../data/');


$data_files = get_data_files(DATA_DIRECTORY);
foreach ($data_files as $data_file) {
    build_and_display_html_from_file(DATA_DIRECTORY . "/$data_file");
};

?>
