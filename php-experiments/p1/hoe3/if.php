<!DOCTYPE html>
<html>
    <head>
    </head>

    <body>
        <?php

            //
            // 6. Comparisons with if/else statements
            //
            $a = 3;
            $b = 4;
            $c = '4';
            $d = 'My String';
            $e = 'Not My String';

            // $a != $b
            echo (($a != $b) ? (
                "<p>a does not equal b</p>"
            ) : (
                "<p>a equals b</p>"
                )
            );

            // $a == $b
            echo ($a == $b) ? (
                "<p>a equals b</p>"
            ) : (
                "<p>a does not equal b</p>"
            );

            // $b == $c
            echo ($b == $c) ? (
                "<p>b equals c</p>"
            ) : (
                "<p>b does not equal c</p>"
            );

            // $b === $c
            echo ($b === $c) ? (
                "<p>b is c</p>"
            ) : (
                "<p>b is not c</p>"
            );

            // $a < $b
            echo ($a < $b) ? (
                "<p>a is smaller than b</p>"
            ) : (
                "<p>a is not smaller than b</p>"
            );

            // $e > $d
            echo ($e > $d) ? (
                "<p>e is bigger than d</p>"
            ) : (
                "<p>e is not bigger than d</p>"
            );

            // ($c - $b) != 0
            echo (($c - $b) != 0
            ) ? (
                "<p>c minus b does not equal 0</p>"
            ) : (
                "<p>c minus b equals 0</p>"
            );

            //
            // 7. Logical operators
            //
            $x = 5;
            $y = 8;
            $z = 10;

            echo (
                ($x < $y) AND ($z > $x)
            ) ? (
                "<p>x is smaller than y and z</p>"
            ) : (
                "<p>x is not smaller than y and z</p>"
            );

            echo (
                ($z > $y) XOR ($y > $x)
            ) ? (
                "<p>either z is bigger than y or y is bigger than x</p>"
            ) : (
                "<p>either z is bigger than y and y is bigger than x," .
                "or z is smaller than y and y is smaller than x.</p>"
            );

            echo (
                !($x > $z)
            ) ? (
                "<p>x is not bigger than z</p>"
            ) : (
                "<p>x is bigger than z</p>"
            );

            echo (!($x < $z)
            ) ? (
                "<p>x is not smaller than z</p>"
            ) : (
                "<p>x is smaller than z</p>"
            );

            echo (
                ($z > $x) || ($x > $y)
            ) ? (
                "<p>z is bigger than x and/or x is bigger than y</p>"
            ) : (
                "<p>z is not bigger than x and x is not bigger than y</p>"
            );

            //
            // 8. Extending if with elseif statements
            //
            function compareValues ($a, $b) {
                if ($a > $b) {
                    echo "<p>a is bigger than b</p>";
                }
                elseif ($a < $b) {
                    echo "<p>a is smaller than b</p>";
                }
                else {
                    echo "<p>a equals b</p>";
                };
            };

            $a = $b = 17;
            compareValues($a, $b);

            $a++;
            compareValues($a, $b);

            $a--;
            $b++;
            compareValues($a, $b);
        ?>
    </body>
</html>
