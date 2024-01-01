<?php

if (!function_exists('array_to_csv')) {
    function array_to_csv($array) {
        $output = fopen('php://temp', 'w');
        foreach ($array as $row) {
            fputcsv($output, $row);
        }
        rewind($output);
        $csv_content = stream_get_contents($output);
        fclose($output);
        return $csv_content;
    }
}
