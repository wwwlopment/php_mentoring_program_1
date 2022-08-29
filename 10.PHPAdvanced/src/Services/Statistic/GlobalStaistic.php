<?php

namespace App\Services\Statistic;

use App\Entity\Statistic;
use App\models\Text;
use Doctrine\ORM\EntityManagerInterface;

/**
 * class Global Statistic
 */
class GlobalStaistic {

   protected $model;
   protected $entityManager;
   protected $statistic;

   public function __construct(Text $model, $entityManager){
       $this->model = $model;
       $this->entityManager = $entityManager;
       $this->get();
   }

   public function store() {
       $statistic = new Statistic();
       $statistic->setCharactersCount($this->calculateAvg('getCharactersCount', 'getCharactersCount'));
       $statistic->setWordsCount($this->calculateAvg('getWordsCount', 'getWordsCount'));
       $statistic->setSenetncesCount($this->calculateAvg('getSenetncesCount', 'getSentencesCount'));
       $statistic->setWordLengthAvg($this->calculateAvg('getWordLengthAvg', 'getWordLengthAverage'));
       $statistic->setWordsInSentenceAvg($this->calculateAvg('getWordsInSentenceAvg', 'getWordsInSentenceAverage'));
       $lastCount = $this->statistic ? $this->statistic->getCount()+1 : 1;
       $statistic->setCount($lastCount);

       $this->entityManager->persist($statistic);
       $this->entityManager->flush();
   }

   public function get() {
       $statistic = $this->entityManager
           ->getRepository(Statistic::class)
           ->findBy([], ['id' => 'DESC'], 1);
       if ($statistic) {
           $this->statistic = $statistic[0];
       }
       return $this->statistic;
   }

   private function calculateAvg($statisticMethodName, $modelMethodName) {
       if (!$this->statistic){
           return $this->model->$modelMethodName();
       }
       return ($this->statistic->$statisticMethodName() + $this->model->$modelMethodName()) / $this->statistic->getCount();
   }





}