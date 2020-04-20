<?php
    include('connection/db_connect.php');

    if(isset($_POST['submit'])){
        
        $sql = 'INSERT INTO workouts(title, setnum, repnum, category) VALUES (?, ?, ?, ?)';

        $stmt = $pdo->prepare($sql);
        $stmt->execute([$_POST['title'], $_POST['sets'], $_POST['reps'], $_POST['category']]);

        header('Location: index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php'); ?>

<body>
    <h3 style = 'font-variant: small-caps;'>new exercise</h3>
    <form action = "add.php" method = "POST">
    
        <div class = 'input-group mb-3'>
            <input class="form-control" placeholder = 'Exercise name' type = "text" name = "title" value = "" autocomplete = "off">
        </div>

        <div class = 'input-group mb-3'>
                <div class="input-group-prepend">
                    <span class="input-group-text">Sets:</span>
                </div>
                <input class="form-control" placeholder = 'Number of sets.' type = "number" step="1" name = "sets" value = "" autocomplete = "off">
            </div>

            <div class = 'input-group mb-3'>
                <div class="input-group-prepend">
                    <span class="input-group-text">Reps:</span>
                </div>
                <input class="form-control" placeholder = 'Number of reps.' type = "number" step="1" name = "reps" value = "" autocomplete = "off">
            </div>

            <div class = 'input-group mb-3'>
                <select class = 'custom-select' name="category">
                    <option value="" selected disabled hidden>Choose a category:</option>
                    <option value="chest">Chest</option>
                    <option value="shoulders">Shoulders</option>
                    <option value="back">Back</option>
                    <option value="arms">Arms</option>
                    <option value="core">Core</option>
                    <option value="legs">Legs</option>
                    <option value="cardio">Cardio</option>
                </select>
            </div>
    
        <input class = 'btn btn-info' type = "submit" name = "submit" value = "SUBMIT">

    </form>
</body>

<?php include('templates/footer.php'); ?>

</html>