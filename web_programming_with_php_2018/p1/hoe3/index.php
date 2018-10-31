<!DOCTYPE html>
<html>
    <head>
    </head>

    <body>
        <?php
            $text = 'Hello World';
            $number = 1;
            echo '<p>Point ' . $number . ': ' . $text . '</p>';

            // Mathematical operations
            $a = 8;
            $b = 14;

            $addition = $a + $b;
            $subtraction = $a - $b;
            $differenceMultiplication = ($b - $a) * $a;
            $module = $b % $a;
            $division = $b / $a;

            echo "<p>$addition</p>";
            echo "<p>$subtraction</p>";
            echo "<p>$differenceMultiplication</p>";
            echo "<p>$module</p>";
            echo "<p>$division</p>";

            // Alter variable value
            $a += $b;
            echo "<p>$a</p>";

            $a -= $b;
            echo "<p>$a</p>";

            $a = $a.$b;
            echo "<p>$a</p>";

            $a .= $b;
            echo "<p>$a</p>";

            // String operations
            $c = 'This ';
            $d = 'class';

            $c .= $d;
            echo "<p>$c</p>";

            // Increment/decrement
            $a = 5;
            $b = 6;
            echo '<p>Pre-increment $a: ' . ++$a . '</p>';
            echo '<p>Post-increment $b: ' . $b++ . '</p>';
            echo "<p>Current values: \$a = $a, \$b = $b </p>";
        ?>
    </body>
</html>
