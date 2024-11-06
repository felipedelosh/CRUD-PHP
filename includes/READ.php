<?php include 'header.php'; ?>

<h1>READ</h1>

<form method="GET" action="READ.php">
    <input type="text" name="q" placeholder="Buscar por ID/NAME/DESCRIPTION" required>
    <button type="submit">Buscar</button>
</form>

<?php
if (isset($_GET['q'])) {
    require_once __DIR__ . '/../controllers/ExampleController.php';
    $exampleController = new ExampleController();
    $examples = $exampleController->getExampleByQuery($_GET['q']);

    if ($examples) {
        echo '<br>';
        echo 'TOTAL FOUND: ' . count($examples).'<br>';
        for ($i = 0; $i < count($examples); $i++) { 
            $example = $examples[$i];

            echo 'Product ID:'. $example->id . '<br>';
            
        }
    } else {
        echo '<p>Not found data.</p>';
    }
}
?>

<?php include 'footer.php'; ?>
