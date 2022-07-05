<?php

/**
 * class MainController
 */
class MainController {

    public function __construct() {
        require_once(ROOT . '/components/TimeService.php');
        require_once(ROOT . '/models/Text.php');
    }

    /**
     * @return void
     */
    public function actionIndex() {
        $enteredText = $_POST['calculated-text'] ?? '';
        if (!empty($enteredText)) {
            $timeService = new TimeService();
        }
        $text = new Text($enteredText);
        require_once(ROOT . '/views/index.php');
    }
}