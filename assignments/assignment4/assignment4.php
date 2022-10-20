<?php
       if(count($_POST) > 0){
        require_once 'addNameProc.php';
        $addName = new AddNamesProc();
        $output = $addName->addClearName();
       }
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>assignment4</title>

</head>

<body>
    <form action="assignment4.php" method="post">
        <header>
            <h1>Add Names</h1>
        </header>
        <button type="add" class="btn btn-primary" name="addname" id="addname">Add Name</button>
        <button type="clear" class="btn btn-primary" name="clearname" id="clearname">Clear Names</button>
        
        <div class="form-group">
            <label for="enter">Enter Name</label>
            <input type="text" class="form-control" name=enterName id="enterName">
        </div>

        <div class="form-group">
            <label for="textarea">List of Names</label>
            <textarea style="height: 500px;" class="form-control" id="namelist" name="namelist"><?php echo $output; ?></textarea>
        </div>

    </form>

</body>

</html>