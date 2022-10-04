<?php

$list = "";

for ($i = 1; $i <= 4; $i++) {
    $list .= "<ul><li> $i";
    for ($x = 1; $x <= 5; $x++) {
        $list .= "<ul> <li> $x </ul> </li>";
    }
    $list .= "</li>";
    $list .= "</ul>";
}


?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>


<body>
    <?php echo $list; ?>
</body>


</html>