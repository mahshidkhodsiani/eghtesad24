<?php
    $json_file = 'python-scripts/cryptocurrencies_table.json';
    $json_data = file_get_contents($json_file);
    $data = json_decode($json_data, true);


    echo '<pre>';
    var_dump($data);


