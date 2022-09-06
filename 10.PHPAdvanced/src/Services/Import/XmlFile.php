<?php

namespace App\Services\Import;

use App\models\Text;
use SimpleXMLElement;

class XmlFile implements ImportInterface, ExportInterface {

    private $data;

    public function getText(): string {
        return $this->data;
    }

    public function setPath($path): ImportInterface {
        $objXmlDocument = simplexml_load_file($path);
        $objJsonDocument = json_encode($objXmlDocument);
        $arrOutput = json_decode($objJsonDocument, true);
        $this->data = $arrOutput[0] ?? '';
        return $this;
    }
    /**
     * Method to export xml
     */
    public function export(array $exportData) {
        $xml = new SimpleXMLElement("<?xml version=\"1.0\"?><text></text>");
        $subOffer = $xml->addChild("root");
        foreach($exportData as $key => $value) {
            $subOffer->addChild($key,htmlspecialchars($value));
        }
        return $xml->asXML();
    }
}