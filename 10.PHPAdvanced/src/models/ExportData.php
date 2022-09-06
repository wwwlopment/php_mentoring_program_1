<?php

namespace App\models;

class ExportData {

    private $data = [];
    private $model;
    public function __construct(Text $text) {
        $this->model = $text;
        $this->fill();
    }

    private function fill() {
        $this->data['Number of characters'] = $this->model->getCharactersCount();
        $this->data['Number of words'] = $this->model->getWordsCount();
        $this->data['Number of sentences'] = $this->model->getSentencesCount();
        $this->data['Average word length'] = $this->model->getWordLengthAverage();
        $this->data['The average number of words in a sentence'] = $this->model->getWordsInSentenceAverage();
    }

    public function get() {
        return $this->data;
    }

}