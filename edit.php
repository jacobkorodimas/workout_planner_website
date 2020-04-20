<?php
    include('connection/db_connect.php');

    if(isset($_GET['id'])){
        $sql = 'SELECT * FROM workouts WHERE id = ?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$_GET['id']]);
        $exercise = $stmt->fetch();
    }

    if(isset($_POST['delete'])){
        $sql = 'DELETE FROM workouts WHERE id = ?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$_POST['id']]);
        header('Location: index.php');
    }

    if(isset($_POST['submit'])){
        $sql = 'UPDATE workouts SET title = ?, setnum = ?, repnum = ?, category = ? WHERE id = ?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$_POST['title'],$_POST['sets'],$_POST['reps'],$_POST['category'],$_POST['id']]);
        header('Location: index.php');
    }
    

?>

<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php'); ?>

<body>
    
<h3 style = 'font-variant: small-caps;'>edit exercise</h3>

    <form action = "edit.php" method = "POST">
        <input type="hidden" name = 'id' value="<?php echo $exercise['id'];?>">

        <!-- Title edit input -->
        <div class = 'input-group mb-3'>
            <input class="form-control" placeholder = 'Exercise name' type = "text" name = "title" value = "<?php echo $exercise['title']; ?>" autocomplete = "off">
        </div>

        <!-- Sets edit input -->
        <div class = 'input-group mb-3'>
                <div class="input-group-prepend">
                    <span class="input-group-text">Sets:</span>
                </div>
                <input class="form-control" placeholder = 'Number of sets.' type = "number" step="1" name = "sets" value = "<?php echo $exercise['setnum'];  ?>" autocomplete = "off">
            </div>

            <!-- Reps edit input -->
            <div class = 'input-group mb-3'>
                <div class="input-group-prepend">
                    <span class="input-group-text">Reps:</span>
                </div>
                <input class="form-control" placeholder = 'Number of reps.' type = "number" step="1" name = "reps" value = "<?php echo $exercise['repnum']; ?>" autocomplete = "off">
            </div>

            <!-- Category edit input -->
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

        <!-- Buttons -->
        <input class = 'btn btn-info' type = "submit" name = "submit" value = "SUBMIT">
        <input class='btn btn-warning' type="submit" name = "delete" value = "DELETE">

    </form>

</body>

<?php include('templates/footer.php'); ?>

</html>