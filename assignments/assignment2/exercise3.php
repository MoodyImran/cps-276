<?php
$table = "<table border=\"1\"";

for ($i = 1; $i <= 15; $i++) {

    $table .= "<tr>";

    for ($j = 1; $j <= 5; $j++) {
        $table .= "<td> Row $i Cell $j</td>";
    }

    $table .= "</tr>";
}

$table .= "</table>";
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<body>
    <?php echo $table; ?>
</body>

</html>