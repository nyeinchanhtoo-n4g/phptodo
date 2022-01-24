<?php

require 'config.php';

if ($_POST) {
    $title = $_POST['title'];
    $description = $_POST['description'];

    $sql = "INSERT INTO todo (title, description) VALUES (:title, :description)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':description', $description);
    $stmt->execute(); 

    if ($stmt) {
        echo "<script>alert('Successfully Created');window.location.href='index.php';</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
    <div class="card">
        <div class="card-body">
            <h2>Create New ToDo List</h2>
            <form class="" action="create.php" method="post">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Enter Title" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control" placeholder="Enter Description" required></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" name="" value="SUBMIT">Create</button>
                    <a href="index.php" class="btn btn-danger" name="" values="BACK">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html> 