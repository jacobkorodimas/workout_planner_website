<?php 
    include('connection/db_connect.php');
    
    if(isset($_POST['submit'])){
        $search = '%'.$_POST['search'].'%';
        $sql = 'SELECT * FROM workouts WHERE title LIKE ?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$search]);
        $exercises = $stmt->fetchAll();
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<?php include('templates/header.php'); ?>
<body>
<!-- Search Form -->
    <form action="search.php" method="POST">
        <div class = 'input-group mb-3'>
            <div class="input-group-prepend">
                <span class="input-group-text">Search:</span>
            </div>
            <input class="form-control" placeholder = 'Search for the title of exercises' type = "text" name = "search" value = "" autocomplete = "off">
            <input type="submit" name = "submit" value = "SEARCH">
        </div>
    </form>

    <!-- Print Form -->
    <?php if(!empty($exercises)): ?>
        <?php foreach($exercises as $exercise): ?>
        
            <div class='mb-5'>
                <h4><?php echo ucfirst(strtolower($exercise['title']));?></h4>
                <p><?php echo $exercise['setnum'];?> Sets</p>
                <p><?php echo $exercise['repnum'];?> Reps</p>
                <p>Category: <?php echo ucfirst(strtolower($exercise['category']));?></p>
                <button><a href='edit.php?id=<?php echo $exercise['id']; ?>'>Edit</a></button>
            </div>
        <?php endforeach; ?>
        <?php else: ?>
            <p>No results.</p>
    <?php endif; ?>
</body>
<?php include('templates/footer.php'); ?>
</html>