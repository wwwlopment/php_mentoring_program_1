<?php


use SplSubject;
use SplObjectStorage;
use SplObserver;

class TextController implements SplSubject
{
    private SplObjectStorage $observers;
    private $text;
    private $textParams;

    public function __construct($text)
    {
        $this->text = $text;
        $this->observers = new SplObjectStorage();
    }

    public function attach(SplObserver $observer): void
    {
        $this->observers->attach($observer);
    }

    public function detach(SplObserver $observer): void
    {
        $this->observers->detach($observer);
    }


    public function wordCounter(): void
    {
        $this->textParams['wordCount'] = $this->calculateWordCount();
        $this->notify();
    }

    public function numberCounter(): void
    {
        $this->textParams['numberCounter'] = $this->calculateNumberCounter();
        $this->notify();
    }

    public function longestWord(): void
    {
        $this->textParams['longestWord'] = $this->calculateLongestWord();
        $this->notify();
    }

    public function reverseWord(): void
    {
        $this->textParams['reverseWord'] = $this->calculateReverseWord();
        $this->notify();
    }

    public function notify(): void
    {
        /** @var SplObserver $observer */
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }
}