<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Data</title>
</head>
<body>

<h2>College Department Data</h2>

<?php
$xml = simplexml_load_file('data.xml') or die("Error: Cannot create object");

echo '<table>';
echo '<tr><th>Department</th><th>Subject</th><th>Name</th><th>Age</th><th>Marks</th><th>Address</th></tr>';
foreach ($xml->department as $department) {
    echo '<tr>';
    echo '<td>' . $department['category'] . '</td>';
    echo '<td>' . $department->subjects . '</td>';
    echo '<td>' . $department->name . '</td>';
    echo '<td>' . $department->age . '</td>';
    echo '<td>' . $department->marks . '</td>';
    echo '<td>' . $department->address . '</td>';
    echo '</tr>';
}

echo '</table>';
?>

</body>
</html>