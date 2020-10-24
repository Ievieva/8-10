<?php declare(strict_types=1);

require_once 'DataStorage.php';

$storage = new DataStorage();
$todos = $storage->getTodos();

if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $storage->removeTodo(intval($id));
    header("Refresh:0"); // refreshes the id too
}

?>

<html>
<body>
<ul>
    <?php foreach ($todos as $id => $todo): ?>
        <li>
            <?= $todo; ?>
            <form method="post" action="/">
                <input type="hidden" name="id" value="<?= $id; ?>"/>
                <button type="submit" name="delete">X</button>
            </form>
        </li>
    <?php endforeach; ?>
</ul>
</body>
</html>
