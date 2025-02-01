<?php

$xmlString = '<?xml version="1.0" encoding="UTF-8"?>
<collagedata>
    <derparment category="CSE">
        <subject lang="en">JAVA</subject>
        <name>Zamaradi</name>
        <age>23</age>
        <marks>90</marks>
        <address>240 Mwanza</address>
    </derparment>
    <derparment category="ETE">
        <subject lang="en">Wave Propagation</subject>
        <name>Selemani</name>
        <age>26</age>
        <marks>69</marks>
        <address>890 Tanga</address>
    </derparment>
    <derparment category="IST">
        <subject lang="en">Introduction to IT</subject>
        <name>OTIMBI</name>
        <age>25</age>
        <marks>78</marks>
        <address>56 Arusha</address>
    </derparment>
</collagedata>';


$xml = simplexml_load_string($xmlString);

if ($xml === false) {
    echo "Failed to load XML.";
    exit;
}


echo '<table border="1" cellpadding="5" cellspacing="0">';
echo '<tr>
        <th>Category</th>
        <th>Subject</th>
        <th>Name</th>
        <th>Age</th>
        <th>Marks</th>
        <th>Address</th>
      </tr>';

    //   var_dump($xml);

foreach ($xml->derparment as $department) {
    echo '<tr>';
    echo '<td>' . htmlspecialchars($department['category']) . '</td>';
    echo '<td>' . htmlspecialchars($department->subject) . '</td>';
    echo '<td>' . htmlspecialchars($department->name) . '</td>';
    echo '<td>' . htmlspecialchars($department->age) . '</td>';
    echo '<td>' . htmlspecialchars($department->marks) . '</td>';
    echo '<td>' . htmlspecialchars($department->address) . '</td>';
    echo '</tr>';
}

echo '</table>';
?>
