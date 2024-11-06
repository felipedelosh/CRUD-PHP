<?php include 'header.php'; ?>

<h1>CREATE</h1>

<h1>Create Example</h1>
<form action="CREATE.php" method="POST">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="description">Description:</label>
    <input type="text" id="description" name="description" required>

    <input type="submit" value="Create">
</form>

<?php
    require_once __DIR__ . '/../controllers/ExampleController.php';
    $exampleController = new ExampleController();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $status = $exampleController->createNewExample($_POST['name'], $_POST['description']);

        if($status == -1){
            echo "<h1>ERROR INSERTING NEW EXAMPLE</h1>";
        }else{
            echo "<h1>The new Example is insert in DB </h1>";
            echo "<p>CODE:" . $status . "</p>"; 
        }

    }

?>

<?php include 'footer.php'; ?>
