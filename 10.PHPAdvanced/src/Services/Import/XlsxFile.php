<?php

namespace App\Services\Import;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class XlsxFile implements ExportInterface {

    public function export(array $exportData) {
        $spreadsheet = new Spreadsheet();

        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle("Export");
        $id = 1;
        foreach($exportData as $key => $value) {
            $sheet->setCellValue('A'. $id, $key);
            $sheet->setCellValue('B'. $id, $value);
            $id++;
        }

        $writer = new Xlsx($spreadsheet);

        $fileName = 'export.xlsx';
        $temp_file = tempnam(sys_get_temp_dir(), $fileName);

        $writer->save($temp_file);
        return file_get_contents($temp_file);
    }
}