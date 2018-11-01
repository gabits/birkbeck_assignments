<!DOCTYPE html>
<html>
    <head>
    </head>

    <body>
        <?php
            //
            // 10. Ternary operator
            //
            function doesTargetEqualsInput ($target, $input) {
                echo '<p>' . ($target == $input ? 'equal' : 'not equal') . '<p>';
            };

            // Tests
            doesTargetEqualsInput(30, 25);
            doesTargetEqualsInput(25, 25);
        ?>
    </body>
</html>
