<!DOCTYPE html>
<html>
    <head>
    </head>

    <body>
        <?php
            $text = 'Hello World';
            $number = 1;
            echo "<p>Point $number : $text</p>";

            $myage = 22;
            $yourage = $myage;
            echo "<p>My age: $myage; your age: $yourage</p>";
            $myage = 54;
            echo "<p>My age: $myage; your age: $yourage</p>";
        ?>
    </body>
</html>
