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
            if ($a != $b){
                echo "<p>a does not equal b</p>";
            } else {
                echo "<p>a equals b</p>";
            };

            // $a == $b
            if ($a == $b){
                echo "<p>a equals b</p>";
            } else {
                echo "<p>a does not equal b</p>";
            };

            // $b == $c
            if ($b == $c){
                echo "<p>b equals c</p>";
            } else {
                echo "<p>b does not equal c</p>";
            };

            // $b === $c
            if ($b === $c){
                echo "<p>b is c</p>";
            } else {
                echo "<p>b is not c</p>";
            };

            // $a < $b
            if ($a < $b){
                echo "<p>a is smaller than b</p>";
            } else {
                echo "<p>a is not smaller than b</p>";
            };

            // $e > $d
            if ($e > $d){
                echo "<p>e is bigger than d</p>";
            } else {
                echo "<p>e is not bigger than d</p>";
            };

            // ($c - $b) != 0
            if (($c - $b) != 0){
                echo "<p>c - b does not equal 0</p>";
            } else {
                echo "<p>c - b equals 0</p>";
            };

            //
            // 7. Logical operators
            //
            $x = 5;
            $y = 8;
            $z = 10;

            if (($x < $y) AND ($z > $x)){
                echo "<p>x is smaller than y and z</p>";
            } else {
                echo "<p>x is not smaller than y and z</p>";
            };

            if (($z > $y) XOR ($y > $x)){
                echo "<p>either z is bigger than y or y is bigger than x</p>";
            } else {
                echo "<p>either z is bigger than y and y is bigger than x,";
                echo "or z is smaller than y and y is smaller than x.</p>";
            };

            if (!($x > $z)){
                echo "<p>x is not bigger than z</p>";
            } else {
                echo "<p>x is bigger than z</p>";
            };

            if (!($x < $z)){
                echo "<p>x is not smaller than z</p>";
            } else {
                echo "<p>x is smaller than z</p>";
            };

            if (($z > $x) || ($x > $y)){
                echo "<p>z is bigger than x and/or x is bigger than y</p>";
            } else {
                echo "<p>z is not bigger than x and x is not bigger than y</p>";
            };
        ?>
    </body>
</html>
