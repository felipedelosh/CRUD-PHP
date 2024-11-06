<?php include 'header.php'; ?>

<h1>READ</h1>

<form method="GET" action="READ.php">
    <input type="text" name="q" placeholder="Buscar por ID" required>
    <button type="submit">Buscar</button>
</form>

<?php
if (isset($_GET['q'])) {

    echo $_GET['q'];

    //require_once '../controllers/ExampleController.php';
    //$exampleController = new ExampleController();
    //$example = $exampleController->getExampleById((int)$_GET['id']);

    // if ($example) {
    //     echo '<h2>Resultado de la Búsqueda:</h2>';
    //     echo '<p>ID: ' . $example->id . '</p>';
    //     echo '<p>Nombre: ' . $example->name . '</p>';
    //     echo '<p>Descripción: ' . $example->description . '</p>';
    // } else {
    //     echo '<p>No se encontró un Example con ese ID.</p>';
    // }
}
?>

<?php include 'footer.php'; ?>
