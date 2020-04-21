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

    <div class='row'>
        <?php foreach($exercises as $exercise): ?>
        
            <div class='col-3'>
                <h4><?php echo ucfirst(strtolower($exercise['title']));?></h4>
                <p><?php echo $exercise['setnum'];?> Sets</p>
                <p><?php echo $exercise['repnum'];?> Reps</p>
                <p class = 'text-muted'>Category: <?php echo ucfirst(strtolower($exercise['category']));?></p>
                <button class='btn btn-info'><a id='editlink' href='edit.php?id=<?php echo $exercise['id']; ?>'>Edit</a></button>
            </div>
    
        <?php endforeach; ?>    
    </div>

</body>
    <?php include('templates/footer.php');?>
</html>

