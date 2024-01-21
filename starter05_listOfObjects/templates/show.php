<!DOCTYPE html>
<html lang="en">
<head>
    <title>website 1 - show student page</title>
</head>
<body>

<?php
require_once __DIR__ . '/_nav.php';
?>

<h1>Details of 1 student</h1>
<p>
    name = <?= $student->getName() ?>
    <br>
    year = <?= $student->getYear() ?>
</p>
</body>
</html>