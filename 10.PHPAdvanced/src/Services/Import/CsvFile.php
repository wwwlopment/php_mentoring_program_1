<?php

namespace App\Services\Import;

class CsvFile implements ExportInterface {

    public function export(array $exportData) {
        $fp = fopen('php://temp', 'rb+');
        fputcsv($fp, array_keys($exportData));
        fputcsv($fp, array_values($exportData));
        rewind($fp);
        $data = fread($fp, 104857600);
        fclose($fp);
        return rtrim($data, "\n");
    }
}