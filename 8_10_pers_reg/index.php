<?php declare(strict_types=1);

require_once './DataStorage.php';
require_once './Person.php';

$name = $_GET['name'] ?? 'Ieva';
$surname = $_GET['surname'] ?? 'Sieva';
$number = $_GET['number'] ?? '123456-12345';
$address = $_GET['address'] ?? 'Riga';

$storage = new DataStorage();
$storage->addPersonToCSV(new Person($name, $surname, $number, $address));
$numberToFind = $_POST['numberToFind'];
$person = $storage->getByNumber($numberToFind);
if ($person) {
    $result = $person->getName() . ' '
        . $person->getSurname() . ', address: '
        . $person->getAddress();
} else {
    $result = 'Person not found.';
}

?>

<html>
    <body>
        <form action="/" method="get">
            <label for="name">First name</label>
            <input type="text" id="name" name="name"/><br><br>

            <label for="surname">Last name</label>
            <input type="text" id="surname" name="surname"/><br><br>

            <label for="number">Security number</label>
            <input type="text" id="number" name="number"/><br><br>

            <label for="address">Address</label>
            <input type="text" id="address" name="address"/><br><br>
            <button type="submit">Submit</button>
        </form>
        <h4>Find a person by Security number</h4>
        <form action="/" method="post">
            <label for="numberToFind">Security number</label>
            <input type="text" id="numberToFind" name="numberToFind"/>
            <button type="submit">Submit</button>
            <h4><?= $result; ?></h4>
        </form>
    </body>
</html>
