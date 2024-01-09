<!DOCTYPE html>
<html>
<head>
    <title>Table Display</title>
</head>
<body>
    <?php
    // Read JSON file
    $json_file = 'currencies_table.json';
    $json_data = file_get_contents($json_file);
    $data = json_decode($json_data, true);

    echo "<pre>";
    var_dump($data);
    echo "</pre>";

    // if ($data && isset($data['data'])) {
    //     $table_data = $data['data'];

    //     // Display data in a table
    //     echo '<table border="1">';
    //     foreach ($table_data as $row) {
    //         echo '<tr>';
    //         foreach ($row as $cell) {
    //             echo '<td>' . $cell . '</td>';
    //         }
    //         echo '</tr>';
    //     }
    //     echo '</table>';
    // } else {
    //     echo 'No data available.';
    // }
    ?>
</body>
</html>
