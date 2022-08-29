<?php

namespace App\Services\Import;

use Exception;

/**
 *
 */
class ExportFactory {

    /**
     * @throws Exception
     */
    public function getFactory($type) {
        switch ($type) {
            case 'csv':
                $factory = new CsvFile();
                break;
            case 'xml':
                $factory = new XmlFile();
                break;
            case 'xlsx':
                $factory = new XlsxFile();
                break;
            default:
                throw new Exception("Unknown type [{$type}]");
        }

        return $factory;
    }
}