<?php
    include('connection/db_connect.php');

    $sql = 'SELECT * FROM workouts';
    $stmt = $pdo->query($sql);
    $exercises = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
    <?php include('templates/header.php');?>
<body>

    <?php foreach($exercises as $exercise): ?>

        <div class='mb-5'>
            <h4><?php echo ucfirst(strtolower($exercise['title']));?></h4>
            <p><?php echo $exercise['setnum'];?> Sets</p>
            <p><?php echo $exercise['repnum'];?> Reps</p>
            <p>Category: <?php echo ucfirst(strtolower($exercise['category']));?></p>
            <button><a href='edit.php?id=<?php echo $exercise['id']; ?>'>Edit</a></button>
        </div>

    <?php endforeach; ?>    

</body>
    <?php include('templates/footer.php');?>
</html>

