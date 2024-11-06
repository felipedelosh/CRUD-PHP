<?php include 'header.php'; ?>

<h1>UPDATE</h1>
<?php
    require_once __DIR__ . '/../controllers/ExampleController.php';
    $exampleController = new ExampleController();
    $examples = $exampleController->getAllExamplesInArray();

    for ($i = 0; $i < count($examples); $i++){
        $example = $examples[$i];
        echo '<form action="UPDATE.php" method="POST" onsubmit="return confirmUpdate();">';
        echo '<p>ID: ' . htmlspecialchars($example->id) . '</p>';
        echo '<label for="name-' . htmlspecialchars($example->id) . '">Name:</label>';
        echo '<input type="text" id="name-' . htmlspecialchars($example->id) . '" name="name" value="' . htmlspecialchars($example->name) . '" required>';
        echo '<label for="description-' . htmlspecialchars($example->id) . '">Description:</label>';
        echo '<input type="text" id="description-' . htmlspecialchars($example->id) . '" name="description" value="' . htmlspecialchars($example->description) . '" required>';
        echo '<input type="hidden" name="id" value="' . htmlspecialchars($example->id) . '">';
        echo '<input type="submit" value="Update">';
        echo '</form><br>';
    }
?>


<?php
    require_once __DIR__ . '/../controllers/ExampleController.php';
    $exampleController = new ExampleController();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];

        $exampleController->updateExample($id, $name, $description);
        // WARINIG: not update current values in view
    }
?>

<script src="../assets/js/UPDATE.js"></script>
<?php include 'footer.php'; ?>
