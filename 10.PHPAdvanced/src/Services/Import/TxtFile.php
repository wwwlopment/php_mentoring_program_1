<?php

namespace App\Services\Import;

class TxtFile implements ImportInterface {

    private $data;

    public function getText(): string {
        return $this->data;
    }

    public function setPath($path): ImportInterface {
        $this->data = file_get_contents($path);
        return $this;
    }
}