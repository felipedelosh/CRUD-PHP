<?php include 'header.php'; ?>

<h1>DELETE</h1>
<?php
    require_once __DIR__ . '/../controllers/ExampleController.php';
    $exampleController = new ExampleController();
    $examples = $exampleController->getAllExamplesInArray();

    for ($i = 0; $i < count($examples); $i++) {
        $example = $examples[$i];
        echo '<form action="DELETE.php" method="POST" onsubmit="return confirmDelete();">';
        echo '<p>ID: ' . htmlspecialchars($example->id) . '</p>';
        echo '<p>Name: ' . htmlspecialchars($example->name) . '</p>';
        echo '<input type="hidden" name="id" value="' . htmlspecialchars($example->id) . '">';
        echo '<input type="submit" value="Delete">';
        echo '</form><br>';
    }
?>

<?php
    require_once __DIR__ . '/../controllers/ExampleController.php';
    $exampleController = new ExampleController();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['id'];
        $exampleController->deleteExample($id);
        //Warining NOT update view when delete
    }
?>

<script src="../assets/js/UPDATE.js"></script>
<?php include 'footer.php'; ?>
