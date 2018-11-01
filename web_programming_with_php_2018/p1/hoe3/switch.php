<!DOCTYPE html>
<html>
    <head>
    </head>

    <body>
        <?php
            //
            // 9. Switch statements
            //

            function welcomeByName($name) {
                switch ($name) {
                    case 'Stuart':
                        echo 'Welcome Stuart';
                        break;
                    case 'Fred':
                        echo 'Welcome Fred';
                        break;
                    default:
                        echo 'Welcome Stranger';
                    };
                };
            };

            // Tests
            welcomeByName('Stuart');
            welcomeByName('Fred');
            welcomeByName('Alina');
        ?>
    </body>
</html>
