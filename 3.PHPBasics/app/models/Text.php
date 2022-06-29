<?php

/**
 * class Text
 */
class Text {

    /**
     * @var string
     */
    private $text = '';

    /**
     * @var int
     */
    private $chartersCount;
    private $sentencesCount;

    /**
     * @var array
     */
    private $sentencesArray = [];
    private $wordsArray = [];
    private $charactersFrequency = [];

    public function __construct($text) {
        $this->text = (string) $text;
    }

    /**
     * @return false|int
     */
    public function getCharactersCount() {
        if (!$this->chartersCount){
            $this->chartersCount = mb_strlen($this->text, 'UTF-8');
        }
        return $this->chartersCount;
    }

    /**
     * @return int
     */
    public function getWordsCount() {
        return count($this->getWordsArray());
    }

    /**
     * @return int
     */
    public function getSentencesCount() {
        if (!$this->sentencesCount){
            $this->sentencesCount = count($this->getSentencesArray());
        }
        return $this->sentencesCount;
    }

    /**
     * @return array
     */
    public function getCharactersFrequency() {
        if (!$this->charactersFrequency) {
            for ($i = 0; $i < $this->getCharactersCount(); $i++) {
                $char = mb_substr($this->text, $i, 1, 'UTF-8');
                if (!array_key_exists($char, $this->charactersFrequency)) {
                    $this->charactersFrequency[$char] = 0;
                }
                $this->charactersFrequency[$char]++;
            }
        }
        return $this->charactersFrequency;
    }

    /**
     * @return float[]|int[]
     */
    public function getCharactersPercentage() {
        $charactersAmount = $this->getCharactersCount();
        return array_map(function ($count) use ($charactersAmount){
            return $count * 100 / $charactersAmount;
        }, $this->getCharactersFrequency());
    }

    /**
     * @return int|string
     */
    public function getWordLengthAverage() {
        $arr = $this->getWordsArray();
        $wordsCount = count($arr);
        if ($wordsCount === 0) {
            return 0;
        }
        $letters = 0;
        foreach ($arr as $word) {
           $letters += mb_strlen($word, 'UTF-8');
        }
        return number_format($letters/$wordsCount, 2, '.', '');
    }

    /**
     * @return float|int
     */
    public function getWordsInSentenceAverage() {
        $totalWords = array_reduce($this->getSentencesArray(), function (int $carry, string $item) {
            return $carry + count(array_filter(explode(' ', $item)));
        }, 0);

        if ($this->getSentencesCount() === 0) {
            return 0;
        }
        return $totalWords / $this->getSentencesCount();
    }

    /**
     * @return string
     */
    public function getReverseText() {
        return $this->strrevArr($this->text);
    }

    /**
     * @return string
     */
    public function getReverseWords() {
        $array = explode(" ", $this->text);
        $rarray = array_reverse($array);

        return implode(" ", $rarray);
    }

    /**
     * @param $string
     * @return bool
     */
    public function isPalindromeString($string) {
        if (!$string){
            return false;
        }
        $string = strtolower($string);
        return $this->strrevArr($string) === $string;
    }

    /**
     * @return int
     */
    public function getPalindromeWordsCount() {
        $countPalindroms = 0;
        foreach ($this->getWordsArray() as $word){
            if ($this->isPalindromeString($word)){
                $countPalindroms++;
            }
        }
        return $countPalindroms;
    }

    /**
     * @return bool
     */
    public function isWholeTextPalindrome() {
        $text = implode('', $this->getSentencesArray());
        return $this->isPalindromeString($text);
    }

    /**
     * @return array
     */
    public function getSentencesArray() {
        if (empty($this->sentencesArray)) {
            $special = [',', ';', '-'];
            $text = str_replace($special, ' ', $this->text);

            $tokens = '.?!';
            $chunk = strtok(trim($text), $tokens);

            if (!is_string($chunk)) {
                return [];
            }

            do {
                $this->sentencesArray[] = trim($chunk);
            } while ($chunk = strtok($tokens));
        }
        return $this->sentencesArray;
    }

    /**
     * @return array
     */
    public function getWordsArray() {
        if (empty($this->wordsArray)) {
            $text = preg_replace('/\s+/', ' ', strtolower($this->text));
            $text = str_replace([',', '.', '?', '!', ':', ';'], '', $text);
            $this->wordsArray = explode(' ', $text);
            if ($text === '') {
                $this->wordsArray = [];
            }
        }
        return $this->wordsArray;
    }

    /**
     * @param $limit
     * @return array
     */
    public function getMostUsedWords($limit = 10) {
        $wordsCounts = array_count_values($this->getWordsArray());
        arsort($wordsCounts);
        return array_keys(array_slice($wordsCounts, 0, $limit));
    }

    /**
     * @param $limit
     * @return array
     */
    public function getShortestWords($limit=10) {
        $sortedWordsArray = $this->sortedByLength($this->getWordsArray());
        return array_slice(array_unique($sortedWordsArray), 0, $limit);
    }

    /**
     * @param $limit
     * @return array
     */
    public function getLongestWords($limit=10) {
        $sortedWordsArray = $this->sortedByLength($this->getWordsArray());
        $sortedWordsArray = array_reverse($sortedWordsArray);
        return array_slice(array_unique($sortedWordsArray), 0, $limit);
    }

    /**
     * @param $limit
     * @return array
     */
    public function getShortestSentences($limit=10) {
        $sortedSentencesArray = $this->sortedByLength($this->getSentencesArray());
        return array_slice(array_unique($sortedSentencesArray), 0, $limit);
    }

    /**
     * @param $limit
     * @return array
     */
    public function getLongestSentences($limit=10) {
        $sortedSentencesArray = $this->sortedByLength($this->getSentencesArray());
        $sortedSentencesArray = array_reverse($sortedSentencesArray);
        return array_slice(array_unique($sortedSentencesArray), 0, $limit);
    }

    /**
     * @param $limit
     * @return array
     */
    public function getLongestPalindromeWords($limit=10) {
        $palindromsArray = array_filter($this->getWordsArray(), function ($word){
            return $this->isPalindromeString($word);
        });

        if (empty($palindromsArray)){
            return [];
        }

        $sortedWordsArray = $this->sortedByLength($palindromsArray);
        $sortedWordsArray = array_reverse($sortedWordsArray);
        return array_slice(array_unique($sortedWordsArray), 0, $limit);
    }

    /**
     * @param $arr
     * @return mixed
     */
    private function sortedByLength($arr) {
        uasort($arr, function($a, $b) {
            return  mb_strlen($a, 'UTF-8') - mb_strlen($b, 'UTF-8');
        });
        return $arr;
    }

    /**
     * @param $str
     * @return string
     */
    private function strrevArr($str) {
        preg_match_all('/./us', $str, $array);
        return join('',array_reverse($array[0]));
    }
}