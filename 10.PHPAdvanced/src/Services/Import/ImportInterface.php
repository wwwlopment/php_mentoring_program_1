<?php
namespace App\Services\Import;

interface ImportInterface {
    //public function __construct($data);
    public function getText(): string;

    public function setPath($path): self;
}