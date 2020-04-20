<?php
    include('connection/db_connect.php');

    // Clear all button php
    if(isset($_POST['clear'])){
        $sql = 'TRUNCATE TABLE workouts';
        $pdo->exec($sql);
        header('Location: index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Workout Planner</title>
    <!-- Bootstrap Css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- My stylesheet -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
<!-- Title -->
    <h1><a href='index.php' id = 'titlelink'>Workout Planner</a></h1>

    <div class='row'>
        <!-- spacer div -->
        <div class='col-3'></div>

        <!-- Dropdown -->
        <button class="btn btn-secondary dropdown-toggle col-3 mr-2" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Workouts
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="add.php">Add a workout</a>
            <a class="dropdown-item" href="search.php">Find a workout</a>
        </div>

        <!-- Clear all button -->
        <form action="index.php" method='POST'>
            <input class = "btn btn-info" type="submit" name = "clear" value = "Clear Workout">
        </form>
    </div>
    <hr>

</body>
</html>