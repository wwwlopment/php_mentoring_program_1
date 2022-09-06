<?php

namespace App\Services\Import;

use Exception;

/**
 *
 */
class ImportFactory {

    /**
     * @throws Exception
     */
    public function getFactory($type) {
        switch ($type) {
            case 'txt':
                $factory = new TxtFile();
                break;
            case 'xml':
                $factory = new XmlFile();
                break;
            case 'html':
            case 'url':
                $factory = new HtmlFile();
                break;
            default:
                throw new Exception("Unknown type [{$type}]");
        }

        return $factory;
    }
}