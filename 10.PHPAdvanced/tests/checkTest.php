<?php

use PHPUnit\Framework\TestCase;

class checkTest extends TestCase {

    protected $text;

    protected function setUp(): void {
        $this->text = new \App\models\Text('test');
    }

    public function testChartersCount() {
        $this->assertSame(4, $this->text->getCharactersCount());
    }

    public function testSentencesCount() {
        $this->assertSame(1, $this->text->getSentencesCount());
    }

    public function testReverseText() {
        $this->assertSame('tset', $this->text->getReverseText());
    }

    public function testIsPalindrome() {
        $this->assertFalse($this->text->isWholeTextPalindrome());
    }

    public function testHash() {
        $stub = $this->createMock(\App\models\Text::class);
        $stub->method('getHash')
            ->willReturn(md5('foo'));
        $this->assertSame('acbd18db4cc2f85cedef654fccc4a4d8', $stub->getHash());
    }

}