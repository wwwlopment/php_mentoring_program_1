<?php

namespace App\Services\Import;

class HtmlFile implements ImportInterface {

    private $data;

    public function getText(): string {
        return $this->data;
    }

    public function setPath($path): ImportInterface {
        $this->data = $this->htmlToPlainText(file_get_contents($path));

        return $this;
    }

    private function htmlToPlainText($str): string {
        $str = str_replace('&nbsp;', ' ', $str);
        $str = html_entity_decode($str, ENT_QUOTES | ENT_COMPAT , 'UTF-8');
        $str = html_entity_decode($str, ENT_HTML5, 'UTF-8');
        $str = html_entity_decode($str);
        $str = htmlspecialchars_decode($str);
        return strip_tags($str);
    }
}