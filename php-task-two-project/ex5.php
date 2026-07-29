<?php
    function sum( $carry, $item ) {
            $carry += $item;
            return $carry;
        }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EX5</title>
</head>
<body>
    <form action="ex5.php" method="post">
        <label for="">
            Name:
            <input type="text" name="name" id="">
        </label>

        <br>

        <label for="">
            Grade 1:
            <input type="text" name="grade1" id="">
        </label>

        <br>

        <label for="">
            Grade 2:
            <input type="text" name="grade2" id="">
        </label>
        <input type="submit" value="Submit">
    </form>

    <?php
        if ( strcmp( $_SERVER[ "REQUEST_METHOD" ], "POST" ) === 0 ) {
            $name = ucfirst( filter_input(
                    INPUT_POST,
                    "name",
                    FILTER_SANITIZE_SPECIAL_CHARS
            ) );

            $cache = array_reduce( [ filter_input(
                    INPUT_POST,
                    "grade1",
                    FILTER_VALIDATE_INT
            ), filter_input(
                    INPUT_POST,
                    "grade2",
                    FILTER_VALIDATE_INT
            ) ], "sum" ) / 2;
    ?>
            <hr>
            <article style="border: 1px solid #ccc; padding: 20px; border-radius: 10px; width: 300px; background:
                <?= $cache >= 10 ? "#90EE90" : "#F08080"; ?>
            ;" >
                <p>Student <?= $name; ?> has a grade of: <?= $cache; ?> </p>

            </article>
    <?php
        }
    ?>
</body>
</html>
