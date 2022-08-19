<?php

use SplObserver;
use SplSubject;

class TextObserver implements SplObserver {

    /**
     * @var SplSubject[]
     */
    private array $calculatedTextParameters = [];

    /**
     * It is called by the Subject, usually by SplSubject::notify()
     */
    public function update(SplSubject $subject): void
    {
        $this->calculatedTextParameters[] = clone $subject;
    }

    /**
     * @return SplSubject[]
     */
    public function getCalculatedTextParameters(): array
    {
        return $this->calculatedTextParameters;
    }
}