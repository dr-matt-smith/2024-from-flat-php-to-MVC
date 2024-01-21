<!DOCTYPE html>
<html lang="en">
<head>
    <title>website 1 - list student page</title>
</head>
<body>

<?php
require_once __DIR__ . '/_nav.php';
?>

<h1>Details of array of student objects</h1>

<div>

<?php
if(empty($students)):
?>
    <p>
        (no students found)
    </p>
<?php
else:
    foreach ($students as $student):
?>
        name = <?= $student->getName() ?>
        <br>
        year = <?= $student->getYear() ?>
        <hr>
<?php
    endforeach;
endif;
?>
</div>
</body>
</html>