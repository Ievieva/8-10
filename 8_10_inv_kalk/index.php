<?php declare(strict_types=1);

require_once 'Calculator.php';

$amount = (int)$_POST['amount'] ?? 1;
$years = (int)$_POST['years'] ?? 1;
$percent = (int)$_POST['percent'] ?? 1;

$result = Calculator::calculateInvestments(
    $amount,
    $years,
    $percent
);

?>

<html>
<body>
<h3>Investment calculator</h3>
<form action="/" method="post">
    <label for="amount">Amount $</label>
    <input type="number" id="amount" name="amount"/>

    <label for="years">Years</label>
    <input type="number" id="years" name="years"/>

    <label for="percent">Percent</label>
    <input type="number" id="percent" name="percent"/>
    <button type="submit">Submit</button>
</form>
<h3>In <?= $years; ?> years you will have $<?= $result; ?></h3>
</body>
</html>
