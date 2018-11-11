<!DOCTYPE html>
<html>
    <head>
    </head>

    <body>
        <?php
            $i = 23;
            $even_numbers = array();
            while (23 <= $i && $i <= 42) {
                if ($i % 2 != 0) {
                    $even_numbers[] = $i;
                };
                $i++;
            };
            echo '<pre>';
            print_r($even_numbers);
            echo '</pre>';

            $even_numbers = array();
            for ($i = 23; 23 <= $i && $i <= 42; $i++) {
                if ($i % 2 != 0) {
                    $even_numbers[] = $i;
                };
            };
            echo '<pre>';
            print_r($even_numbers);
            echo '</pre>';
        ?>
    </body>
</html>
