<?php
require 'config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
    <?php
        $pdostatement = $pdo->prepare("SELECT * FROM todo ORDER BY id DESC");
        $pdostatement->execute();
        $result = $pdostatement->fetchAll();

    ?>
    <div class="card">
        <div class="card-body">
            <h2> TO DO HOME PAGE</h2>
            <div>
                <a href="create.php" class="btn btn-success">Create New</a>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Created</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                        if($result) {
                            foreach($result as $value){
                    ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $value['title'] ?></td>
                            <td><?php echo $value['description'] ?></td>
                            <td><?php echo date('d-m-Y',strtotime($value['created_at'])) ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $value['id'];?>" class="btn btn-primary">Edit</a>
                                <a href="delete.php?id=<?php echo $value['id'];?>" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger">Delete</a>
                        </tr>
                    <?php
                            $i++;
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>