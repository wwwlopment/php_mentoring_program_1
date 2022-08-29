<?php

namespace App\Entity;

use App\Repository\StatisticRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StatisticRepository::class)
 */
class Statistic
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $characters_count;

    /**
     * @ORM\Column(type="integer")
     */
    private $words_count;

    /**
     * @ORM\Column(type="integer")
     */
    private $senetnces_count;

    /**
     * @ORM\Column(type="integer")
     */
    private $word_length_avg;

    /**
     * @ORM\Column(type="integer")
     */
    private $words_in_sentence_avg;

    /**
     * @ORM\Column(type="integer")
     */
    private $count;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCharactersCount(): ?int
    {
        return $this->characters_count;
    }

    public function setCharactersCount(int $characters_count): self
    {
        $this->characters_count = $characters_count;

        return $this;
    }

    public function getWordsCount(): ?int
    {
        return $this->words_count;
    }

    public function setWordsCount(int $words_count): self
    {
        $this->words_count = $words_count;

        return $this;
    }

    public function getSenetncesCount(): ?int
    {
        return $this->senetnces_count;
    }

    public function setSenetncesCount(int $senetnces_count): self
    {
        $this->senetnces_count = $senetnces_count;

        return $this;
    }

    public function getWordLengthAvg(): ?int
    {
        return $this->word_length_avg;
    }

    public function setWordLengthAvg(int $word_length_avg): self
    {
        $this->word_length_avg = $word_length_avg;

        return $this;
    }

    public function getWordsInSentenceAvg(): ?int
    {
        return $this->words_in_sentence_avg;
    }

    public function setWordsInSentenceAvg(int $words_in_sentence_avg): self
    {
        $this->words_in_sentence_avg = $words_in_sentence_avg;

        return $this;
    }

    public function getCount(): ?int
    {
        return $this->count;
    }

    public function setCount(int $count): self
    {
        $this->count = $count;

        return $this;
    }
}
