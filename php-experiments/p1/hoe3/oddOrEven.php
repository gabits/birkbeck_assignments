<!DOCTYPE html>
<html>
    <head>
    </head>

    <body>
        <?php
            // Check if a number is odd or even
            function isOddOrEven ($number) {
                $isEven = ($number % 2 == 0);
                echo '<p>Number is ' . ($isEven ? 'even' : 'odd') . '<p>';
            };
            isOddOrEven(3);
            isOddOrEven(5);
            isOddOrEven(10);
            isOddOrEven(0);
        ?>
    </body>
</html>
